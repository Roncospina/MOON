<?php
include("db.php");

if (isset($_POST['save_emp'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $telephone = $_POST['telephone'];

    $query = "INSERT INTO employ(name, last_name, telephone) VALUES (:name, :last_name, :telephone)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':telephone', $telephone);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Employee created successfully';
        header("Location: /MOON/emp.php");
        exit();
    } else {
        die("QUERY FAILED");
    }
}
?>