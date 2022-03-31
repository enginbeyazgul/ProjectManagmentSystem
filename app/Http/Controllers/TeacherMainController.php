<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Project_Idea;
use App\Models\Project_Keyword;
use App\Models\Project_Report;
use App\Models\Project_Status;
use App\Models\Project_Thesis;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TeacherMainController extends Controller
{
    public function teacherMain(){
        $data['title'] = "Anasayfa";
        $data['user'] = User::where("email",Session::get('tMail'))->first();
        $data['teacher'] = Teacher::where("user_id",$data['user']['user_id'])->first();
        $data['student'] = Student::where("teacher_no","=",$data['teacher']['teacher_no'])->get();
        return view('teacher.main',$data);
    }
    public function projeler(){
        $data['title'] = "Projeler";
        $data['user'] = User::where("email",Session::get('tMail'))->first();
        $data['teacher'] = Teacher::where("user_id",$data['user']['user_id'])->first();
        $data['student'] = Student::where("teacher_no","=",$data['teacher']['teacher_no'])->get();
        return view('teacher.projects',$data);
    }
    public function projeGoruntule(Request $request){
        $data['title'] = "Proje Görüntüle";
        $data['project_idea_id'] = $request->project_idea_id;
        $data['projectIdea'] = Project_Idea::where("project_idea_id",'=',$data['project_idea_id'])->orderBy('date_stamp','desc')->first();
        if($data['projectIdea']['status_no'] > 12){
            $data['projectReport'] = Project_Report::where("project_idea_id",'=',$data['project_idea_id'])->orderBy('date_stamp','desc')->first();
            $data['allReports'] = Project_Report::where("project_idea_id",'=',$data['project_idea_id'])->get();
            $data['lastReport'] = Project_Report::where("project_idea_id",'=',$data['project_idea_id'])->orderBy('date_stamp','desc')->first();
            if(isset($data['lastReport'])){
                $data['allThesis'] = Project_Thesis::where("project_report_id",'=',$data['projectReport']['project_report_id'])->get();
                $data['projectThesis'] = Project_Thesis::where("project_report_id",'=',$data['lastReport']['project_report_id'])->orderBy('date_stamp','desc')->first();
            }
        }
        $data['student'] = Student::where("student_no","=",$data['projectIdea']['student_no'])->first();
        $data['keywords'] = Project_Keyword::where("Keywords_id",'=',$data['projectIdea']['keywords_id'])->first();
        $data['statu'] = Project_Status::where("status_no",$data['projectIdea']['status_no'])->first();
        return view('teacher.project',$data);
    }
    public function profil(){
        $data['title'] = "Profil";
        $data['user'] = User::where("email",Session::get('tMail'))->first();
        $data['teacher'] = Teacher::where("user_id",$data['user']['user_id'])->first();
        $data['department'] = Department::where("department_id",$data['teacher']['department_id'])->first();
        $data['faculty'] = Faculty::where("faculty_id",$data['department']['faculty_id'])->first();
        return view('teacher.profile',$data);
    }
    public function indir(Request $request){
        $ex = $request->action;
        $ex = explode('-',$ex);
        $dosya = $ex[0];
        $reportId = $ex[1];
        $projectReport = Project_Report::where("project_report_id",'=',$reportId)->first();
        $projectThesis = Project_Thesis::where("project_thesis_id",'=',$reportId)->first();
        switch ($dosya){
            case "rdoc1":
                return Storage::download($projectReport['doc_file_path_1']);
            case "rdoc2":
                return Storage::download($projectReport['doc_file_path_2']);
            case "rdoc3":
                return Storage::download($projectReport['doc_file_path_3']);
            case "rpdf1":
                return Storage::download($projectReport['pdf_file_path_1']);
            case "rpdf2":
                return Storage::download($projectReport['pdf_file_path_2']);
            case "rpdf3":
                return Storage::download($projectReport['pdf_file_path_3']);
            case "tdoc1":
                return Storage::download($projectThesis['doc_file_path']);
            case "tpdf1":
                return Storage::download($projectThesis['pdf_file_path']);
            default:
                return false;
        }
    }
    public function userGoruntule(Request $request){
        $data['title'] = "Kullanıcı Profili";
        $userId = $request->id;
        $data['userId'] = $userId;
        $data['user'] = User::where("user_id",$userId)->first();
        $data['teacher'] = Teacher::where("user_id",$userId)->first();
        $data['student'] = Student::where("user_id",$userId)->first();
        $data['department'] = Department::where("department_id",$data['student']['department_id'])->first();
        $data['advisor'] = Teacher::where("teacher_no",$data['student']['teacher_no'])->first();
        $data['faculty'] = Faculty::where("faculty_id",$data['department']['faculty_id'])->first();
        return view('teacher.user',$data);
    }
    public function islem(Request $request){
        if($request->durum == "kabul"){
            switch ($request->status_no){
                case "12":
                    $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update(['status_no' => "11"]);
                    if($ideaStatu){
                        return redirect('teacher/projects')->withErrors(['msg' => 'Proje fikri kabul edildi.','alert'=>'alert-success']);
                    }
                    break;
                case "22":
                    $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update(['status_no' => "21"]);
                    $projectReportt = Project_Report::where('project_idea_id',$request->project_idea_id)->count();
                    if($projectReportt > 0)
                    {
                        $reportStatu = Project_Report::where('project_idea_id',$request->project_idea_id)->orderBy('date_stamp','desc')->first()->replicate();
                        $reportStatu->status_no = "21";
                        $reportStatu->project_report_id = $reportStatu->project_report_id+1;
                        $reportStatu->date_stamp = date("Y-m-d H:i:s",strtotime('-3 hour'));
                        $reportStatu->save();
                    }
                    if($ideaStatu){
                        return redirect('teacher/projects')->withErrors(['msg' => 'Raporlar kabul edildi.','alert'=>'alert-success']);
                    }
                    break;
                case "32":
                    $projectReport = Project_Report::where('project_idea_id',$request->project_idea_id)->first();
                    $projectThesis = Project_Thesis::where('project_report_id',$projectReport['project_report_id'])->orderBy('date_stamp','desc')->first();
                    $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update(['status_no' => "31"]);
                    $projectThes = Project_Thesis::where('project_report_id',$projectReport['project_report_id'])->count();
                    if($projectThes > 0)
                    {
                        $thesisStatu = Project_Thesis::where('project_thesis_id',$projectThesis['project_thesis_id'])->orderBy('date_stamp','desc')->first()->replicate();
                        $thesisStatu->status_no = "31";
                        $thesisStatu->project_thesis_id = $thesisStatu->project_thesis_id+1;
                        $thesisStatu->date_stamp = date("Y-m-d H:i:s",strtotime('-3 hour'));
                        $thesisStatu->save();
                    }
                    if($ideaStatu){
                        return redirect('teacher/projects')->withErrors(['msg' => 'Tez kabul edildi.','alert'=>'alert-success']);
                    }
                    break;
                default:
                    return false;
            }
        }
        else if($request->durum == "ret"){
            switch ($request->status_no){
                case "12":
                    $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update(['status_no' => "10","rejection_note" => $request->not]);
                    if($ideaStatu){
                        return redirect('teacher/projects')->withErrors(['msg' => 'Proje fikri reddedildi.','alert'=>'alert-danger']);
                    }
                    break;
                case "22":
                    $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update(['status_no' => "20","rejection_note" => $request->not]);
                    $projectReportt = Project_Report::where('project_idea_id',$request->project_idea_id)->count();
                    if($projectReportt > 0)
                    {
                        $reportStatu = Project_Report::where('project_idea_id',$request->project_idea_id)->orderBy('date_stamp','desc')->first()->replicate();
                        $reportStatu->status_no = "20";
                        $reportStatu->project_report_id = $reportStatu->project_report_id+1;
                        $reportStatu->date_stamp = date("Y-m-d H:i:s",strtotime('-3 hour'));
                        $reportStatu->rejection_note = $request->not;
                        $reportStatu->save();
                    }
                    if($ideaStatu){
                        return redirect('teacher/projects')->withErrors(['msg' => 'Raporlar reddedildi.','alert'=>'alert-danger']);
                    }
                    break;
                case "32":
                    $projectReport = Project_Report::where('project_idea_id',$request->project_idea_id)->orderBy('date_stamp','desc')->first();
                    $projectThesis = Project_Thesis::where('project_report_id',$projectReport['project_report_id'])->orderBy('date_stamp','desc')->first();
                    $ideaStatu = Project_Idea::where('project_idea_id',$request->project_idea_id)->update(['status_no' => "30","rejection_note" => $request->not]);
                    $projectThesiss = Project_Thesis::where('project_report_id',$projectReport['project_report_id'])->count();
                    if($projectThesiss > 0)
                    {
                        $thesisStatu = Project_Thesis::where('project_thesis_id',$projectThesis['project_thesis_id'])->orderBy('date_stamp','desc')->first()->replicate();
                        $thesisStatu->status_no = "30";
                        $thesisStatu->project_thesis_id = $thesisStatu->project_thesis_id+1;
                        $thesisStatu->date_stamp = date("Y-m-d H:i:s",strtotime('-3 hour'));
                        $thesisStatu->rejection_note = $request->not;
                        $thesisStatu->save();
                    }
                    if($thesisStatu->save()){
                        return redirect('teacher/projects')->withErrors(['msg' => 'Tez reddedildi.','alert'=>'alert-danger']);
                    }
                    break;
                default:
                    return false;
            }
        }
    }
}
