@extends('admin.layouts.app')
@section('title', 'Sửa tài khoản')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Quản lý tài khoản</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.account')}}">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa tài khoản</li>
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
            <div class="card card-body">
                <h4 class="card-title">Chỉnh sửa tài khoản</h4>
                <form class="form-horizontal m-t-30" method="post" action="{{route('admin.account-update', $account->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$account->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Quyển hạn</label>
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="role">
                            @if($account->role == 2)
                            <option selected value="2">Trưởng câu lạc bộ</option>
                            <option value="3">Phó câu lạc bộ</option>
                            <option value="4">Thành viên</option>
                            @elseif ($account->role == 3)
                            <option value="2">Trưởng câu lạc bộ</option>
                            <option selected value="3">Phó câu lạc bộ</option>
                            <option value="4">Thành viên</option>
                            @else
                            <option value="2">Trưởng câu lạc bộ</option>
                            <option value="3">Phó câu lạc bộ</option>
                            <option selected value="4">Thành viên</option>
                            @endif
                        </select>
                    </div>
                    <button class="btn btn-info" style="color: white;" type="submit">
                        Sửa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection