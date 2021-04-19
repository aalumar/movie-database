<!DOCTYPE html>

<html lang = "en">

	<head>
	
		<meta charset="UTF-8">
		<title>M</title>
		<link href="movie.css" rel = "stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
		  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		  <!-- Bootstrap Css -->
		<script type="text/javascript">
		  $(function() {
			 $( "#search" ).autocomplete({
			   source: 'ajax-db-search.php',
			 });
		  });
		</script>
		<style>
			/* Formatting search box */
			.search-box{
				width: 300px;
				position: relative;
				display: inline-block;
				font-size: 14px;
			}
			.search-box input[type="text"]{
				height: 32px;
				padding: 5px 10px;
				border: 1px solid #CCCCCC;
				font-size: 14px;
			}
			.result{
				position: absolute;        
				z-index: 999;
				top: 100%;
				left: 0;
			}
			.search-box input[type="text"], .result{
				width: 50%;
				box-sizing: border-box;
			}
			/* Formatting result items */
			.result p{
				margin: 0;
				width: 50%;
				padding: 7px 10px;
				border: 1px solid #CCCCCC;
				border-top: none;
				cursor: pointer;
			}
			.result p:hover{
				background: #f2f2f2;
			}	
		</style>
		
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
							
							<!--<form action="">
								<label for="filter">Search by:</label>
								<select id="select" name="Select">
								<option value="title">Title</option>
								<option value="director">Director</option>
								<option value="cast">Cast</option>
								<option value="agerating">Age Rating</option>
								<option value="releaseyear">Release Year</option>
								</select>
								<input type="text" placeholder="Search.." name="search_text" id="search_text">
								<button type="submit" name="submit">Submit</button>
							</form>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	
						</div>-->

						<div class="search-box">
							<form action="" method="post">
							<input type="text" name="search" id="search" placeholder="Search here...." class="form-control">
							<button type="submit" name="submit">Submit</button> 
							</form>
        					<div class="result"></div>
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
							if(isset($_POST['submit'])){
								$movieNameQuery = $_POST['search'];
								$query = "SELECT * FROM `Movie` WHERE Title LIKE '%$movieNameQuery%' LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								$movieID = $row ["movieID"];
								$rating = $row["IMDBRating"];
								$releaseYear = $row["ReleaseYear"];
								$runTime = $row ["Runtime"];
								$revenue = $row ["Revenue"];
								$IMDBRating = $row["IMDBRating"];
								$metaScore = $row["Metascore"];
								$description = $row["Description"];
								$directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID ";
								$genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID";
								$directorResult = $conn->query($directorQuery);
								$directorRow = $directorResult->fetch_assoc();
								$director = $directorRow ["directorName"];
								$genreResult = $conn->query($genreQuery);
								$actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID";
								$actorsResult = $conn->query($actorsQuery);		
							}
							else {
								$query = "SELECT * FROM `Movie` ORDER BY RAND() LIMIT 1";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								$movieID = $row ["movieID"];
								$rating = $row["IMDBRating"];
								$releaseYear = $row["ReleaseYear"];
								$runTime = $row ["Runtime"];
								$revenue = $row ["Revenue"];
								$IMDBRating = $row["IMDBRating"];
								$metaScore = $row["Metascore"];
								$description = $row["Description"];
								$directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID ";
								$genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID";
								$directorResult = $conn->query($directorQuery);
								$directorRow = $directorResult->fetch_assoc();
								$director = $directorRow ["directorName"];
								$genreResult = $conn->query($genreQuery);
								$actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID";
								$actorsResult = $conn->query($actorsQuery);
							}
							
						?>
							<img src="<?php echo $row ["PosterLink"]; ?>" alt="trailer">
							<!--<img src="images/poster1.png" alt="Poster1">
							<img src="images/poster2.png" alt="Poster2">-->
							
					
							<h3><?php echo $row ["Title"]; 
									if($row["IMDBRating"] >= 8.7){
										echo "  " . '&#11088;&#11088;&#11088;&#11088;&#11088;';
									}
									else {
										echo "  " . '&#11088;&#11088;&#11088;&#11088;';
									}
							?></h3>
							
							<div class="vertical-menu-type-2">
				
							<li><a href="">Add to Favourites +</a>
							<li><a href="">More Like This</a>
							
							</div>
							<b>
								<br>Release Date (UK): <?php echo $releaseYear; ?>
								<br>Genre(s): <?php while($genreRow = $genreResult->fetch_assoc()){echo $genreRow ["Name"] . ", ";}?>
								<br>Starring: <?php while($actorsRow = $actorsResult->fetch_assoc()){echo $actorsRow ["Name"] . ", ";}?>
								<br>Running time: <?php echo $runTime;?>
								<br>Directed by: <?php echo $director;?>
								<br>Revenue: $<?php echo $revenue;?>
								<br>IMDB Rating: <?php echo $IMDBRating; ?>
								<br>Metascore (Critics): <?php echo $metaScore; ?>
								<br>Synopsis: <?php echo $description;?>
								<br><br><br><br><br><br>
							</b>
						
						</div>
							<div class="vertical-menu-type-2">
								<ul>
									<div id="rightside1">
									<li>
										<a href="">Random Film</a>
									</li>
									<li><a href="#">Genre</a>
									</li>
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