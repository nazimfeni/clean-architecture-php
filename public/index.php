<?php

namespace Presentation;

use Application\GetUser;
use Infrastructure\UserRepository;
use PDO;
use PDOException;

require '../vendor/autoload.php';

// Database Connection
try {
    $db = new PDO("mysql:host=localhost;dbname=clean_architecture", "root", "root", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die(json_encode(["error" => "Database connection failed"]));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id === 0) {
    die(json_encode(["error" => "Invalid or missing ID"]));
}
$userRepository = new UserRepository($db);
$getUser = new GetUser($userRepository);
$user = $getUser->execute($id);

header('Content-Type: application/json');
echo json_encode($user ? [
    'id' => $user->getId(),
    'name' => $user->getName(),
    'email' => $user->getEmail()
] : ['error' => 'User not found']);
