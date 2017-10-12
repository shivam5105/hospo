<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO:Contact</title>
	<?php include_once("common-head.php"); ?>
</head>

<body class="contact">
<?php 
	include_once("header.php"); 
	
	if(isset($_GET['package']) && $_GET['package']!='' && isset($_GET['user_id']) && $_GET['user_id']!=''){
	
		$package=$user->getPackagebyId($_GET['package']);
		
		if(!count($package)){
	header('location: index.php');die;	
		}

	}
?>
<!--contact-->


<section class="contact-cover">

<div class="container" >
	<?php


if($_SERVER['HTTP_REFERER']!=BASEURL."/signup.php"){
	//header('location: index.php');die;
}
?>
<script>
$('iframe').load(function(){
        $('input#exampleInputAmount1').val(125);
});
</script>
<style>
.design { 
    background: transparent url(http://html-generator.weebly.com/files/theme/input-text-8.png) repeat-x; 
    border: 1px solid #999; 
    outline:0; 
    height:25px; 
    width: 275px; 
  } 
.p8
{
padding: 8px;
color:blue;
}
.set
{
margin-right: 120px;
}
.sameline
{
display:inline-block;
}

.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
.datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
.datagrid table td, .datagrid table th { padding: 3px 10px; }
.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00557F; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEf4; color: #00557F; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEf4;} .
datagrid table tfoot td { padding: 0; font-size: 14px } 
.datagrid table tfoot td div{ padding: 2px; }
.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }
.datagrid table tfoot  li { display: inline; }
.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #00557F; color: #FFFFFF; background: none; background-color:#006699;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
.iframe{width:100%; height:500px;}
.info td{
font-size:19px!important;
}
</style> 
    <section id="services">
        <div class="container">
            <div class="box first">
           <div class="row">
		   <br>
	<br>

<div class="datagrid">
		<div style="font-size: 20px;
    padding: 10px; color:red">
	<center>
    <p>&nbsp;</p>
    <p><font face="Verdana, Arial, Helvetica, sans-serif" color="333333">Processing 
        Transaction . . . </font></p>
</center></div>
</div>
<?php


$paypal_url=PAYPAL_URL; 
$paypal_id=PAYPAL_ID;

?>

<form  action="<?php echo $paypal_url; ?>" method="post" name="frmPaypal" id="frmPaypal">
	
	        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">

   <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $package->name; ?>">
        <input type="hidden" name="item_number" value="<?php echo $package->id; ?>">
        <input type="hidden" name="amount" value="<?php echo $package->price; ?>">

<input type='hidden' name='return' value='<?php echo PAYPAL_RETURN_URL;?>'>
<input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL;?>'>
</form> 
<script language="JavaScript" type="text/javascript">
window.onload=function() {
	window.document.frmPaypal.submit();
}
</script>
</section>
			</div>
           </div><!--/.row-->
            </div><!--/.box-->
</div>
	


</section>


<?php include_once("footer.php"); ?>





</body>
</html>






















