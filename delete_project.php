<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id_pro = $_GET['id'];

    try {
        $query = "DELETE FROM projects WHERE id_pro = :id_pro";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id_pro', $id_pro);
        $statement->execute();

        $_SESSION['message'] = 'Project Removed Successfully';
        header('Location: proyecto1.php');
        exit();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
?>
