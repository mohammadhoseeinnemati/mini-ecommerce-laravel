@extends('admin.layouts.app')

@section('content')
    <!-- Start::app-content -->
    <div class="container-lg">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card my-4 auth-circle">
                    <div class="card-body p-5">
                        <p class="h4 mb-3 fw-semibold text-center">
                            ورود به پنل مدیریت
                        </p>
                        <p class="mb-4 text-muted text-center">
                            برای ورود به پنل مدیریت لطفا اطلاعات فرم را وارد کنید.
                        </p>

                        @error('general')
                            <p class="mt-4 mb-4 text-muted text-center text-danger">
                               {{$message}}
                            </p>
                        @enderror
                        <form method="post" action="{{route('admin.auth.login.post')}}">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="login-email" class="form-label text-default">پست الکترونیکی</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="login-email"
                                        placeholder="پست الکترونیکی را وارد کنید"
                                        value="{{old('email')}}"
                                    />

                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <br>

                                <div class="col-xl-12">
                                    <label for="login-password" class="form-label text-default">رمز عبور</label>
                                    <div class="position-relative">
                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control"
                                            id="login-password"
                                            placeholder="رمز عبور را وارد کنید"

                                        />
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <a
                                            href="javascript:void(0);"
                                            class="show-password-button text-muted"
                                            onclick="createpassword('login-password',this)"
                                            id="button-addon2"
                                        >
                                            <i class="ri-eye-off-line align-middle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::app-content -->
@endsection
