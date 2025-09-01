@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">
                ویرایش کاربران
                {{getUsersFullName($user)}}
            </h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">ویرایش کاربران</a></li>
                        <li class="breadcrumb-item active" aria-current="page">لیست کاربران</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End::header-element -->
@endsection

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid pt-4">
            <div class="row">
                <div class="col-xl-12">
                    <form
                        action="{{route('admin.users.update', $user->id)}}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">ویرایش کاربر</div>
                            </div>


                            @error('general')
                            <div style="padding: 15px" class="text-danger">{{$message}}</div>
                            @enderror

                            <div class="card-body">

                                <!-- User Fields -->
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label class="form-label">نام</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            value="{{old('first_name', $user->first_name)}}"
                                            placeholder="نام را وارد کنید"
                                        >
                                        @error('first_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">نام خانوادگی</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            value="{{old('last_name', $user->last_name)}}"
                                            placeholder="نام خانوادگی را وارد کنید"
                                        >
                                        @error('last_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">ایمیل</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            value="{{old('email', $user->email)}}"
                                            placeholder="ایمیل را وارد کنید"
                                        >
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6">
                                        <label class="form-label">شماره موبایل</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            value="{{old('phone', $user->phone)}}"
                                            placeholder="شماره تماس را وارد کنید"
                                        >
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6">
                                        <label class="form-label">رمز عبور (در صورت تغییر)</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="password"
                                            placeholder="رمز عبور را وارد کنید">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End::app-content -->
@endsection
