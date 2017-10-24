<html>
  <body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $mysqli = new mysqli('mysql.eecs.ku.edu','nkenn','P@$$word123','nkenn');
    if ($mysqli->connect_errno)
    {
      printf('Connect failed: %s\n', $mysqli->connect_error);
      exit();
    }
    $inTable = false;

    $newUsername = $mysqli->real_escape_string($_POST['userSelect']);
    $query = "SELECT Username,Text From Posts where Username = '$newUsername' Order by ID Asc";

    echo "<table style='border: 1px solid black;'><tr>";
    echo "<th style='border: 1px solid black;'>Posts</th></tr>";
    if ($mysqli->query($query))
    {

      foreach($mysqli->query($query) as $row)
      {
        echo "<tr><td style='border: 1px solid black;'>".$row['Text']."</td></tr>";
      }

    }
    echo "</table>";

    $mysqli->close();
     ?>
     <a href="AdminHome.html">Click here to return to the admin home page</a>
  </body>
</html>
