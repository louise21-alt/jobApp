<?php

require_once 'dbConfig.php';

function insertApplication($pdo, $applicant_name, $email, $phone_number, $job_title)
{
    $sql = "INSERT INTO JobApplications (ApplicantName, Email, PhoneNumber, JobTitle) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$applicant_name, $email, $phone_number, $job_title]);
}

function showApplications($pdo, $searchTerm = '')
{
    $sql = "SELECT * FROM JobApplications WHERE ApplicantName LIKE ? OR JobTitle LIKE ? OR Status LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$searchTerm%", "%$searchTerm%", "%$searchTerm%"]);
    return $stmt->fetchAll();
}

function getApplicationById($pdo, $application_id)
{
    $sql = "SELECT * FROM JobApplications WHERE ApplicationID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$application_id]);
    return $stmt->fetch();
}

function updateApplication($pdo, $status, $application_id)
{
    $sql = "UPDATE JobApplications SET Status = ? WHERE ApplicationID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$status, $application_id]);
}
function deleteApplication($pdo, $application_id)
{
    $sql = "DELETE FROM JobApplications WHERE ApplicationID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$application_id]);
}
?>