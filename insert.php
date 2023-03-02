<?php
// Include the database connection file
require_once "config.php";

// Define variables and initialize with empty values
$name = $branch = $phone = $email = $company = $salary = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $name = trim($_POST["name"]);
    $branch = trim($_POST["branch"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $company = trim($_POST["company"]);
    $salary = trim($_POST["salary"]);

    // Prepare an INSERT statement
    $sql = "INSERT INTO alumni (name, branch, phone, email, company, salary) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $branch, $phone, $email, $company, $salary);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the view page
            header("location: view.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Close the connection
    mysqli_close($conn);
}

?>
