@extends('layout.tamplate')

@section('layout.content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kartu Hasil Studi (KHS)</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ini Nilai Mahasiswa</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <p>Nama : {{$mhs->nama}}</p>
        <p>Nim : {{$mhs->nim}}</p>
        <p>Prodi : {{$mhs->prodi->nama_prodi}}</p>
        <div>
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Semester</th>
              <th>Nilai</th>
            </tr>
            </thead>
            <tbody>
              @if ($mk->count() > 0)
                @foreach ($mk as $i =>$m)
                  <tr>
                    
                    <td>{{$m->matakuliah->nama_matkul}}</td>
                    <td>{{$m->matakuliah->sks}}</td>
                    <td>{{$m->matakuliah->semester}}</td>
                    <td>{{$m->nilai}}</td>
                </tr>
                @endforeach
              @else
                <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
              @endif
            
            </tbody>
            <tfoot>
              
            </tfoot>
          </table>
          <a href="{{url('/mahasiswa/'. $mhs->id.'/print-pdf')}}" class="btn btn-sm btn-primary">Cetak PDF</a>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection

@push('custom_js')
<!--    <script>alert('Selamat Datang')</script> -->
@endpush