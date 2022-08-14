<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class JadwalUpload
 * @package App\Models
 * @version October 16, 2021, 10:44 am UTC
 *
 * @property string $file
 */
class JadwalUpload extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jadwal_upload';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'file',
        'keterangan',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'file' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'file.*' => 'required|image/*|max:10240',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'keterangan' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
