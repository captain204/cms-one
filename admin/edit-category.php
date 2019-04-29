<?php include("includes/header.php");?>
<?php

$id =$_GET['id'];
$db = new Database;
$query ="SELECT * FROM categories WHERE id=".$id;
$categories = $db->select($query)->fetch_assoc();



?>
	<form role="form" method="post" action="edit-category.php">
		<div class="form-group">
			<label for="id">Category id</label>
			<input type="text" name="id" id="id" class="form-control" value="<?php echo 
			$categories['id']?>">
		</div>
		<div class="form-group">
			<label for="name">Category name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo   
			$categories['name'];?>">
		</div>
		<button name="submit" class="btn btn-primary">Submit</button>
		 <a href="index.php" class="btn btn-primary">Cancel</a>
		 <button name="submit" class="btn btn-danger"><span class="glyphicon">Delete</span></button>
	</form>
<?php include("includes/footer.php");?>