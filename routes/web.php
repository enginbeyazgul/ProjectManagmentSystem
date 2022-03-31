<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/deneme', [\App\Http\Controllers\AdminMainController::class, 'deneme'])->name('deneme');

Route::prefix('admin')->middleware('admincontrol')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminMainController::class, 'adminMain'])->name('admin');
    Route::get('/addteacher', [\App\Http\Controllers\AdminMainController::class, 'ogretmenEkle'])->name('admin/addteacher');
    Route::get('/addstudent', [\App\Http\Controllers\AdminMainController::class, 'ogrenciEkle'])->name('admin/addstudent');
    Route::get('/semester', [\App\Http\Controllers\AdminMainController::class, 'donem'])->name('admin/semester');
    Route::get('/user', [\App\Http\Controllers\AdminMainController::class, 'userGoruntule'])->name('admin/user');
    Route::post('/addteacher', [\App\Http\Controllers\AdminMainController::class, 'ogretmenEkleKaydet'])->name('admin/addteacher');
    Route::post('/addstudent', [\App\Http\Controllers\AdminMainController::class, 'ogrenciEkleKaydet'])->name('admin/addstudent');
    Route::post('/semester', [\App\Http\Controllers\AdminMainController::class, 'donemIslem'])->name('admin/semester');
});

Route::prefix('teacher')->middleware('teachercontrol')->group(function () {
    Route::get('/', [\App\Http\Controllers\TeacherMainController::class, 'teacherMain'])->name('teacher');
    Route::get('/projects', [\App\Http\Controllers\TeacherMainController::class, 'projeler'])->name('teacher/projects');
    Route::get('/project', [\App\Http\Controllers\TeacherMainController::class, 'projeGoruntule'])->name('teacher/project');
    Route::get('/profile', [\App\Http\Controllers\TeacherMainController::class, 'profil'])->name('teacher/profile');
    Route::get('/user', [\App\Http\Controllers\TeacherMainController::class, 'userGoruntule'])->name('teacher/user');
    Route::get('/download', [\App\Http\Controllers\TeacherMainController::class, 'indir'])->name('teacher/download');
    Route::post('/project/process', [\App\Http\Controllers\TeacherMainController::class, 'islem'])->name('teacher/project/process');

});


Route::prefix('student')->middleware('studentcontrol')->group(function () {
    Route::get('/', [\App\Http\Controllers\StudentMainController::class, 'studentMain'])->name('student');
    Route::get('/addproject', [\App\Http\Controllers\StudentMainController::class, 'projeEkle'])->name('student/addproject');
    Route::get('/profile', [\App\Http\Controllers\StudentMainController::class, 'profil'])->name('student/profile');
    Route::get('/project', [\App\Http\Controllers\StudentMainController::class, 'proje'])->name('student/project');
    Route::post('/addproject', [\App\Http\Controllers\StudentMainController::class, 'projeEkleKaydet'])->name('student/addproject');
    Route::post('/project', [\App\Http\Controllers\StudentMainController::class, 'dosyaIslem'])->name('student/project');
});

Route::get('/logout', [\App\Http\Controllers\LogoutAll::class,'logoutAll'])->name('logout');
Route::post('/logincontrol', [\App\Http\Controllers\LoginController::class,'loginControl'])->name('logincontrol');
