<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Alumni Records</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
      border: 1px solid black;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>
  <h2>Alumni Records</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Branch</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Company</th>
      <th>Salary</th>
    </tr>
    <?php
      // Select all data from alumni table
      $sql = "SELECT * FROM alumni";
      $result = mysqli_query($conn, $sql);

      // Check if any data exists in the table
      if (mysqli_num_rows($result) > 0) {
        // Loop through each row of data and display it in a table row
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['branch'] . "</td>";
          echo "<td>" . $row['phone'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['company'] . "</td>";
          echo "<td>" . $row['salary'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No alumni records found.</td></tr>";
      }

      // Free result set
      mysqli_free_result($result);

      // Close connection
      mysqli_close($conn);
    ?>
  </table>
</body>
</html>
