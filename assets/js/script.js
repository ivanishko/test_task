jQuery(document).ready(function($){

	$("#myTable").tablesorter({
		//sortList:[[1,0],
		//sortForce:[[3,0]]
		//widgets:['zebra'],
		headers:{
			0:{
				sorter:false
			},
			3:{
				sorter:false
			},
			5:{
				sorter:false
			}
		}
	});


});