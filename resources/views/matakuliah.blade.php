@extends('layout.tamplate')

@section('layout.content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>MataKuliah Page</h1>
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
        <h3 class="card-title">Ini MataKuliah</h3>

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
        <div>
          <table class="table">
            <thead>
            <tr>
              <th>No</th>
              <th>KodeMK</th>
              <th>Nama</th>
              <th>Sks</th>
              <th>Jam</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($matakuliah as $no =>$m)
            <tr>
              <td>{{$no+1}}</td>
              <td>{{$m->kode}}</td>
              <td>{{$m->nama}}</td>
              <td>{{$m->sks}}</td>
              <td>{{$m->jam}}</td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              
            </tfoot>
          </table>
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