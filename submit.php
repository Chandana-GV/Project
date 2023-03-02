<?php
require_once 'config.php';
require_once 'insert.php';

// Initialize variables with empty values
$name = $branch = $phone = $email = $company = $salary = "";

// Define variables and set to empty values
$nameErr = $branchErr = $phoneErr = $emailErr = $companyErr = $salaryErr = "";

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize name input
    if (empty(trim($_POST["name"]))) {
        $nameErr = "Name is required";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate and sanitize branch input
    if (empty(trim($_POST["branch"]))) {
        $branchErr = "Branch is required";
    } else {
        $branch = trim($_POST["branch"]);
    }

    // Validate and sanitize phone input
    if (empty(trim($_POST["phone"]))) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate and sanitize email input
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email address is required";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate and sanitize company input
    if (empty(trim($_POST["company"]))) {
        $companyErr = "Company name is required";
    } else {
        $company = trim($_POST["company"]);
    }

    // Validate and sanitize salary input
    if (empty(trim($_POST["salary"]))) {
        $salaryErr = "Salary is required";
    } else {
        $salary = trim($_POST["salary"]);
    }

    // Check if there are any input errors before inserting data into database
    if (empty($nameErr) && empty($branchErr) && empty($phoneErr) && empty($emailErr) && empty($companyErr) && empty($salaryErr)) {
        // Call the insert function to insert the data into the database
        insertAlumni($conn, $name, $branch, $phone, $email, $company, $salary);
        
        // Redirect to the view page
        header("Location: view.php");
        exit();
    }
}
?>
