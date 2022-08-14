<div class="table-responsive">
    <table class="table" id="rapots-table">
        <thead>
        <tr>
            <th>Kelas</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $kelas->kelas }}</td>
                <td width="250">
                    <a class="btn btn-info" href="/rapots/pilihKelas/{{ $kelas['id']}}">Pilih Kelas</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
