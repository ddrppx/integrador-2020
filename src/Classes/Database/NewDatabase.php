<?php

        $db = new PDO('sqlite:database.sqlite');

        

        $db -> exec("CREATE TABLE (id INTEGER PRIMARY KEY, nome TEXT, email TEXT)");
        
?>