<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
<!-- START FORM -->
<form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">

        <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id' value="{{ $siswa->id }}" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nis' value="{{ $siswa->nis }}" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $siswa->nama }}" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='umur' value="{{ $siswa->umur }}" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                <select name="jenis_kelamin" class="form-control bg-light" style="color:black;">
            <option value="Laki-laki"@if($siswa->jenis_kelamin=='Laki-laki') selected='selected' @endif >Laki-laki</option>
            <option value="Perempuan"@if($siswa->jenis_kelamin=='Perempuan') selected='selected' @endif >Perempuan</option>
                </select>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

