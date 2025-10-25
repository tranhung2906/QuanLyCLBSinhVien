@extends('admin.layouts.app')
@section('title', 'Quản lý tài khoản')
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
                            <a href="#">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm tài khoản</li>
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
                <h4 class="card-title">Thêm mới tài khoản</h4>
                <form class="form-horizontal m-t-30">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="example-email">Email</label>
                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection