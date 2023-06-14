<?php
session_start();
include("db.php");
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $employeeCount = $_POST["employee_count"];
    $projectLeader = $_POST["project_leader"];

    $sql = "INSERT INTO projects (description, start_date, end_date, employee_count, project_leader) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$description, $startDate, $endDate, $employeeCount, $projectLeader]);


    header("Location: proyecto1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Project</title>
</head>

<body>
    <div class="container2">
        <svg class width="128" height="128" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M127.13 0H0V127.13H127.13V0Z" />
            <path
                d="M98.8195 85.3772C98.2422 84.4583 97.4875 83.6636 96.5995 83.0397C95.7116 82.4158 94.7081 81.9752 93.6479 81.7435C89.5915 80.8001 86.0735 78.2894 83.8625 74.7601C81.6516 71.2307 80.9276 66.9697 81.8486 62.9082C82.2027 61.3384 82.0851 59.699 81.5105 58.1958C80.9359 56.6926 79.93 55.3927 78.6191 54.4594C77.3081 53.5261 75.7506 53.001 74.1421 52.9499C72.5337 52.8989 70.9461 53.3242 69.5786 54.1725C68.2111 55.0209 67.1248 56.2543 66.456 57.718C65.7873 59.1818 65.5659 60.8104 65.8198 62.3995C66.0736 63.9886 66.7914 65.4673 67.8829 66.6498C68.9743 67.8323 70.3909 68.666 71.9546 69.046C73.9776 69.5023 75.8906 70.3534 77.584 71.5505C79.2774 72.7475 80.7179 74.2671 81.8229 76.0219C82.9279 77.7768 83.6757 79.7325 84.0234 81.7769C84.3712 83.8213 84.312 85.9143 83.8493 87.9358C83.5753 89.239 83.6241 90.5894 83.9916 91.8693C84.3591 93.1492 85.0341 94.3198 85.9577 95.2792C86.8813 96.2385 88.0254 96.9574 89.2905 97.3732C90.5556 97.789 91.9031 97.889 93.2157 97.6647C94.5284 97.4404 95.7662 96.8984 96.8214 96.0861C97.8766 95.2737 98.717 94.2157 99.2696 93.0041C99.8221 91.7924 100.07 90.4641 99.9916 89.1348C99.9131 87.8054 99.5108 86.5154 98.8195 85.3772Z"
                fill="#01A7DB" stroke="#FFFFFF" stroke-width="1" />
            <path
                d="M48.6144 76.3133C50.0429 77.0928 51.6716 77.4278 53.2917 77.2752C54.9119 77.1226 56.4494 76.4894 57.7072 75.4569C58.965 74.4243 59.8856 73.0395 60.3508 71.4802C60.8161 69.9208 60.8048 68.258 60.3184 66.7051C59.7019 64.7249 59.4823 62.6426 59.6722 60.5774C59.8621 58.5122 60.4576 56.5048 61.4249 54.6703C62.3921 52.8358 63.7119 51.2102 65.3086 49.8867C66.9053 48.5632 68.7475 47.568 70.7296 46.9579C72.2669 46.4764 73.6273 45.5509 74.6398 44.298C75.6523 43.0451 76.2716 41.5207 76.4197 39.9166C76.5679 38.3125 76.2383 36.7004 75.4724 35.2833C74.7065 33.8661 73.5385 32.7071 72.1155 31.9522C70.6924 31.1973 69.0779 30.8801 67.4751 31.0407C65.8722 31.2012 64.3526 31.8322 63.1075 32.8544C61.8624 33.8765 60.9475 35.2441 60.4778 36.785C60.0082 38.3259 60.0048 39.9713 60.4681 41.5141C61.6843 45.4971 61.273 49.7998 59.3244 53.4803C57.3757 57.1608 54.0484 59.9194 50.0706 61.1524C48.5003 61.6078 47.1028 62.524 46.0591 63.7826C45.0154 65.0412 44.3735 66.5841 44.2166 68.2115C44.0598 69.839 44.3951 71.4761 45.1792 72.9108C45.9633 74.3456 47.16 75.5119 48.6144 76.2588V76.3133Z"
                fill="#002D6C" stroke="#FFFFFF" stroke-width="1" />
            <path
                d="M69.6273 74.9794C68.5416 75.0175 67.4745 75.2719 66.4883 75.7276C65.5021 76.1833 64.6168 76.8311 63.8841 77.6333C61.0416 80.6736 57.1109 82.4648 52.9515 82.6153C48.792 82.7658 44.7421 81.2632 41.6873 78.4362C40.898 77.6956 39.9694 77.1193 38.9554 76.7408C37.9415 76.3623 36.8624 76.1892 35.7809 76.2315C34.4497 76.2943 33.154 76.682 32.0071 77.3607C30.8601 78.0394 29.8968 78.9885 29.2011 80.1251C28.5053 81.2618 28.0984 82.5515 28.0157 83.8816C27.9331 85.2118 28.1772 86.5419 28.7269 87.756C29.2766 88.97 30.115 90.0311 31.1691 90.8466C32.2232 91.6621 33.4608 92.2071 34.774 92.4342C36.0872 92.6613 37.4361 92.5636 38.7028 92.1495C39.9696 91.7354 41.1157 91.0176 42.0411 90.0586C43.4489 88.5344 45.1435 87.3029 47.0279 86.4347C48.9124 85.5665 50.9496 85.0785 53.0229 84.9989C55.0962 84.9193 57.1649 85.2494 59.1104 85.9705C61.0559 86.6917 62.84 87.7895 64.3605 89.2012C65.3504 90.0957 66.5444 90.7339 67.838 91.0601C69.1317 91.3864 70.4855 91.3907 71.7812 91.0727C73.0769 90.7547 74.2748 90.1241 75.2704 89.236C76.266 88.3479 77.0288 87.2293 77.4922 85.9782C77.9555 84.7271 78.1052 83.3816 77.9283 82.0592C77.7513 80.7369 77.253 79.4781 76.4769 78.3928C75.7009 77.3076 74.6709 76.4291 73.4768 75.834C72.2827 75.239 70.961 74.9455 69.6273 74.9794Z"
                fill="#000050" stroke="#FFFFFF" stroke-width="1" />
        </svg>
    </div>
    <div class="title-subtitle">
        <span class="welcome-text">Create Project</span>
        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="container3">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="margin: 20px;">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="employee_count">Employee Count:</label>
                <input type="number" id="employee_count" name="employee_count" required>
            </div>
            <div class="form-group">
                <label for="project_leader">Project Leader:</label>
                <input type="text" id="project_leader" name="project_leader" required>
            </div>
            <div class="form-group">
                <button type="submit">Create Project</button>
            </div>
        </form>
        <div class="info">
            <?php
            $sql = "SELECT * FROM projects";
            $stmt = $conn->query($sql);

            if ($stmt->rowCount() > 0) {
                echo "<table class='project-table'>";
                echo "<tr><th>ID</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Employee Count</th><th>Project Leader</th><th>Actions</th></tr>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_pro"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["start_date"] . "</td>";
                    echo "<td>" . $row["end_date"] . "</td>";
                    echo "<td>" . $row["employee_count"] . "</td>";
                    echo "<td>" . $row["project_leader"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_project.php?id=" . $row['id_pro'] . "' >";
                    echo "<i class='fas fa-marker'></i>";
                    echo "</a>";
                    echo "<a href='delete_project.php?id=" . $row['id_pro'] . "' >";
                    echo "<i class='far fa-trash-alt'></i>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron datos.";
            }
            ?>

        </div>
    </div>
</body>

</html>