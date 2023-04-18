<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderPeriod
 *
 * @property int $id
 * @property int $order_publication_id
 * @property int $period_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\OrderPublication $order
 * @property-read \App\Period $period
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod whereOrderPublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod wherePeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property float $price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPeriod wherePrice($value)
 */
class OrderPeriod extends Model
{
    protected $fillable = [
        'order_publication_id',
        'period_id',
        'price',
    ];

    public function order(){
        return $this->belongsTo(OrderPublication::class);
    }

    public function period(){
        return $this->belongsTo(Period::class);
    }
}
