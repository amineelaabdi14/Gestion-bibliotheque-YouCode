<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include 'db-con.php';
    // Start the session
    session_start();
 
if(isset($_POST['signMeIn']))      signIn();    
if(isset($_POST['signMeUp']))      signUp();  

function sendMail($email,$password)
{   
    

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'amineelaabdi@gmail.com';                     //SMTP username
    $mail->Password   = 'wtaguljdvkrzwxjv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    
     //Recipients
     $mail->setFrom('amineelaabdi@gmail.com', 'Mohamed Amine El Aabdi');
     $mail->addAddress($email); 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is your password';
    $mail->Body    = 'Your password is: '.$password;
    $mail->AltBody = '';

    $mail->send();
    
}


function generate_password()
{
    $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
    $myPassword = array();
    for($i=0;$i<12;$i++)
    {
        $n = rand(0, strlen($chars) - 1);
        $myPassword[] = $chars[$n];
    }
    return implode($myPassword);
}

function generateToken($userName)
{
    return hash_hmac('md5',$userName, 'iHopeNoGuessesIt');
    
}



function signIn(){
    global $conn;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE admin_email = '$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {   
        $MyData=mysqli_fetch_assoc($result);
        if(password_verify($password, $MyData['admin_password']))
        {   
            $nameToHash = $MyData['admin_name'];
            $newToken   =generateToken(generate_password());
            $MyDataEmail=$MyData['admin_email'];
            setcookie("UserToken",$newToken,time() + (3600*24*30), "/");
            $sql="UPDATE admins SET admin_token= '$newToken' WHERE admin_email ='$MyDataEmail'";
            mysqli_query($conn,$sql);
            $_SESSION['name']     = $MyData['admin_name'];
            $_SESSION['birthday'] = $MyData['admin_birthday'];
            $_SESSION['password'] = $MyData['admin_password'];
            $_SESSION['email']    = $MyData['admin_email'];
            header('Location: dashboard.php');
        }
        
    }
    else{
        $_SESSION["result"] = "Incorrect email or password";
        header('Location: ../index.php');
    }
    
}

function signUp(){
    
    global $conn;
    $email = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];
    $fullName = $_POST['fullName'];
    $MyData=array();
    if($email==$confirmEmail)
    {
        $sql = "SELECT * FROM admins";
        $result=mysqli_query($conn,$sql);
        foreach($result as $row)
        {
            $MyData[$row['admin_email']]=$row; // assigning every row in the database  into an index in the array
        }
          
        if(array_key_exists($email,$MyData))
        {
            $_SESSION["result"] = "You're already registered";
            header('Location: ../index.php');
        }
        else
        {   $generatedPassword = generate_password();
            $password = password_hash($generatedPassword,PASSWORD_DEFAULT);
            $token = generateToken($fullName);
            $sql = "INSERT INTO admins (admin_token,admin_email, admin_password, admin_name) VALUES ('$token','$email', '$password', ' $fullName')";
            if(mysqli_query($conn,$sql))
            {   
                sendMail($email,$generatedPassword);
                $_SESSION["result"] = "You're registered, the password was sent to your email";
                header('Location: ../index.php');
            }
            else{
                $_SESSION["result"] = "Something went wrong";
                header('Location: ../index.php');
            }
        } 
             
    }
}  
