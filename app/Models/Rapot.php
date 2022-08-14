<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Rapot
 * @package App\Models
 * @version September 21, 2021, 6:26 am UTC
 *
 * @property \App\Models\Nilai $idNilai
 * @property integer $id_nilai
 * @property integer $sakit
 * @property integer $izin
 * @property integer $tanpa_keterangan
 */
class Rapot extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'rapot';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_nilai',
        'sakit',
        'izin',
        'tanpa_keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_nilai' => 'integer',
        'sakit' => 'integer',
        'izin' => 'integer',
        'tanpa_keterangan' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_nilai' => 'required|integer',
        'sakit' => 'nullable|integer',
        'izin' => 'nullable|integer',
        'tanpa_keterangan' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idNilai()
    {
        return $this->belongsTo(\App\Models\Nilai::class, 'id_nilai');
    }
}
