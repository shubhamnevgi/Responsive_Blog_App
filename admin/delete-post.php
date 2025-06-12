<?php 
require 'config/database.php';

if(isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // fetch posts from database
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);

    // make sure we got back only one user 
    if(mysqli_num_rows($result) == 1) {
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path = '../images/'. $thumbnail_name;

        // delete thumbnail if it exists
        if (file_exists($thumbnail_path)) {
            unlink($thumbnail_path);
        }
    }
    
    //FOR Later
    //fetch all thumbnails of user's posts and delete them 

    // delete post from database
    $delete_post_query = "DELETE FROM posts WHERE id=$id LIMIT 1";
    $delete_post_result = mysqli_query($connection, $delete_post_query);
    if(mysqli_errno($connection)) {
        $_SESSION['delete-post'] = "Couldn't delete post";
    } else {
        $_SESSION['delete-post-success'] = "Post deleted successfully";
    }
} 

header('Location:'. ROOT_URL .'admin/');
die();
?>
