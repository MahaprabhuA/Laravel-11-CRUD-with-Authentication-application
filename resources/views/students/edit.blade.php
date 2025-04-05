@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row align-items-center">
            <div class="col-md-2">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $student->name }}" required>
            </div>

            <div class="col-md-2">
                <select name="department" class="form-select" required>
                    <option value="">Department</option>
                    @foreach(['Automobile', 'Civil', 'Computer', 'ECE', 'EEE', 'Mechanical', 'IT'] as $dept)
                        <option value="{{ $dept }}" {{ $student->department == $dept ? 'selected' : '' }}>
                            {{ $dept }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <div class="btn-group" role="group">
                    @foreach(['Male', 'Female', 'Other'] as $gender)
                        <input type="radio" class="btn-check" name="gender" id="{{ $gender }}Radio" value="{{ $gender }}" {{ $student->gender == $gender ? 'checked' : '' }} required>
                        <label class="btn btn-outline-primary btn-sm" for="{{ $gender }}Radio">{{ substr($gender, 0, 1) }}</label>
                    @endforeach
                </div>
            </div>

            <div class="col-md-2">
                @php
                    $studentSkills = json_decode($student->skill, true) ?? [];
                    $allSkills = ['Python', 'Java', 'C++', 'C', 'Laravel', 'PHP'];
                @endphp
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100 btn-sm" type="button" data-bs-toggle="dropdown">
                        Skills
                    </button>
                    <ul class="dropdown-menu p-2">
                        @foreach($allSkills as $skill)
                            <li>
                                <label>
                                    <input type="checkbox" name="skill[]" value="{{ $skill }}"
                                        {{ in_array($skill, $studentSkills) ? 'checked' : '' }}>
                                    {{ $skill }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-2">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ $student->mobile }}" required>
            </div>

            <div class="col-md-2">
                <input type="file" name="resume" class="form-control form-control-sm" accept=".pdf">
                @if($student->resume)
                    <small class="text-muted">Current: <a href="{{ asset('storage/' . $student->resume) }}" target="_blank">View Resume</a></small>
                @endif
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Student</button>
        </div>
    </form>
</div>
@endsection
