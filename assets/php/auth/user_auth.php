<?php
include('db.php');
session_start();
// Set Vars
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$phoneNumber = trim($_POST['phoneNumber']);

$returnArr = array();
if ($_POST['action'] == 'register') {
    if (isset($firstName) && strlen($firstName) > 1 && isset($lastName) && strlen($lastName) > 1) {
        // Lets verify the email is not in use
        $sql = $pdo->prepare("SELECT * FROM users");
        $sql->execute();
        // Set userExist to false here, if user exist we will later set it to True
        $userExist = False;
        // Once we verify it works, lets add some protection against SQL injections.
        $results = $sql->fetchAll();
        // Check results for the user
        foreach ($results as $data) {
            if ($data['email'] == $email) {
                $userExist = True;
            }
        }
        // If user exist send response.
        if ($userExist === True) {
            $returnArr['results'] = "Email already registered.";
        }
        // Else continue
        if ($userExist === False) {
            $password = md5($password);
            $data = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => $password,
                'phone_number' => $phoneNumber
            ];
            // We've made it! Lets create our user.
            $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number) VALUES
                (:first_name, :last_name, :email, :password, :phone_number)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute($data) === TRUE) {
                // Our user has been created!
                $returnArr['results'] = "Successfully registered.";
            } else {
                // Uh oh.. something happened. Let's not return the error here, just incase it happens in production.
                $returnArr['results'] = "Unable to register at this time, please contact us for further details.";
            }
        }
    } else {
        // Our user didn't give us a name. Oof.
        $returnArr['results'] = "You must enter your first and last name.";
    }
}
if ($_POST['action'] == 'login') {
    if (isset($email) && isset($password)) {
        $password = md5($password);
        $data = [
            'email' => $email,
            'password' => $password
        ];
        $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $sql->execute($data);
        $results = count($sql->fetchAll());

        if ($results > 0) {
            $_SESSION['email'] = $email;
            $returnArr['results'] = "Logged in.";
        } else {
            $returnArr['results'] = "Invalid username or password.";
        }
    }  
}
if ($_POST['action'] == 'logout') {
    session_destroy();
    $returnArr['results'] = "Logout";
}
echo json_encode($returnArr);
