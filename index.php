<?php

    session_start(); 

    //include("src/TwitterOAuth.php");
    require "autoload.php";
    //require "autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;

    $apikey="***************************";
    $apisecret="***************************";
    $accesstoken="82205323-***************************";
    $accesstokensecret="***************************";

    $connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesstokensecret);

    
    $content=$connection->get("https://api.twitter.com/1.2/statuses/user_timeline.json?screen_name=twitterapi&count=2");
    $statuses1 = $connection->get("search/tweets", array("q" => "twitterapi"));
    $tweets= $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json");
    $statuses = $connection->get("statuses/home_timeline", array("count" =>100));
    // print_r($content);

?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Basil's Home Twitter Feed</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Basil's Twitter Feed</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://basilkhan.ca/">Portfolio</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Basil's Home Twitter Feed</span>
                        <hr class="star-light">
                        <span class="skills">Most Favorited Tweets in Basil's Home Twitter Feed</span>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Welcome!</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  
                </div>
            </div>
        </div>
    </section>




    <!-- Tweet Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">

                <?php
                $n=0;
                foreach ($statuses as $tweet) {
              
                $favorites=$tweet->favorite_count;
                
                if ($favorites>10){
                    $embed= $connection->get("statuses/oembed", array("id"=>$tweet->id));
                    echo"<div class=\"col-lg-4 col-md-4 col-sm-12 text-center\">".$embed->html."</div>";
                    $n=$n+1;
                    $t=$n/3; //after every 3rd post...

                    if (is_int($t)){
                        echo"<div class=\"clearfix\"></div>"; // add a clearfix for a more tighter fit for tweet displays
                    }
                }

                }

                ?>
            </div>
            
          </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
       
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php echo date("Y"); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
