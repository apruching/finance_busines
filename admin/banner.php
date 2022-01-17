<?php
session_start();
require_once '../header.php';
require_once '../db.php';
require_once 'navbar.php';
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}

$get_query = "SELECT * FROM bannners";
$from_db = mysqli_query($db_connect, $get_query);


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">
                            banner add form
                        </h5>
                    </div>
                    <form action="banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner sub title</label>
                            <input type="text" name="banner_sub_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner title</label>
                            <input type="text" name="banner_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner detail</label>
                            <input type="text" name="banner_detail" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="form-control btn btn-primary">add banner</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">
                            banner list
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Serial</th>
                                <th>banner sub title</th>
                                <th>banner title</th>
                                <th>banner detail</th>
                                <th>location</th>
                                <th>active status</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_db as $key => $banner) :
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $banner['banner_sub_title'] ?></td>
                                        <td><?= $banner['banner_title'] ?></td>
                                        <td><?= $banner['banner_detail'] ?></td>
                                        <td>
                                            <img src="../<?= $banner['image_location'] ?>" alt="" style="width:100px;">
                                        </td>
                                        <td>
                                            <?php
                                            if ($banner['active_status'] == 1) :
                                            ?>
                                                <span class="badge badge-sm bg-success">active</span>
                                            <?php
                                            else :
                                            ?>
                                                <span class="badge badge-sm bg-warning">deactive</span>
                                            <?php
                                            endif
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <?php
                                                if ($banner['active_status'] == 1) :
                                                ?>
                                                    <a href="banner_deactive.php?banner_id=<?= $banner['id'] ?>" class="btn btn-sm btn-warning">deactive</a>
                                                <?php
                                                else :
                                                ?>
                                                    <a href="banner_active.php?banner_id=<?= $banner['id'] ?>" class="btn btn-sm btn-warning">active</a>
                                                <?php
                                                endif
                                                ?>
                                                <a href="banner_edit.php?banner_id=<?= $banner['id'] ?>" class="btn btn-sm btn-info">edit</a>
                                                <a href="banner_delete.php?banner_id=<?= $banner['id'] ?>" class="btn btn-sm btn-danger">delete</a>
                                            </div>
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