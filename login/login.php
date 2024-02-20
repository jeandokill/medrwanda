<?php
require_once('auth.php');
require_once('MainClass.php');

// Function to check if the email exists in the register table with usertype of admin
function isAdmin($email, $pdo_event) {
    $query = "SELECT usertype FROM register WHERE email = ? AND usertype = 'admin'";
    $stmt = $pdo_event->prepare($query);
    $stmt->execute([$email]);
    return $stmt->fetchColumn() !== false;
}

// Function to check if the email exists in the login_otp_db.users table
function isUserRegistered($email, $pdo_login) {
    $query = "SELECT COUNT(*) FROM users WHERE email = ?";
    $stmt = $pdo_login->prepare($query);
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Establish connection to the event database
    $dsn_event = 'mysql:host=localhost;dbname=event';
    $username_event = 'root';
    $password_event = '';

    try {
        // Create a new PDO instance for the event database
        $pdo_event = new PDO($dsn_event, $username_event, $password_event);
        // Set PDO to throw exceptions on error
        $pdo_event->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection to event database failed: " . $e->getMessage();
        exit();
    }

    // Establish connection to the login_otp_db database
    $dsn_login = 'mysql:host=localhost;dbname=login_otp_db';
    $username_login = 'root';
    $password_login = '';

    try {
        // Create a new PDO instance for the login database
        $pdo_login = new PDO($dsn_login, $username_login, $password_login);
        // Set PDO to throw exceptions on error
        $pdo_login->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection to login database failed: " . $e->getMessage();
        exit();
    }

    $email = $_POST['email'];

    if (isAdmin($email, $pdo_event)) {
        // Redirect to the admin area
        header("Location: /EVENT/admin/index.php");
        exit;
    } elseif (isUserRegistered($email, $pdo_login)) {
        // Proceed with the current system
        header("Location: /EVENT/login/login_verification.php");
        exit;
    } else {
        // Email not found in any table, redirect back to login page with error message
        $_SESSION['flashdata'] = [
            'type' => 'danger',
            'msg' => 'Email not registered.'
        ];
        header("Location: /EVENT/login/login.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDCANCER LOGIN SYSTEM</title>
    <link href="/EVENT/TheEvent/assets/img/favicon.png" rel="icon">
    <link href="/EVENT/TheEvent/assets/img/favicon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <style>
        html,body{
            height:100%;
            width:100%;
        }
        main{
            height:calc(100%);
            width:calc(100%);
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
    </style>
</head>
<body class="bg-dark bg-gradient">
    <main>
       <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 mb-4">
           <h1 class="text-light text-center">MEDCANCER</h1>
        </div>
       <div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
           <div class="card shadow rounded-0">
               <div class="card-header py-1">
                   <h4 class="card-title text-center">LOGIN</h4>
               </div>
               <div class="card-body py-4">
                   <div class="container-fluid">
                       <form action="/EVENT/login/login.php" method="POST">
                       <?php 
                            if(isset($_SESSION['flashdata'])):
                        ?>
                        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?> my-2 rounded-0">
                            <div class="d-flex align-items-center">
                                <div class="col-11"><?php echo $_SESSION['flashdata']['msg'] ?></div>
                                <div class="col-1 text-end">
                                    <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['flashdata']) ?>
                        <?php endif; ?>
                           <div class="form-group">
                               <label for="email" class="label-control">Email</label>
                               <input type="email" name="email" id="email" class="form-control rounded-0" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" autofocus required>
                            </div>
                           <div class="form-group">
                               <label for="password" class="label-control">Password</label>
                               <input type="password" name="password" id="password" class="form-control rounded-0" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                            </div>
                            <div class="clear-fix mb-4"></div>
                            <div class="form-group text-end">
                                <button class="btn btn-primary bg-gradient rounded-0">LOGIN</button>
                            </div>
                            <div class="form-group text-cneter">
                                <a href="/EVENT/login/registration.php">Create a New Account</a>
                            </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </main>
</body>
</html>