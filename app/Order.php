<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $payment_id
 * @property string|null $status
 * @property float|null $amount
 * @property string|null $info
 * @property int|null $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderPublication[] $publications
 * @property-read int|null $publications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Order extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'status',
        'amount',
        'info',
        'time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static $client;

    protected static function init()
    {
        if (self::$client) {
            return;
        }

        self::$client = new Client([
            'base_uri' => 'https://mpi.gov.tm/'
        ]);
    }

    public function publications(){
        return $this->hasMany(OrderPublication::class);
    }

    public static function paymentGenerate($options)
    {
        self::init();
        try {
            $response = self::$client->request('GET', 'payment/rest/register.do', [
                'query' => [
                    'userName' => env('PAYMENT_USERNAME'),
                    'password' => env('PAYMENT_PASSWORD'),
                    'orderNumber' => "ABUNA#{$options['id']}-" . time(),
                    'amount' => intval($options['amount'] * 100),
                    'currency' => 934,
                    'returnUrl' => route('payment', 'success'),
                    'failUrl' => route('payment', 'error'),
                    'description' => "Order #".$options['id'],
                    'language' => 'ru',
                    'pageView' => 'DESKTOP',
                    'clientId' => $options['id']
                ]
            ]);

            $body = $response->getBody()->getContents();
            $body = json_decode($body);

            if ($body->errorCode) {
                return (object)[
                    'success' => false,
                    'message' => $body->errorMessage
                ];
            }

            return (object)[
                'success' => true,
                'data' => $body
            ];
        } catch (\Exception $e) {
            return (object)[
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public static function status($options)
    {
        self::init();

        try {
            $response = self::$client->request('GET', 'payment/rest/getOrderStatusExtended.do', [
                'query' => [
                    'userName' => env('PAYMENT_USERNAME'),
                    'password' => env('PAYMENT_PASSWORD'),
                    'orderId' => $options['payment_id'],
                    'language' => 'ru',
                ]
            ]);

            $body = $response->getBody()->getContents();
            $body = json_decode($body);

            if ($body->errorCode) {
                return (object)[
                    'success' => false,
                    'message' => $body->errorMessage
                ];
            }

            return (object)[
                'success' => true,
                'data' => $body
            ];
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public static function checkPayment(Order $order){
        $status = self::status([
            'payment_id' => $order->payment_id
        ]);

        if ($status->success) {
            if ($status->data->orderStatus < 2) {
                $order->update([
                    'status' => 'created'
                ]);
            } elseif ($status->data->orderStatus === 2) {
                $order->update([
                    'status' => 'completed',
                    'info' => (array) $status->data->cardAuthInfo,
                    'amount' => $status->data->amount,
                    'time' => strtotime(now())
                ]);
            } else {
                $order->update([
                    'status' => 'declined',
                ]);
            }
        }
    }
}
