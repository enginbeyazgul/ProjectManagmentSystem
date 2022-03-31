@extends('index')
@section('body')
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{route('admin')}}">
                <img src="{{asset('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <h6 style="display: inline-flex" class="ms-1 font-weight-bold text-white">Admin Paneli</h6>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div style="height: 450px" class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('admin')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Anasayfa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  " href="{{route('admin/addteacher')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <span class="nav-link-text ms-1">Öğretmen Ekle</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary " href="{{route('admin/addstudent')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <span class="nav-link-text ms-1">Öğrenci Ekle</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('admin/semester')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dönemler</span>
                    </a>
                </li>
            </ul>
        </div>
        {{--        <div class="sidenav-footer position-absolute w-100 bottom-0 ">--}}
        {{--            <div class="mx-3">--}}
        {{--                <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Öğrenci Ekle</li>
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
                                <h5 class="text-white text-capitalize ps-5"><i class="fas fa-user-plus fa-lg"></i>&nbsp; Öğrenci Ekle
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
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
                                <span class="text-sm"><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;{{$errors->first()}} {{$errors->first('test')}}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" action="{{route('admin/addstudent')}}" method="post">
                                    @csrf
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                        <input name="userGroupId" type="hidden" class="form-control" value="3" >
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Öğrenci No:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen öğrenci numarası giriniz.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label">Öğrenci Numarası.</label>
                                                    <input name="sNo" type="text" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Ad:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen bir ad giriniz.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label">Ad.</label>
                                                    <input name="sName" type="text" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">E-Mail:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen bir mail adresi giriniz.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label">Mail Adresi.</label>
                                                    <input name="sMail" type="email" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Soyad:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen bir soyad giriniz.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label">Soyad.</label>
                                                    <input name="sSurname" type="text" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
{{--                                            <td>--}}
{{--                                                <div class="d-flex px-2 py-1">--}}
{{--                                                    <div class="d-flex flex-column justify-content-center">--}}
{{--                                                        <h6 class="mb-0 text-sm">Şifre:</h6>--}}
{{--                                                        <p style="font-size: 10px;"><strong>*Lütfen bir şifre belirleyiniz.</strong></p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td colspan="3">--}}
{{--                                                <div class="input-group input-group-outline">--}}
{{--                                                    <label class="form-label">Şifre.</label>--}}
{{--                                                    <input name="sPassword" type="text" class="form-control">--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Bölüm:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen bir bölüm seçin.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <select id="department" class="form-control" name="sDepartment">
                                                        <option disabled selected value> -- Bölüm -- </option>
                                                        @foreach($department as $item)
                                                            <option value="{{$item['department_id']}}">{{$item['department_name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Fakülte:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen bir fakülte seçin.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <select id="fakulte" class="form-control" name="sFaculty">
                                                        <option disabled selected value> -- Fakülte -- </option>
                                                        @foreach($faculty as $item)
                                                            <option value="{{$item['faculty_id']}}">{{$item['faculty_name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script>
                                                    let select = document.querySelector('#fakulte');
                                                    select.addEventListener('change', function () {
                                                        console.log(this.value);
                                                    });
                                                </script>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Sınıf:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen sınıf giriniz.(örnek:"3. Sınıf")</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label">Sınıf.</label>
                                                    <input name="sClass" type="text" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Tel No:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen Telefon No Giriniz(+90*** *** ****)</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label">Tel No.</label>
                                                    <input name="sTelNo" type="text" class="form-control">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Resim:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen bir resim yükleyiniz.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <input name="sImage" type="file" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Danışman öğretmen:</h6>
                                                        <p style="font-size: 10px;"><strong>*Lütfen danışman öğretmeni seçin.</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="input-group input-group-outline">
                                                    <select id="sTeacherNo" class="form-control" name="sTeacherNo">
                                                        <option disabled selected value> -- Danışman öğretmen -- </option>
                                                        @foreach($teacher as $item)
                                                            <option value="{{$item['teacher_no']}}">{{$item['name']." ".$item['surname']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" style="
                      text-align: center;">
                                                <input class="btn bg-gradient-dark mb-0" type="submit" value="Öğrenci Ekle">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
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
