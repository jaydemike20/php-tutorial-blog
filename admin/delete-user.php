<?php

require './config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch user from database
    $query = "SELECT * FROM users WHERE id=$id";

    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    
    // make sure we got only 1 user
    if(mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;

        // delete image if availabe
        if ($avatar_path) {
            unlink($avatar_path);
        }
    
        // FOR LATER
        // fetch all thumbnails of user's posts and delete them


        // delete the user from the database
        $delete_user_query = "DELETE FROM users WHERE id=$id";
        $delete_user_result = mysqli_query($connection, $delete_user_query);

        if(mysqli_errno($connection)) {
            $_SESSION['delete-user'] = "Couldn't delete '{$user['firstname']}' '{$user['lastname']}'";
        } else {
            $_SESSION['delete-user-success'] = "'{$user['firstname']}' '{$user['lastname']}' deleted successfully";
        }
    }
}
header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();

?>