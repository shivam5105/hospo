/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'MediaEmbed';
	config.entities = false;
	config.basicEntities = false;
	//config.fillEmptyBlocks = false;
	
	config.toolbar_Default = [
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

		['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
		['Link','Unlink','Anchor'],
		['Image','Flash','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Style','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	] ;

	config.toolbar_Tanmay = [
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
		['Link','Unlink','Anchor'],
		['Image','Flash','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Style','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	] ;

	config.toolbar_Tanmay1 = [
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
		['Link','Unlink','Anchor'],
		['Image','Flash','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Style','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	] ;
	config.toolbar_TanmayBasic = [
		['Source','Bold','Italic','-','NumberedList','BulletedList','-','Link','Unlink'],
		['Cut','Copy','PasteText','-','Print','SpellChecker'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
		['TextColor','BGColor']
	] ;
	config.toolbar_TanmayCutPaste = [
		['Cut','Copy','PasteText']
	] ;
	config.toolbar_Basic = [
		['Bold','Italic','-','NumberedList','BulletedList','-','Link','Unlink','-','About']
	] ;
	config.toolbar_OnlyTextColor = [
		['Font','FontSize','TextColor']
	] ;
	config.toolbar_NoToolBar = [
	] ;
};
