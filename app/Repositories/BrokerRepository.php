<?php

namespace App\Repositories;

use App\Models\Broker;
use App\Repositories\BaseRepository;

/**
 * Class BrokerRepository
 * @package App\Repositories
 * @version February 6, 2022, 3:28 pm UTC
*/

class BrokerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Broker::class;
    }
}
