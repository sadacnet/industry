<?php
/**
 * Public API: Industries (Hierarchical)
 * GET /api/public/industries.php - List all industries with hierarchy
 */

// Disable PHP error display for production
ini_set('display_errors', '0');
error_reporting(0);

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once __DIR__ . '/../config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    if (isset($_GET['slug'])) {
        // Single industry logic (keep for backward compatibility)
        $slug = $_GET['slug'];
        $query = "SELECT * FROM industries WHERE slug = :slug LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        $industry = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($industry) {
            // Count companies in this industry AND its children
            $countQuery = "SELECT COUNT(*) as company_count FROM companies
                          WHERE (industry_id = :id OR industry_id IN (SELECT id FROM industries WHERE parent_id = :id2))
                          AND is_active = 1";
            $countStmt = $db->prepare($countQuery);
            $countStmt->bindParam(':id', $industry['id'], PDO::PARAM_INT);
            $countStmt->bindParam(':id2', $industry['id'], PDO::PARAM_INT);
            $countStmt->execute();
            $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
            $industry['company_count'] = $countResult ? (int)$countResult['company_count'] : 0;

            echo json_encode(["status" => "success", "data" => $industry]);
        } else {
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "Industry not found"]);
        }
    } else {
        // Fetch all industries and build hierarchy
        $query = "SELECT i.*,
                  (SELECT COUNT(*) FROM companies WHERE industry_id = i.id AND is_active = 1) as direct_company_count
                  FROM industries i
                  ORDER BY i.display_order ASC, i.name ASC";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $hierarchy = [];
        $children = [];

        foreach ($all as $item) {
            if ($item['parent_id'] === null) {
                $item['sub_categories'] = [];
                $item['total_company_count'] = (int)$item['direct_company_count'];
                $hierarchy[$item['id']] = $item;
            } else {
                $children[] = $item;
            }
        }

        foreach ($children as $child) {
            if (isset($hierarchy[$child['parent_id']])) {
                $hierarchy[$child['parent_id']]['sub_categories'][] = $child;
                $hierarchy[$child['parent_id']]['total_company_count'] += (int)$child['direct_company_count'];
            }
        }

        echo json_encode([
            "status" => "success",
            "data" => array_values($hierarchy)
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Internal server error occurred."]);
}
?>