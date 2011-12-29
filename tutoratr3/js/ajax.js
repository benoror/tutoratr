function openAjax(url, data) {
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		beforeSend: function() {
			$('#ajax').hide();
			$('#ajax').html('');
			$('#ajax_loading').fadeIn('slow');
		},
		success: function(callback) {
			$('#ajax').html(callback);
		},
		complete: function() {
			$('#ajax_loading').hide();
			$('#ajax').fadeIn('slow');
		},
		error: function() {
			$('#ajax').html('Ajax ERROR. Porfavor reportalo a tutoratr@gmail.com');
		}
	});
	
	$('#history').append(' >> <a class="histlink" href="javascript:;" onclick="openAjax(\''+url+'\',\''+data+'\')">'+url+'</a>');
}

function openLeftAjax(url, data) {
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		beforeSend: function() {
			$('#left_ajax').hide();
			$('#left_ajax').html('');
		},
		success: function(callback) {
			$('#left_ajax').html(callback);
		},
		complete: function() {
			$('#left_ajax').fadeIn('slow');
		},
		error: function() {
			$('#left_ajax').html('Ajax ERROR. Porfavor reportalo a tutoratr@gmail.com');
		}
	});
}

function openRecent() {
	openAjax('recent.php','pag=0');
	openLeftAjax('recent_left.php',null);
}

function openTutor(post) {
	openAjax('tutor.php','tutor_id='+post);
	openLeftAjax('tutor_left.php','tutor_id='+post);
}

function openClass(post) {
	openAjax('class.php','class_id='+post);
	openLeftAjax('class_left.php','class_id='+post);
}

function openSearch(text) {
	openAjax('search.php','text='+text);
	/**openLeftAjax('_null.txt',null);**/
	$('#left_ajax').hide();
}

function openTop10() {
	openAjax('top10.php',null);
	/**openLeftAjax('_null.txt',null);**/
	$('#left_ajax').hide();
}

function openInstitution() {
	openAjax('_institution.txt',null);
	/**openLeftAjax('_institution.txt',null);**/
	$('#left_ajax').hide();
}

function openForum() {
	openAjax('forum.php',null);
	/**openLeftAjax('_null.txt',null);**/
	$('#left_ajax').hide();
}

function openHelp() {
	openAjax('help.php',null);
	/**openLeftAjax('_null.txt',null);**/
	$('#left_ajax').hide();
}

function openAdd() {
	openAjax('add.php',null);
	/**openLeftAjax('_null.txt',null);**/
	$('#left_ajax').hide();
}

function openSend(post) {
	openAjax('send.php',post);
	/**openLeftAjax('_null.txt',null);**/
	$('#left_ajax').hide();
}

$(document).ready(function(){
	openRecent();
});
