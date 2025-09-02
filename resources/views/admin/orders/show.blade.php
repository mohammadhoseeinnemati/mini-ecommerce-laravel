@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">
                جزییات سفارش
                {{getUsersFullName($orders->user)}}
            </h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مدیریت سفارشات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">جزییات سفارش</li>
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

            <!-- Main Row -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Summary -->
                            <div class="card custom-card overflow-hidden" style="padding-bottom: 6px !important;">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">خلاصه سفارش</div>
                                    <div>کد: <span class="text-primary fw-semibold">{{$orders->id}}</span></div>
                                </div>
                                <div class="card-body p-0 table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">تعداد کالا:</div>
                                            </td>
                                            <td>{{$orders->total_product}}</td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">وضعیت سفارش:</div>
                                            </td>
                                            <td>
                                                @switch($orders->status)
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
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>مبلغ کل:</div>
                                            </td>
                                            <td>
                                                <span class="fw-medium">
                                                  {{number_format($orders->total_price)}}
                                                    تومان
                                                </span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 0;">
                                                <div class="fw-semibold">توضیحات:</div>
                                            </td>
                                            <td style="border-bottom: 0;">
                                                <span class="fw-medium">
                                                  {{$orders->description}}
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Address Info -->
                        <div class="col-md-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">آدرس تحویل</div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        {{$orders->province}}
                                        -
                                        {{$orders->city}}
                                        -
                                        {{$orders->user_address}}
                                    </p>
                                    <p>
                                        <strong>
                                            کدپستی:
                                        </strong>
                                        {{$orders->postal_code}}
                                    </p>
                                    <p>
                                        <strong>
                                            شماره مویایل :
                                        </strong>
                                        {{$orders->phone}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-4">

                    <!-- User Info -->
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">مشخصات کاربر</div>
                        </div>
                        <div class="card-body">
                            <p>
                                <strong>
                                    نام:
                                </strong>
                               {{getUsersFullName($orders->user)}}
                            </p>
                            <p>
                                <strong>
                                    ایمیل:
                                </strong>{{$orders->user->email}}
                            </p>
                            <p>
                                <strong>
                                    موبایل:
                                </strong>
                                {{$orders->phone}}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <!-- Order Card -->
                    <div class="card custom-card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">
                                محصولات سفارش
                            </div>
                            <div>
                            <span class="badge bg-primary-transparent">
                                تاریخ سفارش:
                                {{toJalaliDatetime($orders->created_at)}}
                            </span>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">محصول</th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">تعداد</th>
                                        <th scope="col">مبلغ نهایی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderItems as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="mb-1 fs-14 fw-medium">
                                                            <span>
                                                                {{$order->product->name.' | '.$order->product->name_en}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                تومان
                                                {{number_format($order->price)}}
                                            </td>
                                            <td>{{$order->qty}}</td>
                                            <td>
                                                تومان
                                                {{number_format($order->total_price)}}
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
        </div>
    </div>
    <!-- End::app-content -->
@endsection

