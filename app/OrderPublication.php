<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderPublication
 *
 * @property int $id
 * @property int $order_id
 * @property int $publication_id
 * @property string|null $name
 * @property string|null $surname
 * @property int $quantity
 * @property string $block
 * @property string $house
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Order $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Period[] $periods
 * @property-read int|null $periods_count
 * @property-read \App\Publication $publication
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication wherePublicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $address_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereAddressId($value)
 * @property-read \App\Address $address
 * @property string|null $home
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderPeriod[] $periodItems
 * @property-read int|null $period_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderPublication whereHome($value)
 */
class OrderPublication extends Model
{
    protected $fillable = [
        'order_id',
        'publication_id',
        'address_id',
        'name',
        'surname',
        'quantity',
        'block',
        'house',
        'home'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function publication(){
        return $this->belongsTo(Publication::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function periods(){
        return $this->belongsToMany(Period::class, 'order_periods');
    }

    public function periodItems(){
        return $this->hasMany(OrderPeriod::class);
    }
}
