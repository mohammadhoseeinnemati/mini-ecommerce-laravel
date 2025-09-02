@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">لیست سفارشات</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مدیریت سفارشات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">لیست سفارشات</li>
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

            <!-- Filters -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="{{route('admin.orders.index')}}">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Sort Dropdown -->
                                    <div class="d-flex flex-wrap gap-1 align-items-center">
                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="create_at_desc" @selected(getSortSelected('create_at_desc', true))>
                                                جدیدترین
                                            </option>
                                            <option
                                                value="create_at_asc" @selected(getSortSelected('create_at_asc'))>
                                                قدیمی‌ترین
                                            </option>
                                            <option
                                                value="price_high" @selected(getSortSelected('price_high'))>
                                                مبلغ (زیاد به کم)
                                            </option>
                                            <option
                                                value="price_low" @selected(getSortSelected('price_low'))>
                                                مبلغ (کم به زیاد)
                                            </option>
                                            <option value="status" @selected(getSortSelected('status'))>
                                                وضعیت
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Search -->
                                    <div class="d-flex" role="search">
                                        <input
                                            class="form-control me-2"
                                            type="search"
                                            name="search"
                                            placeholder="جستجو سفارش"
                                            value="{{request()->query('search')}}"
                                        >
                                        <button class="btn btn-light" type="submit">جستجو</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-hover">
                                <thead>
                                <tr>
                                    <th>مشتری</th>
                                    <th>شناسه</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <span class="fw-semibold d-block">{{getUsersFullName($order->user)}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                #{{$order->id}}
                                            </td>
                                            <td>
                                                تومان
                                                {{number_format($order->total_price)}}
                                            </td>
                                            <td>
                                                @switch($order->status)
                                                    @case(\App\Enums\OrderStatus::pending)
                                                        <span class="badge bg-warning">درحال انتظار ثبت</span>
                                                        @break
                                                    @case(\App\Enums\OrderStatus::processing)
                                                        <span class="badge bg-info">درحال پردازش</span>
                                                        @break
                                                    @case(\App\Enums\OrderStatus::sent)
                                                        <span class="badge bg-orange">ارسال شده</span>
                                                        @break
                                                    @case(\App\Enums\OrderStatus::delivered)
                                                        <span class="badge bg-success">تحویل داده</span>
                                                        @break
                                                    @case(\App\Enums\OrderStatus::cancelled)
                                                        <span class="badge bg-danger">لغو شده</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{toJalaliDatetime($order->created_at)}}</td>
                                            <td>
                                                <div class="btn-list">
                                                    <a href="{{route('admin.orders.show', $order->id)}}"
                                                       class="btn btn-primary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{route('admin.orders.edit', $order->id)}}"
                                                       class="btn btn-secondary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                        <i class="ti ti-pencil"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                       onclick="if(confirm('آیا از حذف این سفارش مطمئن هستید؟')) { document.getElementById('delete-form-{{$order->id}}').submit(); }"
                                                       class="btn btn-pink-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                    <form id="delete-form-{{$order->id}}"
                                                          action="{{route('admin.orders.delete', $order->id)}}"
                                                          method="POST" style="display:none;"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
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

            {{$orders->links()}}

        </div>
    </div>
    <!-- End::app-content -->
@endsection

