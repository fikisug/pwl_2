<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = MahasiswaModel::all();
        return view('mahasiswa.mahasiswa')
                    ->with('mhs', $mhs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create_mahasiswa')
            ->with('url_form', url('/mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15'
        ]);

        $data = MahasiswaModel::create($request->except(['_token']));
        //jika data berhasil ditambahkan
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(MahasiswaModel $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = MahasiswaModel::find($id);
        return view('mahasiswa.create_mahasiswa')
            ->with('mhs', $mhs)
            ->with('url_form',url('/mahasiswa/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15'
        ]);

        MahasiswaModel::where('id','=', $id)->update($request->except(['_token', '_method']));

        return redirect('mahasiswa')
                ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
