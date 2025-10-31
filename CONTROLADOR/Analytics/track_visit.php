<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Analytics/AnalyticsModel.php');

header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

// Recibir datos via POST
$pageUrl = $_POST['page_url'] ?? '';
$pageTitle = $_POST['page_title'] ?? '';
$referrer = $_POST['referrer'] ?? '';

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ipAddress = $_SERVER['REMOTE_ADDR'] ?? '';
$sessionId = session_id() ?: '';

$model = new AnalyticsModel($conn);
$result = $model->trackVisit($pageUrl, $pageTitle, $referrer, $userAgent, $ipAddress, $sessionId);
echo json_encode($result);

$conn->close();
?>
