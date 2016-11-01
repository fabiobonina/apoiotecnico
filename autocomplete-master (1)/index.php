<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Autocomplete</title>
	<style>
	.suggestions{ 
		padding:0;
		margin:0;
		display: block;
	}
	</style>
</head>
<body>
	<h1>Autocomplete</h1>
	<form action='' method='GET'>
		<label for='query'>Field : </label><input type='text' name="nome" id='query'>
		<input type="hidden" name="id">
		<input type="hidden" name="cliente">
		<ul class="suggestions hideElem"></ul>
		<button>Submit</button>
	</form>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>
		var timeoutID = "";
		var fieldValue = "";
		$(document).on('keyup','#query',function(){
			if(fieldValue == $(this).val()){return}
			if(timeoutID!="")
				window.clearTimeout(timeoutID);
			timeoutID = window.setTimeout(search,300);
		});
		var search = function(){ 
			var query = $('#query').val();
			if(query != ''){ 
				$.ajax({
					method: "GET",
					url: "search.php",
					data: {'term':query}
				})
				.done(function( data ) {
					if(data != "[]"){
						data = JSON.parse(data);
						var html="";
						$.each(data,function(index,value){ 
							html += '<li><a href="javascript:" class="listItem" data-id="'+value.id+'">'+value.cli+" | "+value.val+'</a></li>';
						});
						$('.suggestions').html(html);
						$('.suggestions').css({'display':'block'});
					}else{ 
						$('.suggestions').html("");
						$('.suggestions').css({'display':'none'});
					}
				});
			}else{ 
				$('.suggestions').html("");
				$('.suggestions').css({'display':'none'});
			}
		}
		$(document).on('click','a.listItem',function(){ 
			$('#query').val($(this).text());
			fieldValue = $(this).text();
			$('input[name="id"]').val($(this).attr('data-id'));
			$('.suggestions').html("");
			$('.suggestions').css({'display':'none'});	
			$('#query').focus();		
		});
	</script>
</body>
</html>
