$(function() {
	var uiElements = function(){
	   // datatables
        var uiDatatable = function(){
            if($(".datatable").length > 0){                
                $(".datatable").dataTable();
            }
            
            if($(".datatable_simple").length > 0){                
                $(".datatable_simple").dataTable({"ordering": false, "info": false, "lengthChange": false,"searching": false});
            }            
        }
        // datepicker
        var uiDatepicker = function() {
            if($('.tanggal').length > 0) {
                $('.tanggal').datepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true
                });
            }
        }
        return {
            init: function(){
                uiDatatable();
                uiDatepicker();
            }
        }
    }();
    uiElements.init();
});
// show file name
function show_file_name(dom) {
    var files = [];
    for (var i = 0; i < $(dom)[0].files.length; i++) {
        files.push($(dom)[0].files[i].name);
    }
    $(dom).next('.custom-file-label').html(files.join(', '));
}