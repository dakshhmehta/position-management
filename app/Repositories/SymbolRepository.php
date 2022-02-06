<?php

namespace App\Repositories;

use App\Models\Symbol;
use App\Repositories\BaseRepository;

/**
 * Class SymbolRepository
 * @package App\Repositories
 * @version February 6, 2022, 3:30 pm UTC
*/

class SymbolRepository extends BaseRepository
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
        return Symbol::class;
    }
}
