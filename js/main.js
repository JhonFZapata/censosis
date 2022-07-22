$( document ).ready(function() {
    $("#btnTelefonos").click(function(){
        $.ajax({ 
        data: {},
        url: "?m=getPhones",
        type: "POST",
        success: function(response){
            var jsonData = JSON.parse(response);
            if (jsonData.length>0) {
                $("#tbPhones").html('');
                // console.log(jsonData);
                jsonData.forEach(element => {
                    $("#tbPhones").append(`
                    <tr>
                        <td>${element.NOMBRE}</td>
                        <td>${element.TELEFONO}</td>
                    </tr>
                    `);
                });
            }
        }
    });
    });
});