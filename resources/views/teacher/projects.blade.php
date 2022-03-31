@extends('index')
@section('body')
    <!-- Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{route('teacher')}}">
                <img src="{{asset('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <h6 style="display: inline-flex" class="ms-1 font-weight-bold text-white">Öğretmen Paneli</h6>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div style="height: 450px" class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('teacher')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Anasayfa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{route('teacher/projects')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-inbox-in"></i>
                        </div>
                        <span class="nav-link-text ms-1">Gelen Projeler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('teacher/profile')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- End Sidebar -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Teacher</a></li>
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
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-lg-8 col-md-6 mb-md-0 mb-4" style="width: 99%;">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-inbox-in fa-lg"></i>&nbsp; Gelen Proje Başvuruları
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-1 py-4 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu1</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu2</a></li>
                                        </ul>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <!-- border bottom -->
                        <div class="card-header pb-0" style="margin-top:10px;border-top:1px solid #f0f2f5;"></div>
                        <!-- end border bottom -->
                        @if($errors->any())
                            <div style="width: 350px;text-align: center;align-self: center;" class="alert {{$errors->first('alert')}} alert-dismissible text-white" role="alert">
                                <span class="text-sm"><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;{{$errors->first()}}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <!-- projeler -->
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table  class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Öğrenci No</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ad Soyad</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Proje Başlık</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Durum</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($student as $item)
                                    @php
                                        $projectIdea = \App\Models\Project_Idea::where("student_no","=",$item['student_no'])->get();
                                    @endphp
                                    @foreach($projectIdea as $pItem)
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">{{$item['student_no']}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">{{$item['name']." ".$item['surname']}}</span>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">{{empty($pItem['project_title']) ? " - " : $pItem['project_title']}}</span>
                                        </td>
                                        <td style="white-space: normal;" class="align-middle text-center text-sm">
                                            <span class="{{spanClass($pItem['status_no'])}}">
                                                <i class="{{iconClass($pItem['status_no'])}}"></i>&nbsp;&nbsp;
                                                {{statuDescription($pItem['status_no'])}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">
                                                <form action="{{route('teacher/project')}}" method="get">
                                                    <input name="project_idea_id" type="hidden" value="{{isset($pItem['project_idea_id']) ? $pItem['project_idea_id'] : false}}">
                                                    <button type="submit" class="btn btn-info btn-sm m-0">
                                                        Görüntüle
                                                    </button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end projeler -->

                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
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
            <!-- End Footer -->
        </div>
    </main>
@endsection
