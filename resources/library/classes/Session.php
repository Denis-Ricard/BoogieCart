<?php

	class Session {

            private $logged_in=false;
            public $user_id;


            function __construct(){

                session_cache_limiter('private');

                session_cache_expire(480);

                @session_start();

                $this->check_login();

                if($this->logged_in){

                } else {

                }
            }


            public function is_logged_in() {

               return $this->logged_in;
            }


            public function login($user) {
                if($user){
                    $this->user_id = $_SESSION['admin_id'] = $user->admin_id;
                    $this->user_name = $_SESSION['admin_name'] = $user->admin_name;
                    $this->logged_in = true;
                }
            }


            public function logout() {
                unset($_SESSION['admin_id']);
                unset($this->user_id);
                $this->logged_in = false;
            }


            private function check_login() {
                if(isset($_SESSION['admin_id'])){
                    $this->user_id = $_SESSION['admin_id'];
                    $this->logged_in = true;
                } else {
                    unset($this->user_id);
                    $this->logged_in = false;
                }
            }

	}

$session = new Session;
        