<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;


/**
 * Class Trade
 * @package App\Models
 * @version February 6, 2022, 3:44 pm UTC
 *
 * @property string $date
 * @property string $type
 * @property integer $qty
 * @property integer $broker_id
 * @property integer $symbol_id
 */
class Trade extends Model
{
    public $table = 'trades';

    public $fillable = [
        'date',
        'type',
        'qty',
        'broker_id',
        'symbol_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'type' => 'string',
        'qty' => 'integer',
        'broker_id' => 'integer',
        'symbol_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required|date',
        'type' => 'required',
        'qty' => 'required|numeric',
        'broker_id' => 'required',
        'symbol_id' => 'required'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($trade) {
            if ($trade->type == 'sell' and $trade->qty > 0) {
                $trade->qty = -1 * $trade->qty;
            }
        });
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class);
    }

    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }

    public function getUIClass()
    {
        return (($this->type == 'buy') ? 'text-success' : 'text-danger');
    }
}
