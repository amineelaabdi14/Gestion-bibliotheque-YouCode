<?php
    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include 'db-con.php';


    // Start the session
    session_start();


    //  ROUTING
    if(isset($_POST['signMeIn']))      signIn();    
    if(isset($_POST['signMeUp']))      signUp();
    if(isset($_GET['delete']))      deleteBook();
    if(isset($_POST['addBtn']))      addBook();
    if(isset($_POST['editBtn']))      editBook();
    if(isset($_POST['save-profile']))      saveProfile();

function sendMail($email,$password)
{   
    //Load Composer's autoloader
    require '/vendor/autoload.php';

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
    if(mysqli_num_rows($result)>0)
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
            if(!empty($MyData['admin_birthday']))     $_SESSION['birthday'] = $MyData['admin_birthday'];
            $_SESSION['email']    = $MyData['admin_email'];
            header('Location: ./dashboard.php');
        }
        else{
            $_SESSION["message"] = "Incorrect email or password";
            header('Location: ../../index.php');
        }
        
    }
    else{
        $_SESSION["message"] = "Incorrect email or password";
        header('Location: ./login.php');
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
            $_SESSION["message"] = "You're already registered";
            header('Location: ../../index.php');
        }
        else
        {   $generatedPassword = generate_password();
            $password = password_hash($generatedPassword,PASSWORD_DEFAULT);
            $token = generateToken($fullName);
            $sql = "INSERT INTO admins (admin_token,admin_email, admin_password, admin_name) VALUES ('$token','$email', '$password', ' $fullName')";
            if(mysqli_query($conn,$sql))
            {   
                sendMail($email,$generatedPassword);
                $_SESSION["message"] = "You're registered, the password was sent to your email";
                header('Location: ../../index.php');
            }
            else{
                $_SESSION["message"] = "Something went wrong";
                header('Location: ../../index.php');
            }
        } 
             
    }
}  

function insertIntoHistory()
{   
    global $conn;
    $sql="  SELECT order_id, students.student_name as order_student_name, order_date ,books.book_name as order_book_name FROM orders
            INNER JOIN students on students.student_token=orders.order_student_token
            INNER JOIN books on books.book_id=orders.order_book_id 
            ORDER BY order_date DESC
            LIMIT 7";
    $result=mysqli_query($conn,$sql);
    $MyData=array();
    foreach($result as $row)
    {
        $MyData[]=$row;
    }
    for($i=0;$i<sizeof($MyData);$i++)
    {   

        echo'<tr scope="row">
                <td class="text-secondary fs-7 " scope="col">#'.$MyData[$i]['order_id'].'</td>
                <td class="text-secondary fs-7 " scope="col">'.$MyData[$i]['order_book_name'].'</td>
                <td class="text-secondary fs-7 " scope="col">'.$MyData[$i]['order_student_name'].'</td>
                <td class="text-secondary fs-7 text-center" scope="col">'.$MyData[$i]['order_date'].'</td>
            </tr>';
    }
}

function insertIntoStats()
{
    global $conn;
    $sql="  SELECT book_name,book_quantite, book_id, COUNT(order_book_id) as sold FROM orders 
            INNER JOIN books on book_id = order_book_id
            WHERE order_book_id =book_id
            GROUP BY book_name 
            ORDER BY sold DESC
            LIMIT 5";
    $result=mysqli_query($conn,$sql);
    $MyData=array();
    foreach($result as $row)
    {
        $MyData[]=$row;
    }
    for($i=0;$i<sizeof($MyData);$i++)
    {   
        $available=$MyData[$i]['book_quantite']-$MyData[$i]['sold'];
        echo'<tr>
                <td class="text-secondary fs-7 " scope="col">#'.$MyData[$i]['book_id'].'</td>
                <td class="text-secondary fs-7 " scope="col">'.$MyData[$i]['book_name'].'</td>
                <td class="text-secondary fs-7 text-center" scope="col">'.$MyData[$i]['sold'].'</td>
                <td class="text-secondary fs-7 text-center" scope="col">'.$available.'</td>
            </tr> ';
    }
}

