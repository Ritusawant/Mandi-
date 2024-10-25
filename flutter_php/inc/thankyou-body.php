<?php
include('database.php');

$id = $_GET['id'];

$select_user = "SELECT * FROM USERS WHERE id = :id";
$sql = $conn->prepare($select_user);
$sql->bindParam(':id', $id, PDO::PARAM_INT);
$sql->execute();
$data = $sql->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <div class="container-fluid">
        <div class="row" style="padding-top: 5%;">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: center; background-color: white; border-radius: 20px;">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        Logo
                    </div>
                    <div class="col-md-12">
                        <span style="font-weight: 100; font-size:18px;">Register A New Account</span>
                    </div>
                    <div class="col-md-12">
                        <?php 
                        if (!empty($data)) {
                            $row = $data[0]; // Access the first (and presumably only) row
                            echo "Dear " . htmlspecialchars($row->user_name) . ", your registration is successful.You can now <a href='index.php?page=Login'>Login</a>";
                        } else {
                            echo "User not found.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
