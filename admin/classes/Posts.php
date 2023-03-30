<?php
// error_reporting(0);
class Posts extends Config
{
    // Post data
    private function postData()
    {
        return $this->con->query("SELECT * FROM `palki__post`");
    }
    // Publish post
    public function addPost($data)
    {
        // Gthering data
        $postTittle = $data["post_tittle"];
        $postCategory = $data["categories"];
        $fbLink = $data["facebook_link"];
        $twLink = $data["twitter_link"];
        $postDes = $data["post_description"];
        $img = $data["img"];
        $imgLocation = "images/posts/" . $data["img"];
        $tmpImg = $data["tmp_img"];
        $postDate = date("M d, Y");

        // Processing summary
        $summary = "";
        if (strlen($postDes) >= 345) {
            $words = explode(" ", $postDes);
            $summary = implode(" ", array_slice($words, 0, 55));
            $summary = $summary . "...";
        } else {
            $summary = $postDes;
        }

        // Processing tags
        $tags = "";
        if (isset($data["tags"])) {
            foreach ($data["tags"] as $val) {
                $tags = $tags . $val . ", ";
            }
        }
        $tags = substr($tags, 0, strlen($tags) - 2);

        // User Role
        $role = null;
        $users = new Users();
        $user = $users->getUser();
        if ($user->num_rows > 0) {
            foreach ($user as $value) {
                if ($value["id"] == $_SESSION["user_id"]) {
                    $role = $value["role"];
                    $user_name = $value["user_name"];
                    $user_id = $value["id"];
                }
            }
        } else {
            $currentUser = "Admin";
        }
        if ($role == 1) {
            $currentUser = "Admin";
        } elseif ($role == 0) {
            $currentUser = "User";
        }


        // Get Post data
        $postData = $this->postData();
        $count = 0;
        if ($postData->num_rows > 0) {
            foreach ($postData as $elm) {
                if ($elm["post_tittle"] === $postTittle) {
                    $count++;
                }
            }
        }

        // Post comments count will be added letter
        $sql = "INSERT INTO `palki__post`(`post_id`, `post_category`, `post_tag`, `post_tittle`, `post_summary`, `post_description`, `post_facebook`, `post_twitter`, `post_role`, `user_name`, `user_id`, `post_date`, `post_comments`, `post_img`, `post_img_location`) VALUES ( null,'$postCategory','$tags','$postTittle','$summary','$postDes','$fbLink','$twLink','$currentUser','$user_name','$user_id','$postDate','','$img','$imgLocation')";

        if ($count > 0) {
            return 0;
        } elseif ($count == 0) {
            $res = $this->con->query($sql);
            move_uploaded_file($tmpImg, "images/posts/" . $img);
            return 1;
        }
    }
    // get posts
    public function getPosts()
    {
        return $this->postData();
    }
    // Delete posts
    protected function getPostById($id){
        return $this->con->query("SELECT * FROM `palki__post` WHERE `post_id` = '$id'");
    }
    public function deletePost($data)
    {
        $id = $data["delete"];
        $sql = "DELETE FROM `palki__post` WHERE `post_id` = '$id'";
        $postData = $this->getPostById($id);
        if ($postData->num_rows > 0) {
            $post = $postData->fetch_assoc();
            // Get the image file path
            $imgPath = "images/posts/" . $post["post_img"];
            // Delete the file
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
        $res = $this->con->query($sql);
        if ($res) {
            return 1;
        } else {
            echo "";
        }
    }
    // Update Post
    //Getting the post to be update
    public function getUpdateablePost($id)
    {
        $post = $this->postData();
        if ($post->num_rows > 0) {
            foreach ($post as $elm) {
                if ($id == $elm["post_id"]) {
                    $row = $elm;
                }
            }
            return $row;
        }
    }
    // Updatting the post
    public function updatePost($data)
    {
        $pid = $data["post_id"];
        $ptittle = $data["post_tittle"];
        $pcat = $data["categories"];
        // processing Tags
        $tags = "";
        if (isset($data["tags"])) {
            foreach ($data["tags"] as $val) {
                $tags = $tags . $val . ", ";
            }
        }
        $tags = substr($tags, 0, strlen($tags) - 2);

        $fb = $data["facebook_link"];
        $tw = $data["twitter_link"];
        $postdes = $data["post_description"];
        // Processing summary
        $summary = "";
        if (strlen($postdes) >= 345) {
            $words = explode(" ", $postdes);
            $summary = implode(" ", array_slice($words, 0, 55));
            $summary = $summary . "...";
        } else {
            $summary = $postdes;
        }
        if (($data["img"] !== "") && $data["tmp_img"] !== "") {
            $pimg = $data["img"];
            $ptmpimg = $data["tmp_img"];
            $sql = "UPDATE `palki__post` SET `post_category`='$pcat',`post_tag`='$tags',`post_tittle`='$ptittle',`post_summary`='$summary',`post_description`='$postdes',`post_facebook`='$fb',`post_twitter`='$tw', `post_img`='$pimg',`post_img_location`='$ptmpimg' WHERE `post_id` = '$pid'";
        } else {
            $sql = "UPDATE `palki__post` SET `post_category`='$pcat',`post_tag`='$tags',`post_tittle`='$ptittle',`post_summary`='$summary',`post_description`='$postdes',`post_facebook`='$fb',`post_twitter`='$tw' WHERE `post_id` = '$pid'";
        }

        $response = $this->con->query($sql);
        if ($response) {
            return 1;
        } else {
            return 0;
        }
    }
}
