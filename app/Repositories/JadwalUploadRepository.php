<?php

namespace App\Repositories;

use App\Models\JadwalUpload;
use App\Repositories\BaseRepository;

/**
 * Class JadwalUploadRepository
 * @package App\Repositories
 * @version October 16, 2021, 10:44 am UTC
*/

class JadwalUploadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'file',
        'keterangan'
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
        return JadwalUpload::class;
    }
}
