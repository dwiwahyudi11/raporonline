<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kelas
 * @package App\Models
 * @version September 18, 2021, 10:34 am UTC
 *
 * @property \App\Models\Jurusan $idJurusan
 * @property \Illuminate\Database\Eloquent\Collection $gurus
 * @property \Illuminate\Database\Eloquent\Collection $mapelDetails
 * @property \Illuminate\Database\Eloquent\Collection $siswas
 * @property string $kelas
 * @property integer $id_jurusan
 * @property string $sub_kelas
 */
class Kelas extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kelas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kelas',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kelas' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kelas' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gurus()
    {
        return $this->hasMany(\App\Models\Guru::class, 'id_kelas_wali');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mapelDetails()
    {
        return $this->hasMany(\App\Models\MapelDetail::class, 'id_kelas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function siswas()
    {
        return $this->hasMany(\App\Models\Siswa::class, 'id_kelas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function jadwal()
    {
        return $this->hasMany(\App\Models\Jadwal::class, 'id_kelas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nilai()
    {
        return $this->hasMany(\App\Models\Nilai::class, 'id_kelas');
    }
}
