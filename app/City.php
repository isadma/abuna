<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\City
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Branch[] $branches
 * @property-read int|null $branches_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\State $state
 */
class City extends Model
{
    protected $fillable = [
        'id',
        'state_id',
        'name',
        'slug'
    ];

    public static function makeSlug($name){
        $name = Str::slug($name);
        if (City::where('slug', $name)->first()){
            $count = 1;
            while (City::where('slug', $name.'-'.$count)->first()){
                $count ++;
            }
            return Str::slug($name.'-'.$count);
        }
        return $name;
    }

    public function branches(){
        return $this->hasMany(Branch::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
}
