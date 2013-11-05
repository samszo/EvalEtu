function _2013_Callback(page_index, jq){
	var new_content = jQuery('#2013_hiddenresult div.result:eq('+page_index+')').clone();
	$('#2013_Searchresult').empty().append(new_content);
	return false;
}

function _2013_Init(){
	var num_entries = jQuery('#2013_hiddenresult div.result').length;
	$('#_2013_Pagination').pagination(num_entries, {
		callback: _2013_Callback,
		items_per_page:1
	});
}

$(document).ready(function(){
	_2013_Init();
});