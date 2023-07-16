<h1>Tambah Konsultasi</h1>

@if ($errors->any())
    <div>
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('konsultasi.store') }}" method="POST">
    @csrf
    @if (Auth::user()->role == 'OrangTua')
    <div>
        <label for="pesan">Pesan:</label>
        <input type="text" id="pesan" name="pesan" value="{{ old('pesan') }}" required>
    </div>
    @endif
    <!-- <div>
        <label for="hasil">Hasil:</label>
        <input type="text" id="hasil" name="hasil" value="{{ old('hasil') }}" required>
    </div> -->
    <div>
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="{{ Auth::user()->role }}" required>
    </div>
    <button type="submit">Simpan</button>
</form>

<a href="{{ route('konsultasi.index') }}">Kembali</a>
