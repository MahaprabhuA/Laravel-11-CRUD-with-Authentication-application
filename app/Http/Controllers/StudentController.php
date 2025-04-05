<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function create()
    {
        return view('students.create'); // Ensure the correct view file exists
    }


    public function store(Request $request)
{
    $students = $request->input('students');

    foreach ($students as $student) {
        $data = new Student;
        $data->name = $student['name'];
        $data->department = $student['department'];
        $data->gender = $student['gender'];
        $data->mobile = $student['mobile'];
        $data->skill = json_encode($student['skill']); // if it's array
        // handle file upload here if needed
        $data->save();
    }

    return redirect()->route('students.index')->with('success', 'Students added successfully!');

}


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    public function submit(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'gender' => 'required|string',
            'skill' => 'required|array',
            'mobile' => 'required|numeric',
        ]);

        // Save the student data (You can modify this based on your DB structure)
        $student = new Student();
        $student->name = $validated['name'];
        $student->department = $validated['department'];
        $student->gender = $validated['gender'];
        $student->skill = implode(',', $validated['skill']); // Assuming it's stored as comma-separated values
        $student->mobile = $validated['mobile'];
        $student->save();

        // Redirect or return response
        return redirect()->route('students.submit')->with('success', 'Student added successfully!');
    }


    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $skills = implode(',', $request->skill);

        $student->update([
            'name' => $request->name,
            'department' => $request->department,
            'gender' => $request->gender,
            'skill' => $skills,
            'mobile' => $request->mobile,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    } 

    public function index()
    {
        $students = Student::all(); // Fetching all students
        return view('students.index', compact('students')); // Passing the students to the view
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
