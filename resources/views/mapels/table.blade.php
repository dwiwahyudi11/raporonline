<div class="table-responsive">
    <table class="table" id="mapels-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Semester</th>
            <th>Guru Pengampu</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mapels as $mapel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mapel->mata_pelajaran }}</td>
                <td>{{ $mapel->semester }}</td>
                <td>
                    <a type="button" class="btn btn-success light pl-0" href="{{ route('mapels.guruPengampu', [$mapel->id]) }}">
                        <span class="btn-icon-left text-info light ml-1"><i class="fa fa-list color-info ps-1"></i></span>
                        Lihat Guru
                    </a>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['mapels.destroy', $mapel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mapels.show', [$mapel->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('mapels.edit', [$mapel->id]) }}"
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
