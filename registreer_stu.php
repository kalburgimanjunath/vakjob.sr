<?php
session_start();
// User session
$add_vacature = '<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" class="active">Registreren <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="registreer_stu.php">Registreer bedrijf</a></li>
<li><a href="registreer_stu.php">Registreer student</a></li>
 

</ul>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" class="active">Inloggen <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="login_stu.php">Bedrijf login</a></li>
<li><a href="login_stu.php">Student login</a></li>
</ul>';
if($_SESSION['user_id'] != "") {
  $add_vacature = '<li role="presentation"><a href="backend/logout.php">Uitloggen</a></li>';
  if($_SESSION['user_type'] == 'employer') {
    
  }
}

  if(isset($_POST['submit'])) {
    require 'backend/database.php'; // Require database

    // Get POST request vars
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $email  = $_POST['email'];
    $school = $_POST['school'];
    $company = $_POST['company'];
    $adres  = $_POST['adres'];
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoordConfirm = $_POST['wachtwoordConfirm'];
    $date = $_POST['date'];
    $user_type = $_POST['user_type'];

    /**
     * Determine user_type
     * @return user_type
     */
    switch($user_type) {
      case 'student':
        $sql = "INSERT INTO students (gebruikersnaam, email, school, adres, wachtwoord) VALUES ('$gebruikersnaam', '$email', '$school', '$adres', '$wachtwoord')";
        break;
      
      case 'employer':
        $sql = "INSERT INTO employers (gebruikersnaam, email, bedrijfsnaam, adres, wachtwoord) VALUES ('$gebruikersnaam', '$email', '$company', '$adres', '$wachtwoord')";
        break;

      default:
        $sql = "INSERT INTO students (gebruikersnaam, email, school, adres, wachtwoord) VALUES ('$gebruikersnaam', '$email', '$school', '$adres', '$wachtwoord')";
    }

    if($conn->query($sql)) {
      echo "Student toegevoegd!";
      header("Location: index.php");
    }

    
      // Verify if password fields are equal
      // Or else
      // @return false
     
    if($wachtwoord != $wachtwoordConfirm) {
       //Change this structure code for later cuz it will display only a text
      echo "Password fields are not equal!";
      
    } else {
      
     }


  }

//probleem melden

  require_once 'backend/database.php';

  // Report submit
  if(isset($_POST['report_submit'])) {
    require 'backend/database.php'; // Require database

    // Get POST request vars
    $email  = $_POST['email'];
    $description = $_POST['description'];

    $sql = "INSERT INTO messages (email, bericht) VALUES ('$email', '$description')";
    if($conn->query($sql)) {
      // This is only text. Change this later!!
      echo "Report verzonden!";
      header("Location: registreer_stu.php");
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VAKJOB.SR</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
    
  
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
            <div class="navbar-brand">
              <a href="index.php"><h1><span>VAKJOB</span>.SR</h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php">Home</a></li>
                <li role="presentation"><a href="vacatures.php">Vacatures</a></li>
                <li role="presentation"><a href="contact.php" >Contact</a></li>
                <?php echo $add_vacature; ?>
              
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Contact</li>
      </div>
    </div>
  </div>
  <section id="contact-page">
    <div class="container">
      <div class="center">

       <h2>Maak nu een account aan</h2>
       
      </div>
      <div class="row contact-wrap">
        <div class="status alert alert-success" style="display: none"></div>
        <div class="col-md-6 col-md-offset-3">
          <div id="sendmessage">U bent ingelogd</div>
          <div id="errormessage"></div>
          <div class="well well-lg">
          <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST" role="form"> <!-- class="contactForm" -->
            
            <div class="form-group">
              <input type="text" name="gebruikersnaam" class="form-control" id="gebruikersnaam" placeholder="gebruikersnaam" data-rule="minlen:4" data-msg="voer aub meer dan 4 karakters in" />
              <div class="validation"></div>
            </div>
            <div class="form-group"> 
              <input type="email" class="form-control" id="email" name="email" placeholder="voer email address in" data-rule="email" data-msg="voer een geldig email adres in">
            </div>
            
            <div class="form-group">
              <p style="color: black">Registreer als:</p>
              <input type="radio" id="radio1" name="user_type" value="student" checked><span style="color: black"> Student</span><br>
              <input type="radio" id="radio2" name="user_type" value="employer"><span style="color: black"> Bedrijf</span><br>
            </div>

            <div class="form-group" id="school_section">
              <input type="text" class="form-control" name="school" id="school" placeholder="school" data-msg="voer een geldige school in" />
              <div class="validation"></div>
            </div>

            <div class="form-group" style="display: none;" id="company_section">
              <input type="text" class="form-control" name="company" id="company" placeholder="Bedrijf naam" data-msg="voer een geldige bedrijf naam in" />
              <div class="validation"></div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="adres" id="adres" placeholder="adres" data-msg="voer een geldig adres in" />
              <div class="validation"></div>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="wachtwoord" id="wachtwoord" placeholder="wachtwoord" data-rule="minlen:8" data-msg="voer minimaal 8 karakters in" />
              <div class="validation"></div>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="wachtwoordConfirm"  id="wachtwoordConfirm" placeholder="wachtwoord herhalen" data-match="#wachtwoord" data-match-error="wachtwoorden komen niet overeen" />
              <div class="validation"></div>
            </div>
            
            <div class="form-group">
              <div class="input-group">
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       <div class="input-group-addon">
        <i class="fa fa-calendar">
        </i>
       </div>
      </div>
            </div>

            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg">Verstuur bericht</button></div>
          </form>
  </div>
        </div>
      </div>
      <!--/.row-->


    </div>
    <!--/.container-->
  </section>
  <!--/#contact-page-->

  <footer>
    <div class="footer">
      <div class="container">
        <div class="social-icon">
          <div class="col-md-5">
            <ul class="social-network">
              <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
              <li><a data-toggle="modal" data-target="#myModal" title="probleem"><i class="fa fa-exclamation-triangle" aria-hidden="false"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
          <div class="copyright">
            &copy;VAKJOB.SR. Alle Rechten Voorbehouden.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
              
            </div>
          </div>
        </div>
      </div>
      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="horizontal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Meld uw probleem</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="col-lg-14">
                <input type="email" class="form-control" name="email" id="email" placeholder="email@adres.com">
            </div>
            <div class="form-group">
              <div class="col-lg-14">
                <textarea class="form-control" name="description" placeholder="voer uw bericht hier in"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" name="report_submit" class="btn btn-success">Versturen</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
          </div>
    </form class = "horizontal">
      </div>
    </div>
  </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY">
  </script>
  <script src="js/functions.js"></script>
  <script src="contactform/contactform.js"></script>
<!-- date picker js -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    });

    $('#radio1').click(function() {
      $('#radio2').removeAttr('checked');
      $('#radio1').attr('checked', '');
      
      $('#school_section').show();
      $('#company_section').hide();
    });

    $('#radio2').click(function() {
      $('#radio1').removeAttr('checked');
      $('#radio2').attr('checked', '');
      
      $('#school_section').hide();
      $('#company_section').show();
    });
</script>

</body>

</html>
