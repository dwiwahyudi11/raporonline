<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MapelDetail
 * @package App\Models
 * @version September 16, 2021, 3:58 pm UTC
 *
 * @property \App\Models\Guru $idGuru
 * @property \App\Models\Kela $idKelas
 * @property \App\Models\Mapel $idMapel
 * @property integer $id_mapel
 * @property integer $id_kelas
 * @property integer $id_guru
 */
class MapelDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mapel_detail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_mapel',
        'id_guru'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_mapel' => 'integer',
        'id_guru' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_mapel' => 'required|integer',
        'id_guru' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function guru()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'id_guru');
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
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'id_kelas');
    }

    public function jadwal()
    {
        return $this->hasMany(\App\Models\Jadwal::class, 'id_mapel_detail');
    }
}
