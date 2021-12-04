var l = window.location;
var base_url = l.protocol + "//" + l.host + "/" ;
$(document).ready(function(){
    filterSearch();	
    $('.productDetail').click(function(){
        filterSearch();
    });	
});

function filterSearch() {
	$('#productList').html('<div id="loading">Loading .....</div>');
	url  = base_url+"landing/load_product_menu";
	var minPrice = $('#minPrice').val();
	var maxPrice = $('#maxPrice').val();
	var maincatid = $('#maincatid').val();
	var catid     = $('#catid').val();
	var subcatid  = $('#subcatid').val();
    
	var category = getFilterData('category');
	var color    = getFilterData('color');
	console.log("color",minPrice +' ,' + maxPrice);
	$.ajax({
		url:url,
		method:"POST",
		dataType: "json",		
		data:{minPrice:	minPrice, maxPrice:maxPrice,maincatid:maincatid, catid:catid,subcatid:subcatid,category:category,color:color},
		success:function(data){
			$('#productList').html(data.html);
		}
	});
}

function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
		filter.push($(this).val());
	});
	return filter;
}