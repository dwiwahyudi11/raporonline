<?php

namespace App\Repositories;

use App\Models\Jadwal;
use App\Repositories\BaseRepository;

/**
 * Class JadwalRepository
 * @package App\Repositories
 * @version September 20, 2021, 10:44 am UTC
*/

class JadwalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_mapel',
        'id_kelas',
        'jam_mulai',
        'jam_akhir'
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
        return Jadwal::class;
    }
}
