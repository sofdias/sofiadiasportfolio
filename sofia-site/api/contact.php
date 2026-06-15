<?php
// Simple contact endpoint — emails Sofia and logs to api/messages.log
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
  exit;
}

$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(422);
  echo json_encode(['ok' => false, 'message' => 'Please fill in all fields with a valid email.']);
  exit;
}

$to      = 'sofia.gr.13@gmail.com';
$subject = "New brief from {$name}";
$body    = "From: {$name} <{$email}>\n\n{$message}\n";
$headers = "From: no-reply@" . ($_SERVER['HTTP_HOST'] ?? 'localhost') . "\r\n" .
           "Reply-To: {$email}\r\n" .
           "Content-Type: text/plain; charset=UTF-8\r\n";

// Try to email (silently log if mail() is unavailable)
$sent = @mail($to, $subject, $body, $headers);

// Always log a copy
$log = __DIR__ . '/messages.log';
@file_put_contents(
  $log,
  '[' . date('c') . "] {$name} <{$email}>\n{$message}\n---\n",
  FILE_APPEND
);

echo json_encode([
  'ok'      => true,
  'message' => $sent ? 'Sent. Talk soon.' : 'Saved. I will get back to you.',
]);
