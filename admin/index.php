<?php include("includes/header.php");?>
<?php
$db = new Database;
$query = "SELECT * FROM posts";
$posts = $db->select($query);

$query ="SELECT * FROM categories";
$categories =$db->select($query);

?>
		<h3 class="text-center">Posts</h3>
	<table class="table table-striped">
		<tr>
			<th>Post id</th>
			<th>Post title</th>
			<th>Category</th>
			<th>Author</th>
			<th>Date</th>
		</tr>
			<?php while($row =$posts->fetch_assoc()):?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><a href="edit-post.php?id=<?php echo $row['id']?>"><?php echo $row['title'];?></a></td>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['author'];?></td>
				<td><?php echo formatDate($row['date']);?></td>
			</tr>
			<?php endwhile;?>
		
	</table>
		<h3 class="text-center">Categories</h3>
	<table class="table table-striped">
		<tr>
			<th>Category id</th>
			<th>Category name</th>
		</tr>
		<?php while($row =$categories->fetch_assoc()):?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><a href="edit-category.php?id=<?php echo $row['id']?>"><?php echo $row['name'];?></a></td>
		</tr>
		<?php endwhile;?>
	</table>
<?php include("includes/footer.php");?>
