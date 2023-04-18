<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SmsTable
 *
 * @property int $id
 * @property int $type
 * @property int $phone
 * @property string $code
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsTable whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SmsTable extends Model
{
    protected $table = 'sms_table';

    protected $fillable = [
        'type',
        'phone',
        'code',
        'status',
    ];
}
