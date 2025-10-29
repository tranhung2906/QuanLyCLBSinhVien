@extends('admin.layouts.app')
@section('title', 'Sửa câu lạc bộ')
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
                            <a href="{{route('admin.club')}}">Câu lạc bộ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa câu lạc bộ</li>
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
                <h4 class="card-title">Chỉnh sửa câu lạc bộ</h4>
                <form class="form-horizontal m-t-30" method="post" action="{{route('admin.club-update', $club->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên câu lạc bộ</label>
                        <input type="text" class="form-control" name="name" value="{{$club->name}}">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="status">
                            @if($club->status == 1)
                            <option selected value="1">Hoạt động</option>
                            <option value="0">Ngưng hoạt động</option>
                            @else
                            <option value="1">Hoạt động</option>
                            <option selected value="0">Ngưng hoạt động</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo">
                        @if($club->avatar !== null)
                        <div class="form-group">
                            <label>Ảnh hiện tại</label>
                            <img src="{{asset('storage/' . $club->logo)}}" alt="" width="150px" style="margin-top: 30px;" />
                        </div>
                        @endif
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