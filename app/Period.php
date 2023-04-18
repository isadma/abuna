<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Period
 *
 * @property int $id
 * @property int $publication_id
 * @property int $year
 * @property int $month
 * @property float $price
 * @property int $sale_from
 * @property int $sale_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Publication $publication
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period wherePublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereSaleFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereSaleTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereYear($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderPublication[] $orders
 * @property-read int|null $orders_count
 * @property bool $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereStatus($value)
 */
class Period extends Model
{
    protected $fillable = [
        "publication_id",
        "year",
        "month",
        "price",
        "sale_from",
        "sale_to",
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function publication(){
        return $this->belongsTo(Publication::class);
    }

    public static function monthName($month){
        $months = ['Ýanwar', 'Fewral', 'Mart', 'Aprel', 'Maý', 'Iýun', 'Iýul', 'Awgust', 'Sentýabr', 'Oktýabr', 'Noýabr', 'Dekabr'];
        return $months[$month-1];
    }

    public function orders(){
        return $this->belongsToMany(OrderPublication::class, 'order_periods');
    }
}
