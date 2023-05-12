<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Matkul extends Model
{
    use HasFactory;
    public $table = 'mahasiswa_matakuliah';

    public function mahasiswa(){
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function matakuliah(){
        return $this->belongsTo(MatakuliahModel::class);
    }
}
