  <?php include("includes/header.php"); ?>
  <?php   

  	$id =$_GET['id'];
  	$db = new Database;
  	$query ="SELECT * FROM `posts` WHERE id =".$id;
  	$posts = $db->select($query)->fetch_assoc();

   ?>
					<div class="col-md-6 col-md-offset-2">
								<div id="post">
									<h1><a href=""><?php echo $posts['title'];?></h1></a>
									<p><h4><?php echo formatDate($posts['date']);?>|
									<?php echo $posts['author'];?></h4></p>
									<hr>
									<P>
									<?php echo $posts['body'];?>

<?php include("includes/footer.php");?>