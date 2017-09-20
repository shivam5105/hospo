<?php 
// Include CKEditor class.

include_once("ckeditor.php");
//require_once 'finder/ckfinder.php' ;
class FCKeditor
{
	var $InstanceName ;
	var $BasePath ;
	var $Width ;
	var $Height ;
	var $ToolbarSet ;
	var $Value ;
	var $Config ;
	

	function __construct( $instanceName )
 	{
		$this->InstanceName	= $instanceName ;
		$this->Width		= '100%' ;
		$this->Height		= '300' ;
		$this->ToolbarSet	= 'Websewak' ;
		$this->Value		= '' ;
		$this->Config		= array() ;

	}

	function Create() 
	{
		$DomainRootPath =  $_SERVER["SCRIPT_FILENAME"];
		$DomainBaseFileName = basename($DomainRootPath);
		$DomainDocRoot  = $_SERVER['DOCUMENT_ROOT'];
		
		$DomainServerPath = str_replace($DomainDocRoot,"",$DomainRootPath);
		$DomainServerPath = str_replace($DomainBaseFileName,"",$DomainServerPath);
		$DomainServerPath = str_replace("editor/","",$DomainServerPath);

		if($_SERVER['HTTP_HOST'] == "69.89.31.223")
		{
			$DomainServerPath = "/hospo/admin/editor/";
		}

		// Create class instance.
		$CKEditor = new CKEditor();
		//CKFinder::SetupCKEditor( $CKEditor, 'editor/finder/' ) ;

		// Do not print the code directly to the browser, return it instead
		$CKEditor->returnOutput = true;

		// Path to CKEditor directory, ideally instead of relative dir, use an absolute path:
		//   $CKEditor->basePath = '/ckeditor/'
		// If not set, CKEditor will try to detect the correct path.
		$CKEditor->basePath = '';
		if($_SERVER['HTTP_HOST'] == "69.89.31.223")
		{
			$CKEditor->basePath = $DomainServerPath;
		}

		// Set global configuration (will be used by all instances of CKEditor).
		$CKEditor->config['width'] = $this->Width;
		$CKEditor->config['height'] = $this->Height;

		// Change default textarea attributes
		$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);

		// The initial value to be displayed in the editor.
		$initialValue = $this->Value;

		$config['toolbar'] = $this->ToolbarSet;
		//$config['skin'] = 'v2';
		

	//echo $Currentfile = basename($_SERVER["SCRIPT_FILENAME"]);

		/*$config['filebrowserBrowseUrl'] = '/standard/admin/editor/kcfinder/browse.php?type=files';
		$config['filebrowserImageBrowseUrl'] = '/standard/admin/editor/kcfinder/browse.php?type=image';
		$config['filebrowserFlashBrowseUrl'] = '/standard/admin/editor/kcfinder/browse.php?type=flash';
		$config['filebrowserUploadUrl'] = '/standard/admin/editor/kcfinder/upload.php?type=files';
		$config['filebrowserImageUploadUrl'] = '/standard/admin/editor/kcfinder/upload.php?type=image';
		$config['filebrowserFlashUploadUrl'] = '/standard/admin/editor/kcfinder/upload.php?type=flash';
		*/
		$config['filebrowserBrowseUrl']		=  $DomainServerPath.'/editor/kcfinder/browse.php?type=files';
		$config['filebrowserImageBrowseUrl'] = $DomainServerPath.'/editor/kcfinder/browse.php?type=image';
		$config['filebrowserImageBrowseUrl'] = "";
		$config['filebrowserFlashBrowseUrl'] = $DomainServerPath.'/editor/kcfinder/browse.php?type=flash';
		$config['filebrowserUploadUrl']		 = $DomainServerPath.'/editor/kcfinder/upload.php?type=files';
		$config['filebrowserImageUploadUrl'] = $DomainServerPath.'/editor/kcfinder/upload.php?type=image';
		$config['filebrowserFlashUploadUrl'] = $DomainServerPath.'/editor/kcfinder/upload.php?type=flash';
		
		// Create first instance.
		$code = $CKEditor->editor($this->InstanceName, $initialValue, $config);

		// Configuration that will be used only by the second editor.
		echo $code;
	}
}
?>