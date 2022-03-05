<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\Foreach_;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'fullname' => 'required|string',
            'mat' => 'required|unique:students,mat_no',
            'dept' => 'required',
            'programme' => 'required'
        ]);
        
        $student = new Students();
        $student->full_name = $request->fullname;
        $student->mat_no = $request->mat;
        $student->department = $request->dept;
        $student->programme = $request->programme;
        $student->save();

        $tableName = "{$request->mat}_table";
        
        Schema::connection('mysql')->create($tableName, function($table) {
                $table->id();
                $table->text('course_code');
                $table->text('course_name');
                $table->text('course_id');
                $table->integer('score');
                $table->text('grade');
            });
        

        return back()->with('success', 'Student Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Students::find($id);
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function addcourse(Request $request) {
        // $rule = "required|unique:{$request->mat}_table,course_code";
        $this->validate($request, [
            'course_code' => 'required',
            'course_name' => 'required',
            'course_id' => 'required',
            'score' => 'required',
            'grade' => 'required'
        ]);
        $course_code =  $request->course_code;
        $course_name =  $request->course_name;
        $course_id =  $request->course_id;
        $score =  $request->score;
        $grade =  $request->grade;
        $mat =  $request->mat;
        $student = "{$mat}_table";
        DB::insert("insert into $student (course_code, course_name, course_id, score, grade) values (?, ?, ?, ?, ?)", [$course_code, $course_name, $course_id, $score, $grade]);

        return back()->with('success', 'Course Info Added');
    }
    public function update(Request $request, $id) {
        //
        $student = Students::find($id);
        $current = "{$student->mat_no}_table";
        $this->validate($request, [
            'fullname' => 'required|string',
            'mat' => 'required',
            'dept' => 'required',
            'programme' => 'required'
        ]);
        $student->full_name = $request->fullname;
        $student->mat_no = $request->mat;
        $student->department = $request->dept;
        $student->programme = $request->programme;
        $student->save();

        $newName = "{$request->mat}_table";
        if  ($current !== $newName) {
            Schema::connection('mysql')->rename($current, $newName);
        }
        $request->programme = ($request->programme == 'part_time') ? 'part-time' : $request->programme;
        return redirect()->route($request->programme)->with('success', 'Student Updated');
        
    }

    public function masters() {
        $students = DB::select('select * from students where programme = ?', ['masters']); 
        return view('students.masters')->with('students', $students);
    }
    public function diploma() {
        $students = DB::select('select * from students where programme = ?', ['diploma']); 
        return view('students.diploma')->with('students', $students);
    }
    public function part_time() {
        $students = DB::select('select * from students where programme = ?', ['part_time']); 
        return view('students.part-time')->with('students', $students);
    }

    public function courses($mat, $programme) {
        $tableName = "{$mat}_table";
        $courses = DB::select("select * from $tableName order by course_code ASC");
        $data = [
            'courses' => $courses,
            'mat' => $mat,
            'programme' => $programme
        ];
        // return $data;
        return view('students.courses')->with($data);
    }

    public function register($mat, $programme) {
        $courses = DB::select("select * from {$programme}_courses ORDER BY course_code ASC");
        $data = [
            'courses' => $courses,
            'mat' => $mat,
            'programme' => $programme
        ];
        return view('students.register')->with($data);
        
    }

    public function results($programme, $course_id) {
        $courses = DB::select("select * from {$programme}_courses where course_id = ?", [$course_id]);
        $students = Students::where('programme', $programme)->get();
        
        if ($course_id < 2) {
            $courses = DB::select("SELECT * FROM {$programme}_courses WHERE course_id > 1 AND course_id < 2 ORDER BY course_id ASC");
            $year = 1;
          } elseif ($course_id > 2) {
            $courses = DB::select("SELECT * FROM {$programme}_courses WHERE course_id > 2 ORDER BY course_id ASC") ;
            $year = 2;
          }
        $data = [
            'courses' => $courses,
            'programme' => $programme,
            'course_id' => $course_id,
            'year' => $year,
            'students' => $students
        ];
        // return $data;
        return view('students.results')->with($data);
    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
