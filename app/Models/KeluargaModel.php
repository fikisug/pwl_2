<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaModel extends Model
{
    use HasFactory;

    public $table = 'keluarga';
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
}
