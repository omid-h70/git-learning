<!DOCTYPE html>
<html >
<!-- /* Just Testing Git Nothing Special about it*/-->
<head>
	<title>fixing a bug -nothing to be afraid of</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="">
    <link href="bootstrap/ltr/bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-sm-6 col-md-5 col-md-offset-3 col-lg-6 col-lg-offset-0">
<form method="POST" action="index.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo $_POST['email'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
  </div>
  <div class="checkbox">
    <label>
      <input name="test" type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name ="hometest";
$table_name="guests";

try 
{
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "Database created successfully<br>";

    $sql = "CREATE TABLE IF NOT EXISTS $db_name.$table_name (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		email VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL,
		checked VARCHAR(50)
	)";

	$conn->exec($sql);
    //echo "Table created successfully<br>";

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>

<div class="col-sm-6 col-md-5 col-md-offset-3 col-lg-6 col-lg-offset-0">

	<?php

	if( !empty($_POST['email']) && !empty($_POST['password']) ){

		$email = $_POST['email'];
		$pass = $_POST['password'];
		$test = !empty($_POST['test'])?$_POST['test']:FALSE;

		$sql = "INSERT INTO $db_name.$table_name ".
			"( email , password ,checked) ".
			"VALUES ".
			"('$email','$pass','$test')";

		if($conn->exec($sql)){
			 echo '<h1><span style="color:green;">Record Inserted Successfully !</span></h1><br>';
			 $sql = "SELECT * FROM $db_name.$table_name ".
			"ORDER BY id DESC LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$total = $stmt->rowCount();


			if ($total ) {

			    while ($row = $stmt->fetchObject()) {
				   echo '<h4 style="color:blue;">Last Inserted Record </h4><BR>';
				   echo 'ID::<b>'.$row->id.'</b><BR>';
				   echo 'Email::<b>'.$row->email.'</b><BR>';
				   echo 'Password::<b>'.$row->password.'</b><BR>';
			    }

			} else {
			    echo "0 results";
			}

		}
	}else{

		echo '<h4 style="color:red;"> Please Fill All the Fields </h6><br>';
	}


	$conn = null;

	?>


</div>

</body>
</html>