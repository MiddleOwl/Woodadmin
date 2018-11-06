<?php
include(dirname(__FILE__)."/../models/contrats.php");
$contrats=recup_contrats();


include(dirname(__FILE__)."/../views/contrats.php");

?>