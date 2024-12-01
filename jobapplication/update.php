<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Job Application</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: fangsong;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container my-5">
    <h1 class="text-center text-primary mb-4">Update Job Application</h1>

    <?php
    // Fetch the job application details using the ApplicationID from the URL
    $getApplication = getApplicationById($pdo, $_GET['application_id']);
    ?>

    <form action="core/handleForms.php" method="POST" class="card p-4 shadow-sm">
      <input type="hidden" name="application_id" value="<?php echo $getApplication['ApplicationID']; ?>">

      <div class="mb-3">
        <label for="applicant_name" class="form-label">Applicant Name:</label>
        <input type="text" class="form-control" name="applicant_name"
          value="<?php echo $getApplication['ApplicantName']; ?>" readonly>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" value="<?php echo $getApplication['Email']; ?>" readonly>
      </div>

      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number:</label>
        <input type="text" class="form-control" name="phone_number"
          value="<?php echo $getApplication['PhoneNumber']; ?>" readonly>
      </div>

      <div class="mb-3">
        <label for="job_title" class="form-label">Job Title:</label>
        <input type="text" class="form-control" name="job_title" value="<?php echo $getApplication['JobTitle']; ?>"
          readonly>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select name="status" class="form-select" required>
          <option value="Pending" <?php echo $getApplication['Status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
          <option value="Reviewed" <?php echo $getApplication['Status'] == 'Reviewed' ? 'selected' : ''; ?>>Reviewed
          </option>
          <option value="Accepted" <?php echo $getApplication['Status'] == 'Accepted' ? 'selected' : ''; ?>>Accepted
          </option>
          <option value="Rejected" <?php echo $getApplication['Status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected
          </option>
        </select>
      </div>

      <div class="mb-3 d-flex justify-content-between">
        <button type="submit" class="btn btn-primary" name="editApplicationBtn">Update Application</button>
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>