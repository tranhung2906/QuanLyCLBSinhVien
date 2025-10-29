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
                            <a href="{{route('admin.dashboard')}}">Trang quản trị</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
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
                    <h4 class="card-title">Danh sách tài khoản</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quyền hạn</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $index => $account)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->email }}</td>
                                @if($account->role == 2)
                                <td><span class="label label-success label-rounded">Trưởng câu lạc bộ</span></td>
                                @elseif($account->role == 3)
                                <td><span class="label label-purple label-rounded">Phó câu lạc bộ</span></td>
                                @else
                                <td><span class="label label-info label-rounded">Thành viên</span></td>
                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-lg" style="background: none;" type="button"
                                            id="dropdownMenuButton{{ $account->id }}" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $account->id }}">
                                            <a class="dropdown-item" href="{{route('admin.account-edit', $account->id)}}">
                                                <i class="mdi mdi-pencil"></i> Sửa
                                            </a>
                                            <a class="dropdown-item"
                                                href="#"
                                                data-toggle="modal"
                                                data-target="#deleteMemberModal"
                                                data-id="{{ $account->id }}">
                                                <i class="mdi mdi-account-key"></i> Cấp lại mật khẩu
                                            </a>
                                        </div>
                                    </div>
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

<!-- Modal Xác nhận Xóa -->
<div class="modal fade" id="deleteMemberModal" tabindex="-1" aria-labelledby="deleteMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="deleteMemberModalLabel">Thông báo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn cập lại mật khẩu không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <form id="deleteMemberForm" method="POST" action="{{route('admin.reset-password', $account->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-info">Đồng ý</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            const name = $(this).data('name');
            const url = $(this).data('url');
            $('#deleteForm').attr('action', url);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection