<?php
session_start();
require_once "database.php";


if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];
$field = $_POST['field'];
$value = $_POST['value'];

if ($field == 'Guardian_number' && !preg_match('/^\d{10,}$/', $value)) {
    echo json_encode(['success' => false, 'message' => 'Invalid phone number.']);
    exit();
}


$query = "UPDATE users SET $field = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("si", $value, $user_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'newValue' => htmlspecialchars($value)]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update profile.']);
}
?>
