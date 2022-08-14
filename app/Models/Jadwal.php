<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Jadwal
 * @package App\Models
 * @version September 20, 2021, 10:44 am UTC
 *
 * @property \App\Models\Kela $idKelas
 * @property \App\Models\Mapel $idMapel
 * @property integer $id_mapel
 * @property integer $id_kelas
 * @property time $jam_mulai
 * @property time $jam_akhir
 */
class Jadwal extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jadwal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_mapel',
        'id_kelas',
        'jam_mulai',
        'jam_akhir',
        'hari',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_mapel' => 'integer',
        'id_kelas' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_mapel' => 'required|integer',
        'id_kelas' => 'required|integer',
        'jam_mulai' => 'nullable',
        'jam_akhir' => 'nullable',
        'hari' => 'nullable',
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
    public function mapel()
    {
        return $this->belongsTo(\App\Models\Mapel::class, 'id_mapel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mapelDetail()
    {
        return $this->belongsTo(\App\Models\MapelDetail::class, 'id_mapel_detail');
    }
}
