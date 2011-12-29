function findValue(li) {
	if( li == null ) return alert("No match!");

	// if coming from an AJAX call, let's use the CityId as the value
	if( !!li.extra ) var sValue = li.extra[0];

	// otherwise, let's just display the value in the text box
	else var sValue = li.selectValue;
}

function selectItem(li) {
	findValue(li);
}

function formatItem(row) {
	if(row[2]=='T')
		return '<a href="javascript:;" onclick="openTutor(\'' + row[1] + '\')"><img src="images/tut.png" /> ' + row[0] + '</a>';
	else if(row[2]=='C')
		return '<a href="javascript:;" onclick="openClass(\'' + row[1] + '\')"><img src="images/mat.png" /> ' + row[0] + '</a>';
}

function lookupAjax(){
	var oSuggest = $("#search_text")[0].autocompleter;

	oSuggest.findValue();

	return false;
}
$(document).ready(function() {
	$("#search_text").autocomplete(
		"suggest.php",
		{
			delay:10,
			minChars:1,
			matchSubset:1,
			matchContains:1,
			cacheLength:10,
			onItemSelect:selectItem,
			onFindValue:findValue,
			formatItem:formatItem,
			maxItemsToShow:10,
			width:150,
			autoFill:false
		}
	);
});
