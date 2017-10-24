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
    $query = "SELECT Username,Text From Posts Order by ID Asc";
    echo "<form action='PostsDeleted.php' method='post'>";
    echo "<table style='border: 1px solid black;'><tr>";
    echo "<th style='border: 1px solid black;'>Username</th><th style='border: 1px solid black;'>Posts</th><th style='border: 1px solid black;'>Delete?</th></tr>";
    if ($mysqli->query($query))
    {

      foreach($mysqli->query($query) as $row)
      {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>".$row['Username']."</td>";
        echo "<td style='border: 1px solid black;'>".$row['Text']."</td>";
        echo "<td style='border: 1px solid black;'><input type='checkBox' name='posts[]' value='".$row['Text']."'></td>";
        echo "</tr>";
      }

    }
    echo "</table><br>";
    echo "<input type='submit'/></form>";
    $mysqli->close();
     ?>
     <a href="AdminHome.html">Click here to return to the admin home page</a>
  </body>
</html>
