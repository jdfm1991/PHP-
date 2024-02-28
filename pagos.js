$(document).ready(function () {
    
   $('#ExcelImportForm').submit(function (e) { 
    e.preventDefault();

    fileexceldata  = $('#fileexceldata')[0].files[0];

    var datos = new FormData();

    datos.append('fileexceldata', fileexceldata)

    $.ajax({
        url: "pagos_controller.php?op=loadsave",
        type: "POST",
        dataType:"json",    
        data:  datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
        
           console.log(data) 
             
        }

      });
    
   });

    
});