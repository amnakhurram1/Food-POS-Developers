<?php
// contact.php - receives POST from index.php contact form
session_start();

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// Simple validation & sanitization
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$ticket = trim($_POST['ticket'] ?? ''); // example jira ticket id passed from form (optional)

$errors = [];
if ($name === '') {
    $errors[] = "Name is required.";
}
if ($email === '') {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address is invalid.";
}
if ($message === '') {
    $errors[] = "Message is required.";
}

// If errors -> store in session and redirect back to index
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = ['name' => $name, 'email' => $email, 'message' => $message];
    // return to homepage anchor contact so user sees the form
    header('Location: index.php#contact');
    exit;
}

// Simulate success (assignment asks to simulate)
// Here you could:
// - insert into DB
// - send email via mail()
// But for this project we simulate and redirect to thank-you page

// OPTIONAL: log to a file for demo purposes (safe, no sensitive production logging)
$logLine = sprintf("[%s] ticket=%s | name=%s | email=%s | message=%s\n",
    date('Y-m-d H:i:s'), $ticket, addslashes($name), addslashes($email), addslashes(substr($message,0,200)));
file_put_contents(__DIR__ . '/contact_log.txt', $logLine, FILE_APPEND | LOCK_EX);

// Redirect to thank you page
header('Location: thankyou.html');
exit;
