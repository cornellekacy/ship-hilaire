<?php include 'header.php'; ?>


			<div class="section-title parallax-bg parallax-light">
				<ul class="bg-slideshow">
					<li>
						<div style="background-image:url(assets/media/bg/bg-title.jpg)" class="bg-slide"></div>
					</li>
				</ul>
				<div class="section__inner">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h1 class="ui-title-page">Contact us</h1>
								<div class="ui-subtitle-page">Get in Touch</div>
								<div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
							</div><!-- end col -->
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section__inner -->
			</div><!-- end section-title -->
    <?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "contact@cargomover-homeservice-delivery.com";
//Password to use for SMTP authentication
$mail->Password = "cargomoverhomeservice45";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('contact@cargomover-homeservice-delivery.com', $_POST['fname']);
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('cornellekacy4@gmail.com', 'Contact');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['fname'])) {
        $mail->Subject = 'cargomover homeservice delivery';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
First Name: {$_POST['fname']}
Last Name: {$_POST['lname']}
Phone Number: {$_POST['phone']}
Email: {$_POST['email']}
Subject: {$_POST['subject']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            window.location.href = 'contact.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

?>

		

			<div class="section_mod-c">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<section class="section-contacts-block">
								<h3 class="contacts-block__title ui-title-inner">24/7 Express Logistics Services</h3>
								<div class="decor-2 decor-2_mod-b"></div>
								<div class="contacts-block__description">Feel free to contact us via Whatsapp or email anytime if you have any questions or need help!</div>
								<div class="contacts-block clearfix">
									<i class="icon flaticon-telephone114"></i>
									<span class="contacts-block__inner">
										<span class="contacts-block__emphasis color-primary">+44 7418315690</span> 24/7 Free HelpLine Whatsapp</span>
								</div>
								<div class="contacts-block clearfix">
									<i class="icon flaticon-mail45"></i>
									<span class="contacts-block__inner">
										<a class="contacts-block__emphasis color-primary" href="mailto:inquiry@domain.com">Cargomover-homeservice-delivery.com</a> We usually reply within 24 hours</span>
								</div>
							</section><!-- end contacts-block -->

						



						</div><!-- end col -->


						<div class="col-md-7 col-md-offset-1">
							<section class="section-form-request">
								<div class="wrap-title-block wrap-title-block_mod-c">
									<h3 class="ui-title-block ui-title-block_mod-c">send a message</h3>
									<div class="decor-1 decor-1_mod-b"><i class="icon flaticon-delivery36"></i></div>
								</div>

								<form class="form-request" method="post">
									<div class="row">
										<div class="col-sm-6">
											<input class="form-control" name="fname" type="text" placeholder="first Name" required>
										</div><!-- end col -->
										<div class="col-sm-6">
											<input class="form-control" name="lname" type="text" placeholder="last Name" required>
										</div><!-- end col -->
									</div><!-- end row -->
									<div class="row">
										<div class="col-sm-6">
											<input class="form-control" name="email" type="email" placeholder="Email address" required>
										</div><!-- end col -->
										<div class="col-sm-6">
											<input class="form-control" name="phone" type="tel" placeholder="phone no." required>
										</div><!-- end col -->
									</div><!-- end row -->
									<div class="row">
										<div class="col-xs-12">
											<input class="form-control" type="text" name="subject" placeholder="Enquiry type / subject" required>
										</div><!-- end col -->
									</div><!-- end row -->
									<div class="row">
										<div class="col-xs-12">
											<textarea class="form-control" name="message" placeholder="message" required="" rows="19"></textarea>
											<button type="submit" class="btn btn_mod-a btn-sm btn-effect pull-right"><span class="btn__inner">Contact Us Now</span></button>
										</div><!-- end col -->
									</div><!-- end row -->
								</form><!-- end form-request -->
							</section>
						</div>
						<!-- end col -->

					</div>
					<!-- end row -->
				</div>
				<!-- end container -->
			</div><!-- end section-area -->


			<div class="section-area parallax-bg parallax-dark">
				<ul class="bg-slideshow">
					<li>
						<div style="background-image:url(assets/media/bg/bg-footer.jpg)" class="bg-slide"></div>
					</li>
				</ul>
				<div class="section__inner">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">

								<div class="section-subscribe clearfix">
									<div class="subscribe__inner">
										<h2 class="subscribe__title">register for newsletter</h2>
										<div class="subscribe__info">get latest company news</div>
									</div>
									<form class="form-subscribe" method="post">
										<input class="form-subscribe__input form-control" type="text" placeholder="enter your email address" required>
										<button class="form-subscribe__btn btn btn_mod-c btn-sm btn-effect"><span class="btn__inner">Subscribe</span></button>
									</form>
									<div class="subscribe__decor decor-4"><i class="subscribe__icon icon flaticon-envelope53"></i></div>
								</div><!-- end subscribe -->


								<?php include 'footer.php'; ?>