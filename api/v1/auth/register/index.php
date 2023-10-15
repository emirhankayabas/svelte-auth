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
    $user_name = post("firstName"); // Get the user's first name
    $user_surname = post("lastName"); // Get the user's last name
    $user_email = post("email"); // Get the user's email
    $user_password = password_hash(post("password"), PASSWORD_DEFAULT); // Get the user's password (hashed)

    if (!empty($user_name) && !empty($user_surname) && !empty($user_email) && !empty($user_password)) {
        // Check if the email is already registered
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$user_email]);
        if ($stmt->rowCount()) {
            // Email is already registered
            $response["error"] = "Bu eposta adresi zaten kayıtlı.";
        } else {
            // Insert the user into the database
            $sql = "INSERT INTO users (user_name, user_surname, user_email, user_password) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([ucfirst($user_name), ucfirst($user_surname), $user_email, $user_password]);
            if ($stmt) {
                // User is registered
                $response["success"] = "Kayıt başarılı.";
            } else {
                // User is not registered
                $response["error"] = "Kayıt başarısız.";
            }
        }
    } else {
        // Form is not valid
        $response["error"] = "Lütfen tüm alanları doldurun.";
    }
}

// Return the response
echo json_encode($response);
