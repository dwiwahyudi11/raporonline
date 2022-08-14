@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Daftar Mapel Untuk Kelas <strong>{{ $kelas['kelas'] }}</strong></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table" id="nilais-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($jadwal as $item)
                                    @if ($item->mapelDetail->guru != null && $item['mapelDetail']['mapel'] != null)
                                        @if ($item->mapelDetail->guru->id_users == Auth::user()->id)
                                            <tr>
                                                <td>{{ $i++; }}</td>
                                                <td>{{ $item['mapelDetail']['mapel']['mata_pelajaran'] }}</td>
                                                <td width="350">
                                                    <div class="btn-group"  role="group">
                                                        @role('Admin|Guru')
                                                        <a class="btn btn-info btn-sm" href="/nilais/isiNilai/{{ $item['mapelDetail']['mapel']['id'] }}/{{ $kelas['id'] }}"> <i class="fa fa-pencil" aria-hidden="true"></i> Isi Nilai</a>
                                                        <a class="btn btn-success btn-sm" href="/nilais/lihatNilai/{{ $item['mapelDetail']['mapel']['id']  }}/{{ $kelas['id'] }}"><i class="fa fa-edit"></i> Edit Nilai</a>
                                                        @endrole
                                                        <a class="btn btn-primary btn-sm" href="/nilais/lihatNilai/{{ $item['mapelDetail']['mapel']['id']  }}/{{ $kelas['id'] }}"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection