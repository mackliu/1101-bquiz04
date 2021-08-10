<?php include_once "../base.php";

$Mem->save($_POST);

to("../backend.php?do=mem");
