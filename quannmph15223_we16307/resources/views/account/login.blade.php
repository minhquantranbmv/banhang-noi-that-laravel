@extends('home')

@section('title', "list product")

@section('slider')
    @include('layouts.client.name-page')
@endsection

@section('product')
    <!--Login Register section start-->
    <div class="login-register-section section pt-90 pt-lg-70 pt-md-60 pt-sm-55 pt-xs-45  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <!--Login Form Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register">
                        <div class="form-login-title">
                            <h2>Login</h2>
                        </div>
                        <div class="login-form">
                            @if (session('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <form action="{{route('login.save_login')}}" method="POST">
                                @csrf
                                <div class="form-fild">
                                    <p><label>Email<span class="required">*</span></label></p>
                                    <input name="email_login" value="" type="text">
                                    @error('email_login')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Password <span class="required">*</span></label></p>
                                    <input name="password_login" value="" type="password">
                                    @error('password_login')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                @method('POST')
                                <div class="login-submit">
                                    <button type="submit" class="btn">Login</button>
                                    <label>
                                        <input class="checkbox" name="rememberme" value="" type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <div class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Login Form End-->
                <!--Register Form Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register register-pt-0">
                        <div class="form-register-title">
                            <h2>Register</h2>
                        </div>
                        <div class="register-form">
                            <form action="{{route('login.save_signup')}}" method="POST">
                                @csrf
                                <div class="form-fild">
                                    <p><label>Fullname <span class="required">*</span></label></p>
                                    <input name="fullname" value="{{old('fullname')}}" type="text">
                                    @error('fullname')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Username<span class="required">*</span></label></p>
                                    <input name="name" value="{{old('name')}}" type="text">
                                    @error('name')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Email<span class="required">*</span></label></p>
                                    <input name="email" value="{{old('email')}}" type="text">
                                    @error('email')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Password <span class="required">*</span></label></p>
                                    <input name="password" value="{{old('password')}}" type="password">
                                    @error('password')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Password Comfirm<span class="required">*</span></label></p>
                                    <input name="password_confirm" value="{{old('password_confirm')}}" type="password">
                                    @error('password_confirm')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Address<span class="required">*</span></label></p>
                                    <input name="address" value="{{old('address')}}" type="text">
                                    @error('address')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                @method('POST')
                                <div class="register-submit">
                                    <button type="submit" class="btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Register Form End-->
            </div>
        </div>
    </div>
    <!--Login Register section end-->
@endsection


