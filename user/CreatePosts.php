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
    $query = "SELECT Username From Users Order by ID Desc";
    if ($mysqli->query($query))
    {
      foreach($mysqli->query($query) as $row)
      {
        if ($row['Username'] == $_POST['UserName'])
        {
          $inTable = true;
        }
      }
    }
    if ($inTable != true)
    {
        echo "The user ".$_POST["UserName"]." does not exist.";
    }
    else
    {
      if ($_POST['PostText'] != "")
      {
        $newUsername = $mysqli->real_escape_string($_POST['UserName']);
        $newPost= $mysqli->real_escape_string($_POST['PostText']);
        $mysqli->query("INSERT into Posts (Username,Text) VALUES ('$newUsername','$newPost')");
        echo "Post Saved!<br>";
      }
      else {
        echo "Text is required to post.<br>";
      }
    }



    $mysqli->close();
     ?>
     <a href="../index.html">Click here to return to the main page</a>
  </body>
</html>
