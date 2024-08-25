<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = trim($_POST["project_name"]);
    $admin_email = trim($_POST["admin_email"]);
    $form_subject = trim($_POST["form_subject"]);
    $name = trim($_POST["Name"]);
    $email = trim($_POST["E-mail"]);
    $message = trim($_POST["Message"]);

    $message_content = "
    Name: $name <br>
    Email: $email <br>
    Message: $message
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    $send_mail = mail($admin_email, $form_subject, $message_content, $headers);

    if ($send_mail) {
        http_response_code(200);
        echo "Message sent successfully!";
    } else {
        http_response_code(500);
        echo "Message failed to send.";
    }
} else {
    http_response_code(403);
    echo "Request method not allowed.";
}
?>