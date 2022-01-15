@extends('layouts.dashboard')
@section('title', "Ngaos Qur'an")
@section('content')

{{-- <h1 class="h3 mb-2 text-gray-800">One Day One Juz</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col">
                <form>
                    <div class="form-row align-items-center">
                      <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="date" class="form-control mb-2" placeholder="Jane Doe">
                      </div>
                      <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Status</label>
                        <div class="input-group mb-2">
                            <select class="form-control">
                                <option>Kholas</option>
                                <option>La Kholas</option>
                            </select>
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
                        <th>Bulan</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>%</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" class="font-weight-bold unlink">2022/01/01</a></td>
                        <td>30 Juz</td>
                        <td>30 Juz</td>
                        <td>100%</td>
                        <td>
                            <span class="badge badge-success">Kholas</span>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#" class="font-weight-bold unlink">2022/02/01</a></td>
                        <td>30 Juz</td>
                        <td>30 Juz</td>
                        <td>100%</td>
                        <td>
                            <span class="badge badge-danger">La Kholas</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
