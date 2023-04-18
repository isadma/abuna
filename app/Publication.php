<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Publication
 *
 * @property int $id
 * @property int $index
 * @property int $type_id
 * @property string $name
 * @property string|null $owner
 * @property string|null $image
 * @property int $package_capacity
 * @property int $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Type $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication wherePackageCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Period[] $periods
 * @property-read int|null $periods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderPublication[] $orders
 * @property-read int|null $orders_count
 * @property bool $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereStatus($value)
 */
class Publication extends Model
{
    protected $fillable = [
        'id',
        'index',
        'type_id',
        'name',
        'owner',
        'image',
        'package_capacity',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function type(){
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function periods(){
        return $this->hasMany(Period::class);
    }

    public function orders(){
        return $this->hasMany(OrderPublication::class);
    }
}
