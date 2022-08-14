<div class="table-responsive">
    <table class="table" id="siswas-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Kontak</th>
            <th>Tempat Lahir</th>
            <th>Foto</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($siswas as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa['users']['name'] }}</td>
                <td>{{ $siswa['kelas']['kelas'] }}</td>
                <td>{{ $siswa['kontak'] }}</td>
                <td>{{ $siswa['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
                <td>
                    @if ($siswa['foto'] != null)
                        <img src="{{ asset('storage/foto_siswa/'.$siswa['foto']) }}" width="100" alt="">
                    @else
                        <img src="" alt="">
                    @endif
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['siswas.destroy', $siswa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siswas.show', [$siswa->id]) }}"
                           class='btn btn-info btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('siswas.edit', [$siswa->id]) }}"
                           class='btn btn-success btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
