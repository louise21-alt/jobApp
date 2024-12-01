<?php

require_once 'core/dbConfig.php';
require_once 'core/models.php';

$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Job Applications</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: fangsong;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container my-4">
    <h1 class="text-center text-primary mb-4">JOB APPLICATION MANAGEMENT</h1>

    <!-- Add Application Form -->
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-black text-white d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Add Job Application</h5>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
      </div>
      <div class="card-body">
        <form action="core/handleForms.php" method="POST">
          <div class="mb-3">
            <label for="applicant_name" class="form-label">Applicant Name</label>
            <input type="text" class="form-control" name="applicant_name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" required>
          </div>

          <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" name="job_title" required>
          </div>

          <button type="submit" class="btn btn-primary float-end" name="addApplicationBtn">Submit</button>
        </form>
      </div>
    </div>

    <!-- Search Form -->
    <div class="card mb-4">
      <div class="card-body">
        <form method="GET" action="">
          <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search by name, status, or job title"
              value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="btn btn-outline-primary">Search</button>
            <a href="index.php" class="btn btn-outline-danger">Clear</a>
          </div>
        </form>
      </div>
    </div>

    <!-- Display Applications -->
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Applicant Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Job Title</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $applications = showApplications($pdo, $searchTerm);
          if ($applications):
            foreach ($applications as $app): ?>
              <tr>
                <td><?php echo $app['ApplicationID']; ?></td>
                <td><?php echo $app['ApplicantName']; ?></td>
                <td><?php echo $app['Email']; ?></td>
                <td><?php echo $app['PhoneNumber']; ?></td>
                <td><?php echo $app['JobTitle']; ?></td>
                <td><?php echo $app['Status']; ?></td>
                <td>
                  <a href="update.php?application_id=<?php echo $app['ApplicationID']; ?>"
                    class="btn btn-warning btn-sm">Edit</a>
                  <a href="delete.php?application_id=<?php echo $app['ApplicationID']; ?>"
                    class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach;
          else: ?>
            <tr>
              <td colspan="7" class="text-center">No applications found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap 5 JS (Optional, for modals and other interactions) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>