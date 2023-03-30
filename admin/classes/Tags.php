<?php
    // require_once("config/Config.php");
    error_reporting(0);
    class Tags extends Config{
        
        // Fetching all categories
        private function tagData(){
            return $this->con->query("SELECT * FROM `palki__tag`");
        }
        // Add categories
        public function addTag($data){
            $tag = $data["tag"];
            $tag_des = $data["tag_des"];

            $count = 0;
            $tagData = $this->tagData();
            if ($tagData->num_rows > 0) {
                foreach ($tagData as $elm) {
                    if ($elm["tag"] === $tag) {
                        $count++;
                    }
                }
            }
            if ($count == 0) {
                $sql = "INSERT INTO `palki__tag`(`tag_id`, `tag`, `tag_description`) VALUES ( null,'$tag','$tag_des')";
                $this->con->query($sql);
                return 1;
            } else {
                return 0;
            }
        }
        // Show categories
        public function showTags(){
            return $this->tagData();
        }
        // Delete category
        public function deleteTag($data){
            $id = $data["delete"];
            $sql = "DELETE FROM `palki__tag` WHERE `tag_id` = '$id'";
            $res = $this->con->query($sql);
            if($res){
                return 1;
            }else{
                echo "";
            }
        }
        //Getting the category to be update
        public function getUpdateableTag($id){
            $tag = $this->tagData();
            if($tag->num_rows > 0){
                foreach ($tag as $elm) {
                    if($id == $elm["tag_id"]){
                        $row = array("id"=>$elm["tag_id"], "tag_name"=>$elm["tag"], "tag_des"=>$elm["tag_description"]);
                    }
                }
                return $row;
            }
        }
        // Updatting the category
        public function updateTag($data){
            $id = $data["id"];
            $name = $data["tag"];
            $des = $data["tag_des"];
            $sql = "UPDATE `palki__tag` SET `tag`='$name',`tag_description`='$des' WHERE `tag_id`='$id'";
            $res = $this->con->query($sql);
            if($res){                
                return 1;
            }else{
                return 0;
            }
        }        
}
?>