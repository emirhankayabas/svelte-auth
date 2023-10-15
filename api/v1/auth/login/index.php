<?php

// Allow cross-domain javascript
header("Access-Control-Allow-Origin: *");

// Form helper
require_once "../helper/form.php";

// Load the config file
$config = require_once "../init.php";

// Create an empty array to store the response
$response = [];

// Check if the form is valid
if ($_POST) {
    // Get the form data
    $user_email = post("email");
    $user_password = post("password");

    // Check if the form data is valid
    if (!$user_email) {
        // Set the error message
        $response["error"] = "Lütfen e-posta adresinizi giriniz.";
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        // Set the error message
        $response["error"] = "Lütfen geçerli bir e-posta adresi giriniz.";
    } elseif (!$user_password) {
        // Set the error message
        $response["error"] = "Lütfen şifrenizi giriniz.";
    } else {
        // Get the user data
        $sql = "SELECT * FROM users WHERE user_email = :user_email";
        $query = $db->prepare($sql);
        $query->execute([
            "user_email" => $user_email
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($row) {
            // Check if the password is correct and the user is active
            if (password_verify($user_password, $row["user_password"])) {
                // Set the user data and the success message
                $response["success"] = [
                    "message" => "Giriş başarılı.",
                    "user" => $row
                ];
            } else {
                // Set the error message
                $response["error"] = "E-posta adresi veya şifre hatalı.";
            }
        } else {
            // Set the error message
            $response["error"] = "E-posta adresi veya şifre hatalı.";
        }
    }
}

// Return the response
echo json_encode($response);
