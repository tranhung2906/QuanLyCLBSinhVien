@extends('admin.layouts.app')
@section('title', 'Quản lý tài khoản')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Quản lý câu lạc bộ</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">Trang quản trị</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Câu lạc bộ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin câu lạc bộ</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên câu lạc bộ</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $club->name }}</td>
                                <td><img src="{{ $club->logo && file_exists(storage_path('app/public/' . $club->logo)) 
                                                ? asset('storage/' . $club->logo) 
                                                : 'Chưa cập nhật' }}"
                                        width="60"></td>
                                @if($club->status == 1)
                                <td class="text-success"><i class="mdi mdi-check"></i></td>
                                @else
                                <td class="text-danger"><i class="mdi mdi-close"></i></td>
                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-lg" style="background: none;" type="button"
                                            id="dropdownMenuButton{{ $club->id }}" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $club->id }}">
                                            <a class="dropdown-item" href="">
                                                <i class="mdi mdi-pencil"></i> Sửa
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection