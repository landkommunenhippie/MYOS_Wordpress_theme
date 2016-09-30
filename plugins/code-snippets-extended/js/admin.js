jQuery(function($) {
	"use strict";

    $(document).ready(function(){

    	/** Инициализация текстового редактора **/

		$('textarea[name="snippet_code"]').each( function(index){
            var textarea = $(this);
            var mode = $(this).attr('mode') || "php";
            var editDiv = $('<div>', {
                'position'	: 'absolute',
                'width'  	: textarea.width(),
                'height' 	: textarea.height(),
                'class' 	: textarea.attr('class')
            }).insertBefore(textarea);
            textarea.hide();
            var editor = ace.edit(editDiv[0]);
            editor.renderer.setShowGutter(true);
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode({path: "ace/mode/" + mode, inline: false});
            editor.setAutoScrollEditorIntoView(true);
            editor.setOptions({ /*maxLines: 25*/ });
            editor.setTheme("ace/theme/xcode");
            $(this).data('editor', editor);

            // copy back to textarea on form submit...
            editor.getSession().on('change', function () {
				textarea.val(editor.getSession().getValue());
			});
        });
		
		/** Тык на кнопку "тестировать шорткод" на странице добавления шорткода **/
		
		if($("#test_code").length != 0)
			$('#test_code').on('click',function(e){
				e.preventDefault();
				$(this).attr("disabled", "disabled");
				var macro_code = $('textarea[name="snippet_code"]').val();
				$.post(ajaxurl, {
					action	: 	'test_code',
					code	:	macro_code,
					nonce	: 	window.nonce_data,
				}, 
				function(response){
					var tr = $("#test_res");
					tr.empty();
					$("#test_res").css('display','block');
					tr.append('<div class="aft_info">'+response+'</div><span class="close-button">X</span>');
					$("#test_code").removeAttr("disabled");
					// up!
					$('html, body').animate({
						scrollTop: 0
					}, 500);
				});
				return false;
			});

		/** Close button click **/
		$("body").on('click','.close-button',function(e){	// live() is deprecated... damn bastards!
			e.preventDefault();
			$("#test_res").empty();
			$("#test_res").css('display','none');
			$("#test_res").append($('<span class="close-button">X</span>'));
		});
			
		/** Тык на кнопку "Сниппет" над текстовым редактором при добавлении материала **/
		if($("#show_code_snippets").length != 0)
			$("#show_code_snippets").magnificPopup({
				type: 'ajax',
				preloader: false,
				callbacks: {
					open				: function() {},
			    	ajaxContentAdded	: function() {
								    		$("a#select_snippet").on("click", function(){
								    			var id = $(this).parent().parent().find("td.st_id").html();
								    			wp.media.editor.insert(id);
								    			$.magnificPopup.close();
								    		});
								    	  },
			    	close				: function() {}
				}
			});
		
		/** Показать окно выбора медиа файла **/
		if($("#acs-insert-media-button").length != 0)
			$("#acs-insert-media-button").click(function(e) {
				e.preventDefault();
				var formfield = $('#txt_img_url').attr('name');
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				var original_send_to_editor = window.send_to_editor;
				/** Медиа выбрано **/
				window.send_to_editor = function(html) {
					var imgurl = $('img',html).attr('src');
					if(!imgurl) imgurl = $(html).attr("href");
					
					$('#thtml').val(html);
					$('#turl').val(imgurl);
					$("#TB_overlay").remove();
					$("#TB_window").remove();
					$("body").removeClass("modal-open");
					window.send_to_editor = original_send_to_editor;
					return false;
				}
				return false;
			});
		
		
    });
});