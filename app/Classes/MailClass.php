<?php  namespace App\Classes;
    use Mailgun\Mailgun;
    
    //http://www.9lessons.info/2013/11/php-email-verification-script.html
class MailClass extends BaseClass {
    
    public function __construct(){
        $this->mgClient = new Mailgun('key-3ax6xnjp29jd6fds4gc373sgvjxteol0');
        $this->domain = "samples.mailgun.org";
    }

    public function mailSend($to=null,$subject=null,$text=null){

        // $result = $this->mgClient->sendMessage( "www.google.com",
        // array('from'    => 'Excited User <excited@samples.mailgun.org>',
        //       'to'      => 'Mailgun Devs <raks.bisht@gmail.com>',
        //       'subject' => 'Hello',
        //       'text'    => 'Testing some Mailgun awesomeness!'));

            
    }

    public function emailVerify(){

        $to      = $email; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject 
        $message = '
         
        Thanks for signing up!
        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
         
        ------------------------
        Username: '.$name.'
        Password: '.$password.'
        ------------------------
         
        Please click this link to activate your account:
        http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'
         
        '; // Our message above including the link
                             
        $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
    }

    public function confirmEmail(){



    }

    
   


}