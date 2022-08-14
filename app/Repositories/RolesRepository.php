<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\BaseRepository;

/**
 * Class RolesRepository
 * @package App\Repositories
 * @version September 20, 2021, 11:48 am UTC
*/

class RolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
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
        return Role::class;
    }
}
