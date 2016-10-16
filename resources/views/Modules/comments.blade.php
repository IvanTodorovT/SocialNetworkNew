<div class='comments' style="margin-top: 1.3em">
@foreach ($commentsArray as $unusable)
	<?php $comment = (array)$unusable;?>
    <div class='comment' id={{$comment['id']}}>
    	<p> {{$comment['firstname']}} {{$comment['lastname']}} said: </p>
    	<p style='background-color: white; border: 1px solid black;'> {{$comment['comment_text']}}</p>
    	<p> {{$comment['created_at']}}</p>
    	<div class='likeButtons'></div><br>
    </div>
@endforeach
<form action="javascript:;" onsubmit="submitNewComment(this)">
	<input id='fuckinToken' type="hidden" name="_token" value="{{ csrf_token() }}">
    <textarea rows="4" cols="40" name='text' placeholder='What do you think?'></textarea>
    <button type='submit'>Comment</button>
</form>
</div>

<script type="text/javascript" src="js/addLikes.js"></script>
<script>
	function submitNewComment(form)
	{
		//function getTable()
		var classes = $(form).parent().parent().attr("class");
		var table = '';
		if (classes.match('album')) {
			table = 'album';
		} else if (classes.match('post')) {
			table = 'post';
		} else if (classes.match('comment')) {
			table = 'comment'; //no time for this shit
		}
		
		var id = $(form).parent().parent().attr('id');
		var text = $(form).find('textarea').val();
		var token = $('#fuckinToken').val()
		$.post("comments/" + table + '/' + id, {text: text, _token: token})
		.done(function(err){
			handleANewComment(err);
		})
		.fail(function(err){
			console.log(err)
		});

		function handleANewComment(err)
		{
			if(err){
				alert (err);
				return;
			}
			
			var d = new Date();
			var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate() + ' '  + d.getHours() + ':'  + d.getMinutes() + ':' + d.getSeconds();

			$(form).parent().prepend(
				"<div class='comment'> <p> You said: </p>" + 
			    "<p style='background-color: white; border: 1px solid black;'> " + text + 
			    "</p><p> " + date + "</p></div>"
			)
		}	
	}
</script>