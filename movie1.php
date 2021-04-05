<!DOCTYPE html>

<html lang = "en">

	<head>
	
		<meta charset="UTF-8">
		<title>M</title>
		<link rel="stylesheet" href="movie.css">
		
	</head>
	
	<body>
	<?php
		$servername  = "localhost";
		$database = "mvDB";
		$username = "root";
		$password = "";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		if(!$conn){
			die("Connection failed: " . mysqli_connect_error());
			}
	?>		
			<div id="container">
			
				<div id="toparea">
		
					<header>
					
						<h1>TRAMZ</h1> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						<h4>Movie Database</h4> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
					
						<div class="topnav">
					
							<input type="text" placeholder="Search..">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
							
							<form action="">
								<label for="filter">Search by:</label>
								<select id="select" name="Select">
								<option value="director">Title</option>
								<option value="director">Director</option>
								<option value="cast">Cast</option>
								<option value="agerating">Age Rating</option>
									<option value="releaseyear">Release Year</option>
										</select>
									<input type="submit">
									</form>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				
							
							
						</div>
						
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h4>Hi, username &nbsp; |</h4>&nbsp; &nbsp; 
						<h4><a href="">Log out</a></h4>
					
					</header>
				
				</div>
			
				<div id="leftside">
			
					<br>
					<h2>Featured/Top Rated</h2>
		
						<div class="vertical-menu-type-1">
				
						<ul>
						<b>
							<li><a href=""><span class="redText"><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></span></a>
							<li><a href="">
							<?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?>
							</a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							<li><a href=""><?php $query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								echo $row ["Title"];	
							?></a>
							</b>
						</ul>
						
						</div>
				
				</div>
		
				
			
					<div id="welcome">
		
						<p>Welcome to the TRAMZ movie database. You can search by the title of a movie, or various other properties such as director, age rating or release year.</p>
				
					</div>
			
					<main>

						<div id="middlearea">
						<?php
							$query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
							$result = $conn->query($query);
							$row = $result->fetch_assoc();
							$movieID = $row ["movieID"];
							$rating = $row["IMDBRating"];
							$directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID ";
							$genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID";
							$directorResult = $conn->query($directorQuery);
							$directorRow = $directorResult->fetch_assoc();
							$genreResult = $conn->query($genreQuery);
							$actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID";
							$actorsResult = $conn->query($actorsQuery);
						?>
							<img src="<?php echo $row ["PosterLink"]; ?>" alt="trailer">
							<!--<img src="images/poster1.png" alt="Poster1">
							<img src="images/poster2.png" alt="Poster2">-->
							
					
							<h3><?php echo $row ["Title"]; ?></h3> &#9733;&#9733;&#9733;&#9733;&#9734;
							
							<div class="vertical-menu-type-2">
				
							<li><a href="">Add to Favourites +</a>
							<li><a href="">More Like This</a>
							
							</div>
								<?php
								
								?>
							<b>
								<br>Release Date (UK): <?php echo $row["ReleaseYear"]; ?>
								<br>Genre(s): <?php while($genreRow = $genreResult->fetch_assoc()){echo $genreRow ["Name"] . ", ";}?>
								<br>Starring: <?php while($actorsRow = $actorsResult->fetch_assoc()){echo $actorsRow ["Name"] . ", ";}?>
								<br>Running time: <?php echo $row ["Runtime"]; ?>
								<br>Directed by: <?php echo $directorRow ["directorName"]; ?>
								<br>Revenue: $<?php echo $row ["Revenue"]; ?>
								<!--<br>Series: N/A
								<br>Collection: Collection1
								<br>Age rating: PG-->
								<br>Avg. User Rating: <?php echo $row["IMDBRating"]; ?> <!--<a href="">(Show User Reviews)</a>-->
								<!--<br>Available now on: Netflix (Subscription), Youtube (£4.99), Blu-Ray, DVD-->
								<br>Synopsis: <?php echo $row["Description"]; ?>
								<br><br><br><br><br><br>
								
							</b>
						
						</div>
					
						
					
							<div class="vertical-menu-type-2">
						
								<ul>
									
									<div id="rightside1">
									
									<li>
										
										<a href="">Random Film</a>
										<?php
											$query = "SELECT * FROM Movie ORDER BY RAND() LIMIT 1";
											$result = $conn->query($query);
											$row = $result->fetch_assoc();	 
										?>
									</li>
									<li><a href="">Genres</a>
									<li><a href="">My Favourites</a>
									<li><a href="">My Profile</a>
									<li><a href="">Settings</a>
									
									</div>
									
									<div id="rightside2">
									
									<li><a href="">References</a>
									<li><a class="active" href="">About us</a>
									<li><a href="">Contact us</a>
									
									</div>
									
								</ul>
								<br><br><br><br><br>
						
							</div>
						
						
						
					</main>
		
					<footer>
					
					</footer>
		
				
			
			</div>	
	</body>
	
</html>