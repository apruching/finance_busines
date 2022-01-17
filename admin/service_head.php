<?php
session_start();
require_once '../header.php';
require_once '../db.php';
require_once 'navbar.php';
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT * FROM service_heads";
$from_db = mysqli_query($db_connect, $get_query);
// $after_assoc = mysqli_fetch_assoc($from_db);


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize text-success">service heading add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_head_post.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">black heading</label>
                                <input type="text" class="form-control" name="black_head">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">green heading</label>
                                <input type="text" class="form-control" name="green_head">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">sub heading</label>
                                <input type="text" class="form-control" name="service_sub_head">
                            </div>
                            <button class="btn btn-success text-uppercase">add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header text-capitalize text-info"> service heading table</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>black head</th>
                                <th>green head</th>
                                <th>sub head</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_db as $service_head) :
                                ?>
                                    <tr>
                                        <td><?= $service_head['black_head'] ?></td>
                                        <td><?= $service_head['green_head'] ?></td>
                                        <td><?= $service_head['service_sub_head'] ?></td>
                                        <td>
                                            <?php if ($service_head['active_status'] == 2) : ?>
                                                <a href="service_head_active.php?id=<?= $service_head['id'] ?>" class="btn btn-sm btn-info">actve</a>
                                            <?php else : ?>
                                                <a href="#" class="btn btn-sm btn-warning">deactive</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php
                                endforeach
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
require_once '../footer.php';
?>