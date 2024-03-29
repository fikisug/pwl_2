<?php

namespace App\Http\Controllers;

use App\Models\HobiModel;
use App\Models\Mahasiswa;
use App\Models\Mahasiswa_Matkul;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\Prodi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.mahasiswa');
    }

    public function data(){
        $data = MahasiswaModel::selectRaw('id, nim, nama, hp');
        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create_mahasiswa')
            ->with('prodi', $prodi)
            ->with('url_form', url('/mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_lama(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'prodi_id' => 'required',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'foto' => ''
        ]);

        if($request->file('foto')){
            $image_name = $request->file('foto')->store('image','public');
        }

        //$data = MahasiswaModel::create($request->except(['_token']));

        MahasiswaModel::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'prodi_id' => $request->prodi_id,
            'foto' => $image_name
        ]);

        //jika data berhasil ditambahkan
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = MahasiswaModel::with('prodi')->get()->where('id', $id)->first();
        $mk = Mahasiswa_Matkul::all()->where('mahasiswa_id', $id);
        return view('mahasiswa.nilai_mahasiswa')
                    ->with('mk', $mk)
                    ->with('mhs', $mhs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::all();
        $mhs = MahasiswaModel::find($id);
        return view('mahasiswa.create_mahasiswa')
            ->with('prodi', $prodi)
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

        $file = MahasiswaModel::find($id)->foto;
        
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'prodi_id' => 'required',
            'foto' => 'required'
        ]);

        if($file == ''){
            $path = 'tidak ada';
        }else{
            $path = 'public/'.$file;
        }

        if (Storage::exists($path)) {
            Storage::delete($path);
            if($request->file('foto')){
                $image_name = $request->file('foto')->store('image','public');
            }
        } else {
            if($request->file('foto')){
                $image_name = $request->file('foto')->store('image','public');
            }
        }
        
        //MahasiswaModel::where('id','=', $id)->update($request->except(['_token', '_method']));
        
        MahasiswaModel::where('id','=', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'prodi_id' => $request->prodi_id,
            'foto' => $image_name
        ]);

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
        $path = 'public/'.MahasiswaModel::find($id)->foto;
        Storage::delete($path);
        MahasiswaModel::where('id', '=', $id)->delete();

        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function print_pdf($id){
        $mhs = MahasiswaModel::with('prodi')->get()->where('id', $id)->first();
        $mk = Mahasiswa_Matkul::all()->where('mahasiswa_id', $id);

        $pdf = PDF::loadview('mahasiswa.pdf',['mhs'=>$mhs, 'mk'=>$mk]);
        return $pdf->stream();
        //return $pdf->download('asd.pdf');
    }

    public function pdf($id){
        $mhs = MahasiswaModel::with('prodi')->get()->where('id', $id)->first();
        $mk = Mahasiswa_Matkul::all()->where('mahasiswa_id', $id);
        return view('mahasiswa.pdf')
            ->with('mhs', $mhs)
            ->with('mk', $mk);
    }
}
