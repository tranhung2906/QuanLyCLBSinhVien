@extends('admin.layouts.app')
@section('title', 'Thêm thành viên')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Quản lý thành viên</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.member')}}">Thành viên</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm thành viên</li>
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
                <h4 class="card-title">Thêm mới thành viên</h4>
                <form class="form-horizontal m-t-30" method="post" action="{{route('admin.member-store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label>Lớp</label>
                        <input type="text" class="form-control" name="classes" placeholder="Nhập lớp">
                    </div>
                    <div class="form-group">
                        <label>Mã số sinh viên</label>
                        <input type="text" class="form-control" name="mssv" placeholder="Nhập mã số sinh viên">
                    </div>
                    <div class="form-group">
                        <label>Khoa / Ngành</label>
                        <input type="text" class="form-control" name="department" placeholder="Nhập khoa / ngành">
                    </div>
                      <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="date_of_birth">
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                    <button class="btn" style="background: green; color: white;"  type="submit">
                        Thêm
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection