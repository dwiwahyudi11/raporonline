<div class="table-responsive">
    <table class="table" id="mapelDetails-table">
        <thead>
        <tr>
            <th>Id Mapel</th>
        <th>Id Kelas</th>
        <th>Id Guru</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mapelDetails as $mapelDetail)
            <tr>
                <td>{{ $mapelDetail->id_mapel }}</td>
            <td>{{ $mapelDetail->id_kelas }}</td>
            <td>{{ $mapelDetail->id_guru }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['mapelDetails.destroy', $mapelDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mapelDetails.show', [$mapelDetail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('mapelDetails.edit', [$mapelDetail->id]) }}"
                           class='btn btn-default btn-xs'>
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
