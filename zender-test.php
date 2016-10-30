<html>
 <head>
  <title>Zender - Email Delivery Service</title>
 </head>
 <body>
<?php include("zender-php.php"); ?>
<?php 
    $message = new ZenderMessage('YOUR_ZENDER_API_KEY');
    $message->set_from("from@example.com");
    $message->set_recipient("to@example.com");
    $message->set_fromName("Stefan Mischook");
    $message->set_subject("Hello World from the Zender PHP Library!");
    $message->set_body("<b>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</b>");
    $message->set_isBodyHtml("false");
    $message->sendMail();
?>
 </body>
</html>
