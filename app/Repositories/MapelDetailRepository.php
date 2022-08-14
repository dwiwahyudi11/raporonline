<?php

namespace App\Repositories;

use App\Models\MapelDetail;
use App\Repositories\BaseRepository;

/**
 * Class MapelDetailRepository
 * @package App\Repositories
 * @version September 16, 2021, 3:58 pm UTC
*/

class MapelDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_mapel',
        'id_kelas',
        'id_guru'
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
        return MapelDetail::class;
    }
}
