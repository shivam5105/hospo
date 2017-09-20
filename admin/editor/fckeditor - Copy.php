<?php 
// Include CKEditor class.
include("ckeditor.php");
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

		// Create class instance.
		$CKEditor = new CKEditor();

		// Do not print the code directly to the browser, return it instead
		$CKEditor->returnOutput = true;

		// Path to CKEditor directory, ideally instead of relative dir, use an absolute path:
		//   $CKEditor->basePath = '/ckeditor/'
		// If not set, CKEditor will try to detect the correct path.
		$CKEditor->basePath = '';

		// Set global configuration (will be used by all instances of CKEditor).
		$CKEditor->config['width'] = $this->Width;

		// Change default textarea attributes
		$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);

		// The initial value to be displayed in the editor.
		$initialValue = $this->Value;

		$config['toolbar'] = array(
			array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
			array( 'Image', 'Link', 'Unlink', 'Anchor' )
		);

		$config['skin'] = 'v2';

		// Create first instance.
		$code = $CKEditor->editor($this->InstanceName, $initialValue, $config);
		// Configuration that will be used only by the second editor.
		echo $code;
	}
}
?>