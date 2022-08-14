<div class="table-responsive">
    <table class="table" id="gurus-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Wali Kelas</th>
            <th>NIP</th>
            <th>TTL</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gurus as $guru)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guru['users']['name'] }}</td>
                <td>{{ ($guru['id_kelas_wali']==null)?"Bukan Wali Kelas":$guru['kelas']['kelas'] }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->tempat_lahir }}, {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d F Y') }}</td>
                <td>{{ $guru->alamat }}</td>
                <td>{{ $guru->kontak }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['gurus.destroy', $guru->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gurus.show', [$guru->id]) }}"
                           class='btn btn-info btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('gurus.edit', [$guru->id]) }}"
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
