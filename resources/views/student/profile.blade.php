@extends('index')
@section('body')
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{route('student')}}">
            <img src="{{asset('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <h6 style="display: inline-flex" class="ms-1 font-weight-bold text-white">Öğrenci Paneli</h6>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div style="height: 450px" class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('student')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Anasayfa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('student/addproject')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span class="nav-link-text ms-1">Yeni Proje Başvurusu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary " href="{{route('student/profile')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profilim</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<main class="main-content position-relative h-100">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Student</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Panel</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('logout')}}" class="nav-link text-body font-weight-bold px-0">
                            <span  class="btn d-sm-inline d-none btn-outline-primary btn-sm"><i style="font-size: 12px" class="fas fa-power-off"></i>&nbsp;Çıkış</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n10">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{asset($student['student_picture_path'])}}" alt="profile_image" class="w-150 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$student['name']." ".$student['surname']}}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{$department['department_name']}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">

                    </div>
                </div>
                <!-- border bottom -->
                <div class="card-header pb-0" style="margin-top:10px;border-top:1px solid #f0f2f5;"></div>
                <!-- end border bottom -->
            </div>

            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div style="padding: 0 0 0 24px" class="card-header">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="mb-0">Profil Bilgileri</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <hr class="horizontal gray my-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Adı:</strong> &nbsp; {{$student['name']}} </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Soyadı:</strong> &nbsp; {{$student['surname']}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Öğrenci Numarası:</strong> &nbsp; {{$student['student_no']}}</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">


                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Fakülte:</strong> &nbsp; {{$faculty['faculty_name']}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bölüm</strong> &nbsp; {{$department['department_name']}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Sınıf:</strong> &nbsp; {{$student['class']}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">


                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">

                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Cep Telefonu:</strong> &nbsp; {{$student['phone']}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Danışman:</strong> &nbsp; {{$teacher['name']." ".$teacher['surname']}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$user['email']}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer py-4  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">

            </div>

        </div>
    </div>
</footer>
</div>
@endsection
