<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Mapel
 * @package App\Models
 * @version September 16, 2021, 3:57 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $mapelDetails
 * @property \Illuminate\Database\Eloquent\Collection $nilaiDetails
 * @property string $mata_pelajaran
 * @property string $semester
 */
class Mapel extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mapel';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'mata_pelajaran',
        'semester'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mata_pelajaran' => 'string',
        'semester' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mata_pelajaran' => 'nullable|string|max:145',
        'semester' => 'nullable|string|max:10',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mapelDetails()
    {
        return $this->hasMany(\App\Models\MapelDetail::class, 'id_mapel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nilaiDetails()
    {
        return $this->hasMany(\App\Models\NilaiDetail::class, 'id_mapel');
    }
}
