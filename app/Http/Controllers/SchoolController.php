<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Course;
use App\Models\Student;

class SchoolController extends Controller {
    public function index(){
        $announcements = Announcement::latest()->take(3)->get();
        $courses = Course::all();
        return view('welcome', compact('announcements','courses'));
    }
    public function about(){ return view('about'); }
    public function courses(){ $courses = Course::all(); return view('courses', compact('courses')); }
    public function contact(){ return view('contact'); }
    public function enroll(Request $r){
        $r->validate(['fullname'=>'required','grade_level'=>'required','contact'=>'required']);
        Student::create($r->all());
        return redirect('/')->with('success','Enrolled Successfully! Welcome to San Carlos City School!');
    }
    public function students(){ $students = Student::latest()->get(); return view('students', compact('students')); }
}
