function toggleComment(id) {
	if($('#comm'+id).css('display') == 'none') {
		$('#comm'+id).show("slow");
		$('#ln'+id).html('<img src="images/up.png" />');
	} else {
		$('#comm'+id).hide("slow");
		$('#ln'+id).html('<img src="images/down.png" />');
	}
}

function toggleAllComments() {
	$('.comment').show("slow");
	$('.expand_comment').html('<img src="images/up.png" />');
}
