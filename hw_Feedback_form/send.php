<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;

    $ch = curl_init('https://httpbin.org/post');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    $response = curl_exec($ch);
    curl_close($ch);

    header('Location: feedback.php');
    exit;
} else {
    header('Location: form.php');
    exit;
}
?>