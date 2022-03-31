@extends('index')
@section('body')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            {{--            <!-- Navbar -->--}}
            {{--            <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">--}}
            {{--                <div class="container-fluid ps-2 pe-0">--}}
            {{--                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">--}}
            {{--                        Material Dashboard 2--}}
            {{--                    </a>--}}
            {{--                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--              <span class="navbar-toggler-icon mt-2">--}}
            {{--                <span class="navbar-toggler-bar bar1"></span>--}}
            {{--                <span class="navbar-toggler-bar bar2"></span>--}}
            {{--                <span class="navbar-toggler-bar bar3"></span>--}}
            {{--              </span>--}}
            {{--                    </button>--}}
            {{--                    <div class="collapse navbar-collapse" id="navigation">--}}
            {{--                        <ul class="navbar-nav mx-auto">--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">--}}
            {{--                                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>--}}
            {{--                                    Dashboard--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a class="nav-link me-2" href="../pages/profile.html">--}}
            {{--                                    <i class="fa fa-user opacity-6 text-dark me-1"></i>--}}
            {{--                                    Profile--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a class="nav-link me-2" href="../pages/sign-up.html">--}}
            {{--                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>--}}
            {{--                                    Sign Up--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a class="nav-link me-2" href="../pages/sign-in.html">--}}
            {{--                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>--}}
            {{--                                    Sign In--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                        <ul class="navbar-nav d-lg-block d-none">--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Free download</a>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </nav>--}}
            {{--            <!-- End Navbar -->--}}
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Giriş Yap</h4>
                                {{--                                <div class="row mt-3">--}}
                                {{--                                    <h6 class="text-white font-weight-bolder text-center mt-2 mb-0">Kocaeli Üniversitesi</h6>--}}
                                {{--                                    <h6 class="text-white font-weight-bolder text-center mt-2 mb-0">Proje Takip Sistemi</h6>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-primary alert-dismissible text-white" role="alert">
                                    <span class="text-sm"><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;{{$errors->first()}}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{route('logincontrol')}}" method="post">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">E-mail</label>
                                    <input name="mail" type="email" class="form-control">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Şifre</label>
                                    <input name="pass" type="password" class="form-control">
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Beni Hatırla!</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Giriş Yap</button>
                                </div>
                                {{--                                <p class="mt-4 text-sm text-center">--}}
                                {{--                                    Don't have an account?--}}
                                {{--                                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>--}}
                                {{--                                </p>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by a group of students
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>

@endsection
