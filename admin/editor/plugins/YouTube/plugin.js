/*
* @example An iframe-based dialog with custom button handling logics.
*/
( function() {
    CKEDITOR.plugins.add( 'YouTube',
    {
        requires: [ 'iframedialog' ],
        init: function( editor )
        {
           var me = this;
           CKEDITOR.dialog.add( 'YouTubeDialog', function ()
           {
              return {
                 title : 'Embed Media Dialog',
                 minWidth : 550,
                 minHeight : 200,
                 contents :
                       [
                          {
                             id : 'iframe',
                             label : 'You Tube',
                             expand : true,
                             elements :
                                   [
                                      {
						               type : 'html',
						               id : 'pageYouTube',
						               label : 'You Tube',
						               style : 'width : 100%;',
						               html : '<iframe src="'+me.path+'/dialogs/youtube.html" frameborder="0" name="iframeYouTube" id="iframeYouTube" allowtransparency="1" style="width:100%;margin:0;padding:0;"></iframe>'
						              }
                                   ]
                          }
                       ],
                  onOk : function()
                 {
		  for (var i=0; i<window.frames.length; i++) {
		     if(window.frames[i].name == 'iframeYouTube') {
		        var content = window.frames[i].document.getElementById("embed").value;
		     }
		  }
		  final_html = 'YouTubeInsertData|---' + escape('<div class="you_tube">'+content+'</div>') + '---|YouTubeInsertData';
                    editor.insertHtml(final_html);
                    updated_editor_data = editor.getData();
                    clean_editor_data = updated_editor_data.replace(final_html,'<div class="you_tube">'+content+'</div>');
                    editor.setData(clean_editor_data);
                 }
              };
           } );

            editor.addCommand( 'YouTube', new CKEDITOR.dialogCommand( 'YouTubeDialog' ) );

            editor.ui.addButton( 'YouTube',
            {
                label: 'Embed YouTube',
                command: 'YouTube',
                icon: this.path + 'images/icon.gif'
            } );
        }
    } );
} )();
