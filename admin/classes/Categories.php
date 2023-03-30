<?php
    // require_once("config/Config.php");
    // error_reporting(0);
    class Categories extends Config{
        
        // Fetching all categories
        private function catData(){
            return $this->con->query("SELECT * FROM `palki__category`");
        }
        // Add categories
        public function addcategories($data){
            $cat = $data["category"];
            $cat_des = $data["category_des"];

            $count = 0;
            $catData = $this->catData();
            if ($catData->num_rows > 0) {
                foreach ($catData as $elm) {
                    if ($elm["category"] === $cat) {
                        $count++;
                    }
                }
            }
            if ($count == 0) {
                $sql = "INSERT INTO `palki__category`(`category_id`, `category`, `category_description`) VALUES ( null,'$cat','$cat_des')";
                $this->con->query($sql);
                return 1;
            } else {
                return 0;
            }
        }
        // Show categories
        public function showCategories(){
            return $this->catData();
        }
        // Delete category
        public function deleteCategory($data){
            $id = $data["delete"];
            $sql = "DELETE FROM `palki__category` WHERE `category_id` = '$id'";
            $res = $this->con->query($sql);
            if($res){
                return 1;
            }else{
                echo "";
            }
        }
        //Getting the category to be update
        public function getUpdateableCat($id){
            $category = $this->catData();
            if($category->num_rows >0){
                foreach ($category as $elm) {
                    if($id == $elm["category_id"]){
                        $row = array("id"=>$elm["category_id"], "cat_name"=>$elm["category"], "cat_des"=>$elm["category_description"]);
                    }
                }
                return $row;
            }
        }
        // Updatting the category
        public function updateCategory($data){
            $id = $data["id"];
            $name = $data["category"];
            $des = $data["category_des"];
            $sql = "UPDATE `palki__category` SET `category`='$name',`category_description`='$des' WHERE `category_id`='$id'";
            $res = $this->con->query($sql);
            if($res){                
                return 1;
            }else{
                return 0;
            }
        }
        
    }
