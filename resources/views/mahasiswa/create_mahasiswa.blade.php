@extends('layout.tamplate')

@section('layout.content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mahasiswa Page</h1>
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
        <h3 class="card-title">Ini Mahasiswa</h3>

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
        <form method="POST" action="{{ $url_form }}" enctype="multipart/form-data">
          @csrf
          {!! (isset($mhs))? method_field('PUT') : '' !!}
          <div class="form-group">
            <label>Nim</label>
            <input class="form-control @error('nim') is-invalid @enderror" value="{{ isset($mhs)? $mhs->nim : old('nim') }}" name="nim" type="text" />
            @error('nim')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($mhs)? $mhs->nama : old('nama') }}" name="nama" type="text"/>
            @error('nama')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Prodi</label>
            <select name="prodi_id" id="" class="form-control">
              @foreach($prodi as $p)
                <option value="{{$p->id}}"
                  @if (isset($mhs->prodi_id) == $p->id)
                  selected
                  @endif>{{$p->nama_prodi}}
                </option>
              @endforeach
            </select>
            @error('nama')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          {{-- <div class="form-group">
            <label>Hobi</label>
            <input type="text" id="hobi" name="hobi" multiple>
            @error('jk')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div> --}}
          <div class="form-group">
            <label>JK</label>
            <input class="form-control @error('jk') is-invalid @enderror" value="{{ isset($mhs)? $mhs->jk : old('jk') }}" name="jk" type="text"/>
            @error('jk')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Tempat lahir</label>
            <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ isset($mhs)? $mhs->tempat_lahir : old('tempat_lahir') }}" name="tempat_lahir" type="text"/>
            @error('tempat_lahir')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ isset($mhs)? $mhs->tanggal_lahir : old('tanggal_lahir') }}" name="tanggal_lahir" type="text"/>
            @error('tanggal_lahir')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>HP</label>
            <input class="form-control @error('hp') is-invalid @enderror" value="{{ isset($mhs)? $mhs->hp : old('hp') }}" name="hp" type="text"/>
            @error('hp')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>alamat</label>
            <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($mhs)? $mhs->alamat : old('alamat') }}" name="alamat" type="text"/>
            @error('alamat')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input class="form-control @error('foto') is-invalid @enderror" value="{{ isset($mhs)? $mhs->foto : old('foto') }}" name="foto" type="file"/>
            @error('foto')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </form>
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