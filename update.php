<?php 
	if(isset($_GET['update_id'])){
		$u_id= $_GET['update_id'];
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
		$sql="SELECT * FROM infos2 WHERE id=". $u_id ;
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($result);
	?>	
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sristiweb</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<nav class="purple darken-3" role="navigation">
	    <div class="nav-wrapper container">
	      <a id="logo-container" href="#" class="brand-logo">Sristiweb.com</a>

	      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
	        <li><a href="#"></a></li>
	      </ul>
	      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons"></i></a>
	    </div>
	</nav>

	<div class="main-login-form">
		<div class="container">
		<div class="row">
	    <form method="post" action="index.php" class="col s9 offset-s3" enctype="multipart/form-data">
	      <div class="row">
	        <div class="input-field col s6">
	          <input  id="name" type="text" class="validate" name="name" value="<?php echo $row['name']; ?>">
	          <label for="name">Name</label>
	        </div>
	      </div>
	      <div class="row">	      	
	        <div class="input-field col s6">
	          <input id="email" type="email" class="validate" name="email" value="<?php echo $row['email']; ?>">
	          <label for="email">E-mail</label>
	        </div>
	      </div>
	     
	     <div class="row">
     		<div class="input-field col s6">
	          <textarea id="textarea1" class="materialize-textarea" name="address" ><?php echo $row['address']; ?></textarea>
	          <label for="textarea1">Address</label>
	        </div>
	     </div>
	     <div class="row">
		     <div class="input-field col s6">
			    <select name="class">
			      <option>Class</option>
				    <?php for($i = 1; $i <= 10; $i++):?>
				    	<option value="<?php echo $i;?>" <?php if($row['class'] == $i){echo'selected="selected"';} ?>> <?php echo $i;?> </option>
					<?php endfor;?>
			    </select>
			    <label>Select Your Class</label>
			  </div>
	     </div>	     
	      <div class="row">	      	
	        <div class="input-field col s6">
	          <input id="roll" type="number" class="validate" name="roll" value="<?php echo $row['roll']; ?>">
	          <label for="roll">Roll</label>
	        </div>
	      </div>
	     <div class="row">
	     	<h5>Hobby</h5>
	     	<p>
	          <input type="checkbox" class="filled-in" id="sports" name="hobby[]" value="sports"
				<?php $hobbies = explode(',', $row['hobby']);
						foreach($hobbies as $h){
							if($h == 'sports'){echo'checked="checked"';}
						}
				?>
    	      />
	  		  <label for="sports">Sports</label>
	      	</p>
	     	<p>
	          <input type="checkbox" class="filled-in" id="travle" name="hobby[]" value="travle"
			  <?php $hobbies = explode(',', $row['hobby']);
						foreach($hobbies as $h){
							if($h == 'travle'){echo'checked="checked"';}
						}
				?>
			  />
	  		  <label for="travle">Travling</label>
	      	</p>
	     	<p>
	          <input type="checkbox" class="filled-in" id="readin" name="hobby[]" value="readin"
			  <?php $hobbies = explode(',', $row['hobby']);
						foreach($hobbies as $h){
							if($h == 'readin'){echo'checked="checked"';}
						}
				?>
			  />
	  		  <label for="readin">Reading</label>
	      	</p>
	     	<p>
	          <input type="checkbox" class="filled-in" id="writeing" name="hobby[]" value="writeing"
			  <?php $hobbies = explode(',', $row['hobby']);
						foreach($hobbies as $h){
							if($h == 'writeing'){echo'checked="checked"';}
						}
				?>
			  />
	  		  <label for="writeing">Writing</label>
	      	</p>
	     </div>
	     <div class="row">
	     	<h5>Gender</h5>
	     	<p>
		      <input name="gender" type="radio" id="male" value="male" <?php if($row['gender']=='male'){echo 'checked="checked"';}?> />
		      <label for="male">Male</label>
		    </p>
	     	<p>
		      <input name="gender" type="radio" id="female" value="female" <?php if($row['gender']=='female'){echo 'checked="checked"';}?>/>
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
		   <input  type="hidden"  name="id" value="<?php echo $row['id']; ?>">

	     </div>

		  <div class="row">
			  <button class="btn waves-effect waves-light" type="submit" name="update">Update
			  <i class="material-icons right">send</i>
			  </button>
		  </div>
        
	    </form>
	  </div>
	</div>
	</div>
	
	<div class="footer-copyright">
      <nav class="purple darken-3" role="navigation">
	    <div class="nav-wrapper container">
	      <p>Copyright &copy; sristiweb.com</p>

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
<?php
 }
}
?>