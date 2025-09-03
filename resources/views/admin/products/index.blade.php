@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">لیست محصولات</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مدیریت محصولات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">لیست محصولات</li>
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
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="{{route('admin.products.index')}}">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                        <div class="d-flex me-2">
                                            <input
                                                class="form-control me-2"
                                                type="search"
                                                name="search"
                                                placeholder="جستجو محصول"
                                                value="{{request()->query('search')}}"
                                                aria-label="جستجو">
                                            <button class="btn btn-light" type="submit">جستجو</button>
                                        </div>

                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="newest" @selected(getSortSelected('newest', true)) >
                                                جدیدترین
                                            </option>
                                            <option
                                                value="name_asc"@selected(getSortSelected('name_asc'))  >
                                                نام (صعودی)
                                            </option>
                                            <option
                                                value="name_desc" @selected(getSortSelected('name_desc')) >
                                                نام (نزولی)
                                            </option>
                                            <option
                                                value="price_asc" @selected(getSortSelected('price_asc'))>
                                                قیمت (کم به زیاد)
                                            </option>
                                            <option
                                                value="price_desc" @selected(getSortSelected('price_desc'))>
                                                قیمت (زیاد به کم)
                                            </option>
                                        </select>
                                    </div>


                                    <div class="d-flex">
                                        <a href="{{route('admin.products.create')}}" class="btn btn-primary me-2">
                                            <i class="ri-add-line me-1 fw-medium align-middle"></i>
                                            ایجاد محصول
                                        </a>
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
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>نام محصول</th>
                                    <th>دسته‌بندی</th>
                                    <th>قیمت</th>
                                    <th> تخفیف‌</th>
                                    <th>موجودی</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr class="product-list">
                                            <td>
                                                <div class="d-flex">
                                                    <span class="avatar avatar-md avatar-square bg-light">
                                                        <img
                                                            src="{{getProductImageUrl($product->defaultImage)}}"
                                                            class="w-100 h-100" alt="{{$product->name.' | '.$product->name_en}}"
                                                        >
                                                    </span>

                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 name-limit">
                                                            <a href="">
                                                                {{$product->name.' | '.$product->name_en}}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$product->category->name}}</td>
                                            <td>
                                                {{number_format($product->price)}}
                                                تومان
                                            </td>
                                            <td>
                                                <span class="text-success">
                                                   {{number_format($product->discount)}}
                                                    تومان
                                                </span>
                                            </td>
                                            <td>
                                                {{$product->qty}}
                                            </td>
                                            <td>
                                                {{toJalaliDatetime($product->created_at)}}
                                            </td>

                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="{{route('admin.products.show',$product->id)}}"
                                                       class="btn btn-primary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{route('admin.products.edit',$product->id)}}"
                                                       class="btn btn-secondary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                        <i class="ti ti-pencil"></i>
                                                    </a>
                                                    <form action="{{route('admin.products.delete',$product->id)}}"
                                                          method="POST"
                                                          onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-sm btn-danger-light" style="margin-top: 15;">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
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

            {{$products->links()}}

        </div>
    </div>

    <!-- End::app-content -->
@endsection
