<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Type
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Publication[] $publications
 * @property-read int|null $publications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereSlug($value)
 * @property bool $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereStatus($value)
 */
class Type extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function publications(){
        return $this->hasMany(Publication::class, 'type_id');
    }
}
