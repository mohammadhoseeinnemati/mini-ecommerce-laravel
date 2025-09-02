@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">
                ویرایش سفارش
                {{getUsersFullName($order->user)}}
            </h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مدیریت سفارشات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ویرایش سفارش</li>
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


            <!-- Edit Form -->
            <div class="card custom-card">
                <div class="card-body">

                    <form
                        action="{{route('admin.orders.update',$order->id)}}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">وضعیت سفارش</label>
                            <select name="status" id="status" class="form-select ">
                                <option
                                    value={{\App\Enums\OrderStatus::pending->value}} selected>در انتظارثبت</option>
                                <option
                                    value={{\App\Enums\OrderStatus::processing->value}} >در حال پردازش</option>
                                <option
                                    value={{\App\Enums\OrderStatus::sent->value}} >ارسال شده</option>
                                <option
                                    value={{\App\Enums\OrderStatus::delivered->value}} >تحویل داده </option>
                                <option
                                    value={{\App\Enums\OrderStatus::cancelled->value}}>لغو شده</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-wave">
                            ذخیره تغییرات
                        </button>
                        <a href="{{route('admin.orders.index')}}" class="btn btn-secondary btn-wave ms-2">لغو</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End::app-content -->
@endsection
