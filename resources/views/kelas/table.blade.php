<div class="table-responsive">
    <table class="table" id="kelas-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kelas as $kelas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kelas->kelas }}
                <td width="120">
                    {!! Form::open(['route' => ['kelas.destroy', $kelas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kelas.show', [$kelas->id]) }}" class='btn btn-info btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('kelas.edit', [$kelas->id]) }}" class='btn btn-success btn-xs'>
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