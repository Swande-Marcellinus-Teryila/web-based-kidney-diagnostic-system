<?php 
/*these load all classes */
//error_reporting(0);
spl_autoload_register(function($classes){
require("../includes/classes/{$classes}.php");
});
?>