<?php
session_start();
require_once("../header.php");
require_once("navbar.php");
require_once("../db.php");
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT user_name,email,phone FROM users";
$from_db = mysqli_query($db_connect, $get_query);


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-capitalize text-white">All users list</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_db as $user) {
                                ?>
                                    <tr>
                                        <td><?= $user['user_name'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['phone'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once("../footer.php");
?>