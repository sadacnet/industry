# industry.co.zw - Zimbabwe Industrial Portal

A custom-built platform for Zimbabwe's industrial directory, replacing the WordPress MyListing theme.

## Tech Stack
- Frontend: HTML5, CSS3, JavaScript (Arsha Template)
- Backend: PHP 8.1+ REST API
- Database: MySQL 8.0
- Server: Apache (XAMPP)

## Installation

### Prerequisites
- XAMPP with PHP 8.1+
- MySQL 8.0
- Web browser

### Setup Steps

1. **Clone/Copy to XAMPP**


2. **Import Database**
- Open http://localhost/phpmyadmin
- Create database: `industry_co_zw`
- Import `database/schema.sql`

3. **Configure Database Connection**
- Edit `api/config/database.php`
- Update credentials if needed (default: root, no password)

4. **Test API**
- Open http://localhost/industry.co.zw/test-api.html
- Click buttons to test all endpoints

## API Endpoints

### Public Endpoints (No Authentication Required)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/public/industries.php | List all industries |
| GET | /api/public/industries.php?slug=mining | Get single industry |
| GET | /api/public/companies.php | List companies |
| GET | /api/public/companies.php?industry=mining | Filter by industry |
| GET | /api/public/companies.php?province=harare | Filter by province |
| GET | /api/public/companies.php?stakeholder=CZI | Filter by stakeholder |
| GET | /api/public/companies.php?search=term | Search companies |
| GET | /api/public/provinces.php | List provinces |
| GET | /api/public/events.php | List events |
| GET | /api/public/tenders.php | List tenders |
| GET | /api/public/exports.php | List exports |
| GET | /api/public/advertisements.php?stakeholder=CZI | Get ads |
| GET | /api/public/gallery.php | Image gallery |
| GET | /api/public/videos.php | Video gallery |
| GET | /api/public/search.php?q=term | Global search |
| POST | /api/public/contact.php | Submit contact form |

## Default Admin Login
- URL: /admin/ (coming in Phase 2)
- Username: admin
- Password: Admin@2026!


## Security Features
- PDO prepared statements (SQL injection prevention)
- Input validation and sanitization
- XSS protection
- CORS headers
- Rate limiting ready
- HTTPS ready

## Phase 1 Complete ✅
- Database schema with seed data
- All public API endpoints
- API test panel
- Security configuration