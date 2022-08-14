<?php

namespace App\Repositories;

use App\Models\Siswa;
use App\Repositories\BaseRepository;

/**
 * Class SiswaRepository
 * @package App\Repositories
 * @version September 16, 2021, 3:59 pm UTC
*/

class SiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_users',
        'id_kelas',
        'kontak',
        'tempat_lahir',
        'tanggal_lahir',
        'tahun_masuk',
        'tahun_lulus'
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
        return Siswa::class;
    }
}
