<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Join New Student</h2> 

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            
            <div class="mb-3">
                    <label>Department:</label>
                    <select class="form-control" name="department" >
                        <option value="">Select Department</option>
                        <option value="Automobile">Automobile</option>
                        <option value="Civil">Civil</option>
                        <option value="Computer">Computer</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="IT">IT</option>
                    </select>
                </div>

            <!-- Gender Radio Buttons -->
            <div class="mb-3">
                <label>Gender</label><br>
                <input type="radio" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required> Male
                <input type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} required> Female
                <input type="radio" name="gender" value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }} required> Other
            </div>

            <!-- Skills Checkboxes -->
            <div class="mb-3">
                <label>Skills</label><br>
                <input type="checkbox" name="skill[]" value="Python" {{ in_array('Python', old('skill', [])) ? 'checked' : '' }}> Python<br>
                <input type="checkbox" name="skill[]" value="Java" {{ in_array('Java', old('skill', [])) ? 'checked' : '' }}> Jave<br>
                <input type="checkbox" name="skill[]" value="C++" {{ in_array('C++', old('skill', [])) ? 'checked' : '' }}> C++<br>
                <input type="checkbox" name="skill[]" value="C" {{ in_array('C', old('skill', [])) ? 'checked' : '' }}> C<br>
                <input type="checkbox" name="skill[]" value="Laravel" {{ in_array('Laravel', old('skill', [])) ? 'checked' : '' }}> Laravel<br>
                <input type="checkbox" name="skill[]" value="PHP" {{ in_array('PHP', old('skill', [])) ? 'checked' : '' }}> PHP<br>
            </div>

            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" required>
            </div>

            <!-- Resume Upload -->
            <div class="mb-3">
                <label>Upload Files(PDF Only)</label>
                <input type="file" name="resume" class="form-control" accept=".pdf">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>
