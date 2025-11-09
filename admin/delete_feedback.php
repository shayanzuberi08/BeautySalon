<?php
session_start();
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){ header("Location: ../login.php"); exit(); }
include '../php/config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM feedback WHERE id=$id");
header("Location: feedback.php");
?>
