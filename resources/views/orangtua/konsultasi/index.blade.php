<h1>Daftar Konsultasi</h1>

<table>
    <thead>
        <tr>
            <th>Pesan</th>
            <th>Hasil</th>
            <th>Tanggal</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($konsultasis as $konsultasi)
            <tr>
                <td>{{ $konsultasi->pesan }}</td>
                <td>{{ $konsultasi->hasil }}</td>
                <td>{{ $konsultasi->tanggal }}</td>
                <td>{{ $konsultasi->role }}</td>
                <td>
                    <a href="{{ route('konsultasi.edit', $konsultasi->id) }}">Edit</a>
                    <form action="{{ route('konsultasi.destroy', $konsultasi->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus konsultasi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('konsultasi.create') }}">Tambah Konsultasi</a>
