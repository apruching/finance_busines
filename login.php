<?php
session_start();
require_once("header.php");

if (isset($_SESSION['user_status'])) {
    header('location: admin/dashboard.php');
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-3">
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-capitalize d-flex justify-content-between">Login Form <a href="register.php">Register</a></h5>
                    </div>
                    <div class="card-body">
                        <form action="login_post.php" method="post">
                            <?php
                            if (isset($_SESSION['login_err'])) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['login_err'];
                                    unset($_SESSION['login_err']);
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <label for="">Email:
                                <input type="text" placeholder="Enter your email" name="email">
                            </label>
                            <label for="">Password:
                                <input type="password" placeholder="Enter your password" name="password">
                            </label>
                            <button type="submit">Login</button>
                            <button type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once("footer.php");
?>