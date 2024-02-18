<!DOCTYPE html>
<html lang="">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clubs</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">

    <style type="text/css">
        body {
            background-image: url("https://i.pinimg.com/originals/47/6f/29/476f29ab268611e99ed45d2196390f75.png");
            background-repeat: repeat-y;
            background-color: blue;
        }
    </style>

</head>
<body>
<main>
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-center fixed-top" style="background-color: blue">
        <a class="navbar-brand d-flex col-sm-4 mr-auto" style="color: white" href="index.php">FIO team</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="nav navbar-nav mr-auto justify-content-end">
                <li class="col-sm-4"></li>
                <li class="nav-item col-sm-2">
                    <a href="home.php" class="stretched-link text-center" style="color: white">Home</a>
                </li>
                <li class="nav-item col-sm-2">
                    <a href="player.php" class="stretched-link text-center" style="color: white">Player</a>
                </li>
                <li class="nav-item col-sm-2">
                    <a href="clubs.php" class="stretched-link text-center" style="color: white">Clubs</a>
                </li>
                <li class="nav-item col-sm-2">
                    <a href="competitions.php" class="stretched-link text-center" style="color: white">Competitions</a>
                </li>
            </ul>
        </div>

        <form action="" id="search-box" method="post">
            <input type="text" name="club" placeholder="Clubs" id="search-text">
            <button type="submit" id="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <?php
        include('admincp/config/config.php');
        if (isset($_POST["club"])) {
            $club_name = $_POST["club"];
        }
        $sql1 = "SELECT * FROM clubs WHERE pretty_name LIKE CONCAT('%',?,'%') ORDER BY total_market_value DESC LIMIT 50";
        $club_id = $conn->prepare($sql1);
        $club_id->bind_param("s", $club_name);
        $club_id->execute();
        $club = $club_id->get_result();
        ?>
    </nav>

    <div class="latest-news" style="margin-top: 7rem">
        <div class="container">
            <div class="row">
                <div class="col-12 title-section">
                    <h2 class="heading"
                        style="color: white; border-left: 10px solid #b1154a; background-color: darkblue">
                        &nbsp;&nbsp;CLUBS </h2>
                    <img class="img-fluid" src="images/chelsea.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <br>

    <?php
    if ($row = $club->fetch_array()) {
        ?>
        <div class="container">
            <div class="row" style="margin-left: 0">
                <div class="card" style="width: 159px">
                    <img class="card-img-top" src="<?php echo $row['img_url'] ?>" alt="Card image">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $row['pretty_name'] ?></h6>
                    </div>
                    <a href="profile/clubprofile.php?value=club&id=<?php echo $row['club_id'] ?>"
                       class="btn btn-primary stretched-link">See Profile</a>
                </div>
                <?php
                while ($row = $club->fetch_array()) {
                    ?>
                    <div class="card" style="width: 159px">
                        <img class="card-img-top" src="<?php echo $row['img_url'] ?>" alt="Card image">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $row['pretty_name'] ?></h6>
                        </div>
                        <a href="profile/clubprofile.php?value=club&id=<?php echo $row['club_id'] ?>"
                           class="btn btn-primary stretched-link">See Profile</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <br>
        <?php
    }
        include('admincp/config/config.php');
        $sql_club = 'SELECT * FROM `clubs` order by `total_market_value` desc limit 18;';
        $query_club = mysqli_query($conn, $sql_club);
        ?>
        <br>
        <div class="container">
            <h2 style="color: white; border-left: 10px solid #b1154a;">&nbsp;&nbsp;Most valuable clubs</h2>
            <div id="demo" class="carousel slide test" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row" style="margin: auto">
                            <?php
                            $i = 0;
                            $j = $i;
                            while ($i < $j + 6 and $row = mysqli_fetch_array($query_club)) {
                                $i++;
                                ?>
                                <div class="column" style="margin-left: -15px; padding: 20px">
                                    <div class="card"
                                         style="background-color: gold; color: black; width: 159px; height: 350px">
                                        <img class="card-img-top" src="<?php echo $row['img_url'] ?>" alt="Card image">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo $row['pretty_name'] ?></h6>
                                        </div>
                                        <a href="profile/clubprofile.php?value=club&id=<?php echo $row['club_id'] ?>"
                                           class="btn btn-primary stretched-link">See Profile</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row" style="margin: auto">
                            <?php
                            $j = $i;
                            while ($i < $j + 6 and $row = mysqli_fetch_array($query_club)) {
                                $i++;
                                ?>
                                <div class="column" style="margin-left: -15px; padding: 20px">
                                    <div class="card"
                                         style="background-color: silver; color: black; width: 159px; height: 350px">
                                        <img class="card-img-top" src="<?php echo $row['img_url'] ?>" alt="Card image">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo $row['pretty_name'] ?></h6>
                                        </div>
                                        <a href="profile/clubprofile.php?value=club&id=<?php echo $row['club_id'] ?>"
                                           class="btn btn-primary stretched-link">See Profile</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row" style="margin: auto">
                            <?php
                            while ($row = mysqli_fetch_array($query_club)) {
                                $i++;
                                ?>
                                <div class="column" style="margin-left: -15px; padding: 20px">
                                    <div class="card"
                                         style="background-color: chocolate; color: white; width: 159px; height: 350px">
                                        <img class="card-img-top" src="<?php echo $row['img_url'] ?>" alt="Card image">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo $row['pretty_name'] ?></h6>
                                        </div>
                                        <a href="profile/clubprofile.php?value=club&id=<?php echo $row['club_id'] ?>"
                                           class="btn btn-primary stretched-link">See Profile</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" style="width: 5%" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" style="width: 5%" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
</main>
<footer>
    <?php include('footer.php'); ?>
</footer>
</body>
</html>
