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
                <a class="nav-link text-white active bg-gradient-primary" href="{{route('student')}}">
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
                <a class="nav-link text-white" href="{{route('student/profile')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profilim</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Student</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Panel </h6>
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
            <div class="col-xl-3 col-sm-12 mb-xl-0 mb-4">
                <form action="{{route('student')}}" method="get">
                    <div id="card-hover" class="card mt-2">
                        <div style="border-radius: 15px" class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-hourglass-half"></i>
                            </div>
                            <div class="text-end pt-1">
                                <input name="state" type="hidden" value="continues">
                                <h4 class="mb-0"><button type="submit" class="btn btn-outline-warning m-0">Devam Eden</button></h4>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{route('student')}}" method="get">
                    <div id="card-hoverr" class="card mt-4">
                        <div style="border-radius: 15px" class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="text-end pt-1">
                                <input name="state" type="hidden" value="reject">
                                <h4 class="mb-0"><button type="submit" class="btn btn-outline-danger m-0">Reddedilen</button></h4>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{route('student')}}" method="get">
                    <div id="card-hoverrr" class="card mt-4">
                        <div style="border-radius: 15px" class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="text-end pt-1">
                                <input name="state" type="hidden" value="success">
                                <h4 class="mb-0"><button type="submit" class="btn btn-outline-success m-0">Tamamlanan</button></h4>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 col-md-12 mb-md-0 mb-4">
                <div class="card mt-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize ps-5"><i class="fas fa-project-diagram fa-lg"></i>&nbsp; Projelerim
                                <div class="dropdown float-lg-end float-md-end pe-4">
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
                        <div class="table-responsive">
                            <table class="table align-items-center p-3 mb-4">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Başlık</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Son İşlem</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Durum</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($state == "success")
                                        @foreach($projectIdeaSuccess as $item)
                                        @php
                                            $projectStatu = \App\Models\Project_Status::where('status_no',$item['status_no'])->first();
                                        @endphp
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">{{$item['project_title']}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">{{tarihFormat($item['date_stamp'])}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="{{spanClass($item['status_no'])}}">
                                                    <i class="{{iconClass($item['status_no'])}}"></i>&nbsp;&nbsp;
                                                    {{statuDescription($item['status_no'])}}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">
                                                    <form action="student/project" method="get">
                                                        <input name="project_idea_id" type="hidden" value="{{$item['project_idea_id']}}">
                                                        <button type="submit" class="btn btn-info btn-sm m-0">
                                                            Görüntüle
                                                        </button>
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    @if($state == "reject")
                                        @foreach($projectIdeaReject as $item)
                                            @php
                                                $projectStatu = \App\Models\Project_Status::where('status_no',$item['status_no'])->first();
                                            @endphp
                                            <tr>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">{{$item['project_title']}}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">{{tarihFormat($item['date_stamp'])}}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="{{spanClass($item['status_no'])}}">
                                                        <i class="{{iconClass($item['status_no'])}}"></i>&nbsp;&nbsp;
                                                        {{statuDescription($item['status_no'])}}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">
                                                        <form action="student/project" method="get">
                                                            <input name="project_idea_id" type="hidden" value="{{$item['project_idea_id']}}">
                                                            <button type="submit" class="btn btn-info btn-sm m-0">
                                                                Görüntüle
                                                            </button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if($state == "continues")
                                        @foreach($projectIdeaContinues as $item)
                                            @php
                                                $projectStatu = \App\Models\Project_Status::where('status_no',$item['status_no'])->first();
                                            @endphp
                                                <tr>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold">{{$item['project_title']}}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold">{{tarihFormat($item['date_stamp'])}}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="{{spanClass($item['status_no'])}}">
                                                            <i class="{{iconClass($item['status_no'])}}"></i>&nbsp;&nbsp;
                                                            {{statuDescription($item['status_no'])}}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold">
                                                            <form action="student/project" method="get">
                                                                <input name="project_idea_id" type="hidden" value="{{$item['project_idea_id']}}">
                                                                <button type="submit" class="btn btn-info btn-sm m-0">
                                                                    Görüntüle
                                                                </button>
                                                            </form>
                                                        </span>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

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
