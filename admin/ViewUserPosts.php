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
    $query = "SELECT Username From Users Order by ID Asc";
    echo "<form action='UserPostList.php' method='post'>";
    echo "<select name='userSelect'>";
    if ($mysqli->query($query))
    {

      foreach($mysqli->query($query) as $row)
      {
        echo "<option value='".$row['Username']."'>".$row['Username']."</option>";
      }

    }
    echo "</select><br>";
    echo "<input type='submit'/></form>";
    $mysqli->close();
     ?>
     <a href="AdminHome.html">Click here to return to the admin home page</a>
  </body>
</html>
