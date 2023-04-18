<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Branch
 *
 * @property int $id
 * @property int $city_id
 * @property int $index
 * @property string $name
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\City[] $city
 * @property-read int|null $city_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Branch extends Model
{
    protected $fillable = [
        'id',
        'city_id',
        'name',
        'slug',
        'index',
    ];

    public static function makeSlug($name){
        $name = Str::slug($name);
        if (Branch::where('slug', $name)->first()){
            $count = 1;
            while (Branch::where('slug', $name.'-'.$count)->first()){
                $count ++;
            }
            return Str::slug($name.'-'.$count);
        }
        return $name;
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
