<?php
    class Contacts extends Config{
        //Contact Info
        private function contactData(){
            return $this->con->query("SELECT * FROM `palki__messages`");
        }
        // Receving user message
        public function getUserMessage($data){
            $name = $data["name"];
            $email = $data["email"];
            $subject = $data["subject"];
            $message = $data["message"];

            $count = 0;
            $contactData = $this->contactData();
            if ($contactData->num_rows > 0) {
                foreach ($contactData as $elm) {
                    if (($elm["email"] === $email) && ($elm["subject"] === $subject) && ($elm["message"] === $message)) {
                        $count++;
                    }
                }
            }
            if ($count == 0) {
                $sql = "INSERT INTO `palki__messages`(`id`, `name`, `email`, `subject`, `message`) VALUES ( null,'$name','$email','$subject','$message')";
                $this->con->query($sql);
                return 1;
            } else {
                return 0;
            }
        }
        // Showing messages
        public function showContacts(){
            return $this->contactData();
        }
        // Delete message
        public function deleteMessage($data){
            $id = $data["delete"];
            $sql = "DELETE FROM `palki__messages` WHERE `id` = '$id'";
            $res = $this->con->query($sql);
            if($res){
                return 1;
            }else{
                echo "";
            }
        }
    }
