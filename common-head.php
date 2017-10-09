<?php
include_once("dbconfig.php");
$user=new App\Classes\UserClass();

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/assets/css/media.css">

<script type="text/javascript" src="<?php echo BASEURL; ?>/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/assets/js/bootstrap.min.js"></script>

<script src="<?php echo BASEURL; ?>/assets/js/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/sweetalert2.min.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script>
var BASEURL="<?php echo BASEURL;?>";

</script>