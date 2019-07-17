<?php
include ('db.php');

// Set Vars
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$phoneNumber = trim($_POST['phoneNumber']);

$returnArr = array();

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
    if($userExist === True){
        $returnArr['results'] = "Email already registered."; 
    }
    // Else continue
    if($userExist === False) {
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
        if($stmt->execute($data) === TRUE){
            // Our user has been created!
            $returnArr['success'] = "Success";
        } else {
            // Uh oh.. something happened. Let's not return the error here, just incase it happens in production.
            $returnArr['results'] = "Unable to register at this time, please contact us for further details.";
        }
    }
} else {
    // Our user didn't give us a name. Oof.
    $returnArr['results'] = "You must enter your first and last name.";
}
echo json_encode($returnArr);
