<div class="table-responsive">
    <table class="table" id="jadwalUploads-table">
        <thead>
        <tr>
            <th>File</th>
            <th>Keterangan</th>

            <th>Preview</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jadwalUploads as $jadwalUpload)
            <tr>
                <td>{{ $jadwalUpload->file }}</td>
                <td>{{ $jadwalUpload->keterangan }}</td>
                <td><img src="{{ url('storage/jadwal/'.$jadwalUpload['file']) }}" alt="" width="200"></td>
                <td width="120">
                    {!! Form::open(['route' => ['jadwalUploads.destroy', $jadwalUpload->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jadwalUploads.show', [$jadwalUpload->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jadwalUploads.edit', [$jadwalUpload->id]) }}" class='btn btn-default btn-xs'>
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
