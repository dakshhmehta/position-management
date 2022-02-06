<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Symbol
 * @package App\Models
 * @version February 6, 2022, 3:30 pm UTC
 *
 * @property string $name
 */
class Symbol extends Model
{


    public $table = 'symbols';
    



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
        'name' => 'required|unique:symbols'
    ];

    
}
