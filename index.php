<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student2";

// Create connection
$conn = mysqli_connect($servername, $username,$password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 if(isset($_POST['save'])){
	   $checkBox= $image= $image_name= $file= "";
echo "<pre>";
var_dump($_POST['gender']);
echo "</pre>";
exit();
	 if(empty($_POST['gender'])){
		$_POST['gender'] ="";
	 }
	 if(empty($_POST['photo'])){
		$_POST['photo'] ="";
	 }
	  if(!empty($_POST['hobby'])){
         $checkBox = implode(',', $_POST['hobby']);
	 }
	 if(!empty($_FILES['photo']['tmp_name'])){
        $file = rand(1000,100000)."-".$_FILES['photo']['name'];
        $file_loc = $_FILES['photo']['tmp_name'];
        $file_size = $_FILES['photo']['size'];
        $file_type = $_FILES['photo']['type'];
        $folder="img/";
        move_uploaded_file($file_loc,$folder.$file);
	 }
	 
	 	
	$sql = "INSERT INTO infos2 (name, email, address, class, roll, hobby, gender, photo) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['class']."', '".$_POST['roll']."', '".$checkBox."', '".$_POST['gender']."', '".  $file."')";

	if (mysqli_query($conn, $sql)) {
    echo "New record created successfully".$file_type;
	} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
 }
 
 
 if(isset($_GET['delete_id'])){
	$d_id = $_GET['delete_id'];
  $sql = "DELETE FROM infos2 WHERE id =".$d_id;
  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
 } else {
    echo "Error deleting record: " . mysqli_error($conn);
 }
 }
 
 if(isset($_POST['update'])){

	$checkBox= $image= $image_name= $file= "";
	 
	 if(empty($_POST['gender'])){
     $_POST['gender'] ="";
	 }
	 if(empty($_POST['photo'])){
     $_POST['photo'] ="";
	 }
	  if(!empty($_POST['hobby'])){
         $checkBox = implode(',', $_POST['hobby']);
	 }
	 if(!empty($_FILES['photo']['tmp_name'])){
        $file = rand(1000,100000)."-".$_FILES['photo']['name'];
        $file_loc = $_FILES['photo']['tmp_name'];
        $file_size = $_FILES['photo']['size'];
        $file_type = $_FILES['photo']['type'];
        $folder="img/";
        move_uploaded_file($file_loc,$folder.$file);

        $sql = "UPDATE infos2 SET name='".$_POST['name']."', email='".$_POST['email']."',address='".$_POST['address']."',class ='".$_POST['class']."',roll ='".$_POST['roll']."',hobby='".$checkBox."',gender='".$_POST['gender']."',photo ='".$file."' WHERE id=".$_POST['id'];
	 }else{
	 	$sql = "UPDATE infos2 SET name='".$_POST['name']."', email='".$_POST['email']."',address='".$_POST['address']."',class ='".$_POST['class']."',roll ='".$_POST['roll']."',hobby='".$checkBox."',gender='".$_POST['gender']."' WHERE id=".$_POST['id'];
	 }
	 
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully ";
	} else {
		echo "Error updating record: " . $conn->error;
	}
 }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<nav class="purple darken-3" role="navigation">
	    <div class="nav-wrapper container">
	      <a id="logo-container" href="#" class="brand-logo">Registration Form</a>

	      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
	        <li><a href="#"></a></li>
	      </ul>
	      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons"></i></a>
	    </div>
	</nav>

	<div class="main-login-form">
		<div class="container">
		<div class="row">
	    <form method="post" action="#" class="col s9 offset-s3" enctype="multipart/form-data">
	      <div class="row">
	        <div class="input-field col s6">
	          <input  id="name" type="text" class="validate" name="name">
	          <label for="name">Name</label>
	        </div>
	      </div>
	      <div class="row">	      	
	        <div class="input-field col s6">
	          <input id="email" type="email" class="validate" name="email">
	          <label for="email">E-mail</label>
	        </div>
	      </div>
	     
	     <div class="row">
     		<div class="input-field col s6">
	          <textarea id="textarea1" class="materialize-textarea" name="address"></textarea>
	          <label for="textarea1">Address</label>
	        </div>
	     </div>
	     <div class="row">
		     <div class="input-field col s6">
			    <select name="class">
			      <option>Class</option>
				    <?php for($i = 1; $i <= 10; $i++):?>
				    	<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
					<?php endfor;?>
			    </select>
			    <label>Select Your Class</label>
			  </div>
	     </div>	     
	      <div class="row">	      	
	        <div class="input-field col s6">
	          <input id="roll" type="number" class="validate" name="roll">
	          <label for="roll">Roll</label>
	        </div>
	      </div>
	     <div class="row">
	     	<h5>Hobby</h5>
	     	<p>
	          <input type="checkbox" class="filled-in" id="sports" name="hobby[]" value="sports" />
	  		  <label for="sports">Sports</label>
	      	</p>
	     	<p>
	          <input type="checkbox" class="filled-in" id="travle" name="hobby[]" value="travle"/>
	  		  <label for="travle">Travling</label>
	      	</p>
	     	<p>
	          <input type="checkbox" class="filled-in" id="readin" name="hobby[]" value="readin"/>
	  		  <label for="readin">Reading</label>
	      	</p>
	     	<p>
	          <input type="checkbox" class="filled-in" id="writeing" name="hobby[]" value="writeing"/>
	  		  <label for="writeing">Writing</label>
	      	</p>
	     </div>
	     <div class="row">
	     	<h5>Gender</h5>
	     	<p>
		      <input name="gender" type="radio" id="male" value="male" />
		      <label for="male">Male</label>
		    </p>
	     	<p>
		      <input name="gender" type="radio" id="female" value="female"/>
		      <label for="female">Female</label>
		    </p>
	     </div>
	     <div class="row">
	     	<div class="file-field input-field">
		      <div class="btn">
		        <span>File</span>
		        <input type="file" name="photo">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text">
		      </div>
		    </div>
	     </div>

		  <div class="row">
			  <button class="btn waves-effect waves-light" type="submit" name="save">Submit
			  <i class="material-icons right">send</i>
			  </button>
		  </div>
        
	    </form>
	  </div>
	</div>
	</div>

 
    <div class="info_show_all">
		<div class="container">
			<div class="row">
				<div class="col s12">
			      <table class="responsive-table">
			        <thead>
			          <tr>
			              <th data-field="id">Image</th>
			              <th data-field="id">Name</th>
			              <th data-field="name">E-mail</th>
			              <th data-field="price">Address</th>
			              <th data-field="price">Class</th>
			              <th data-field="price">Roll</th>
			              <th data-field="price">Hobby</th>
			              <th data-field="price">Gender</th>
			              <th data-field="price">Edit</th>
			          </tr>
	
			        </thead>
	<?php 				
	 $sql = "SELECT * FROM infos2";
     $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
       ?>
                   <tbody>
			          <tr>
			            <td><img src="img/<?php echo $row['photo'];?>" alt="" width="100" height="100"></td>
			            <td><?php echo $row['name'];?></td>
			            <td><?php echo $row['email'];?></td>
			            <td><?php echo $row['address'];?></td>
			            <td><?php echo $row['class'];?></td>
			            <td><?php echo $row['roll'];?></td>
			            <td><?php echo $row['hobby'];?></td>
			            <td><?php echo $row['gender'];?></td>
			            <td>
			            	<a href="update.php?update_id=<?php echo $row['id'];?>"><i class="material-icons">mode_edit</i></a><a href="index.php?delete_id=<?php echo $row['id'];?>"><i class="material-icons">delete</i></a>
			            </td>
                       </tr>
					</tbody>
	<?php									
	}
} else {
    echo "0 results";
}	?>		
		
					
			      </table>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
      <nav class="purple darken-3" role="navigation">
	    <div class="nav-wrapper container">
	      <p>Copyright &copy; info.com</p>

	      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
	        <li><a href="#"></a></li>
	      </ul>
	      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	    </div>
	  </nav>
    </div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>