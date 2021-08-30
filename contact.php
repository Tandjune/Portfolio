<?php
   require_once( __DIR__. '/vendor/autolaod.php');
   use \Mailjet\Resources;

   define('API_USER', '');
   define('API_LOGIN', '');
   $mj = new \Mailjet\Client(API_USER, API_LOGIN, true, ['version' => 'v3.1']);
   

if (!empty($_POST['name']) && !empty($_POST['email'])&& !empty($_POST['subject'])&& !empty($_POST['message'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "tandjunetamoyem@gmail.com",
                'Name' => "Florent"
                ],
                'To' => [
                [
                    'Email' => "tandjunetamoyem@gmail.com",
                    'Name' => "Florent"
                ]
                ],
                'Subject' => "$subject",
                'TextPart' => "$email, $message",
            ]
            ]
        ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
            echo "Email sent successfully!";

    }else{
        echo "Invalid email!";
    }
}else{
    header("Location:index.php " );
    die();
}

?>