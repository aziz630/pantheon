{{-- Extends layout --}}
@extends('layout.login') @section('styles')
<link
    href="{{ asset('css/pages/login/classic/login-5.css') }}"
    rel="stylesheet"
    type="text/css"
/>
@endsection

{{-- Content --}}
@section('content')

{{-- Login --}}
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div
        class="login login-5 login-signin-on d-flex flex-row-fluid"
        id="kt_login"
    >
        <div
            class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
            style="background-image: url( {{ asset('media/bg/bg-2.jpg') }} );"
        >
            <div
                class="login-form text-center text-white p-7 position-relative overflow-hidden"
            >
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img
                            src="{{ asset('media/logos/logo-letter-13.png') }}"
                            class="max-h-75px"
                            alt=""
                        />
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-20">
                        <h3 class="opacity-40 font-weight-normal">
                            Sign In To Admin
                        </h3>
                        <p class="opacity-40">
                            Enter your details to login to your account:
                        </p>
                    </div>
                    <form
                        class="form"
                        method="post"
                        action="{{ route('login') }}"
                        id="kt_login_signin_form"
                    >
                        <div class="form-group">
                            @csrf
                            <input
                                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                                type="text"
                                placeholder="Email"
                                name="email"
                                autocomplete="off"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                                type="password"
                                placeholder="Password"
                                name="password"
                            />
                        </div>
                        <div
                            class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60"
                        >
                            <div class="checkbox-inline">
                                <label
                                    class="checkbox checkbox-outline checkbox-white text-white m-0"
                                >
                                    <input type="checkbox" name="remember" />
                                    <span></span>Remember me</label
                                >
                            </div>
                            <a
                                href="javascript:;"
                                id="kt_login_forgot"
                                class="text-white font-weight-bold"
                                >Forget Password ?</a
                            >
                        </div>
                        <div class="form-group text-center mt-10">
                            <button
                                id="kt_login_signin_submit"
                                class="btn btn-pill btn-primary opacity-90 px-15 py-3"
                            >
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign in form-->

                <!--begin::Login forgot password form-->
                <div class="login-forgot">
                    <div class="mb-20">
                        <h3 class="opacity-40 font-weight-normal">
                            Forgotten Password ?
                        </h3>
                        <p class="opacity-40">
                            Enter your email to reset your password
                        </p>
                    </div>
                    <form class="form" id="kt_login_forgot_form">
                        <div class="form-group mb-10">
                            <input
                                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                                type="text"
                                placeholder="Email"
                                name="email"
                                autocomplete="off"
                            />
                        </div>
                        <div class="form-group">
                            <button
                                id="kt_login_forgot_submit"
                                class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2"
                            >
                                Request
                            </button>
                            <button
                                id="kt_login_forgot_cancel"
                                class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>
@endsection
