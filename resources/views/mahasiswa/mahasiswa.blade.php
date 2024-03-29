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
        {{-- <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a> --}}
        <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
        <div>
          <table class="table table-bordered table-striped" id="data_mahasiswa">
            <thead>
            <tr>
              <th>No</th>
              <th>Nim</th>
              <th>Nama</th>
              {{-- <th>Foto</th>
              <th>Prodi</th>
              <th>Hobi</th>
              <th>Jk</th> --}}
              <th>Hp</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              {{-- @if ($mhs->count() > 0)
                @foreach ($mhs as $i =>$m)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$m->nim}}</td>
                    <td>{{$m->nama}}</td>
                    <td>
                      <img src="storage/{{$m->foto}}" alt="" width="100px">
                    </td>
                    <td>{{$m->prodi->nama_prodi}}</td>
                    <td>
                      @foreach ($hb as $i =>$h)
                        @if ($m->id == $h->mahasiswa_id)
                        {{$h->hobi}}
                        @endif
                      @endforeach
                    </td>
                    <td>{{$m->jk}}</td>
                    <td>{{$m->hp}}</td>
                    <td>
                      <a href="{{url('/mahasiswa/'. $m->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                      <form method="POST" action="{{ url('/mahasiswa/'.$m->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                      <a href="{{url('/mahasiswa/'. $m->id)}}" class="btn btn-sm btn-warning">Nilai</a>
                    </td>
                </tr>
                @endforeach
              @else
                <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
              @endif --}}
            
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

  <div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
    <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa">
    @csrf
    <div class="modal-dialog modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-message"></div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@push('script')
<script>
  $(document).ready(function (){
      var dataMahasiswa = $('#data_mahasiswa').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              'url': '{{  url('mahasiswa/data') }}',
              'dataType': 'json',
              'type': 'POST',
          },
          columns:[
              {data:'nomor',searchable:false, sortable:false},
              {data:'nim',name:'nim',searchable:true, sortable:false},
              {data:'nama',name:'nama',searchable:true, sortable:true},
              {data:'hp',name:'hp',searchable:true, sortable:false},
              { data: 'id', name: 'id', sortable: false, searchable: false,
                render: function(data, type, row) {
                  var btn = `<a href="{{ url('/mahasiswa/${data}/edit') }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{ url('/mahasiswa/${data}') }}" class="btn btn-xs btn-info"><i class="fa fa-list"></i> Detail</a>
                          <form method="POST" action="{{ url('/mahasiswa/${data}') }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                          </form>`;
                return btn;
                },
              }
          ]
      });

      $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('mahasiswa') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    //$('#modal_mahasiswa').modal('hide');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        //alert('error');
                    }

                }
            });
        });
  });
</script>
@endpush