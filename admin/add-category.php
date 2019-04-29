<?php include("includes/header.php");?>
<?php
 if (isset($_POST['submit'])) {
 	$db = new Database;
	$category = mysqli_real_escape_string($db->link, $_POST['category']);
	if ( empty($category) ) {
		$error ="Please fill out the required fields";
	} else{

	$query ="INSERT INTO `categories`(`id`, `name`) 
				VALUES ('','$category')";
				$insert_row =$db->insert($query);
				
	}
}

?>


	<form role="form" method="post" action="add-category.php">
		<div class="form-group">
			<label for="category">Add category</label>
			<input type="text" name="category" id="category" class="form-control">
		</div>
		<button name="submit" class="btn btn-primary">Submit</button>
		<a href="index.php" class="btn btn-primary">Cancel</a>
	</form>
<?php include("includes/footer.php");?>