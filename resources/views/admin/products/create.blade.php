@extends('admin.layouts.app')

@section('breadcrumbs')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <h1 class="page-title fw-medium fs-18 mb-2">ایجاد محصول</h1>
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مدیریت محصولات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ایجاد محصول</li>
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
                    <form action="{{route('admin.products.store')}}"
                          method="POST"
                          enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    ایجاد محصول
                                </div>
                            </div>

                            @error('general')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="card-body pt-0">

                                <div class="row gy-3">

                                    <!-- Name -->
                                    <div class="col-xl-6">
                                        <label class="form-label">نام فارسی محصول</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="نام فارسی محصول را وارد کنید"
                                            value="{{old('name')}}"
                                        >
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6">
                                        <label class="form-label">نام اینگلیسی محصول</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name_en"
                                            placeholder="نام اینگلیسی محصول را وارد کنید"
                                            value="{{old('name_en')}}"
                                        >
                                        @error('name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="col-xl-6">
                                        <label class="form-label">دسته‌بندی</label>
                                        <select class="form-control" name="category_id">
                                            <option>یک دسته بندی را انتخاب کنید</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}" @selected(old('category_id') == $category->id) >
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <!-- Price -->
                                    <div class="col-xl-6">
                                        <label class="form-label">قیمت</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="price"
                                            placeholder="قیمت را وارد کنید"
                                            value="{{old('price')}}"
                                        >
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <!-- Discount Price -->
                                    <div class="col-xl-6">
                                        <label class="form-label"> تخفیف</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="discount"
                                            placeholder="تخفیف را وارد کنید"
                                            value="{{old('discount')}}"
                                        >
                                        @error('discount')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <!-- Stock -->
                                    <div class="col-xl-6">
                                        <label class="form-label">موجودی</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="qty"
                                            placeholder="تعداد موجودی را وارد کنید"
                                            value="{{old('qty')}}"
                                        >
                                        @error('qty')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="col-xl-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea
                                            class="form-control"
                                            name="description"
                                            rows="4"
                                            placeholder="توضیحات محصول را وارد کنید">
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Images -->
                            <div class="image-upload-wrapper d-flex flex-wrap gap-2 px-0 pt-0 mb-3"
                                 id="imagePreviewContainer"
                                 style=" border-radius: 8px; padding: 10px;">

                                <label id="uploadPlaceholder" class="upload-placeholder" for="imageInput"
                                       style="cursor: pointer; width:150px; height:150px; display: flex; justify-content: center; align-items: center; border: 2px dashed #ccc; border-radius: 8px; padding: 20px; text-align: center;">
                                    <div>📷<br><strong>آپلود یا کشیدن</strong></div>
                                    <small style="color:#999;">JPG / PNG / JPEG / WEBP</small>
                                </label>
                                <input
                                    id="imageInput"
                                    name="images[]"
                                    type="file"
                                    accept=".jpg,.png,.jpeg,.webp"
                                    multiple
                                    style="display:none"
                                />
                                @error('images.*')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">ایجاد محصول</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- End::app-content -->
@endsection
