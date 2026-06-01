<?php
/**
 * Admin API: Members Management
 * GET /admin/api/members.php - List all members
 * POST /admin/api/members.php - Create member
 * PUT /admin/api/members.php?id=1 - Update member
 * DELETE /admin/api/members.php?id=1 - Delete member
 */

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../../api/config/database.php';
require_once __DIR__ . '/../includes/auth-check.php';

// Check admin authentication
requireAdminLogin();

try {
    $database = new Database();
    $db = $database->getConnection();

    // GET - List all members or single member
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        // Check if single member requested
        if (isset($_GET['id'])) {
            $query = "SELECT c.*, i.name as industry_name, p.name as province_name
                      FROM companies c
                      JOIN industries i ON c.industry_id = i.id
                      JOIN provinces p ON c.province_id = p.id
                      WHERE c.id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();

            $member = $stmt->fetch();

            if ($member) {
                http_response_code(200);
                echo json_encode(["status" => "success", "data" => $member]);
            } else {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "Member not found"]);
            }
        } else {
            // List all members with filters
            $query = "SELECT c.*, i.name as industry_name, p.name as province_name
                      FROM companies c
                      JOIN industries i ON c.industry_id = i.id
                      JOIN provinces p ON c.province_id = p.id
                      WHERE 1=1";

            $params = [];

            // Filter by industry
            if (isset($_GET['industry']) && !empty($_GET['industry'])) {
                $query .= " AND c.industry_id = :industry_id";
                $params[':industry_id'] = $_GET['industry'];
            }

            // Filter by stakeholder
            if (isset($_GET['stakeholder']) && !empty($_GET['stakeholder'])) {
                $query .= " AND c.stakeholder = :stakeholder";
                $params[':stakeholder'] = $_GET['stakeholder'];
            }

            // Filter by active status
            if (isset($_GET['is_active'])) {
                $query .= " AND c.is_active = :is_active";
                $params[':is_active'] = $_GET['is_active'];
            }

            $query .= " ORDER BY c.created_at DESC";

            // Pagination
            $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
            $limit = isset($_GET['limit']) ? min(50, max(1, intval($_GET['limit']))) : 20;
            $offset = ($page - 1) * $limit;

            // Count total
            $countQuery = str_replace(
                "SELECT c.*, i.name as industry_name, p.name as province_name",
                "SELECT COUNT(*) as total",
                $query
            );
            $countStmt = $db->prepare($countQuery);
            foreach ($params as $key => $value) {
                $countStmt->bindValue($key, $value);
            }
            $countStmt->execute();
            $totalCount = $countStmt->fetch()['total'];

            // Add limit
            $query .= " LIMIT :limit OFFSET :offset";
            $params[':limit'] = $limit;
            $params[':offset'] = $offset;

            $stmt = $db->prepare($query);
            foreach ($params as $key => $value) {
                if (is_int($value)) {
                    $stmt->bindValue($key, $value, PDO::PARAM_INT);
                } else {
                    $stmt->bindValue($key, $value, PDO::PARAM_STR);
                }
            }
            $stmt->execute();

            $members = $stmt->fetchAll();

            http_response_code(200);
            echo json_encode([
                "status" => "success",
                "data" => $members,
                "pagination" => [
                    "current_page" => $page,
                    "per_page" => $limit,
                    "total_items" => intval($totalCount),
                    "total_pages" => ceil($totalCount / $limit)
                ]
            ]);
        }
    }

    // POST - Create new member
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);

        // Validate required fields
        $requiredFields = ['name', 'industry_id', 'province_id'];
        foreach ($requiredFields as $field) {
            if (!isset($input[$field]) || empty($input[$field])) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "$field is required"]);
                exit;
            }
        }

        // Insert member
        $query = "INSERT INTO companies (name, industry_id, province_id, stakeholder, phone, email, website, logo, description)
                  VALUES (:name, :industry_id, :province_id, :stakeholder, :phone, :email, :website, :logo, :description)";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $input['name']);
        $stmt->bindParam(':industry_id', $input['industry_id']);
        $stmt->bindParam(':province_id', $input['province_id']);
        $stmt->bindParam(':stakeholder', $input['stakeholder']);
        $stmt->bindParam(':phone', $input['phone']);
        $stmt->bindParam(':email', $input['email']);
        $stmt->bindParam(':website', $input['website']);
        $stmt->bindParam(':logo', $input['logo']);
        $stmt->bindParam(':description', $input['description']);

        if ($stmt->execute()) {
            $newId = $db->lastInsertId();
            http_response_code(201);
            echo json_encode([
                "status" => "success",
                "message" => "Member created successfully",
                "id" => $newId
            ]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to create member"]);
        }
    }

    // PUT - Update member
    elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Member ID is required"]);
            exit;
        }

        $input = json_decode(file_get_contents('php://input'), true);

        // Build update query dynamically
        $updates = [];
        $params = [':id' => $_GET['id']];

        $allowedFields = ['name', 'industry_id', 'province_id', 'stakeholder', 'phone', 'email', 'website', 'logo', 'description', 'is_active'];

        foreach ($allowedFields as $field) {
            if (isset($input[$field])) {
                $updates[] = "$field = :$field";
                $params[":$field"] = $input[$field];
            }
        }

        if (empty($updates)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "No fields to update"]);
            exit;
        }

        $query = "UPDATE companies SET " . implode(', ', $updates) . " WHERE id = :id";

        $stmt = $db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Member updated successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to update member"]);
        }
    }

    // DELETE - Delete member
    elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Member ID is required"]);
            exit;
        }

        $query = "DELETE FROM companies WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Member deleted successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Failed to delete member"]);
        }
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error occurred"]);
}
?>