<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Analytics/AnalyticsModel.php');

header('Content-Type: application/json');

$rangeDays = isset($_GET['rangeDays']) ? (int)$_GET['rangeDays'] : 30;
$dailyDays = isset($_GET['dailyDays']) ? (int)$_GET['dailyDays'] : 7;

$model = new AnalyticsModel($conn);
$stats = $model->getStats($rangeDays, $dailyDays);
echo json_encode($stats);

$conn->close();
?>
