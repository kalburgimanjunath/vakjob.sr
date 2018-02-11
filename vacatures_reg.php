<?php
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
      header("Location: vacarues_reg.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vacture toevoegen | VakJob.sr</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link rel="icon" href="images/vakjob.jpg" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" >
  <link rel="stylesheet" type="text/css" href="css/bootstrap-clockpicker.min.css">


  <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
              <a href="index.html"><h1><span>VAKJOB</span>.SR</h1></a>
            </div>
          </div>

          <bs3-

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.html">Home</a></li>
                <li role="presentation"><a href="vacatures.html">Vacatures</a></li>
                <li role="presentation"><a href="contact.html">Contact</a></li>
                <li role= "presentation"><a href="registreer.html">Registreren</a></li>
              </ul>
              <form class="form-inline" action="/action_page.php">
  <div class="form-group">
    <label for="email" class="text-success">Email adress:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd" class="text-success">Wachtwoord:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
 
  <button type="submit" class="btn btn-succes ">Inloggen</button>
</form>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Contact</li>
      </div>
    </div>
  </div>


  <section id="contact-page">
    <div class="container">
      <div class="center">

         <h2>Vacature Toevoegen</h2>
       
      </div>
      <div class="row contact-wrap">
        <div class="status alert alert-success" style="display: none"></div>
        <div class="col-md-6 col-md-offset-3">
          <div id="sendmessage">Bedankt voor uw bericht</div>
          <div id="errormessage"></div>
          <div class="well well-lg">
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Titel" data-rule="minlen:4" data-msg="Voer aub meer dan 4 karakters in" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="locatie" id="locatie" placeholder="Locatie" data-rule="minlen:4" data-msg="Voer een locatie in" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
            <div class="input-group date" data-provide="datepicker">
            <input type="text" name="datefilter" value="" class="form-control" placeholder="Selecteer de werkdagen in de week" data-rule="minlen:4" data-msg="Selecteer a.u.b. de werkdagen"/>
            <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
            </div>
            <div class="form-group">
              <div class="input-group clockpicker">
                  <input type="text" class="form-control" placeholder="Startwerktijd" data-msg="Geef a.u.b. de start werktijden aan">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group clockpicker">
                  <input type="text" class="form-control" placeholder="Eindwerktijd" data-msg="Geef a.u.b. de eind werktijden aan">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
              </div>
            </div>
           
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Uw bericht"></textarea>
              <div class="validation"></div>
            </div>            
          <div class="validation"></div>
          <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Verstuur bericht</button></div>
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
          <div class="col-md-4">
            <ul class="social-network">
              <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
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
              <a href="https://bootstrapmade.com/bootstrap-business-templates/">Bootstrap Business Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
            </div>
            <div class="form-group">
              <div class="col-lg-14">
                <input type="text" class="form-control" name="onderwerp" id="onderwerp" placeholder="onderwerp">
            </div>
          </div>
            <div class="form-group">
              <div class="col-lg-14">
                <textarea class="form-control" name="description" placeholder="voer uw bericht hier in"></textarea>
            </div>
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
  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
 
<!-- Include Date Range Picker -->
  <script type="text/javascript" src="js/daterangepicker.js"></script>
  <script type="text/javascript" src="js/bootstrap-clockpicker.min.js"></script>

  <script type="text/javascript">
     $('.clockpicker').clockpicker();
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});

    $('#datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

   
</script>

</body>

</html>
