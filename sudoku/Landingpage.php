<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Sudoku Management System</title>

    
<!-- Add the following line to include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <style>
      /* Animated Gradient Background */


/* Custom Typography */
h1, h2 {
    font-family: 'Arial', sans-serif;
    font-weight: bold;
}

p {
    font-family: 'Helvetica', sans-serif;
}

/* Interactive Elements */
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Visual Hierarchy */
.navbar-brand {
    font-size: 24px;
}

.carousel-caption h1 {
    font-size: 36px;
}

.carousel-caption p {
    font-size: 18px;
}

.featurette-heading {
    font-size: 28px;
}



    /* Animated Gradient Background */
    /* Custom Typography */
    h1, h2 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
    }
    p {
        font-family: 'Helvetica', sans-serif;
    }
    /* Interactive Elements */
    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
    /* Visual Hierarchy */
    .navbar-brand {
        font-size: 24px;
    }
    .carousel-caption h1 {
        font-size: 36px;
    }
    .carousel-caption p {
        font-size: 18px;
    }
    .featurette-heading {
        font-size: 28px;
    }
    /* Media Queries for Responsiveness */

/* For screens smaller than 768px */
@media (max-width: 767.98px) {

/* Change the font size of h1 elements to make them more readable on smaller screens */
h1 {
    font-size: 24px;
}

/* Reduce the padding of the button element to make it take up less space on smaller screens */
button {
    padding: 5px 10px;
}
}

    </style>
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
              <a class="nav-link" href="faq.html">Help</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="contac.html">Contact</a>
            </li>
          </ul>
          
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="sudoku kingdom.png" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Sudoku Kingdom - The Ultimate Sudoku Experience</h1>
                <p> Welcome to Sudoku Kingdom - The Ultimate Sudoku Experience.
                  Play Sudoku experience the thrill of playing Sudoku with our intuitive and user-friendly puzzle builder. Choose from easy, medium, or hard puzzles.
                  Show off your skills and  become the ultimate Sudoku champion.Master Your Skills improve your Sudoku game with our comprehensive puzzles.</p>
                
              </div>
            </div>
          </div>
         
   

        </div>
      </div>
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Admin <span class="text-muted"></span></h2>
            <p class="lead"> Dedicated for website administrators to manage and maintain the website. It typically includes links to various administrative functions, such as user management, content management, and site settings.</p>
            <form action="admin_login.php" >
              <button  class="btn btn-primary">Admin Login</button>
            </form></div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="admin.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Player <span class="text-muted"></span></h2>
            <p class="lead">Join our community of passionate Sudoku players and put your skills to the test.
               Our platform offers a range of puzzles to challenge players of all levels, from beginners to 
               experts. Whether you're looking to 
               improve your game or simply enjoy the thrill of solving challenging puzzles,
               our Sudoku gaming website is the perfect place for you.</p>
            <form action="player_login.php" >
              <button  class="btn btn-primary" >player Login</button>
            </form> </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="player.jpg" alt="Generic placeholder image">
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
    <script src="jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="holder.min.js"></script>
  </body>
</html>
