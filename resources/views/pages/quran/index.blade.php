@extends('layouts.dashboard')
@section('title', "Ngaos Qur'an")
@section('content')

{{-- <h1 class="h3 mb-2 text-gray-800">One Day One Juz</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Sudah Tilawah Hari Ini?</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('ngaosdetail.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-12">
                            <select name="bulan_ngaos" class="form-control mb-2">
                                <option selected>Pilih Bulan</option>
                                @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ \Carbon\Carbon::parse($item->tanggal)->format('M Y') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <select class="form-control" name="status">
                                    <option selected>Pilih Status</option>
                                    <option value="kholas">kholas</option>
                                    <option value="la kholas">la kholas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <select class="form-control" name="surah">
                                    <option selected>Pilih Surah</option>
                                    @foreach ($surah as $no => $item)
                                    <option value="{{ $item }}">{{ $item }} [{{ $no + 1 }}]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <input type="text" class="form-control mb-2" name="ayat" placeholder="Ayat Terakhir">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block mb-2 fs-6"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">Target One Day One Juz</h6>
                <div class="row justify-content-between">
                    <div class="col-12">
                        <form action="{{ route('ngaos.store') }}" method="POST">
                            @csrf
                            <div class="form-row align-items-center">
                              <div class="col-md-6">
                                <input type="month" class="form-control mb-2" name="tanggal">
                              </div>
                              <div class="col-md-5">
                                <input type="number" class="form-control mb-2" name="target" placeholder="Target berapa Juz?">
                              </div>
                              <div class="col-auto">
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
                                <th>No</th>
                                <th width="50%">Bulan</th>
                                <th>Target</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; ?>
                            @foreach ($data as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('F Y') }}</td>
                                <td>{{ $item->target }} Juz</td>
                                <td>
                                    <a href="{{ route('ngaos.show',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                    <form action="{{ route('ngaos.destroy',$item->id) }}" method="POST" class="form-delete">
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
    </div>
</div>

@endsection
