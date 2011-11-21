<?php

	class User {

            public function find_all()
            {
                global $db;
                return $db->query("SELECT * FROM admin");
            }


            public static function find_by_id($id="0")
            {
                global $db;
                return $db->get_row("SELECT * FROM admin
                WHERE user_id = '{$id}'");
            }

   
		    public static function authenticate($username="", $password="")
            {
                global $db;
                return $db->get_row("SELECT * FROM admin
                WHERE username = '".$username."'
                AND password = '".$password."'
                LIMIT 1");
            }

	}