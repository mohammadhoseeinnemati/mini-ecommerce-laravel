@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">لیست کاربران</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مدیریت کاربران</a></li>
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

            <!-- Page Header Close -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="{{route('admin.users.index')}}">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Left: Add User + Sort Dropdown -->
                                    <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                        <div class="d-flex me-2">
                                            <input
                                                class="form-control me-2"
                                                type="search"
                                                name="search"
                                                placeholder="جستجوی کاربر"
                                                value="{{request()->query('search')}}"
                                                aria-label="جستجوی کاربر"
                                            />
                                            <button class="btn btn-light" type="submit">جستجو</button>
                                        </div>

                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option value="newest" @selected(getSortSelected('newest', true)) >
                                                جدیدترین
                                            </option>
                                            <option value="name_asc" @selected(getSortSelected('name_asc')) >
                                                الفبا (الف - ی)
                                            </option>
                                            <option value="name_desc" @selected(getSortSelected('name_desc')) >
                                                الفبا (ی - الف)
                                            </option>

                                        </select>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start::row-2 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card ">
                        <div class="table-responsive">
                            <!-- Removed .table-responsive -->
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">نام و نام خانوادگی</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">شماره تماس</th>
                                    <th scope="col">تاریخ ثبت نام</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-fill">
                                                        <a href="javascript:void(0);"
                                                           class="fw-medium fs-14 d-block text-truncate">
                                                           {{getUsersFullName($user)}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{toJalaliDatetime($user->created_at)}}</td>

                                            <td>
                                                <div class="btn-list">
                                                    <a href="{{route('admin.users.show', $user->id)}}"
                                                       class="btn btn-primary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{route('admin.users.edit', $user->id)}}"
                                                       class="btn btn-secondary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                       onclick="if(confirm('آیا از حذف این کاربر مطمئن هستید؟')) { document.getElementById('delete-form-{{$user->id}}').submit(); }"
                                                       class="btn btn-pink-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                    <form
                                                        id="delete-form-{{$user->id}}"
                                                        action="{{route('admin.users.delete', $user->id)}}"
                                                        method="POST" style="display:none;"
                                                    >
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </td>


                                        </tr>
                                    @empty
                                        <tr>
                                            <td>داده ی یافت نشد</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End::row-2 -->

        </div>
    </div>
    <!-- End::app-content -->
@endsection
