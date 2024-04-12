
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <script src="jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Sudoku Management System</title>

   

    <!-- Bootstrap core CSS -->
    <link href="Landingpage_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Sudoku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Contact</a>
            </li>
          </ul>
          <!-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" >
            <img class="first-slide" src="Picture1.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Sudoku Kingdom - The Ultimate Sudoku Experience</h1>
                <p> Welcome to Sudoku Kingdom - The Ultimate Sudoku Experience.
                  Play Sudoku experience the thrill of playing Sudoku with our intuitive and user-friendly puzzle builder. Choose from easy, medium, or hard puzzles.
                  Show off your skills and climb the leaderboard to become the ultimate Sudoku champion.Master Your Skills improve your Sudoku game with our comprehensive puzzles.
                  
                </p>
                <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="dcc.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Chandana D C</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <!--<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="me.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Sahana C</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <!--<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="vi.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Vaishnavi B E</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
           <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Admin <span class="text-muted"></span></h2>
            <p class="lead"> Dedicated for website administrators to manage and maintain the website. It typically includes links to various administrative functions, such as user management, content management, and site settings.</p>
            <form action="admin_login.php" >
              <button  class="btn btn-primary">Admin Login</button>
            </form>
            
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="Aa.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Player <span class="text-muted"></span></h2>
            <p class="lead">Join our community of passionate Sudoku players and put your skills to the test.
               Our platform offers a range of puzzles to challenge players of all levels, from beginners to 
               experts. With our intuitive interface and real-time leaderboards. Whether you're looking to 
               improve your game or simply enjoy the thrill of solving challenging puzzles,
               our Sudoku gaming website is the perfect place for you.</p>
            <form action="player_login.php" >
              <button  class="btn btn-primary" >player Login</button>
            </form>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="p.jpg" alt="Generic placeholder image">
          </div>
        </div>

        

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2023-2024 Company, Inc.</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Landingpage_files/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="Landingpage_files/jquery-slim.min.js"><\/script>')</script>
    <script src="Landingpage_files/popper.min.js"></script>
    <script src="Landingpage_files/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="Landingpage_files/holder.min.js"></script>
  </body>
</html>
