<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Broker
 * @package App\Models
 * @version February 6, 2022, 3:28 pm UTC
 *
 * @property string $name
 */
class Broker extends Model
{


    public $table = 'brokers';

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }    
}
