<?php

namespace App\Repositories;

use App\Models\Trade;
use App\Repositories\BaseRepository;

/**
 * Class TradeRepository
 * @package App\Repositories
 * @version February 6, 2022, 3:44 pm UTC
*/

class TradeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'type',
        'qty',
        'broker_id',
        'symbol_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Trade::class;
    }
}
