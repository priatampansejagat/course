// datatable
function dataTable_getData(endpoint, request){

	var dataReturn ='';
	$.ajax({
      type: 'POST',
      url: base_url + post_url,
      data: {
            param: { "request": request },
            url: endpoint
        },
      success: function(respons){
        dataReturn = respons;
    }});

    return dataReturn;
}

function dataTable_add_row(element, dataJson){
	var table = $(element).DataTable();
	table.row.add(dataJson).draw(); //INI SALAAH MASIHAN, LANJUT BESOK
}