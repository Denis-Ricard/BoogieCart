<?php

    class agentAdmin
    {
        public static function agentRead()
        {
           global $db;
           return $db->get_results("SELECT * FROM hs_agentORDER BY blog_date DESC");
        }
        
        public static function agentCreate($agent_title="", $blog_author="", $blog_text="", $blog_active="")
        {
            global $db;
            $db->query("INSERT INTO hs_agent (agent_title, blog_author, blog_text, blog_date, blog_active) VALUES ('".$blog_title."', '".$blog_author."', '".$blog_text."', '".$blog_date."', '".$blog_active."', )");
        }
        
         public static function agentUpdate($agent_id="", $blog_title="", $blog_author="", $blog_text="", $blog_date="", $blog_active="")
        {
            global $db;
            $db->query("UPDATE hs_agent set agent_title = '".$blog_title."', blog_author = '".$blog_author."', blog_text = '".$blog_text."', blog_date = '".$blog_date."', blog_active = '".$blog_active."', WHERE blog_id = '".$blog_id."'");
        }
        
        public static function agentDelete($agent_id="")
        {
            global $db;
            $db->query("DELETE from hs_agent WHERE agent_id = '".$agent_id."'");
        }

    }