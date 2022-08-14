<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Guru
 * @package App\Models
 * @version September 16, 2021, 3:56 pm UTC
 *
 * @property \App\Models\Kelas $idKelasWali
 * @property \App\Models\User $idUsers
 * @property \Illuminate\Database\Eloquent\Collection $mapelDetails
 * @property integer $id_users
 * @property integer $id_kelas_wali
 * @property integer $nuptk
 * @property integer $nip
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string $kontak
 * @property string $status_kepegawaian
 * @property string $jenis_ptk
 */
class Guru extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'guru';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id_users',
        'id_kelas_wali',
        'nuptk',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'agama',
        'kontak',
        'status_kepegawaian',
        'jenis_ptk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_users' => 'integer',
        'id_kelas_wali' => 'integer',
        'nuptk' => 'integer',
        'nip' => 'integer',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'alamat' => 'string',
        'jenis_kelamin' => 'string',
        'agama' => 'string',
        'kontak' => 'string',
        'status_kepegawaian' => 'string',
        'jenis_ptk' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nuptk' => 'nullable|integer',
        'tempat_lahir' => 'nullable|string|max:145',
        'tanggal_lahir' => 'nullable',
        'alamat' => 'nullable|string',
        'jenis_kelamin' => 'nullable|string',
        'agama' => 'nullable|string|max:45',
        'kontak' => 'nullable|string|max:14',
        'status_kepegawaian' => 'nullable|string|max:45',
        'jenis_ptk' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'id_kelas_wali');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mapelDetails()
    {
        return $this->hasMany(\App\Models\MapelDetail::class, 'id_guru');
    }
}
