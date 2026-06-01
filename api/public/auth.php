<?php
/**
 * Public API: User Auth
 * POST /api/public/auth.php?action=register
 * POST /api/public/auth.php?action=login
 */

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

require_once __DIR__ . '/../config/database.php';

$action = $_GET['action'] ?? '';

try {
    $database = new Database();
    $db = $database->getConnection();

    if ($action === 'register') {
        $input = json_decode(file_get_contents('php://input'), true);
        if (empty($input['email']) || empty($input['password'])) {
            throw new Exception("Email and password required");
        }

        $hash = password_hash($input['password'], PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (name, email, password_hash) VALUES (:name, :email, :password)");
        $stmt->execute([
            ':name' => $input['name'] ?? '',
            ':email' => $input['email'],
            ':password' => $hash
        ]);

        echo json_encode(["status" => "success", "message" => "User registered"]);
    }
    elseif ($action === 'login') {
        $input = json_decode(file_get_contents('php://input'), true);
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $input['email']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($input['password'], $user['password_hash'])) {
            session_start();
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo json_encode(["status" => "success", "message" => "Login successful", "user" => ["id" => $user['id'], "name" => $user['name']]]);
        } else {
            http_response_code(401);
            echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
        }
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
