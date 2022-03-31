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
            <div class="row">
                <div class="col-lg-{{$project['status_no'] == "21" || $statu['status_no'] == "30" || $project['status_no'] == "11" || $project['status_no'] == "20" ? "7" : "12"}} col-md-12 mb-md-0 mb-4">
                    <div class="card mt-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-project-diagram fa-lg"></i>&nbsp; Proje Bilgileri
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
                        <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">{{$project['project_title']}}</h5>
                        <div style="flex-wrap: nowrap" class="row ">
                            <div class="col-lg-4 col-md-12 mb-md-0 mb-4 d-flex justify-content-center px-4 ">
                                <span class="d-flex">&nbsp;&nbsp;
                                    <span class="{{spanClass($project['status_no'])}}">
                                        <i class="{{iconClass($project['status_no'])}}"></i>&nbsp;&nbsp;
                                        {{statuDescription($project['status_no'])}}
                                    </span>
                                </span>
                            </div>
                            <div  class="col-lg-4 col-md-12 d-flex ms-10 align-items-center">
                                <span class="text-dark mt-1 d-flex flex-column"><i class="fas fa-calendar-alt"></i></span>
                                <span class="mt-2 d-flex flex-column text-xs">&nbsp;&nbsp;{{tarihFormat($project['date_stamp'])}}</span>
                            </div>
                            <div class="col-lg-4 col-md-12 d-flex flex-column align-items-center ms-n8 justify-content-center text-dark">
                                <i class="{{gorulduClass($project['status_no'])}} {{gorulduColor($project['status_no'])}}" title="{{gorulduTitle($project['status_no'])}}"></i>
{{--                                <i class="fas fa-check-double" title="Görüntülendi"></i>--}}
                            </div>
                        </div>
                        <!-- border bottom -->
                        <div class="card-header pb-0" style="margin-top:10px;border-top:1px solid #f0f2f5;"></div>
                        <!-- end border bottom -->
                        @if($project['status_no'] == 10)
                            <div style="width: 350px;text-align: center;align-self: center;" class="alert alert-warning alert-dismissible text-white" role="alert">
                                <span class="text-sm"><i class="fas fa-exclamation-circle"></i>
                                    &nbsp;&nbsp;<strong>Danışmandan Not: </strong>{{$project['rejection_note']}}
                                </span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif($project['status_no'] == 20)
                            <div style="width: 350px;text-align: center;align-self: center;" class="alert alert-warning alert-dismissible text-white" role="alert">
                                <span class="text-sm"><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;
                                    <strong>Danışmandan Not: </strong>{{$project['rejection_note']}}
                                </span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif($project['status_no'] == 30)
                            <div style="width: 350px;text-align: center;align-self: center;" class="alert alert-warning alert-dismissible text-white" role="alert">
                                <span class="text-sm"><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;
                                    <strong>Danışmandan Not: </strong>{{$project['rejection_note']}}
                                </span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body pt-0 p-4">
                            <ul class="list-group">
                                <li style="justify-content: space-around!important;" class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <span class="mb-3 text-xs">Proje Açıklaması: <span class="text-dark ms-sm-2 font-weight-bold">{{$project['project_description']}}</span></span>
                                        <span class="mb-3 text-xs">Proje Materyalleri ve Araştırma Olanakları: <span class="text-dark ms-sm-2 font-weight-bold">{{$project['research_description']}}</span></span>
                                        <span class="text-xs">Anahtar Kelimeler:</span>
                                        <span class="text-xs font-weight-bold">
                                            <span style="font-size: 10px;" class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword1']}}</span>
                                            <span style="font-size: 10px;" class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword2']}}</span>
                                            <span style="font-size: 10px;" class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword3']}}</span>
                                            <span style="font-size: 10px;" class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword4']}}</span>
                                            <span style="font-size: 10px;" class="btn disabled btn-outline-secondary btn-sm m-1 py-1 px-1">{{$keywords['keyword5']}}</span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Rapor yükleme ekranı --}}
                @if($project['status_no'] == "11" || $project['status_no'] == "20")
                <div class="col-lg-5 col-md-12 mb-md-0 mb-4">
                    <div class="card mt-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-file fa-lg"></i>&nbsp; Dosya İşlemleri
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
                        <div class="card-body px-0 pb-2 mt-n5">
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" action="{{route('student/project')}}" method="post">
                                    @csrf
                                    <input name="project_idea_id" value="{{$project['project_idea_id']}}" type="hidden">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex ms-2">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <h6 class="mb-0 text-sm">Rapor-1</h6>
                                                            <p style="font-size: 10px;"><strong>*Lütfen birinci raporun ".doc" halini seçin.</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex ms-2">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <h6 class="mb-0 text-sm">Rapor-1</h6>
                                                            <p style="font-size: 10px;"><strong>*Lütfen birinci raporun ".pdf" halini seçin.</strong></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-style:hidden!important; border-bottom: 1px solid #EFF1F4!important;" >
                                                    <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-n3">
                                                        <input  name="rdoc1" type="file" class="form-control">
                                                    </div>
                                                    <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-3">
                                                        <input  name="rpdf1" type="file" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex ms-2">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <h6 class="mb-0 text-sm">Rapor-2</h6>
                                                            <p style="font-size: 10px;"><strong>*Lütfen ikinci raporun ".doc" halini seçin.</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex ms-2">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <h6 class="mb-0 text-sm">Rapor-2</h6>
                                                            <p style="font-size: 10px;"><strong>*Lütfen ikinci raporun ".pdf" halini seçin.</strong></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-style:hidden!important; border-bottom: 1px solid #EFF1F4!important;" >
                                                    <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-n3">
                                                        <input  name="rdoc2" type="file" class="form-control">
                                                    </div>
                                                    <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-3">
                                                        <input  name="rpdf2" type="file" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex ms-2">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <h6 class="mb-0 text-sm">Rapor-3</h6>
                                                            <p style="font-size: 10px;"><strong>*Lütfen üçüncü raporun ".doc" halini seçin.</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex ms-2">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <h6 class="mb-0 text-sm">Rapor-3</h6>
                                                            <p style="font-size: 10px;"><strong>*Lütfen üçüncü raporun ".pdf" halini seçin.</strong></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="border-style:hidden!important; border-bottom: 1px solid #EFF1F4!important;" >
                                                    <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-n3">
                                                        <input  name="rdoc3" type="file" class="form-control">
                                                    </div>
                                                    <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-3">
                                                        <input  name="rpdf3" type="file" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="d-flex px-4 justify-content-center">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <button type="submit" class="btn btn-info btn-sm m-0">
                                                                Gönder
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
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
                                    <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">Tez
                                        Geçmişi</h5>
                                    @foreach($allThesis as $item)
                                        <div class="timeline-block mb-3">
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
                {{-- Tez yükleme ekranı --}}
                @elseif($project['status_no'] == "21" || $statu['status_no'] == "30")
                <div class="col-lg-5 col-md-12 mb-md-0 mb-4">
                        <div class="card mt-2">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                        <h5 class="text-white text-capitalize ps-5"><i class="fas fa-file fa-lg"></i>&nbsp; Dosya İşlemleri
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
                                <div class="card-body px-0 pb-2 mt-n5">
                                    <div class="table-responsive">
                                        <form enctype="multipart/form-data" action="{{route('student/project')}}" method="post">
                                            @csrf
                                            <input name="project_idea_id" value="{{$project['project_idea_id']}}" type="hidden">
                                            <table class="table align-items-center mb-0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex ms-2">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <h6 class="mb-0 text-sm">Tez</h6>
                                                                <p style="font-size: 10px;"><strong>*Lütfen tezinizin ".doc" halini seçin.</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex ms-2">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <h6 class="mb-0 text-sm">Tez</h6>
                                                                <p style="font-size: 10px;"><strong>*Lütfen tezinizin ".pdf" halini seçin.</strong></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border-style:hidden!important; border-bottom: 1px solid #EFF1F4!important;" >
                                                        <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-n3">
                                                            <input  name="tdoc1" type="file" class="form-control">
                                                        </div>
                                                        <div style="width: 180px; margin: auto" class="input-group input-group-outline mt-3">
                                                            <input  name="tpdf1" type="file" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="d-flex px-4 justify-content-center">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <button type="submit" class="btn btn-info btn-sm m-0">
                                                                    Gönder
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                    <h5 style="margin: auto;" class="font-weight-bolder text-center mt-3 mb-0 pb-2">Tez
                                        Geçmişi</h5>
                                    @foreach($allThesis as $item)
                                        <div class="timeline-block mb-3">
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
                @endif
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
