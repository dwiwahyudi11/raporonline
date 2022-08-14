@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rapot</h1>
                    <p>Hanya Wali Kelas Yang Dapat Melihat Rapot!</p>

                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-primary float-right" href="{{ route('rapots.create') }}">Add New</a> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table" id="rapots-table">
                        <thead>
                        <tr>
                            <th>Kelas</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $item)
                            <tr>
                                <td>{{ $item->kelas }}</td>
                                <td width="250">
                                    <a class="btn btn-info" href="/rapots/pilihKelas/{{ $item->id}}">Pilih Kelas</a>
                                </td>
                            </tr>
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