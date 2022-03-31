@extends('index')
@section('body')
    <!-- Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
           id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
               aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{route('student')}}">
                <img src="{{asset('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <h6 style="display: inline-flex" class="ms-1 font-weight-bold text-white">Öğretmen Paneli</h6>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div style="height: 450px" class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{route('teacher')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Anasayfa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('teacher/projects')}}">
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
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
             navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                                               href="javascript:;">Teacher</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Panel</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('logout')}}" class="nav-link text-body font-weight-bold px-0">

                                <span class="btn d-sm-inline d-none btn-outline-primary btn-sm"><i
                                            style="font-size: 12px" class="fas fa-power-off"></i>&nbsp;Çıkış</span>
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
                <div class="col-lg-8 col-md-12 mb-md-0 mb-4">
                    <!-- proje bilgileri -->
                    <div class="card mt-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-project-diagram fa-lg"></i>&nbsp;
                                    Proje Bilgileri
                                    <div class="dropdown float-lg-end float-md-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-1 py-4 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu1</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <h5 style="margin: auto;"
                            class="font-weight-bolder text-center mt-3 mb-0 pb-2">{{$projectIdea['project_title']}}</h5>
                        <div style="flex-wrap: nowrap" class="row ">
                            <div class="col-lg-6 col-md-12 mb-md-0 mb-4 d-flex justify-content-center ">
                                <span class="d-flex">&nbsp;&nbsp;
                                    <span class="{{spanClass($projectIdea['status_no'])}}">
                                        <i class="{{iconClass($projectIdea['status_no'])}}"></i>&nbsp;&nbsp;
                                        {{statuDescription($projectIdea['status_no'])}}
                                    </span>
                                </span>
                            </div>
                            <div class="col-lg-6 col-md-12 d-flex ms-7 align-items-center">
                                <span class="text-dark mt-1 d-flex flex-column"><i
                                            class="fas fa-calendar-alt"></i></span>
                                <span class="mt-2 d-flex flex-column text-xs">&nbsp;&nbsp;{{tarihFormat( $projectIdea['date_stamp'])}}</span>
                            </div>
                        </div>
                        <!-- border bottom -->
                        <div class="card-header pb-0" style="margin-top:10px;border-top:1px solid #f0f2f5;"></div>
                        <!-- end border bottom -->
                        <div class="card-body pt-0 p-4">
                            <ul class="list-group">
                                <li style="justify-content: space-around!important;"
                                    class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <span class="mb-3 text-xs">Proje Açıklaması: <span
                                                    class="text-dark ms-sm-2 font-weight-bold">{{$projectIdea['project_description']}}</span></span>
                                        <span class="mb-3 text-xs">Proje Materyalleri ve Araştırma Olanakları: <span
                                                    class="text-dark ms-sm-2 font-weight-bold">{{$projectIdea['research_description']}}</span></span>
                                        <span class="text-xs">Anahtar Kelimeler:</span>
                                        <span class="text-xs font-weight-bold">
                                                <span style="font-size: 10px;"
                                                      class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword1']}}</span>
                                                <span style="font-size: 10px;"
                                                      class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword2']}}</span>
                                                <span style="font-size: 10px;"
                                                      class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword3']}}</span>
                                                <span style="font-size: 10px;"
                                                      class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword4']}}</span>
                                                <span style="font-size: 10px;"
                                                      class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword5']}}</span>
                                            </span>
                                    </div>
                                </li>
                            </ul>
                            @if($projectIdea['status_no'] == "20" || $projectIdea['status_no'] == "22")
                                <form action="{{route('teacher/download')}}">
                                    <div style="justify-content: space-evenly!important; display: flex; width: 100%;"
                                         class="mt-4">
                                        <button value="rdoc1-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-info btn-sm"><i
                                                    style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                        </button>
                                        <button value="rdoc2-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-info btn-sm"><i
                                                    style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                        </button>
                                        <button value="rdoc3-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-info btn-sm"><i
                                                    style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                        </button>
                                        <button value="rpdf1-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-primary btn-sm">
                                            <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                        <button value="rpdf2-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-primary btn-sm">
                                            <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                        <button value="rpdf3-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-primary btn-sm">
                                            <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                    </div>
                                </form>
                            @elseif($projectIdea['status_no'] == "30" || $projectIdea['status_no'] == "32")
                                <form action="{{route('teacher/download')}}">
                                    <div style="justify-content: space-evenly!important; display: flex; width: 100%;"
                                         class="mt-4">
                                        <button value="tdoc1-{{isset($projectThesis['project_thesis_id']) ? $projectThesis['project_thesis_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-info btn-sm"><i
                                                    style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                        </button>
                                        <button value="tpdf1-{{isset($projectThesis['project_thesis_id']) ? $projectThesis['project_thesis_id'] : false}}"
                                                name="action" type="submit" class="flex btn btn-outline-primary btn-sm">
                                            <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                    </div>
                                </form>
                            @endif
                        </div>

                    </div>
                    <!-- proje bilgileri -->
                </div>
                <!-- işlemler -->
                <div class="col-lg-4 col-md-12 mb-md-0 mb-4">
                    <div class="card mt-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-ballot-check fa-lg"></i>&nbsp;
                                    İşlemler
                                    <div class="dropdown float-lg-end float-md-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-1 py-4 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu1</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <!-- border bottom -->
                        <div class="card-header pb-0" style="margin-top:10px;border-top:1px solid #f0f2f5;"></div>
                        <!-- end border bottom -->
                        @if($projectIdea['status_no'] != "10" && $projectIdea['status_no'] != "11" && $projectIdea['status_no'] != "20" && $projectIdea['status_no'] != "21" && $projectIdea['status_no'] != "30" && $projectIdea['status_no'] != "31")
                            <div class="card-body px-0 pb-2 mt-n5">
                                <form enctype="multipart/form-data" action="{{route('teacher/project/process')}}"
                                      method="post">
                                    @csrf
                                    <div class="d-flex flex-column align-items-center mt-3">
                                        <input name="status_no" value="{{$projectIdea['status_no']}}" type="hidden">
                                        <input name="durum" value="kabul" type="hidden">
                                        <input name="project_idea_id" value="{{$projectIdea['project_idea_id']}}"
                                               type="hidden">
                                        <button type="submit" class="btn btn-outline-success btn-md">Kabul Et</button>
                                    </div>
                                </form>
                                <form enctype="multipart/form-data" action="{{route('teacher/project/process')}}"
                                      method="post">
                                    @csrf
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="input-group input-group-outline mt-2 w-75">
                                            <label class="form-label">Reddetme nedeni</label>
                                            <input name="not" type="text" class="form-control">
                                        </div>
                                        <input name="durum" value="ret" type="hidden">
                                        <input name="project_idea_id" value="{{$projectIdea['project_idea_id']}}"
                                               type="hidden">
                                        <input name="status_no" type="hidden" value="{{$projectIdea['status_no']}}">
                                        <button type="submit" class="btn btn-outline-danger btn-md mt-3">Reddet</button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="card-body px-0 pb-2 mt-n5">
                                <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">
                                    <br> İşlem Yapılamaz</h5>
                            </div>
                    </div>
                @endif
                <!-- Geçmiş Gönderimler -->
                    <div class="card mt-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-history fa-lg"></i>&nbsp;
                                    Geçmiş
                                    <div class="dropdown float-lg-end float-md-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-1 py-4 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu1</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">menu2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="card-body p-3 ">
                            <div class="timeline timeline-one-side">

                                @if(isset($allReports) && isset($allThesis))
                                    <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">
                                        Rapor Geçmişi</h5>
                                    @foreach($allReports as $item)
                                        <div class="timeline-block mb-3">
                                          <span class="timeline-step">
                                            <i class="fas {{iconDot($item['status_no'])}} fa-dot-circle"></i>
                                          </span>
                                            <div class="timeline-content mb-n5">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{tarihFormat($item['date_stamp'])}}</h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                <span class="{{spanClass($item['status_no'])}}">
                                                    <i class="{{iconClass($item['status_no'])}}"></i>&nbsp;&nbsp;
                                                    {{statuDescription($item['status_no'])}}
                                                </span>
                                                </p>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                @if($projectIdea['status_no'] == "20" || $projectIdea['status_no'] == "22")
                                                    <form action="{{route('teacher/download')}}">
                                                        <div style="justify-content: space-evenly!important; display: flex; width: 100%;" class="mt-0">
                                                            <button style="border: none!important;" value="rdoc1-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                                    name="action" type="submit" class="p-0 flex btn btn-outline-info btn-sm"><i
                                                                        style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                                            </button>
                                                            <button style="border: none!important;" value="rdoc2-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                                    name="action" type="submit" class="p-0 flex btn btn-outline-info btn-sm"><i
                                                                        style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                                            </button>
                                                            <button style="border: none!important;" value="rdoc3-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                                    name="action" type="submit" class="p-0 flex btn btn-outline-info btn-sm"><i
                                                                        style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                                            </button>
                                                            <button style="border: none!important;" value="rpdf1-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                                    name="action" type="submit" class="p-0 flex btn btn-outline-primary btn-sm">
                                                                <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                                            <button style="border: none!important;" value="rpdf2-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                                    name="action" type="submit" class="p-0 flex btn btn-outline-primary btn-sm">
                                                                <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                                            <button style="border: none!important;" value="rpdf3-{{isset($projectReport['project_report_id']) ? $projectReport['project_report_id'] : false}}"
                                                                    name="action" type="submit" class="p-0 flex btn btn-outline-primary btn-sm">
                                                                <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                                        </div>
                                                    </form>
                                                @elseif($projectIdea['status_no'] == "30" || $projectIdea['status_no'] == "32")
                                                    <form action="{{route('teacher/download')}}">
                                                        <div style="justify-content: space-evenly!important; display: flex; width: 100%;"
                                                             class="mt-4">
                                                            <button value="tdoc1-{{isset($projectThesis['project_thesis_id']) ? $projectThesis['project_thesis_id'] : false}}"
                                                                    name="action" type="submit" class="flex btn btn-outline-info btn-sm"><i
                                                                        style="font-size: 22px!important;" class="fas fa-file-word"></i>
                                                            </button>
                                                            <button value="tpdf1-{{isset($projectThesis['project_thesis_id']) ? $projectThesis['project_thesis_id'] : false}}"
                                                                    name="action" type="submit" class="flex btn btn-outline-primary btn-sm">
                                                                <i style="font-size: 22px!important;" class="fas fa-file-pdf"></i></button>
                                                        </div>
                                                    </form>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">Tez
                                        Geçmişi</h5>
                                    @foreach($allThesis as $item)
                                        <div class="timeline-block ">
                                          <span class="timeline-step">
                                            <i class="fas {{iconDot($item['status_no'])}} fa-dot-circle"></i>
                                          </span>
                                            <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{tarihFormat($item['date_stamp'])}}</h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                <span class="{{spanClass($item['status_no'])}}">
                                                    <i class="{{iconClass($item['status_no'])}}"></i>&nbsp;&nbsp;
                                                    {{statuDescription($item['status_no'])}}
                                                </span>
                                                </p>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">

                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">
                                        Geçmiş Yok</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Geçmiş Gönderimler -->
                </div>
                <!-- işlemler -->
            </div>
            <!-- Footer -->
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                ,
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
