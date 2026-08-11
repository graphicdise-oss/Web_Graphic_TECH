@echo off
echo ===========================================
echo Setting up Database for Web Graphic TECH
echo ===========================================

echo 1. Creating MySQL Database (web_graphic_tech)
php -r "try { $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', ''); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $pdo->exec('CREATE DATABASE IF NOT EXISTS web_graphic_tech CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;'); echo 'Database created successfully.'; } catch (PDOException $e) { echo 'Connection failed: ' . $e->getMessage(); }"
echo.

echo 2. Running Migrations and Seeders
call php artisan migrate:fresh --seed
echo.

echo ===========================================
echo Database Setup Completed Successfully!
echo ===========================================
pause
