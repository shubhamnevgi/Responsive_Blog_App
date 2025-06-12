<?php
include 'partial/header.php';

// fetch categories from database
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);

// fetch post data from database if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('Location:'. ROOT_URL .'admin/');
    die();
}

?>


<section class="form__section">
    <div class="container form__section-container">


        <h2>Edit Post</h2>
        <form action="<?= ROOT_URL ?>/admin/edit-post-logic.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile?>
            </select>
            <textarea rows="10" name="body" placeholder="Post Body"><?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <label for="is__featured">Featured</label>
                <input type="checkbox" id="is__featured" name="is_featured" value="1" checked>
            </div>
            <div class="form__control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>

<!--======================= END OF EDIT POST ==========================-->

<?php
include '../partials/footer.php'
?>
