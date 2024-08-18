<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function index(){
    $students = Student::get();
        return view('students.index', compact('students'));
    }

    public function create(){
            return view('students.create');
        }
    public function add(Request $request){
//         dd($request->all());

        //validation
        $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'department' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('students'),$imageName);
        $student = new Student;
        $student ->image = $imageName;
        $student ->name = $request->name;
        $student ->student_id = $request->student_id;
        $student -> department = $request->department;
        $student->save();
        return back()->withSuccess('Student profile Created successfully!');
    }

    public function edit($id){
        $student = student::where('id', $id)->first();
//        dd($student);
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'department' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'

        ]);
        $student = student::where('id', $id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('students'),$imageName);
            $student ->image = $imageName;

        }
        $student ->name = $request->name;
        $student ->student_id = $request->student_id;
        $student -> department = $request->department;
        $student->save();
        return back()->withSuccess('Student details Updated successfully!');

    }
    public function delete($id){
        $student = student::where('id', $id)->first();
        $student->delete();
        return back()->withSuccess('Student details Deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = strtolower($request->input('query'));

        // Search by name, student ID, or department in a case-insensitive way
        $students = Student::whereRaw('LOWER(name) LIKE ?', ["%{$query}%"])
            ->orWhereRaw('LOWER(student_id) LIKE ?', ["%{$query}%"])
            ->orWhereRaw('LOWER(department) LIKE ?', ["%{$query}%"])
            ->get();
        // Return the search results to a view (or same index page)
        return view('students.index', ['students' => $students]);
    }


}
