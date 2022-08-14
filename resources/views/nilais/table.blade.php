<div class="table-responsive">
    <table class="table" id="nilais-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach($kelas as $item)
                @foreach ($item->jadwal->groupBy('id_kelas') as $items)
                    @foreach ($items as $guruKelas)
                        @if ($guruKelas->mapelDetail->guru != null)
                            @if ($guruKelas->mapelDetail->guru->id_users == Auth::user()->id)
                                <tr>
                                    <td>{{ $i++; }}</td>
                                    <td>{{ $item['kelas'] }}</td>
                                    <td width="150">
                                        <a class="btn btn-info btn-sm" href="/nilais/pilihMapel/{{ $item['id'] }}">Pilih Kelas</a>
                                    </td>
                                </tr>
                            @endif
                        @endif
                        
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
