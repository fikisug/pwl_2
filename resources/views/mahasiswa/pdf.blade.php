{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h2 style="text-align: center;">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h2>
  <h1 style="text-align: center;">Kartu Hasil Studi (KHS)</h1>

  <div>
    <p><b> Nama : </b> {{$mhs->nama}}</p>
    <p><b>Nim : </b> {{$mhs->nim}}</p>
    <p><b>Prodi : </b> {{$mhs->prodi->nama_prodi}}</p>
    <div>
      <table border="1" align="center">
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
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px auto;
            width: 80%;
        }

        h2 {
            text-align: center;
        }

        th {
          font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
      <h3 style="text-align: center;">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h2><br>
      <h2 style="text-align: center;">Kartu Hasil Studi (KHS)</h1>
        <p><b>Nama:</b> {{ $mhs->nama }}</p>
        <p><b>NIM:</b> {{ $mhs->nim }}</p>
        <p><b>Prodi:</b> {{ $mhs->prodi->nama_prodi }}</p>

        <table>
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mk as $m)
                <tr>
                  <td>{{$m->matakuliah->nama_matkul}}</td>
                  <td>{{$m->matakuliah->sks}}</td>
                  <td>{{$m->matakuliah->semester}}</td>
                  <td>{{$m->nilai}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>