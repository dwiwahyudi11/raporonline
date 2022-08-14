<?php

namespace App\Repositories;

use App\Models\Mapel;
use App\Repositories\BaseRepository;

/**
 * Class MapelRepository
 * @package App\Repositories
 * @version September 16, 2021, 3:57 pm UTC
*/

class MapelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mata_pelajaran',
        'semester'
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
        return Mapel::class;
    }
}
