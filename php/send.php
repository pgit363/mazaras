<?php  
// echo "here".$_POST['name'];
// echo "here".$_POST['email'];
// echo "here".$_POST['mobile'];
// echo "here".$_POST['service'];
// echo "here".$_POST['sub'];
// echo "here".$_POST['msg'];

// exit;
// if(isset($_POST['submit'])) {
    $mailto = "kamblepranav460@gmail.com";  //My email address
    //getting customer data
    $name      = $_POST['name']; //getting customer name
    $fromEmail = $_POST['email']; //getting customer email
    $phone     = $_POST['mobile']; //getting customer Phome number
    $service   = isset($_POST['service']) ? $_POST['service'] : "";
    $subject   = isset($_POST['sub']) ? $_POST['sub'] : "Contact Inquiry"; //getting subject line from client
    $msg       = $_POST['msg'];

    $subject2  = "Confirmation: Query was submitted successfully"; // For customer confirmation


    // $headers = "From:" . $from;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
    $headers .= "From: Manzaras <pranav@pranavkamble.in>\r\n";
                
    // // $headers2 = "From:" . $to;
    // $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n" .'X-Mailer: PHP/' . phpversion();
    // $headers .= "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;  charset=iso-8859-1\r\n" . "\r\n";
    
    // Create email headers
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
    $headers .= "From: Manzaras <pranav@pranavkamble.in>\r\n";
    
    
    //Email body I will receive
    $emailSubject = "You have new inquiry from ".$name;

    $message = "<p>Hello Team <br><br></p>";

    $message .= '<div style="max-width: 700px; font-size:small;">';
    $message .= '<table style="max-width: 700px; font-size:small; font-family: arial,sans-serif; border-collapse: collapse; width: 100%; border: 2px solid;">';

    $message .= '<thead>
                    <tr>
                      <th colspan="2"><p style="border-bottom: 2px solid; text-align: center; padding: 15px 0; margin:0;">Contact Details</p></th>
                    </tr>
                  </thead>';

    $message .= '<tbody style="font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">'; 
    
    $message .= '<tr>';
    $message .= '<td style="width:150px; border-right: 1px solid; padding: 8px;"><b>Name</b></td>';
    $message .= '<td style="padding: 8px;">'.$name.'</td>';
    $message .= '</tr>';

    $message .= '<tr>';
    $message .= '<td style="width:150px; border-right: 1px solid; padding: 8px;"><b>Email</b></td>';
    $message .= '<td style="padding: 8px;">'.$fromEmail.'</td>';
    $message .= '</tr>';

    $message .= '<tr>';
    $message .= '<td style="width:150px; border-right: 1px solid; padding: 8px;"><b>Phone</b></td>';
    $message .= '<td style="padding: 8px;">'.$phone.'</td>';
    $message .= '</tr>';

    if ($service != "") {
      $message .= '<tr>';
      $message .= '<td style="width:150px; border-right: 1px solid; padding: 8px;"><b>service</b></td>';
      $message .= '<td style="padding: 8px;">'.$service.'</td>';
      $message .= '</tr>';  
    }
 
    $message .= '<tr>';
    $message .= '<td style="width:150px; border-right: 1px solid; padding: 8px;"><b>subject</b></td>';
    $message .= '<td style="padding: 8px;">'.$subject.'</td>';
    $message .= '</tr>';

    $message .= '<tr>';
    $message .= '<td style="width:150px; border-right: 1px solid; padding: 8px;"><b>Message</b></td>';
    $message .= '<td style="padding: 8px;">'.$msg.'</td>';
    $message .= '</tr>';


    $message .= '</tbody>';
    $message .= '<tfoot>
                    <tr>
                      <th colspan="2"><p style="border-top: 2px solid; text-align: center; padding: 15px 0; margin:0;">Thank You. <br> </p></th>
                    </tr>
                  </tfoot>';

    $message .= '</table>';
    $message .= '</div>';

    //Message for client confirmation
    $message2 = "Dear " . $name . "\n\t\n"
    . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
    . "You submitted the following message: " . "\n" . 'message' . "\n\n"
    . "Regards," . "\n" . "- Manzaras";

    //Email headers
    // $headers = "From: " . $fromEmail; // Client email, I will receive
    // $headers2 = "From: " . $mailto; // This will receive client

    //PHP mailer function

    $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
    $result2 = mail($fromEmail, $subject2, $message2, $headers); //This confirmation email to client

    //Checking if Mails sent successfully
    

    if ($result1 && $result2) {
        if( $subject == "Contact Inquiry"){
            echo '<script type="text/javascript">alert("Thanks for your interest. Your Query has been sent to info@manzaras.com");window.location.assign("../contact.html");</script>';    
        }else{
            echo '<script type="text/javascript">alert("Thanks for your interest. Your Query has been sent to info@manzaras.com");window.location.assign("../services.html");</script>';
        }
    } else {
      echo"<script>alert('Could not send your query! Please try after sometime.')</script>";
    }
 
// }
 
?>