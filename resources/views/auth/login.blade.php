@extends('auth.layout')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{ url('login') }}" method="POST">

                                        @csrf

                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Enter Email Address..."
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                >
                                            @error('email')
                                                <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"   placeholder="Password"
                                                class="form-control form-control-user  
                                                @error('password') is-invalid @enderror "
                                              >

                                            @error('password')
                                                <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
