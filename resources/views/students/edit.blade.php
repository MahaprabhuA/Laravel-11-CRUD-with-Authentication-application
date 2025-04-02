@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>
    
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}">
        </div>
        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="department" class="form-control" value="{{ $student->department }}">
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <input type="text" name="gender" class="form-control" value="{{ $student->gender }}">
        </div>
        <div class="mb-3">
            <label>Skill</label>
            <input type="text" name="skill" class="form-control" value="{{ $student->skill }}">
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" value="{{ $student->mobile }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
