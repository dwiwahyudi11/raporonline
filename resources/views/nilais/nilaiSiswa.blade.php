@extends('layouts.app')
@section('title', 'Table Nilai')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai</h1>
                    <p>Pilih Kelas Untuk Input Nilai</p>
                </div>
                {{-- <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('nilais.create') }}">
                        Add New
                    </a>
                </div> --}}
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table" id="nilais-table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($nilai as $item)
                                @foreach ($item->nilaiDetails as $items)
                                    @if ($items->mapel != null)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>{{ $item['kelas']['kelas'] }}</td>
                                            <td>{{ $items->mapel->mata_pelajaran }}</td>
                                            <td width="150">
                                                <a class="btn btn-info btn-sm" href="/nilais/view/{{ $items->id }}">Lihat Nilai</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

