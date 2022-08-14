<?php

namespace App\Repositories;

use App\Models\NilaiDetail;
use App\Repositories\BaseRepository;

/**
 * Class NilaiDetailRepository
 * @package App\Repositories
 * @version September 16, 2021, 3:59 pm UTC
*/

class NilaiDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_nilai',
        'id_mapel',
        'tugas_satu',
        'tugas_dua',
        'tugas_tiga',
        'tugas_empat',
        'tugas_lima',
        'uts',
        'uas',
        'deskripsi'
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
        return NilaiDetail::class;
    }
}
