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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->target }} kali kholas</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah }} kali kholas</div>
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
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary mb-2">Target One Day One Juz</h6>
        <div class="row justify-content-between">
            <div class="col-12">
                <form action="{{ route('ngaosdetail.store') }}" method="POST">
                    @csrf
                    <div class="form-row align-items-center">
                    <input type="hidden" name="bulan_ngaos" value="{{ $item->id }}">
                    <div class="col-md-2 mt-2">
                      <input type="number" class="form-control mb-2" name="juz" placeholder="Juz">
                    </div>
                      <div class="col-md-2">
                        <select class="form-control" name="status">
                            <option selected>Pilih Status</option>
                            <option value="kholas">kholas</option>
                            <option value="tidak kholas">tidak kholas</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <select class="form-control" name="surah">
                            <option selected>Pilih Surah</option>
                            @foreach ($surah as $no => $item)
                            <option value="{{ $item }}">{{ $item }} [{{ $no + 1 }}]</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-2 mt-2">
                        <input type="number" class="form-control mb-2" name="ayat" placeholder="Ayat Terakhir">
                      </div>
                      <div class="col-auto mt-2">
                        <button type="submit" class="btn btn-primary btn-md mb-2"><i class="fas fa-save"></i></button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Juz</th>
                        <th>Surat</th>
                        <th>Ayat Terakhir</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ngaji as $item)
                        <tr>
                            <form action="{{ route('ngaosdetail.update',$item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <td width="2%" class="text-center @if($item->status == 'kholas') bg-success @else bg-danger @endif">
                                    @if($item->status == 'kholas')
                                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                                    @else
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    @endif
                                </td>
                                <td><input type="number" class="form-control" name="juz" value="{{ $item->juz }}"></td>
                                <td>
                                    <select name="surah" class="form-control surah">
                                        <option value="{{ $item->surah }}">{{ $item->surah }}</option>
                                        <option value="Tidak ada">Tidak ada</option>
                                        @foreach ($surah as $no => $sur)
                                        <option value="{{ $sur }}">{{ $sur }} [{{ $no + 1 }}]</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="ayat" value="{{ $item->ayat }}">
                                </td>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="{{ $item->status }}">{{ $item->status }}</option>
                                        <option value="kholas">kholas</option>
                                        <option value="tidak kholas">tidak kholas</option>
                                    </select>
                                </td>
                                <td width="15%">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i></button>
                                {{-- <form action="{{ route('ngaosdetail.destroy',$item->id) }}" method="POST" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form> --}}

                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('after-script')
@endpush
