<?php 
        function classe($classe)
        {
            if(file_exists('controller/' . $classe . '.php'))
            {
               require 'controller/' .$classe.'.php';  
            }
            else
            {
                require 'model/'. $classe . '.php';                
            }

           
        }
            spl_autoload_register('classe');  
 ?> 