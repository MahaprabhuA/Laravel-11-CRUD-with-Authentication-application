<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .student-block {
      margin-bottom: 10px;
    }

    .dropdown-menu label {
      display: block;
      padding-left: 10px;
    }

    .dropdown-menu {
      max-height: 200px;
      overflow-y: auto;
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <h2>Join New Students</h2>

  <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div id="student-container">
      <!-- First student block -->
    </div>

    <button type="button" class="btn btn-success mb-3" id="addStudents">+ Add 1 Student</button><br>
    <button type="submit" class="btn btn-primary">Submit All</button>
  </form>
</div>

<script>
  let studentIndex = 0;

  function createStudentBlock(index) {
    const row = document.createElement('div');
    row.className = 'row student-block align-items-center';

    row.innerHTML = `
      <div class="col-md-2">
        <input type="text" name="students[${index}][name]" class="form-control" placeholder="Name" required>
      </div>

      <div class="col-md-2">
        <select name="students[${index}][department]" class="form-select" required>
          <option value="">Department</option>
          <option>Automobile</option>
          <option>Civil</option>
          <option>Computer</option>
          <option>ECE</option>
          <option>EEE</option>
          <option>Mechanical</option>
          <option>IT</option>
        </select>
      </div>

      <div class="col-md-2">
        <div class="btn-group" role="group">
          <input type="radio" class="btn-check" name="students[${index}][gender]" id="male${index}" value="Male" required>
          <label class="btn btn-outline-primary btn-sm" for="male${index}">M</label>

          <input type="radio" class="btn-check" name="students[${index}][gender]" id="female${index}" value="Female">
          <label class="btn btn-outline-primary btn-sm" for="female${index}">F</label>

          <input type="radio" class="btn-check" name="students[${index}][gender]" id="other${index}" value="Other">
          <label class="btn btn-outline-primary btn-sm" for="other${index}">O</label>
        </div>
      </div>

      <div class="col-md-2">
        <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle w-100 btn-sm" type="button" data-bs-toggle="dropdown">
            Skills
          </button>
          <ul class="dropdown-menu p-2">
            ${['Python', 'Java', 'C++', 'C', 'Laravel', 'PHP'].map(skill => `
              <li><label><input type="checkbox" name="students[${index}][skill][]" value="${skill}"> ${skill}</label></li>
            `).join('')}
          </ul>
        </div>
      </div>

      <div class="col-md-2">
        <input type="text" name="students[${index}][mobile]" class="form-control" placeholder="Mobile" required>
      </div>

      <div class="col-md-1">
        <input type="file" name="students[${index}][resume]" class="form-control form-control-sm" accept=".pdf">
      </div>

      <div class="col-md-1 d-flex justify-content-center">
        <button type="button" class="btn btn-danger btn-sm remove-btn">&minus;</button>
      </div>
    `;

    row.querySelector('.remove-btn').addEventListener('click', () => {
      row.remove();
    });

    return row;
  }

  document.getElementById('addStudents').addEventListener('click', () => {
    const container = document.getElementById('student-container');
    const studentBlock = createStudentBlock(studentIndex++);
    container.appendChild(studentBlock);
  });

  // Automatically add the first student block on page load
  window.onload = () => {
    document.getElementById('addStudents').click();
  };
</script>
</body>
</html>
