<?php
/**
 * Public API: Companies
 * GET /api/public/companies.php - List companies with filters
 * GET /api/public/companies.php?industry=agriculture - Filter by industry
 * GET /api/public/companies.php?province=harare - Filter by province
 * GET /api/public/companies.php?stakeholder=CZI - Filter by stakeholder
 * GET /api/public/companies.php?search=term - Search companies
 * GET /api/public/companies.php?page=1&limit=20 - Pagination
 */

// Disable PHP error display for production
ini_set('display_errors', '0');
error_reporting(0);

// Set headers
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Include database
require_once __DIR__ . '/../config/database.php';

try {
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Build the query dynamically based on filters
    $whereConditions = [];
    $params = [];

    // Base query
    $query = "SELECT 
                c.*,
                i.name as industry_name,
                i.slug as industry_slug,
                p.name as province_name,
                p.slug as province_slug
              FROM companies c
              JOIN industries i ON c.industry_id = i.id
              JOIN provinces p ON c.province_id = p.id
              WHERE c.is_active = 1";

    // Filter by industry slug
    if (isset($_GET['industry']) && !empty($_GET['industry'])) {
        $whereConditions[] = "i.slug = :industry_slug";
        $params[':industry_slug'] = $_GET['industry'];
    }

    // Filter by province slug
    if (isset($_GET['province']) && !empty($_GET['province'])) {
        $whereConditions[] = "p.slug = :province_slug";
        $params[':province_slug'] = $_GET['province'];
    }

    // Filter by stakeholder (CZI or CIFOZ)
    if (isset($_GET['stakeholder']) && !empty($_GET['stakeholder'])) {
        $stakeholder = strtoupper($_GET['stakeholder']);
        if (in_array($stakeholder, ['CZI', 'CIFOZ'])) {
            $whereConditions[] = "c.stakeholder = :stakeholder";
            $params[':stakeholder'] = $stakeholder;
        }
    }

    // Search functionality
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = "%" . $_GET['search'] . "%";
        $whereConditions[] = "(c.name LIKE :search_name OR c.description LIKE :search_desc OR c.email LIKE :search_email)";
        $params[':search_name'] = $searchTerm;
        $params[':search_desc'] = $searchTerm;
        $params[':search_email'] = $searchTerm;
    }

    // Add WHERE conditions to query
    if (!empty($whereConditions)) {
        $query .= " AND " . implode(" AND ", $whereConditions);
    }

    // Build count query PROPERLY (not with str_replace)
    $countQuery = "SELECT COUNT(*) as total FROM companies c 
                   JOIN industries i ON c.industry_id = i.id 
                   JOIN provinces p ON c.province_id = p.id 
                   WHERE c.is_active = 1";
    
    if (!empty($whereConditions)) {
        $countQuery .= " AND " . implode(" AND ", $whereConditions);
    }

    $countStmt = $db->prepare($countQuery);
    foreach ($params as $key => $value) {
        $countStmt->bindValue($key, $value);
    }
    $countStmt->execute();
    $totalCount = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Add ordering
    $query .= " ORDER BY c.name ASC";

    // Add pagination - INCREASED LIMITS
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $limit = isset($_GET['limit']) ? min(1000, max(1, intval($_GET['limit']))) : 200;  // Changed from 50 to 1000 max, 200 default
    $offset = ($page - 1) * $limit;

    $query .= " LIMIT :limit OFFSET :offset";
    $params[':limit'] = $limit;
    $params[':offset'] = $offset;

    // Execute final query
    $stmt = $db->prepare($query);
    foreach ($params as $key => $value) {
        if (is_int($value)) {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
        } else {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
    }
    $stmt->execute();

    $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return success response
    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "data" => $companies,
        "pagination" => [
            "current_page" => $page,
            "per_page" => $limit,
            "total_items" => intval($totalCount),
            "total_pages" => $totalCount > 0 ? ceil($totalCount / $limit) : 1
        ]
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Database error occurred"
    ]);
}
?>