<?php

    class conseilAdmin
    {
        public static function conseilRead()
        {
           global $db;
           return $db->get_results("SELECT * FROM hs_conseil ORDER BY conseil_date DESC");
        }
        
        public static function conseilCreate($conseil_title="", $conseil_author="", $conseil_text="", $conseil_active="")
        {
            global $db;
            $db->query("INSERT INTO hs_conseil (conseil_title, conseil_author, conseil_text, conseil_date, conseil_active) VALUES ('".$conseil_title."', '".$conseil_author."', '".$conseil_text."', '".$conseil_date."', '".$conseil_active."', )");
        }
        
         public static function conseilUpdate($conseil_id="", $conseil_title="", $conseil_author="", $conseil_text="", $conseil_date="", $conseil_active="")
        {
            global $db;
            $db->query("UPDATE hs_conseil set conseil_title = '".$conseil_title."', conseil_author = '".$conseil_author."', conseil_text = '".$conseil_text."', conseil_date = '".$conseil_date."', conseil_active = '".$conseil_active."', WHERE conseil_id = '".$conseil_id."'");
        }
        
        public static function conseilDelete($conseil_id="")
        {
            global $db;
            $db->query("DELETE from hs_conseil WHERE conseil_id = '".$conseil_id."'");
        }

    }