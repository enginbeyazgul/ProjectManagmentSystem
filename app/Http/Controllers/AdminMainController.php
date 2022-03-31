<?php

namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\Student;
use App\Models\SysAdmin;
use App\Models\User;
use App\Models\Teacher;


use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Session;


class AdminMainController extends Controller
{
    public function adminMain(){
        $data['title'] = "Anasayfa";
        $data['student'] = Student::get();
        $data['teachers'] = Teacher::get();
        return view('admin.main',$data);
    }
    public function ogretmenEkle(){
        $data['title'] = "Öğretmen Ekle";
        $data['department'] = Department::get();
        return view('admin.addteacher',$data);
    }
    public function ogretmenEkleKaydet(Request $request){
        $no = $request->tNo;
        $name = $request->tName;
        $tmail = $request->tMail;
        $surname = $request->tSurname;
        $title = $request->tTitle;
        $password = $request->tNo."_".$request->tName;
        $department = $request->tDepartment;

        $userCreate=User::create([
            'user_group_id'=>2,
            'email'=>$tmail,
            'password'=>md5($password),
        ]);
        //User oluşturulduysa
        if ($userCreate){
            $id = User::where("email",$tmail)->first();
            $teacherCreate = Teacher::create([
                'teacher_no' => $no,
                'user_id'=>$id['user_id'],
                'department_id'=>$department,
                'name'=>$name,
                'surname'=>$surname,
                'title'=>$title,
            ]);
            if ($teacherCreate){
                //mail gönderme öğretmen
                $array = [
                    'name'=>'Sayın '.$request->tName.' ',
                    'surname'=>$request->tSurname. ' ',
                    'email'=>'Sisteme giriş için E-postanız : '.$request->tMail.' ',
                    'password'=>'Şifreniz : '.$password. ' ',
                    'mesaj'=>" Sisteme giriş bilgileriniz bu şekildedir."
                ];
                mail::send('admin.mailcontrol', $array, function ($message) use ($tmail) {
                    $message->subject("Sisteme Giriş Bilgileri");
                    $message->to($tmail);
                });

                return redirect('admin/addteacher')->withErrors(['msg' => 'Danışman öğretmen sisteme eklendi.','alert'=>'alert-success']);



            }

        }
        else{return redirect('admin/addteacher')->withErrors(['msg' => 'Danışman öğretmen eklenirken hata oluştu.','alert'=>'alert-danger']);}
    }
    public function ogrenciEkle(){
        $data['title'] = "Öğrenci Ekle";
        $data['department'] = Department::get();
        $data['teacher'] = Teacher::get();
        $data['faculty'] = Faculty::get();
        return view('admin.addstudent',$data);
    }
    public function ogrenciEkleKaydet(Request $request){
        $no = $request->sNo;
        $name = $request->sName;
        $sMail = $request->sMail;
        $surname = $request->sSurname;
        $phone = $request->sTelNo;
        $teacherNo = $request->sTeacherNo;
        $password = $request->sNo."_".$request->sName;
        $class = $request->sClass;
        $faculty = $request->sFaculty;
        $department = $request->sDepartment;
        if(isset($_FILES["sImage"])) {
            $hata = $_FILES["sImage"]["error"];
            if ($hata != 0) {
                return redirect('admin/addstudent')->withErrors(['msg' => 'Resim yüklenirken hata oluştu.','alert'=>'alert-danger']);
            } else {
                $boyut = $_FILES["sImage"]["size"];
                if ($boyut > (1024 * 1024 * 3)) {
                    return redirect('admin/addstudent')->withErrors(['msg' => "Resim 3Mb'dan büyük olamaz.",'alert'=>'alert-danger']);
                } else {
                    $isim = $_FILES["sImage"]["name"];
                    $dosya = $_FILES["sImage"]["tmp_name"];
                    @copy($dosya, "img/profiles/" . $_FILES["sImage"]["name"]);
                    $resim_url = "img/profiles/".$isim ;
                    $userCreate=User::create([
                        'user_group_id'=>3,
                        'email'=>$sMail,
                        'password'=>md5($password),
                    ]);
                    $count = count(Student::where('teacher_no',$teacherNo)->get());
                    if ($userCreate){       //User oluşturulduysa
                        if ($count <= 10){      //Öğretmen 10 dan az kişiye atandıysa
                            $id = User::where("email",$sMail)->first();
                            $studentCreate = Student::create([
                                'student_no' => $no,
                                'name'=>$name,
                                'surname'=>$surname,
                                'class'=>$class,
                                'phone'=>$phone,
                                'user_id'=>$id['user_id'],
                                'teacher_no'=>$teacherNo,
                                'department_id'=>$department,
                                'faculty_id'=>$faculty,
                                'student_picture_path'=>$resim_url,
                            ]);
                        }
                        else{return redirect('admin/addstudent')->withErrors(['msg' => 'Bir danışman en fazla 10 öğrenci alabilir.','alert'=>'alert-danger']);}
                        if ($studentCreate){
                            //mail gönderme öğrenci
                            $array = [
                                'name'=>'Sayın '.$request->sName.' ',
                                'surname'=>$request->sSurname. ' ',
                                'email'=>'Sisteme giriş için E-postanız : '.$request->sMail.' ',
                                'password'=>'Şifreniz : '.$password. ' ',
                                'mesaj'=>" Sisteme giriş bilgileriniz bu şekildedir. Öğrencilik hayatınızda başarılar dileriz."
                            ];
                            mail::send('admin.mailcontrol', $array, function ($message) use ($sMail) {
                                $message->subject("Sisteme Giriş Bilgileri");
                                $message->to($sMail);
                            });



                            return redirect('admin/addstudent')->withErrors(['msg' => 'Öğrenci sisteme eklendi.','alert'=>'alert-success']);
                        }

                    }
                }
            }
        }
        else{return redirect('admin/addstudent')->withErrors(['msg' => 'Bir hata oluştu.','alert'=>'alert-danger']);}
    }
    public function donem(){
        $data['title'] = "Dönemler";
        $data['semester'] = Semester::get();
        return view('admin.semester',$data);
    }
    public function donemIslem(Request $request){
        $user = User::where('email',Session::get('aMail'))->first();
        $admin = SysAdmin::where('user_id',$user['user_id'])->first();
        switch ($request->input('action')) {
            case 'donemEkle':
                $semesterName = $request->semesterName;
                $semesterCreate = Semester::create([
                    'system_admin_id' => $admin['system_admin_id'],
                    'semester_name' => $semesterName,
                    'is_active' => "disable",
                ]);
                if($semesterCreate){
                    return redirect('admin/semester')->withErrors(['msg' => 'Yeni dönem başarılı şekilde oluştu.','alert'=>'alert-success']);
                }
                else{return redirect('admin/semester')->withErrors(['msg' => 'Yeni dönem oluşturulurken hata oluştu.','alert'=>'alert-danger']);}
                break;
            case 'donemSec':
                $semesterSelect = $request->semesterSelect;
                $allSemesterDisable = Semester::where('is_active','enable')->update(['is_active' => "disable"]);
                $semesterEnable = Semester::where('semester_id',$semesterSelect)->update(['is_active' => "enable"]);
                if($semesterEnable && $allSemesterDisable){
                    return redirect('admin/semester')->withErrors(['msg' => 'Dönem aktifleştirildi.','alert'=>'alert-success']);
                }
                else{return redirect('admin/semester')->withErrors(['msg' => 'Dönem aktifleştirilirken hata oluştu.','alert'=>'alert-danger']);}
                break;
        }
    }
    public function userGoruntule(Request $request){
        $data['title'] = "Kullanıcı Profili";
        $userId = $request->id;
        $userGroupId = $request->userGroupId;
        $data['userId'] = $userId;
        $data['userGroupId'] = $userGroupId;
        $data['user'] = User::where("user_id",$userId)->first();
        $data['teacher'] = Teacher::where("user_id",$userId)->first();
        $data['student'] = Student::where("user_id",$userId)->first();
        if($userGroupId == 3){
            $data['department'] = Department::where("department_id",$data['student']['department_id'])->first();
            $data['advisor'] = Teacher::where("teacher_no",$data['student']['teacher_no'])->first();
            $data['faculty'] = Faculty::where("faculty_id",$data['department']['faculty_id'])->first();
        }
        else if($userGroupId == 2){
            $data['department'] = Department::where("department_id",$data['teacher']['department_id'])->first();
            $data['faculty'] = Faculty::where("faculty_id",$data['department']['faculty_id'])->first();
            $data['students'] = Student::where("teacher_no",$data['teacher']['teacher_no'])->get();
        }
        return view('admin.user',$data);
    }
    public function deneme(Request $request){
        if($request->all()){
            // $d = json_encode($request->Data, JSON_PRETTY_PRINT);
            // echo json_decode($request->Data, JSON_PRETTY_PRINT);
            echo gettype($request->all());
            echo ' - ';
            var_dump($request->all());
        }
        else{echo 'posta yok';}
    }
}
