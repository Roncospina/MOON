<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id_emp = $_GET['id'];

    try {
        $query = "DELETE FROM employ WHERE id_emp = :id_emp";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id_emp', $id_emp);
        $statement->execute();

        $_SESSION['message'] = 'Employ Removed Successfully';
        header('Location: emp.php');
        exit();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
?>