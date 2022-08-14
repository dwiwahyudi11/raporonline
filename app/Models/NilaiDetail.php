<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NilaiDetail
 * @package App\Models
 * @version September 16, 2021, 3:59 pm UTC
 *
 * @property \App\Models\Mapel $idMapel
 * @property \App\Models\Nilai $idNilai
 * @property integer $id_nilai
 * @property integer $id_mapel
 * @property integer $tugas_satu
 * @property integer $tugas_dua
 * @property integer $tugas_tiga
 * @property integer $tugas_empat
 * @property integer $tugas_lima
 * @property integer $uts
 * @property integer $uas
 * @property string $deskripsi
 */
class NilaiDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'nilai_detail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_nilai',
        'id_mapel',
        'tugas_satu',
        'tugas_dua',
        'tugas_tiga',
        'tugas_empat',
        'tugas_lima',
        'uts',
        'uas',
        'nilai_akhir',
        'nilai_huruf',
        'deskripsi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_nilai' => 'integer',
        'id_mapel' => 'integer',
        'tugas_satu' => 'integer',
        'tugas_dua' => 'integer',
        'tugas_tiga' => 'integer',
        'tugas_empat' => 'integer',
        'tugas_lima' => 'integer',
        'uts' => 'integer',
        'uas' => 'integer',
        'nilai_akhir' => 'integer',
        'nilai_huruf' => 'string',
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_mapel' => 'required|integer',
        'tugas_satu' => 'nullable|integer',
        'tugas_dua' => 'nullable|integer',
        'tugas_tiga' => 'nullable|integer',
        'tugas_empat' => 'nullable|integer',
        'tugas_lima' => 'nullable|integer',
        'uts' => 'nullable|integer',
        'uas' => 'nullable|integer',
        'nilai_akhir' => 'nullable|integer',
        'nilai_akhir' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mapel()
    {
        return $this->belongsTo(\App\Models\Mapel::class, 'id_mapel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nilai()
    {
        return $this->belongsTo(\App\Models\Nilai::class, 'id_nilai');
    }
}
