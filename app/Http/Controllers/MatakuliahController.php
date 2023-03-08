<?php

namespace App\Http\Controllers;

use App\Models\MatakuliahModel;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index() {
        $matakuliah = MatakuliahModel::all();
        return view('matakuliah')
            ->with('matakuliah', $matakuliah);
    }
}
