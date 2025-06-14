<?php
include 'partials/header.php';

// fetch posts from database if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
} else {
    header('Location:'. ROOT_URL .'blog.php');
}

?>


<header class="category__title">
<?php 
    // fetch category from categories table using category id
    $category_id = $id;
    $category_query = "SELECT * FROM categories WHERE id=$category_id";
    $category_result = mysqli_query($connection, $category_query);
    $category = mysqli_fetch_array($category_result);
    ?>
    <h2><?= $category['title'] ?></h2>
</header>

<!--======================= END OF CATEGORY TITLE ==========================-->

<?php if (mysqli_num_rows($posts) > 0) : ?>
<section class="posts">
    <div class="container posts__container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
        <article class="post">
            <div class="post__thumbnail">
                <img src="./images/<?= $post['thumbnail'] ?>">
            </div>
            <div class="post__info">
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category_id ?>" class="category__button"><?= $category['title'] ?></a>
                <h3 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                </h3>
                <p class="post__body">
                <?= substr($post['body'], 0, 150)?>...
                </p>
                <div class="post__author">
                <?php 
                // fetch category from categories table using category id
                    $author_id = $post['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_array($author_result);
                ?>
                    <div class="post__author-avatar">
                        <img src="./images/<?= $author['avatar'] ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                        <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                    </div>
                </div>
             </div>
        </article>
        <?php endwhile ?>        
    </div>
</section>
<?php else : ?>
    <div class="alert__message error lg">
        <p>No posts found for this category</p>
    </div>

<?php endif ?>    

<!--======================= END OF POSTS ==========================-->


<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php 
            $all_categories_query = "SELECT * FROM categories";
            $all_categories_result = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while($category = mysqli_fetch_assoc($all_categories_result)) : ?>
        <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title']?></a>
        <?php endwhile ?>
    </div>
</section>

<!--======================= END OF CATEGORY BUTTONS ==========================-->



<?php
include 'partials/footer.php'
?>