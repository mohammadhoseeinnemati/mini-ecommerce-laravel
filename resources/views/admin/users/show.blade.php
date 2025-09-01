@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">
                جزییات کاربران
                {{getUsersFullName($user)}}
            </h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">جزییات کاربران</a></li>
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


            <!-- User Info Card -->
            <div class="card custom-card mb-4">
                <div class="card-header">
                    <div class="card-title">اطلاعات کاربر</div>
                </div>

                <div class="d-flex align-items-center p-3 pt-0">
                    <div class="card-body flex-grow-1">
                        <dl class="row mb-0">
                            <dt class="col-sm-3 my-2 fw-semibold">نام کامل:</dt>
                            <dd class="col-sm-9 my-2">{{getUsersFullName($user)}}</dd>

                            <dt class="col-sm-3 my-2 fw-semibold">ایمیل:</dt>
                            <dd class="col-sm-9 my-2">{{$user->email}}</dd>

                            <dt class="col-sm-3 my-2 fw-semibold">شماره تلفن:</dt>
                            <dd class="col-sm-9 my-2">{{$user->phone}}</dd>

                            <dt class="col-sm-3 my-2 fw-semibold">تاریخ ثبت‌نام:</dt>
                            <dd class="col-sm-9 my-2">{{toJalaliDatetime($user->created_at)}}</dd>
                        </dl>
                    </div>

                </div>
            </div>

            <!-- Orders Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-4">
                        <div class="card-header">
                            <div class="card-title">سفارشات کاربر</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap table-hover">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($user->latestOrders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                <span class="fw-semibold d-block">
                                                    {{getUsersFullName($user)}}
                                                </span>

                                                        <span class="text-muted fs-12">
                                                   #{{$order->id}}
                                                </span>
                                                    </div>
                                                </div>
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
                                                    <a href="{{route('admin.orders.update', $order->id)}}"
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
                                                          action="{{route('admin.orders.delete',$order->id)}}"
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

            <!-- Purchased Products Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">محصولات خریداری شده</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        <input class="form-check-input check-all" type="checkbox" id="all-products">
                                    </th>
                                    <th>محصول</th>
                                    <th>دسته‌بندی</th>
                                    <th>قیمت</th>
                                    <th>قیمت تخفیف‌خورده</th>
                                    <th>موجودی</th>
                                    <th>وضعیت</th>
                                    <th>منتشر شده</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="product-list">
                                    <td class="product-checkbox">
                                        <input class="form-check-input" type="checkbox"
                                               value="1">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                                                                                    <span class="avatar avatar-md avatar-square bg-light">
                                                        <img
                                                            src="/assets/admin/images/product-default-image.png"
                                                            class="w-100 h-100" alt="گوشی  به عنوان فیک موبایلin the type of shit"
                                                        />
                                                    </span>

                                            <div class="ms-2 d-flex align-items-center">
                                                <p class="fw-semibold mb-0 name-limit">
                                                    <a href="http://127.0.0.1:8000/admin/products/1">گوشی  به عنوان فیک موبایلin the type of shit</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>موبایل</td>
                                    <td>100,000,000 تومان</td>
                                    <td>
                                        <span class="text-success">50,000,000 تومان</span>
                                    </td>
                                    <td>50</td>
                                    <td>
                                        <span
                                            class="badge bg-primary-transparent">
                                            منتشر شد
                                        </span>
                                    </td>
                                    <td>
                                        10 مرداد 1404 - 10:50
                                    </td>

                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/products/1"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="http://127.0.0.1:8000/admin/products/1/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/products/1"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')">
                                                <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="product-list">
                                    <td class="product-checkbox">
                                        <input class="form-check-input" type="checkbox"
                                               value="7">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                                                                                    <span class="avatar avatar-md avatar-square bg-light">
                                                        <img
                                                            src="/assets/admin/images/product-default-image.png"
                                                            class="w-100 h-100" alt="بسته شرکتی اینترنت"
                                                        />
                                                    </span>

                                            <div class="ms-2 d-flex align-items-center">
                                                <p class="fw-semibold mb-0 name-limit">
                                                    <a href="http://127.0.0.1:8000/admin/products/7">بسته شرکتی اینترنت</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>موبایل</td>
                                    <td>5,000 تومان</td>
                                    <td>
                                        <span class="text-muted">-</span>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <span
                                            class="badge bg-primary-transparent">
                                            منتشر شد
                                        </span>
                                    </td>
                                    <td>
                                        19 مرداد 1404 - 04:16
                                    </td>

                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/products/7"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="http://127.0.0.1:8000/admin/products/7/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/products/7"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')">
                                                <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="product-list">
                                    <td class="product-checkbox">
                                        <input class="form-check-input" type="checkbox"
                                               value="8">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                                                                                    <span class="avatar avatar-md avatar-square bg-light">
                                                        <img
                                                            src="/assets/admin/images/product-default-image.png"
                                                            class="w-100 h-100" alt="گوشی اپل iPhone 16 CH رجیستر‌شده دو سیم‌کارت 128 گیگابایت با رم 8 گیگابایت"
                                                        />
                                                    </span>

                                            <div class="ms-2 d-flex align-items-center">
                                                <p class="fw-semibold mb-0 name-limit">
                                                    <a href="http://127.0.0.1:8000/admin/products/8">گوشی اپل iPhone 16 CH رجیستر‌شده دو سیم‌کارت 128 گیگابایت با رم 8 گیگابایت</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>موبایل</td>
                                    <td>89,999,000 تومان</td>
                                    <td>
                                        <span class="text-success">2,000 تومان</span>
                                    </td>
                                    <td>8</td>
                                    <td>
                                        <span
                                            class="badge bg-primary-transparent">
                                            منتشر شد
                                        </span>
                                    </td>
                                    <td>
                                        20 مرداد 1404 - 04:16
                                    </td>

                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/products/8"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="http://127.0.0.1:8000/admin/products/8/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/products/8"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')">
                                                <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="product-list">
                                    <td class="product-checkbox">
                                        <input class="form-check-input" type="checkbox"
                                               value="9">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                                                                                    <span class="avatar avatar-md avatar-square bg-light">
                                                        <img
                                                            src="/assets/admin/images/product-default-image.png"
                                                            class="w-100 h-100" alt="لپ تاپ asus مدل rog"
                                                        />
                                                    </span>

                                            <div class="ms-2 d-flex align-items-center">
                                                <p class="fw-semibold mb-0 name-limit">
                                                    <a href="http://127.0.0.1:8000/admin/products/9">لپ تاپ asus مدل rog</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>کالای دیجیتال</td>
                                    <td>500,000 تومان</td>
                                    <td>
                                        <span class="text-success">2,000 تومان</span>
                                    </td>
                                    <td>10</td>
                                    <td>
                                        <span
                                            class="badge bg-primary-transparent">
                                            منتشر شد
                                        </span>
                                    </td>
                                    <td>
                                        20 مرداد 1404 - 05:46
                                    </td>

                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/products/9"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="http://127.0.0.1:8000/admin/products/9/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="http://127.0.0.1:8000/admin/products/9"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')">
                                                <input type="hidden" name="_token" value="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM" autocomplete="off">                                                    <input type="hidden" name="_method" value="DELETE">                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End::app-content -->
@endsection
