<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Address
 *
 * @property int $id
 * @property int $branch_id
 * @property string|null $street
 * @property string|null $home
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Branch $branch
 */
class Address extends Model
{
    protected $fillable = [
        'id',
        'branch_id',
        'street',
        'home',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
