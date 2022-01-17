@extends('layouts.dashboard')
@section('title', "Ngaos Qur'an")
@section('content')

{{-- <h1 class="h3 mb-2 text-gray-800">One Day One Juz</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Target Tilawah</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->target }} Juz</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-quran fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Realisasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah }} Juz</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-quran fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Persentase
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $persentase = number_format($jumlah / $item->target * 100) }}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: {{ $persentase = number_format($jumlah / $item->target * 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        {{-- <h6 class="font-weight-bold my-2">Target: {{ $item->target }} Realisasi: {{ $jumlah }} Persentase: {{ $persentase = number_format($jumlah / $item->target * 100) }}%</h6> --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Surat</th>
                        <th>Ayat Terakhir</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ngaji as $item)
                        <tr>
                            <td >{{ $item->surah }}</td>
                            <td>{{ $item->ayat }}</td>
                            <td>
                                @if($item->status == 'kholas')
                                    <span class="badge badge-success"><i class="fas fa-check"></i></span>
                                @else
                                    <span class="badge badge-danger"><i class="fas fa-times"></i></span>
                                @endif
                            </td>
                            <td width="15%">
                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <form action="{{ route('ngaosdetail.destroy',$item->id) }}" method="POST" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
