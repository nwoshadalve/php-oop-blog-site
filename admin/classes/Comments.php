<?php
    class Comments extends Config{
        // Comment data
        protected function commentData($id){
            return $this->con->query("SELECT * FROM `palki__comments` WHERE `post_id`='$id'");
        }
        //get comments
        public function getComment($id){
            return $this->commentData($id);
        }
        // Insert comments
        public function postComments($data){
            $postId = $data["post_id"];
            $name = $data["name"];
            $comment = $data["comment"];
            $date = date("M d, Y");

            $commentData = $this->commentData($postId);
            $isExist = 0;
            if($commentData->num_rows > 0){
                foreach($commentData as $elm){
                    if($comment === $elm["comment"]){
                        $isExist++;
                    }
                }
            }
            if($isExist == 0){
                $sql = "INSERT INTO `palki__comments`(`id`, `post_id`, `name`, `comment`, `comment_date`, `reply`, `replier_id`, `replier_name`, `replier_img`, `replier_date`) VALUES (null,'$postId','$name','$comment','$date','','','','','')";
                $this->con->query($sql);
                return "success";
            } else{
                return "Something went wrong. Try again letter!";
            }
        }
        // Insert Reply
        public function updateReply($data){
            $id = $data["id"];
            $name = $_SESSION["user_name"];
            $userID = $_SESSION["user_id"];
            $img = $_SESSION["user_img"];
            $date = date("M d, Y");
            $reply = $data["reply"];

            echo "ok";

            $sql = "UPDATE `palki__comments` SET `reply`='$reply',`replier_id`='$userID',`replier_name`='$name',`replier_img`='$img',`replier_date`='$date' WHERE `id`='$id'";

            $res = $this->con->query($sql);
            if($res === true){
                return 1;
            } else{
                return 0;
            }
        }
        // Delete comment
        public function deleteReply($id){
            $sql = "DELETE FROM `palki__comments` WHERE `id`='$id'";
            $res = $this->con->query($sql);
            if($res === true){
                return 2;
            }
            else{
                echo "";
            }
        }
    }
?>