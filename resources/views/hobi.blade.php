@extends('layout.tamplate')

@section('layout.content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hobi Page</h1>
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
        <h3 class="card-title">Ini Hobi</h3>

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
              <th>Hobi</th>
              <th>Deskripsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($hobi as $no =>$m)
            <tr>
              <td>{{$no}}</td>
              <td>{{$m->hobi}}</td>
              <td>{{$m->desc}}</td>
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