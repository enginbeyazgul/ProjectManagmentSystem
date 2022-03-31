<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Project_Idea;
use App\Models\Project_Keyword;
use App\Models\Project_Report;
use App\Models\Project_Status;
use App\Models\Project_Thesis;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentMainController extends Controller
{
    public function studentMain(Request $request){
        $data['title'] = "Anasayfa";
        $data['user'] = User::where("email",Session::get('sMail'))->first();
        $data['student'] = Student::where("user_id",$data['user']['user_id'])->first();
        $data['projectIdeaSuccess'] = Project_Idea::where("student_no",'=',$data['student']['student_no'])
            ->where(function($query) {
                return $query
                    ->orWhere('status_no','1')
                    ->orWhere('status_no', "31");
            })->get();
        $data['projectIdeaReject'] = Project_Idea::where("student_no",$data['student']['student_no'])
            ->where(function($query) {
                return $query
                    ->orWhere('status_no','10')
                    ->orWhere('status_no', "0");
            })->get();
        $data['projectIdeaContinues'] = Project_Idea::where("student_no",$data['student']['student_no'])
            ->where(function($query) {
                return $query
                    ->orWhere('status_no','11')
                    ->orWhere('status_no',"12")
                    ->orWhere('status_no',"20")
                    ->orWhere('status_no',"21")
                    ->orWhere('status_no',"22")
                    ->orWhere('status_no',"30")
                    ->orWhere('status_no',"32");
            })->get();
        $data['projectStatus'] = Project_Status::get();
        if($request->state){
            $data['state'] = $request->state;
        }
        else{$data['state'] = "continues";}
        return view('student.main',$data);
    }
    public function projeEkle(){
        $data['title'] = "Yeni Proje Başvurusu";
        $data['user'] = User::where("email",Session::get('sMail'))->first();
        $data['student'] = Student::where("user_id",$data['user']['user_id'])->first();
        $data['projectIdea'] = Project_Idea::where("student_no",'=',$data['student']['student_no'])->first();
        return view('student.addproject',$data);
    }
    public function projeEkleKaydet(Request $request){
        $title = $request->title;
        $description = $request->description;
        $k1 = $request->k1;
        $k2 = $request->k2;
        $k3 = $request->k3;
        $k4 = $request->k4;
        $k5 = $request->k5;
        $resource = $request->resource;
        $data['user'] = User::where("email",Session::get('sMail'))->first();
        $data['student'] = Student::where("user_id",$data['user']['user_id'])->first();
        $data['asemester'] = Semester::where("is_active","enable")->first();

        $keywordsCreate = Project_Keyword::create([
            'keyword1'=>$k1,
            'keyword2'=>$k2,
            'keyword3'=>$k3,
            'keyword4'=>$k4,
            'keyword5'=>$k5,
        ]);

        //keywordler eklendiyse
        if($keywordsCreate){
            $keyword = Project_Keyword::where('keyword1',$k1)
                ->where('keyword2',$k2)
                ->where('keyword3',$k3)
                ->where('keyword4',$k4)
                ->where('keyword5',$k5)->first();
            $ideaCreate = Project_Idea::create([
                'keywords_id' =>$keyword['Keywords_id'],
                'project_title'=>$title,
                'project_description'=>$description,
                'research_description'=>$resource,
                'status_no'=>12,
                'student_no'=>$data['student']['student_no'],
                'teacher_no'=>$data['student']['teacher_no'],
                'semester_id'=>$data['asemester']['semester_id'],
            ]);
            if($ideaCreate){
                return redirect('student/addproject')->withErrors(['msg' => 'Proje fikriniz sisteme eklendi.','alert'=>'alert-success']);
            }
            else{return redirect('student/addproject')->withErrors(['msg' => 'Proje fikriniz sisteme eklendi.','alert'=>'alert-danger']);}
        }

    }
    public function profil(){
        $data['title']="Profilim";
        $data['user'] = User::where("email",Session::get('sMail'))->first();
        $data['student'] = Student::where("user_id",$data['user']['user_id'])->first();
        $data['department'] = Department::where("department_id",$data['student']['department_id'])->first();
        $data['faculty'] = Faculty::where("faculty_id",$data['student']['faculty_id'])->first();
        $data['teacher'] = Teacher::where("teacher_no",$data['student']['teacher_no'])->first();
        return view('student.profile',$data);
    }
    public function proje(Request $request){
        $project_idea_id = $request->project_idea_id;
        $data['title']="Proje görüntüle";
        $data['project'] = Project_Idea::where("project_idea_id",$project_idea_id)->first();

        $data['projectIdea'] = Project_Idea::where("project_idea_id",'=',$data['project']['project_idea_id'])->orderBy('date_stamp','desc')->first();
        if($data['projectIdea']['status_no'] > 12){
            $data['projectReport'] = Project_Report::where("project_idea_id",'=',$data['project']['project_idea_id'])->orderBy('date_stamp','desc')->first();
            $data['allReports'] = Project_Report::where("project_idea_id",'=',$data['project']['project_idea_id'])->get();
            $data['lastReport'] = Project_Report::where("project_idea_id",'=',$data['project']['project_idea_id'])->orderBy('date_stamp','desc')->first();
            if(isset($data['lastReport'])){
                $data['allThesis'] = Project_Thesis::where("project_report_id",'=',$data['projectReport']['project_report_id'])->get();
                $data['projectThesis'] = Project_Thesis::where("project_report_id",'=',$data['lastReport']['project_report_id'])->orderBy('date_stamp','desc')->first();
            }
        }

        $data['statu'] = Project_Status::where("status_no",$data['project']['status_no'])->first();
        $data['keywords'] = Project_Keyword::where("Keywords_id",$data['project']['keywords_id'])->first();
        return view('student.project',$data);
    }
    public function dosyaIslem(Request $request){
        $projectIdea = Project_Idea::where('project_idea_id',$request->project_idea_id)->first();
        //rapor post edildi ise
        if($request->file('rdoc1')){
            $reportCreate = Project_Report::where('project_idea_id',$request->project_idea_id)->create([
                'project_idea_id'=>$projectIdea['project_idea_id'],
                'status_no' => $projectIdea['status_no'],
            ]);
            if($reportCreate){
                $projectReport = Project_Report::where('project_idea_id',$request->project_idea_id)->orderBy('date_stamp','desc')->first();
            }
            if($projectIdea['status_no'] == 11 || $projectIdea['status_no'] == 20) {
                Storage::makeDirectory($projectIdea['student_no']."/report/".$projectReport['project_report_id']);
                $doc1 = $request->file('rdoc1');
                $extension = $doc1->getClientOriginalExtension();
                $doc1Upload = $request->file('rdoc1')->storeAs(
                    $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/", "rdoc1.".$extension
                );
                $doc2Upload = $request->file('rdoc1')->storeAs(
                    $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/", "rdoc2.".$extension
                );
                $doc3Upload = $request->file('rdoc1')->storeAs(
                    $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/", "rdoc3.".$extension
                );
                $pdf1Upload = $request->file('rdoc1')->storeAs(
                    $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/", "rpdf1.".$extension
                );
                $pdf2Upload = $request->file('rdoc1')->storeAs(
                    $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/", "rpdf2.".$extension
                );
                $pdf3Upload = $request->file('rdoc1')->storeAs(
                    $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/", "rpdf3.".$extension
                );
                if($doc1Upload && $doc2Upload && $doc3Upload && $pdf1Upload && $pdf2Upload && $pdf3Upload){
                    $reportFiles = Project_Report::where('project_report_id',$projectReport['project_report_id'])->update([
                        'status_no' => "22",
                        'doc_file_path_1' => $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/"."rdoc1.".$extension,
                        'doc_file_path_2' => $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/"."rdoc2.".$extension,
                        'doc_file_path_3' => $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/"."rdoc3.".$extension,
                        'pdf_file_path_1' => $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/"."rpdf1.".$extension,
                        'pdf_file_path_2' => $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/"."rpdf2.".$extension,
                        'pdf_file_path_3' => $projectIdea['student_no']."/report/".$projectReport['project_report_id']."/"."rpdf3.".$extension,
                    ]);
                    if($reportFiles){
                        $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update([
                            'status_no' => "22",
                        ]);
                        return redirect('student')->withErrors(['msg' => 'Proje raporlarınız sisteme eklendi.','alert'=>'alert-success']);
                    }
                }
                else{return redirect('student')->withErrors(['msg' => 'Proje raporlarınız sisteme yüklenirken hata oluştu.','alert'=>'alert-warning']);}
            }
        }

        else if($request->file('tdoc1')){
            $projectReport = Project_Report::where('project_idea_id',$request->project_idea_id)->orderBy('date_stamp','desc')->first();
            $thesisCreate = Project_Thesis::where('project_report_id',$projectReport['project_report_id'])->create([
                'project_report_id'=>$projectReport['project_report_id'],
                'status_no' => $projectReport['status_no'],
            ]);
            if ($thesisCreate){
                $projectThesis = Project_Thesis::where('project_report_id',$projectReport['project_report_id'])->orderBy('date_stamp','desc')->first();
            }
            //ilk tez yükleme işlemi ise
            if($projectIdea['status_no'] == 21 || $projectIdea['status_no'] == 30) {
                Storage::makeDirectory($projectIdea['student_no']."/thesis/".$projectThesis['project_thesis_id']);
                $doc1 = $request->file('tdoc1');
                $extension = $doc1->getClientOriginalExtension();
                $doc1Upload = $request->file('tdoc1')->storeAs(
                    $projectIdea['student_no']."/thesis/".$projectThesis['project_thesis_id']."/", "tdoc1.".$extension
                );
                $pdf1Upload = $request->file('tpdf1')->storeAs(
                    $projectIdea['student_no']."/thesis/".$projectThesis['project_thesis_id']."/", "tpdf1.".$extension
                );
                if($doc1Upload && $pdf1Upload){
                    $thesisFiles = Project_Thesis::where('project_thesis_id',$projectThesis['project_thesis_id'])->update([
                        'status_no' => "32",
                        'doc_file_path' => $projectIdea['student_no']."/thesis/".$projectThesis['project_thesis_id']."/"."tdoc1.".$extension,
                        'pdf_file_path' => $projectIdea['student_no']."/thesis/".$projectThesis['project_thesis_id']."/"."tpdf1.".$extension,
                    ]);
                    if($thesisFiles){
                        $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update([
                            'status_no' => "32",
                        ]);
                        return redirect('student')->withErrors(['msg' => 'Proje teziniz sisteme eklendi.','alert'=>'alert-success']);
                    }
                }
                else{return redirect('student')->withErrors(['msg' => 'Proje teziniz sisteme yüklenirken hata oluştu.','alert'=>'alert-warning']);}
            }
        }
        else{echo "Sorun oluştu";}
    }
}
