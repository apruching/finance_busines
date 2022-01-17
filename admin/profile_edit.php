<?php
session_start();
require_once("../header.php");
require_once("navbar.php");
require_once("../db.php");

$login_email = $_SESSION['email'];

$get_query = "SELECT user_name,email,phone FROM users WHERE email='$login_email'";
$db_result = mysqli_query($db_connect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_result);
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-warning">
                        <h5 class="title text-capitalize text-white d-flex justify-content-between">Profile edit form</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['profile_err'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['profile_err'];
                                unset($_SESSION['profile_err']);
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <form action="profile_edit_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">user name</label>
                                <!-- <input type="hidden" name="email" class="form-control" value="<?= $after_assoc['email'] ?>"> -->
                                <input type="text" name="user_name" class="form-control" value="<?= $after_assoc['user_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $after_assoc['phone'] ?>">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-warning text-capitalize" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once("../footer.php");
?>