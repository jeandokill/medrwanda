<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Instantiate PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // SMTP server
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'medcancer408@gmail.com';  // SMTP username
        $mail->Password   = 'dtmi qncl fnjt liau';           // SMTP password
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('medcancer408@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true);
        // Styling the email content
        $mail->Subject = "New message from website: $subject";
        $mail->Body = "
            <div style='font-size: 18px;'>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <div style='background-color: #f4f4f4; padding: 15px; border-radius: 10px;'>
                    <p>$message</p>
                </div>
            </div>
        ";

        // Send email
        $mail->send();
        
        // Display success message
        echo "Your message has been sent. Thank you!";
    } catch (Exception $e) {
        // Display error message
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
