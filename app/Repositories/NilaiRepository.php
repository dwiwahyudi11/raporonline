<?php

namespace App\Repositories;

use App\Models\Nilai;
use App\Repositories\BaseRepository;

/**
 * Class NilaiRepository
 * @package App\Repositories
 * @version March 2, 2022, 7:39 am UTC
*/

class NilaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_siswa',
        'id_kelas',
        'semester',
        'sakit',
        'izin',
        'tanpa_keterangan',
        'catatan_wali_kelas',
        'link'
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
        return Nilai::class;
    }
}
