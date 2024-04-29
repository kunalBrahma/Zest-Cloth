<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=march2024", "root", "tansegan");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "Data base connection Successful";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>