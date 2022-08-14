<?php

namespace App\Repositories;

use App\Models\Rapot;
use App\Repositories\BaseRepository;

/**
 * Class RapotRepository
 * @package App\Repositories
 * @version September 21, 2021, 6:26 am UTC
*/

class RapotRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_nilai',
        'sakit',
        'izin',
        'tanpa_keterangan'
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
        return Rapot::class;
    }
}
