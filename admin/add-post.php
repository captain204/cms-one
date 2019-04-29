<?php include("includes/header.php");?>
<?php
$db = new Database;
$query ="SELECT * FROM categories";
$categories = $db->select($query);

?>
<?php
if (isset($_POST['submit'])) {
	$title = mysqli_real_escape_string($db->link, $_POST['title']);
	$body = mysqli_real_escape_string($db->link, $_POST['body']);
	$category = mysqli_real_escape_string($db->link, $_POST['category']);
	$author = mysqli_real_escape_string($db->link, $_POST['author']);
	$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
	if ( empty($title) || empty($body) || empty($category) || empty($author) || empty($tags) ) {
		$error ="Please fill out the required fields";
	} else{

	$query ="INSERT INTO posts
				(title, body, category, author, date)
				Values('$title', '$body', '$category', '$author', '$tags')";
				$insert_row =$db->insert($query);
				
	}
}

mU2mmy


?>
	<div class="container-fluid">
		<form method="post" action="add-post.php">
			<div class="form-group">
				<label for="title">Post title</label>
				<input type="text" name="title" id="title" class="form-control" placeholder="Enter title of post">
			</div>
			<div class="form-group">
				<label for="body">Post Body</label>
				<textarea name="body" id="body" class="form-control" placeholder="Post body"></textarea>
			</div>
			<div class="form-group">
				<label for="categories">Categories</label>
				<select name="category" id="categories" class="form-control">
					<?php while($row = $categories->fetch_assoc()):?>
					<option><?php echo $row['name'];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label for="author">Post Author</label>
				<input type="text" name="author" id="author" class="form-control" placeholder="Enter Post author">
			</div>
			<div class="form-group">
				<label for="tags">Tags</label>
				<input type="text" name="tags" id="tags" class="form-control" placeholder="Enter Post tags">
			</div>
			<div>
				<button name="submit" class="btn btn-primary"><span class="glyphicon">Submit</span></button>
				<a href="index.php" class="btn btn-primary">Cancel</a>
			</div>
		</form>
	</div>
<?php include("includes/footer.php");?>