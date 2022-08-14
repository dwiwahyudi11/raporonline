<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Repositories\BaseRepository;

/**
 * Class GuruRepository
 * @package App\Repositories
 * @version September 16, 2021, 3:56 pm UTC
*/

class GuruRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_users',
        'id_kelas_wali',
        'nuptk',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'agama',
        'kontak',
        'status_kepegawaian',
        'jenis_ptk'
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
        return Guru::class;
    }
}
