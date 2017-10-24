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
    $query = "SELECT ID,Username,Text From Posts Order by ID Asc";
    echo "IDs of deleted posts: <br>";
    if ($mysqli->query($query))
    {

      foreach($mysqli->query($query) as $row)
      {
        if (in_array($row["Text"], $_POST['posts']))
        {
          echo $row["ID"]."<br>";
          $toDelete = $mysqli->real_escape_string($row['Text']);
          $mysqli->query("DELETE from Posts where Text = '$toDelete' ");
        }
      }

    }

    $mysqli->close();
     ?>
     <a href="AdminHome.html">Click here to return to the admin home page</a>
  </body>
</html>
