<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <title>
        TRAMZ
    </title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="app.css">
    <script type="text/javascript">
      $(function() {
         $( "#search" ).autocomplete({
           source: 'ajax-db-search.php',
         });
      });
    </script>
</head>

<body>

    <!-- NAV -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="#" class="logo">
                    <i class='bx bx-camera-movie bx-tada main-color'></i>TRA<span class="main-color">MZ</span>
                </a>
                <div class="search-box">
                    <form action="" method="post">
                        <input type="text" name="search" id="search" placeholder="Search here...." class="form-control">
                        <button type="submit" name="submit">Submit</button> 
                    </form>
                    <div class="result"></div>
                </div>
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NAV -->
    <!-- MAIN MOVIE SECTION -->
    <?php
        $servername  = "localhost";
        $database = "mvDB";
        $username = "root";
        $password = "";
            
        $conn = mysqli_connect($servername, $username, $password, $database);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
            }
            if(isset($_POST['submit'])){
                $movieNameQuery = $_POST['search'];
                $query = "SELECT * FROM `Movie` WHERE Title LIKE '%$movieNameQuery%' LIMIT 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $movieID25 = $row ["movieID"];
                $rating = $row["IMDBRating"];
                $releaseYear = $row["ReleaseYear"];
                $runTime = $row ["Runtime"];
                $revenue = $row ["Revenue"];
                $IMDBRating = $row["IMDBRating"];
                $metaScore = $row["Metascore"];
                $description = $row["Description"];
                $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID25";
                $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID25";
                $directorResult = $conn->query($directorQuery);
                $directorRow = $directorResult->fetch_assoc();
                $director = $directorRow ["directorName"];
                $genreResult = $conn->query($genreQuery);
                $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID25";
                $actorsResult = $conn->query($actorsQuery);		
            }
            else {
                $query = "SELECT * FROM `Movie` WHERE ReleaseYear > 2018 ORDER BY RAND() LIMIT 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $movieID25 = $row ["movieID"];
                $rating = $row["IMDBRating"];
                $releaseYear = $row["ReleaseYear"];
                $runTime = $row ["Runtime"];
                $revenue = $row ["Revenue"];
                $IMDBRating = $row["IMDBRating"];
                $metaScore = $row["Metascore"];
                $description = $row["Description"];
                $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID25";
                $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID25";
                $directorResult = $conn->query($directorQuery);
                $directorRow = $directorResult->fetch_assoc();
                $director = $directorRow ["directorName"];
                $genreResult = $conn->query($genreQuery);
                $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID25";
                $actorsResult = $conn->query($actorsQuery);
            }
    ?>
    <div class="section">
        <div class="hero-slide-item">
            <img src="<?php echo $row["PosterLink"]?>" alt="">
            <div class="overlay"></div>
            <div class="hero-slide-item-content">
                <div class="item-content-wraper">
                    <div class="item-content-title">
                        <?php echo $row["Title"] ?>
                    </div>
                    <div class="movie-infos">
                        <div class="movie-info">
                            <i class="bx bxs-star"></i>
                            <span><?php echo $row["IMDBRating"] ?></span>
                        </div>
                        <div class="movie-info">
                            <i class="bx bxs-time"></i>
                            <span><?php echo $row["Runtime"] ?></span>
                        </div>
                    </div>
                    <div class="item-content-description">
                        <?php echo $row["Description"];?>
                        <br>
                        <br>
                        <b>Genre:</b> <?php while($genreRow = $genreResult->fetch_assoc()){echo $genreRow ["Name"] . ", ";}?>
                        <br>
                        <b>Starring:</b> <?php while($actorsRow = $actorsResult->fetch_assoc()){echo $actorsRow ["Name"] . ", ";}?>
                        <br>
                        <b>Directed by:</b> <?php echo $director?>
                        <br><b>Metascore (Critics):</b> <?php echo $metaScore; ?>
                        <br><b>Revenue: $</b><?php echo $revenue;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN MOVIE SECTION -->
    <!-- LATEST MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                latest movies
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                    $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 ORDER BY RAND () LIMIT 1";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $movieID1 = $row ["movieID"];
                    $rating = $row["IMDBRating"];
                    $releaseYear = $row["ReleaseYear"];
                    $runTime = $row ["Runtime"];
                    $revenue = $row ["Revenue"];
                    $IMDBRating = $row["IMDBRating"];
                    $metaScore = $row["Metascore"];
                    $description = $row["Description"];
                    $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID1";
                    $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID1";
                    $directorResult = $conn->query($directorQuery);
                    $directorRow = $directorResult->fetch_assoc();
                    $director = $directorRow ["directorName"];
                    $genreResult = $conn->query($genreQuery);
                    $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID1";
                    $actorsResult = $conn->query($actorsQuery);
                    //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]; ?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $rating?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $runTime?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID2 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID2";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID2";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID2";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 AND movieID <> $movieID2 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID3 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID3";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID3";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID3";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 AND movieID <> $movieID2 AND movieID <> $movieID3 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID4 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID4";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID4";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID4";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 AND movieID <> $movieID2 AND movieID <> $movieID3 AND movieID <> $movieID4 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID5 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID5";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID5";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID5";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 AND movieID <> $movieID2 AND movieID <> $movieID3 AND movieID <> $movieID4 AND movieID <> $movieID5 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID6 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID6";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID6";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID6";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 AND movieID <> $movieID2 AND movieID <> $movieID3 AND movieID <> $movieID4 AND movieID <> $movieID5 AND movieID <> $movieID6 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID7 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID7";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID7";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID7";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM `Movie` WHERE ReleaseYear >= 2017 AND movieID <> $movieID1 AND movieID <> $movieID2 AND movieID <> $movieID3 AND movieID <> $movieID4 AND movieID <> $movieID5 AND movieID <> $movieID6 AND movieID <> $movieID7 ORDER BY RAND () LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID8 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID8";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID8";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID8";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
            </div>
        </div>
    </div>

    <!-- ACTION MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                Action movies
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID9 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID9";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID9";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID9";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID10 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID10";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID10";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID10";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 AND Movie.movieID <> $movieID10 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID11 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID11";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID11";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID11";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 AND Movie.movieID <> $movieID10 AND Movie.movieID <> $movieID11 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID12 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID12";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID12";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID12";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 AND Movie.movieID <> $movieID10 AND Movie.movieID <> $movieID11 AND Movie.movieID <> $movieID12 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID13 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID13";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID13";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID13";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 AND Movie.movieID <> $movieID10 AND Movie.movieID <> $movieID11 AND Movie.movieID <> $movieID12 AND Movie.movieID <> $movieID13 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID14 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID14";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID14";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID14";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 AND Movie.movieID <> $movieID10 AND Movie.movieID <> $movieID11 AND Movie.movieID <> $movieID12 AND Movie.movieID <> $movieID13 AND Movie.movieID <> $movieID14 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID15 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID15";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID15";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID15";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g1' AND Movie.movieID <> $movieID9 AND Movie.movieID <> $movieID10 AND Movie.movieID <> $movieID11 AND Movie.movieID <> $movieID12 AND Movie.movieID <> $movieID13 AND Movie.movieID <> $movieID14 AND Movie.movieID <> $movieID15 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID16 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID16";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID16";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID16";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
            </div>
        </div>
    </div>
    <!-- SCI-FI MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                Sci-Fi movies
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID17 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID17";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID17";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID17";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID18 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID18";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID18";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID18";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 AND Movie.movieID <> $movieID18 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID19 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID19";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID19";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID19";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 AND Movie.movieID <> $movieID18 AND Movie.movieID <> $movieID19 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID20 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID20";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID20";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID20";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 AND Movie.movieID <> $movieID18 AND Movie.movieID <> $movieID19 AND Movie.movieID <> $movieID20 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID21 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID21";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID21";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID21";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 AND Movie.movieID <> $movieID18 AND Movie.movieID <> $movieID19 AND Movie.movieID <> $movieID20 AND Movie.movieID <> $movieID21 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID22 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID22";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID22";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID22";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 AND Movie.movieID <> $movieID18 AND Movie.movieID <> $movieID19 AND Movie.movieID <> $movieID20 AND Movie.movieID <> $movieID21 AND Movie.movieID <> $movieID22 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID23 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID23";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID23";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID23";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
                <!-- MOVIE ITEM -->
                <a href="#" class="movie-item">
                    <?php
                        $query = "SELECT * FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g6' AND Movie.movieID <> $movieID17 AND Movie.movieID <> $movieID18 AND Movie.movieID <> $movieID19 AND Movie.movieID <> $movieID20 AND Movie.movieID <> $movieID21 AND Movie.movieID <> $movieID22 AND Movie.movieID <> $movieID23 ORDER BY RAND() LIMIT 1";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $movieID24 = $row ["movieID"];
                        $rating = $row["IMDBRating"];
                        $releaseYear = $row["ReleaseYear"];
                        $runTime = $row ["Runtime"];
                        $revenue = $row ["Revenue"];
                        $IMDBRating = $row["IMDBRating"];
                        $metaScore = $row["Metascore"];
                        $description = $row["Description"];
                        $directorQuery = "SELECT Director.directorName FROM Movie JOIN Movie_Director ON Movie.movieID = Movie_Director.movieID JOIN Director ON Director.directorID = Movie_Director.directorID WHERE Movie.movieID = $movieID24";
                        $genreQuery = "SELECT Genre.Name FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Movie.movieID = $movieID24";
                        $directorResult = $conn->query($directorQuery);
                        $directorRow = $directorResult->fetch_assoc();
                        $director = $directorRow ["directorName"];
                        $genreResult = $conn->query($genreQuery);
                        $actorsQuery = "SELECT Actor.Name FROM Movie JOIN Movie_Cast ON Movie.movieID = Movie_Cast.movieID JOIN Actor ON Actor.actorID = Movie_Cast.actorID WHERE Movie.movieID = $movieID24";
                        $actorsResult = $conn->query($actorsQuery);
                        //SELECT Movie.Title FROM Movie JOIN Movie_Genre ON Movie.movieID = Movie_Genre.movieID JOIN Genre ON Genre.genreID = Movie_Genre.genreID WHERE Genre.genreID = 'g10' ORDER BY RAND() LIMIT 1
                    ?>
                    <img src="<?php echo $row ["PosterLink"]?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo $row ["Title"]?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row ["IMDBRating"]?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row ["Runtime"]?></span>
                            </div>
                            <div class="movie-info">
                                <span>Director: <?php echo $director?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- END MOVIE ITEM -->
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
    <!-- OWL CAROUSEL 2 (jQuery Plugin) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- APP SCRIPT -->
    <script src="app.js"></script>
</body>

</html>