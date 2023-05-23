@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Welcome Admin !</h1>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Result Test</span>
                        <span class="info-box-number">{{ $data_count['riasec_result'] }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"> <i class="nav-icon fas fa-university"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Ukm</span>
                        <span class="info-box-number">{{ $data_count['ukm'] }}</span>
                    </div>
                </div>
            </div>


            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kriteria</span>
                        <span class="info-box-number">{{ $data_count['kriteria'] }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">{{ $data_count['user'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Riasec Test</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Hasil Test</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riasec_result as $key => $result)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $result->user->name }}</td>
                                            <td><span class="badge badge-success">{{ $result->result }}</span></td>
                                            <td>{{ $result->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $riasec_result->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
