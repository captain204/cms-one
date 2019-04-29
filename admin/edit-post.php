<?php include("includes/header.php");?>
<?php

$id =$_GET['id'];
  	$db = new Database;
  	$query ="SELECT * FROM `posts` WHERE id='$id'";
  	$posts = $db->select($query)->fetch_assoc();

// Categories

$query ="SELECT * FROM categories WHERE id='$id'";
$categories =$db->select($query);

?>
<?php
if (isset($_POST['submit'])) {
	$title = mysqli_real_escape_string($db->link, $_POST['title']);
	$body = mysqli_real_escape_string($db->link, $_POST['body']);
	$category = mysqli_real_escape_string($db->link, $_POST['category']);
	$author = mysqli_real_escape_string($db->link, $_POST['author']);
	$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
	if ( empty($title)  || empty($body) || empty($category)  || empty($author) || empty($author)){
		$error ="Please fill out the required fields";
	} else{

	$query ="UPDATE  posts
				SET 
				title ='$title',
				body = '$body',
				category = '$category',
				author = '$author',
				tags = '$tags'
				WHERE id =".$id;
				$update_row =$db->update($query);
	}
}
?>

	<div class="container-fluid">
		<form method="post" action="edit-post.php?id=<?php echo $id?>">
			<div class="form-group">
				<label for="post_title">Post title</label>
				<input type="text" name="title" id="post_title" class="form-control" placeholder="Enter title of post" value="<?php echo $posts['title'];?>">
			</div>
			<div class="form-group">
				<label for="body">Post Body</label>
				<textarea name="body" id="body" class="form-control" placeholder="Post body">
					<?php echo $posts['body'];?>
				</textarea>
			</div>
			<div class="form-group">
				<label for="categories">Categories</label>
				<select name="category" id="categories" class="form-control">
				<?php while ($row =$categories->fetch_assoc()):?>
					<option value="<?php echo $row['id']?>"><?php echo $row['name'];?></option>
				<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label for="author">Post Author</label>
				<input type="text" name="author" id="author" class="form-control" placeholder="Enter Post author" value="<?php echo $posts['author'];?>">
			</div>
			<div class="form-group">
				<label for="tags">Tags</label>
				<input type="text" name="tags" id="tags" class="form-control" placeholder="Enter Post tags" value="<?php echo $posts['tags'];?>">
			</div>
			<div>
				<button name="submit" class="btn btn-primary"><span class="glyphicon">Submit</span></button>
				<a href="index.php" class="btn btn-primary">Cancel</a>
				<a  class="btn btn-danger" href="delete.php?id=<?php echo $id;?>">Delete</a>
			</div>
		</form>
	</div>
<?php include("includes/footer.php");?>