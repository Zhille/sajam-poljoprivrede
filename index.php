<?php
if (isset($_POST['submit'])) {

    require_once 'vendor/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

//$mail->SMTPDebug = 1;                               // Enable verbose debug output
    $mail->isSMTP();   
    $mail->Host = '';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->From = '';

    $mail->FromName = 'Anketa';
    $mail->addAddress('nesicboban@gmail.com', 'Boban Nesic');     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Anketa';
    
    $delatnost = "";
    if(isset($_POST['ratarstvo'])) {
         $delatnost = "<tr><td width='220'><b>Ratarstvo</b></td><td>Da</td></tr>";
    }
    if(isset($_POST['stocarstvo'])) {
         $delatnost .= "<tr><td width='220'><b>Stočarstvo</b></td><td>Da</td></tr>";
    }
    if(isset($_POST['povrtarstvo'])) {
         $delatnost .= "<tr><td width='220'><b>Povrtarstvo</b></td><td>Da</td></tr>";
    }
    if(isset($_POST['vocarstvo'])) {
         $delatnost .= "<tr><td width='220'><b>Voćarstvo</b></td><td>Da</td></tr>";
    }
    $message = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title></title></head><body><table><font face='Arial,Verdana'>"
            . "<tr><td width='220'><b>Anketa</b></td><td></td></tr>"
            . "<tr><td width='220'><b>Ime i Prezime</b></td><td>".$_POST['ime']."</td></tr>"
            . "<tr><td width='220'><b>JMBG</b></td><td>".$_POST['jmbg']."</td></tr>"
            . "<tr><td width='220'><b>Broj Telefona</b></td><td>".$_POST['telefon']."</td></tr>"
            . "<tr><td width='220'><b>Adresa</b></td><td>".$_POST['adresa']."</td></tr>"
            . "<tr><td width='220'><b>Grad</b></td><td>".$_POST['grad']."</td></tr>"
            . "<tr><td width='220'><b>Svrha kredita</b></td><td>".$_POST['svrha_kredita']."</td></tr>"
            . "<tr><td width='220'><b>Iznos kredita</b></td><td>".$_POST['iznos_kredita']." EUR</td></tr>"
            . "<tr><td width='220'><b>Rok otplate</b></td><td>".$_POST['rok_otplate']." Meseca/i</td></tr>"
            . "<tr><td width='220'><b>Krediti u otplati</b></td><td></td></tr>"
            . "<tr><td width='220'><b>Rata</b></td><td>".$_POST['rata']."</td></tr>"
            . "<tr><td width='220'><b>Preostali dug</b></td><td>".$_POST['dug']."</td></tr>"
            . $delatnost
            . "<tr><td width='220'><b>Površina zemljišta koje se obrađuje</b></td><td>".$_POST['povrsina']."</td></tr>"
            . "<tr><td width='220'><b>Zemljište u vlasništvu</b></td><td>".$_POST['zemljiste']."</td></tr>"
            ;
    $message .= "</font></table></body></html>";

    $mail->Body = $message;
    $mail->AltBody = '';

    $mail->CharSet = "UTF-8";
    if ($mail->send()) {
        $res["response"] = 1;
        $res['error'] = 'none';
    } else {
        $res["response"] = 0;
        $res['error'] = 'Mail error: ' . $mail->ErrorInfo;
        ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>UPITNIK ZA KLIJENTE</title>
        <link rel="shortcut icon" href="images/favicon-32x32.png" type="image/png">
        <!-- Bootstrap Core CSS -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="plugins/bootstrap/js/popper.min.js">

        <!-- Custom CSS -->
        <link href="css/blog-home.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <script src="vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
        <![endif]-->

    </head>

    <body>



        <div class="col-lg-4 container">

            <div class="col-lg-12">
                <img class="slika img-fluid" src="images/logo.jpg" alt="">
            </div>
            <form method="post" action="" autocomplete="off">        <!--- FORMA --->

                <h4 class="text-center"> UPITNIK ZA KLIJENTE </h4>
                <hr>            
                <div class="prvi-wrapper">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Ime i Prezime: </label>
                        <div class="col-sm-8">
                            <input name="ime" class="input form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">JMBG: </label>
                        <div class="col-sm-8">
                            <input name="jmbg" class="input form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Broj telefona: </label>
                        <div class="col-sm-8">
                            <input name="telefon" class="input form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Adresa: </label>
                        <div class="col-sm-8">
                            <input name="adresa" class="input form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Grad: </label>
                        <div class="col-sm-8">
                            <input name="grad" class="input form-control" type="text">
                        </div>
                    </div>
                </div> <!--- kraj prvog wrappera --->
                <hr> 
                <div class="drugi-wrapper mt-4"> <!--- drugi wrapper --->

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Svrha kredita: </label>
                        <div class="col-sm-8">
                            <input name="svrha_kredita" class="input form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Iznos kredita: </label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input name="iznos_kredita" class="input form-control" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">EUR</span>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Rok otplate: </label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input name="rok_otplate" class="input form-control" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meseca/i</span>
                                </div>
                            </div>   
                        </div>
                    </div>

                </div>    <!--- kraj drugog wrappera --->
                <hr> 
                <div class="drugi-wrapper mt-4">
                    <h5 class="text-center mb-3">Krediti u otplati</h5>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Rata: </label>
                        <div class="col-sm-8">
                            <input name="rata" class="input form-control" type="text">
                        </div>  
                    </div>                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="">Preostali dug: </label>
                        <div class="col-sm-8">
                            <input name="dug" class="input form-control" type="text">
                        </div> 
                    </div>

                </div>
                <hr>
                <div class="kucice-wrapper row">

                    <div class="col-lg-7 col-md-7 col-xs-10">
                        <p>Delatnost gazdinstva:</p>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-7 form-group kucice "> <!--- kucice wrapper --->
                        <div class="ml-5">
                            <label class="checkbox_container position-relative">Ratarstvo
                                <input name="ratarstvo" type="checkbox">
                                <span class="checkmark"></span>
                            </label>                
                            <br>
                            <label class="checkbox_container position-relative">Stočarstvo
                                <input name="stocarstvo" type="checkbox">
                                <span class="checkmark"></span>
                            </label>  
                            <br>
                            <label class="checkbox_container position-relative">Povrtarstvo
                                <input name="povrtarstvo" type="checkbox">
                                <span class="checkmark"></span>
                            </label> 
                            <br>
                            <label class="checkbox_container position-relative">Voćarstvo
                                <input name="vocarstvo" type="checkbox">
                                <span class="checkmark"></span>
                            </label> 
                        </div>


                    </div>                         <!--- kraj kucice wrapper --->
                </div>

                <div class="treci-wrapper">    <!--- treci wrapper --->

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Površina zemljišta koje se obrađuje: </label>
                        <div class="col-sm-7">
                            <input name="povrsina" class="input form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Zemljište u vlasništvu: </label>
                        <div class="col-sm-7">
                            <input name="zemljiste" class="input form-control" type="text">
                        </div>
                    </div>

                </div>

                <div class="btn col-lg-9">
                    <input style="float: right;" value="Pošalji" name="submit" class="btn btn-primary col-lg-6" type="submit"></div>
            </form>              <!--- kraj forme --->
        </div>

    </div>                   <!--- kraj glavnog diva --->




</body>

</html>