@extends('layouts.dashboard')
@section('title', "Ngaos Qur'an")
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary mb-2">Target One Day One Juz</h6>
        <div class="row justify-content-between">
            <div class="col-12">
                <form action="{{ route('ngaos.update',$item->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-row align-items-center">
                      <div class="col-md-3">
                        <input type="month" class="form-control mb-2" name="tanggal" value="{{ $item->tanggal }}">
                      </div>
                      <div class="col-md-2">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="target" value="{{ $item->target }}">
                            <div class="input-group-append">
                              <span class="input-group-text">Kholas</span>
                            </div>
                        </div>
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
                        <th>#</th>
                        <th width="50%">Surah</th>
                        <th>Ayat Terakhir</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ngaos as $no => $item)
                    <tr>
                        <td width="2%" class="text-center @if($item->status == 'kholas') bg-success @else bg-danger @endif">
                            @if($item->status == 'kholas')
                                <button class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                            @else
                                <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                            @endif
                        </td>
                        <td>{{ $item->surah }}</td>
                        <td>{{ $item->ayat }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <form action="{{ route('ngaosdetail.destroy',$item->id) }}" method="POST" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash"></i></button>
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
