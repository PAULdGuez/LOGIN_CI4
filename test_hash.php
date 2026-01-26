<?php
$password = '123456';
$hash = '$2y$10$vI8aWBnW3fID.ZQ4/zo1G.q1lRps.9cGLcZEiGDMVr5yUP1KUOYTa';

if (password_verify($password, $hash)) {
    echo "VERIFIED: The password matches the hash.\n";
} else {
    echo "FAILED: The password does NOT match the hash.\n";
    echo "Correct hash for '123456' would be: " . password_hash($password, PASSWORD_DEFAULT) . "\n";
}
