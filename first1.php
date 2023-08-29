
<?php
include('smtp/PHPMailerAutoload.php');

echo smtp_mailer('gurman@gmail.com','testing','html');
function smtp_mailer($to,$subject, $msg){

if(isset($_POST['submit'])){
   $name= $_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $message=$_POST['message'];

    $bodyy="
     <table border=1>
       <tr>
         <td>Name</td>
         <td>$name</td>
       </tr>
       <tr>
         <td>Email</td>
         <td>$email</td>
       </tr>
       <tr>
         <td>Mobile</td>
         <td>$mobile</td>
       </tr>
       <tr>
         <td>Message</td>
         <td>$message</td>
       </tr>  
     </table>  
  ";






  $mail = new PHPMailer(); 
  $mail->IsSMTP(); 
  $mail->SMTPAuth = true; 
  $mail->SMTPSecure = 'tls'; 
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587; 
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  //$mail->SMTPDebug = 2; 
  $mail->Username = "gurmansaini8168@gmail.com";
  $mail->Password = "jfooliojxxppbadp";
  $mail->SetFrom($email);
  $mail->Subject = 'ese hi';
  $mail->Body =$bodyy;
  $mail->AddAddress('gurmansaini8168@gmail.com');
  $mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
  ));
  if(!$mail->Send()){
    echo $mail->ErrorInfo;
  }
}
}
?>


