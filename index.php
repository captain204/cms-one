<?php include("config/config.php");?>
<?php include("libraries/db.php");?>
<?php include("helpers/format-helper.php");?>
<?php
	$db = new Database();
	//Create query
	$query = "SELECT * FROM `posts`";
	//Run query
	$posts = $db->select($query);  

	$query ="SELECT * FROM `categories`";
	$categories = $db->select($query);
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
		<title> Cms-one</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/cms-one.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		</head>
			<body>
				<nav class="navbar">
					<div class="container">
						<ul class="nav navbar-nav">
							<li><a href="index.php" style="color: white;">Home</a></li>
							<li><a href="posts.php" style="color: white;">All Posts</a></li>
						</ul>
					</div>
				</nav>
				<header class="container">
					<div class="col-md-8 col-md-offset-1" style="background:silver;">
							<div class="row">
								<div class="col-md-6 text-right">
									<img src="images/711px-PHP-logo.svg.png" style="height: 200px; width: 200px;">
								</div>
								<div class="col-md-6  text-center">
									<h1 class="lead" id="page-title">PHP blog sample</h1>
									<small>Php news, tutorials and conferences</small>
								</div>	
							</div>
					</div>				
				</header>
				<section class="body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-md-offset-2">
								<?php if($posts):?>
								<?php while($row =$posts->fetch_assoc()):?>
								<div id="post">
									<h1><a href=""><?php echo $row['title'];?></h1></a>
									<p><h4><?php echo formatDate($row['date']);?>|<?php echo$row['author'];?></h4></p>
									<hr>
									<P><?php echo shortenText($row['body']);?></P>
									<button class="btn btn-default btn-block"><a href="post.php?id=<?php echo urlencode($row['id']);?>">Read more</a></button>
								</div>
								<?php endwhile;?>
								<?php else:?>
									<p>There are no posts yet</p>
								<?php endif;?>	
								</div>
							</div>
							<div class="col-md-4" id="sidebar">
								<div id="about">
									<h1 class="text-center">About</h1>
									<p class="lead">Many large development corporations are finally waking up to this threat and are beginning to take the problem seriously, investing time and resources into serious defensive code work. In reality, it’s hard to graft in defenses after an attack</p>
								</div>	
								<div id="categories">
									<h2 class="text-left">Categories</h2>
									<?php if($categories):?>
									<ol class="list-unstyled">
									<?php while($row = $categories->fetch_assoc()):?>
										<li><a href="#"><?php echo $row['name'];?> </a></li>
									</ol>
									<?php endwhile;?>
									<?php else:?>
									<p> There are no categories yet </p>
								<?php endif;?>
								</div>												
							</div>
						</div>
					</div>
				</section>
				<hr>
				<footer class="navbar navbar-default navbar-fixed-bottom">
					<div class="container">
						<p class="text-center footer-text">Php Nigeria blog &copy;</p>
					</div>
				</footer>
			</body>
	</html>