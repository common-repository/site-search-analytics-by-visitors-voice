jQuery(document).ready(function() {
	jQuery('#searchterms_refinements_table').dataTable({
		"iDisplayLength": 5,
		"aLengthMenu": [5, 10, 25, 50],
		"aaSorting": [[ 2, "desc" ]],
		"aoColumns": [
			{ "sWidth": "34%", },
			{ "sWidth": "22%", },
            { "sWidth": "22%", },
            { "sWidth": "22%", },                
        ]
	});
	
	jQuery('#incoming_searchterms_table').dataTable({
		"iDisplayLength": 5,
		"aLengthMenu": [5, 10, 25, 50],
		"aaSorting": [[ 1, "desc" ]],
		"aoColumns": [
			{ "sWidth": "34%", },
			{ "sWidth": "22%", },
            { "sWidth": "22%", },
            { "sWidth": "22%", }, 			
        ]
	});
	
	jQuery('#outgoing_searchterms_table').dataTable({
		"iDisplayLength": 5,
		"aLengthMenu": [5, 10, 25, 50],
		"aaSorting": [[ 1, "desc" ]],
		"aoColumns": [
			{ "sWidth": "34%", },
			{ "sWidth": "17%", },
            { "sWidth": "17%", },
            { "sWidth": "16%", },
			{ "sWidth": "16%", }, 			
        ]
	});
	
	jQuery('#incoming_keywords_table').dataTable({
		"iDisplayLength": 5,
		"aLengthMenu": [5, 10, 25, 50],
		"aaSorting": [[ 1, "desc" ]],
		"aoColumns": [
			{ "sWidth": "34%", },
			{ "sWidth": "34%", },
            { "sWidth": "32%", },                
        ]
	});
});