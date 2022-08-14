<div class="table-responsive">
    <table class="table" id="nilaiDetails-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Id Nilai</th>
            <th>Id Mapel</th>
            <th>Tugas Satu</th>
            <th>Tugas Dua</th>
            <th>Tugas Tiga</th>
            <th>Tugas Empat</th>
            <th>Tugas Lima</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Deskripsi</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($nilaiDetails as $nilaiDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $nilaiDetail->id_nilai }}</td>
                <td>{{ $nilaiDetail->id_mapel }}</td>
                <td>{{ $nilaiDetail->tugas_satu }}</td>
                <td>{{ $nilaiDetail->tugas_dua }}</td>
                <td>{{ $nilaiDetail->tugas_tiga }}</td>
                <td>{{ $nilaiDetail->tugas_empat }}</td>
                <td>{{ $nilaiDetail->tugas_lima }}</td>
                <td>{{ $nilaiDetail->uts }}</td>
                <td>{{ $nilaiDetail->uas }}</td>
                <td>{{ $nilaiDetail->deskripsi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['nilaiDetails.destroy', $nilaiDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('nilaiDetails.show', [$nilaiDetail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('nilaiDetails.edit', [$nilaiDetail->id]) }}"
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
