<?php
session_start();
require_once("../header.php");
require_once("navbar.php");
require_once("../db.php");
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT * FROM guest_mess";
$from_bd = mysqli_query($db_connect, $get_query);

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
                                <th>Guest Name</th>
                                <th>Guest Email</th>
                                <th>Guest message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_bd as $messages) {
                                ?>
                                    <tr class="<?php
                                                if ($messages['read_status'] == 1) {
                                                    echo "bg-info";
                                                } else {
                                                    echo "text-dark";
                                                }
                                                ?>">
                                        <td><?= $messages['guest_name'] ?></td>
                                        <td><?= $messages['guest_email'] ?></td>
                                        <td><?= $messages['guest_message'] ?></td>
                                        <td>
                                            <?php
                                            if ($messages['read_status'] == 1) :
                                            ?>
                                                <a href="message_status.php?message_id=<?= $messages['id'] ?>" class="btn btn-sm btn-warning">mark as read</a>
                                            <?php
                                            else :
                                            ?>
                                                <a href="#" class="btn btn-sm btn-danger">delete</a>

                                            <?php
                                            endif
                                            ?>
                                        </td>
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