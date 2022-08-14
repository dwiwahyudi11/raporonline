<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Nilai
 * @package App\Models
 * @version March 2, 2022, 7:39 am UTC
 *
 * @property \App\Models\Kelas $idKelas
 * @property \App\Models\Siswa $idSiswa
 * @property \Illuminate\Database\Eloquent\Collection $nilaiDetails
 * @property \Illuminate\Database\Eloquent\Collection $rapots
 * @property integer $id_siswa
 * @property integer $id_kelas
 * @property string $semester
 * @property integer $sakit
 * @property integer $izin
 * @property integer $tanpa_keterangan
 * @property string $catatan_wali_kelas
 */
class Nilai extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'nilai';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_siswa',
        'id_kelas',
        'semester',
        'sakit',
        'izin',
        'tanpa_keterangan',
        'catatan_wali_kelas',
        'link',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_siswa' => 'integer',
        'id_kelas' => 'integer',
        'semester' => 'string',
        'sakit' => 'integer',
        'izin' => 'integer',
        'tanpa_keterangan' => 'integer',
        'catatan_wali_kelas' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_siswa' => 'required|integer',
        'id_kelas' => 'required|integer',
        'semester' => 'nullable|string|max:5',
        'sakit' => 'nullable|integer',
        'izin' => 'nullable|integer',
        'tanpa_keterangan' => 'nullable|integer',
        'catatan_wali_kelas' => 'nullable|string',
        'link' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'id_kelas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function siswa()
    {
        return $this->belongsTo(\App\Models\Siswa::class, 'id_siswa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nilaiDetails()
    {
        return $this->hasMany(\App\Models\NilaiDetail::class, 'id_nilai');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rapots()
    {
        return $this->hasMany(\App\Models\Rapot::class, 'id_nilai');
    }
}
