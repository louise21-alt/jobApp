<?php

require_once 'dbConfig.php';
require_once 'models.php';

$response = [
    'message' => '',
    'statusCode' => 400,
];

if (isset($_GET['clearSearch'])) {
    header("Location: index.php");
    exit;
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$showApplications = showApplications($pdo, $searchTerm);

// Adding Job Application
if (isset($_POST['addApplicationBtn'])) {
    $applicant_name = $_POST['applicant_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $job_title = $_POST['job_title'];

    if (!empty($applicant_name) && !empty($email) && !empty($phone_number) && !empty($job_title)) {
        $inserted = insertApplication($pdo, $applicant_name, $email, $phone_number, $job_title);
        if ($inserted) {
            $response['message'] = 'Application submitted successfully!';
            $response['statusCode'] = 200;
        } else {
            $response['message'] = 'Failed to submit application!';
        }
    } else {
        $response['message'] = 'All fields are required!';
    }
    echo '<a href="../index.php">Go back to index</a>';
}

// Editing Job Application
if (isset($_POST['editApplicationBtn'])) {
    $status = $_POST['status'];
    $application_id = $_POST['application_id'];

    $updated = updateApplication($pdo, $status, $application_id);
    if ($updated) {
        $response['message'] = 'Application updated successfully!';
        $response['statusCode'] = 200;
    } else {
        $response['message'] = 'Failed to update application!';
    }
    echo '<a href="../index.php">Go back to index</a>';
}

// Deleting Job Application
if (isset($_POST['deleteApplicationBtn'])) {
    $application_id = $_POST['application_id'];

    $deleted = deleteApplication($pdo, $application_id);
    if ($deleted) {
        $response['message'] = 'Application deleted successfully!';
        $response['statusCode'] = 200;
    } else {
        $response['message'] = 'Failed to delete application!';
    }
    echo '<a href="../index.php">Go back to index</a>';
}

echo json_encode($response);
?>