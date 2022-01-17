<?php
session_start();
require_once("../header.php");
require_once("navbar.php");
require_once("../db.php");

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-secondary">
                        <h5 class="title text-capitalize text-white d-flex justify-content-between">Password change form</h5>
                    </div>
                    <div class="card-body">
                        <form action="change_password_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">Old password</label>
                                <input type="password" name="old_pass" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">New password</label>
                                <input type="password" name="new_pass" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">Comfirm password</label>
                                <input type="password" name="comfirm_password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary text-white text-capitalize">change</button>
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