<?php

    class blogAdmin
    {
        public static function blogRead()
        {
           global $db;
           return $db->get_results("SELECT * FROM hs_blog ORDER BY blog_date DESC");
        }
        
        public static function blogById($blog_id="")
        {
           global $db;
           return $db->get_row("SELECT * FROM hs_blog WHERE blog_id = '".$blog_id."'");
        }
        
        public static function blogCreate($blog_title_en="", $blog_title_fr="", $blog_author="", $blog_text_en="", $blog_text_fr="", $blog_active="")
        {
            global $db;
            $blog_date = date("Y-m-d");
        $db->query("INSERT INTO hs_blog (blog_title_en, blog_title_fr, blog_author, blog_text_en, blog_text_fr, blog_date, blog_active) VALUES ('".$_POST['blog_title_en']."', '".$_POST['blog_title_fr']."', '".$_POST['blog_author']."', '".$_POST['blog_text_en']."', '".$_POST['blog_text_fr']."', '".$blog_date."', '".$_POST['blog_active']."')");
        }
        
         public static function blogUpdate($blog_id="", $blog_title_en="", $blog_title_fr="", $blog_author="", $blog_text_en="", $blog_text_fr="", $blog_date="", $blog_active="")
        {
            global $db;
        $db->query("UPDATE hs_blog set blog_title_en = '".$blog_title_en."', blog_title_fr = '".$blog_title_fr."', blog_author = '".$blog_author."', blog_text_en = '".$blog_text_en."', blog_text_fr = '".$blog_text_fr."', blog_date = '".$blog_date."', blog_active = '".$blog_active."' WHERE blog_id = '".$blog_id."'");
        }
        
        public static function blogDelete($blog_id="")
        {
            global $db;
            $db->query("DELETE from hs_blog WHERE blog_id = '".$blog_id."'");
        }

    }
    