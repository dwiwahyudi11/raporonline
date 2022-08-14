<?php

namespace App\Repositories;

use App\Models\Kelas;
use App\Repositories\BaseRepository;

/**
 * Class KelasRepository
 * @package App\Repositories
 * @version September 18, 2021, 10:34 am UTC
*/

class KelasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kelas',
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
        return Kelas::class;
    }
}
