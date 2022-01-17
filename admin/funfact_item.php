<?php
session_start();
require_once '../header.php';
require_once '../db.php';
require_once 'navbar.php';
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT * FROM funfact_items";
$from_db = mysqli_query($db_connect, $get_query);


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize text-success">funfact add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="funfact_item_post.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">fun number</label>
                                <input type="text" class="form-control" name="fun_num" value="">
                                <?php if (isset($_SESSION['fun_num'])) : ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['fun_num'] ?>
                                    </small>
                                    <?php unset($_SESSION['fun_num']) ?>
                                <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">fun item heading</label>
                                <input type="text" class="form-control" name="fun_item_head">
                                <?php if (isset($_SESSION['fun_item_head'])) : ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['fun_item_head'] ?>
                                    </small>
                                    <?php unset($_SESSION['fun_item_head']) ?>
                                <?php endif ?>
                            </div>
                            <button class="btn btn-success text-uppercase">add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header text-capitalize text-info"> funfact heading table</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>fun number</th>
                                <th>fun item heading</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($from_db as $funfact) : ?>
                                    <tr>
                                        <td><?= $funfact['fun_num'] ?></td>
                                        <td><?= $funfact['fun_item_head'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once '../footer.php';
?>