function insertIntoProducts()
{
    global $conn;
    $sql="SELECT book_id, COUNT(order_book_id) as sold FROM books 
            INNER JOIN orders on book_id = order_book_id
            GROUP BY book_id";
    
    $result=mysqli_query($conn,$sql);
    $sold=array();
    foreach($result as $row)
    {
        $sold[ $row['book_id'] ]=$row;
    }
    $sql="SELECT * FROM books";
    $result=mysqli_query($conn,$sql);

    foreach($result as $row)
    {
        $id=$row['book_id'];
        $name=$row['book_name'];
        $quantite=$row['book_quantite'];

        if(array_key_exists( $id,$sold) )            $stock=$quantite-$sold[$id]['sold'];
        else                                        $stock=$quantite;
        echo '<tr scope="row" onmouseover="showactions(this)" onclick="showactions(this)" onmouseout="hideactions(this)" style="cursor: pointer;">
                <td class="text-secondary fs-7 " scope="col">#'.$id.'</td>
                <td class="text-secondary fs-7 " scope="col">'.$name.'</td>
                <td class="text-secondary fs-7 " scope="col">'.$stock.'</td>
                <td class="d-flex justify-content-around" style="visibility: hidden;" ><a href="../../update.php?showmodal='.$id.'" ><i class="bi fs-6 text-primary bi-pencil-square" ></i></a><a href="../../update.php?delete='.$id.'"><i class="bi fs-6 text-danger bi-x-square" ></i></a></td>
            </tr>';
    }
}

function deleteBook()
{
    $id=$_GET['delete'];
    global $conn;
    $sql="DELETE FROM books WHERE book_id=$id";
    mysqli_query($conn,$sql);
    header('Location: ./productslist.php');
}

function addBook()
{
    global $conn;
    $name=$_POST['BookName'];
    $quantite=$_POST['quantity'];
    $sql="INSERT INTO books (book_name,book_quantite) VALUES ('$name','$quantite')";
    mysqli_query($conn,$sql);
    header('Location: ./productslist.php');
}

function productsCount()
{
    $sql="SELECT COUNT(book_id) as count FROM books";
    global $conn;
    $result=mysqli_query($conn,$sql);
    $Count=mysqli_fetch_assoc($result);
    echo $Count['count'];
}


function editBook()
{
    global $conn;
    $name=$_POST['BookName'];
    $quantite=$_POST['quantity'];
    $id=$_POST['Myid'];
    $sql="UPDATE books SET book_name='$name',book_quantite='$quantite' WHERE book_id=$id";
    mysqli_query($conn,$sql);
    header('Location: ./productslist.php');
}


function saveProfile()
{
    global $conn;
    $name=$_POST['edit-name'];
    $email=$_POST['edit-email'];
    $birthday=$_POST['birthday'];
    if(isset($_POST['edit-newpassword'])) $newpassword=$_POST['edit-newpassword'];
    else $newpassword;
    $password=$_POST['edit-curentpassword'];
    if(empty($password))
    {   
        $_SESSION['message']="Please enter your password";
        
        header('Location: ./profile.php');
    }
    else if(password_verify($password, $_SESSION['password']))
    {
        if(empty($newpassword)) $passwordToInsert=$_SESSION['password'];
        else $passwordToInsert=password_hash($newpassword,PASSWORD_DEFAULT);
        $sql="UPDATE admins SET admin_name='$name',admin_email='$email',admin_password='$passwordToInsert' WHERE admin_email='$email'";
        mysqli_query($conn,$sql);
        setcookie('UserToken',$token,time()-1,'/');
        $_SESSION['message']="Profile updated successfully";
        header('Location: ./login.php');
    }
    else
    {   
        $_SESSION['message']='Wrong Password';
        header('Location: ./profile.php');
    }
    
    
}

?>
