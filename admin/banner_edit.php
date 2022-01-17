<?php
session_start();
require_once '../db.php';
require_once '../header.php';
require_once 'navbar.php';
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
$id = $_GET['banner_id'];

$get_query = "SELECT * FROM bannners WHERE id=$id";

$banner_from_db = mysqli_query($db_connect, $get_query);

$after_assoc = mysqli_fetch_assoc($banner_from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-info">
                        <h5 class="card-title text-capitalize">
                            banner edit form
                        </h5>
                    </div>
                    <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner sub title</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">
                            <input type="text" name="banner_sub_title" class="form-control" value="<?= $after_assoc['banner_sub_title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner title</label>
                            <input type="text" name="banner_title" class="form-control" value="<?= $after_assoc['banner_title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner detail</label>
                            <input type="text" name="banner_detail" class="form-control" value="<?= $after_assoc['banner_detail'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-capitalize text-primary">banner image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <img src="../<?= $after_assoc['image_location'] ?>" alt="" style="width:150px;">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="form-control btn btn-primary">add banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../footer.php';
?>