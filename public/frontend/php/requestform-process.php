<?php
$errorMSG = "";

if (empty($_POST["nim"])) {
    $errorMSG = "NIM is required";
} else {
    $nim = $_POST["nama"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["phone"])) {
    $errorMSG = "Phone is required ";
} else {
    $phone = $_POST["phone"];
}

// redirect to success page
if ($errorMSG == ""){
    echo "success";
}
?>