<?php
if(isset($_POST['email'])) {

    // https://www.freecontactform.com/email_form.php
 
    $email_to = "info@mmuhlariholdings.co.za";
    $email_subject = "Estimate (Website): ";
 
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    if(
        !isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

    $platforms = $_POST['platforms'];
    $login = $_POST['login'];
    $profiles = $_POST['profiles'];
    $money = $_POST['money'];
    $reviews = $_POST['reviews'];
    $integrations = $_POST['integrations'];
    $pretty = $_POST['pretty'];
    $icon = $_POST['icon'];
    $self_content = $_POST['self-content'];
    $user_content = $_POST['user-content'];
    $e_commerce = $_POST['e-commerce'];
    $chat = $_POST['chat'];
    $email_from = $_POST['email'];

    $email_subject .= $email_from;
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
 
    if(strlen($error_message) > 0) {
        died($error_message);
    }
 
    $email_message = "Quotation Details.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Platforms: ".clean_string($platforms)."\n";
    $email_message .= "Login: ".clean_string($login)."\n";
    $email_message .= "Profiles: ".clean_string($profiles)."\n";
    $email_message .= "Money: ".clean_string($money)."\n";
    $email_message .= "Reviews: ".clean_string($reviews)."\n";
    $email_message .= "Integrations: ".clean_string($integrations)."\n";
    $email_message .= "Pretty: ".clean_string($pretty)."\n";
    $email_message .= "Icon: ".clean_string($icon)."\n";
    $email_message .= "Content Management (Internal): ".clean_string($self_content)."\n";
    $email_message .= "Content Management (Users): ".clean_string($user_content)."\n";
    $email_message .= "E-commerce: ".clean_string($e_commerce)."\n";
    $email_message .= "Chat: ".clean_string($chat)."\n";
 
    $headers = 
        'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message, $headers);  

?>
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 }
?>