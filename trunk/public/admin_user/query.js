/**
 * Created by mgoicochea on 25/08/14.
 */
$(document).ready(function(){
    $( "#departamento" ).change(function() {
        $('#provincia').html('<option> -- Cargando -- </option>');
        $('#distrito').html('<option> -- Seleccione -- </option>');
        getProvinces($("#departamento").val())
    });

    $('#provincia').change(function(){
        $('#distrito').html('<option> -- Cargando -- </option>');
        getDistrict($("#departamento").val(), $("#provincia").val())
    });


    Dropzone.options.myAwesomeDropzone = {
        init: function() {
            this.on("success", function(file, messageOrDataFromServer, myEvent) {
                window.setTimeout(function() { window.location.href = "dashboard-gallery"; }, 1000);
            });
        }
    };

});


function getProvinces($cod)
{

    var url ="get/provincia/" + $cod;

        $.ajax({
            type: "GET",
            url: url,
            data: "",
            contentType: "application/json; charset=utf8",
            dataType: "json",
            async: true,
            cache: false,
            success: function (result) {
                $('#provincia').html('');
                for(var i = 0; i < result.length; i++)
                {
                    var option = '<option value="' + i + '"> ' + result[i] + '</option>';
                    $('#provincia').append(option);
                }
            },
            error: function (result) {
                var e = result.d;
                // bootbox.alert("Su sesión ha finalizado", function () {
                //$(location).attr('href', 'Login.html');
                //});
            }
        });
}


function getDistrict($codD, $codP)
{
    var url ="get/distrito/" + $codD + "/" + $codP;

    $.ajax({
        type: "GET",
        url: url,
        data: "",
        contentType: "application/json; charset=utf8",
        dataType: "json",
        async: true,
        cache: false,
        success: function (result) {
            $('#distrito').html('');
            for(var i = 0; i < result.length; i++)
            {
                var option = '<option value="' + i + '"> ' + result[i] + '</option>';
                $('#distrito').append(option);
            }
        },
        error: function (result) {
            var e = result.d;
            // bootbox.alert("Su sesión ha finalizado", function () {
            //$(location).attr('href', 'Login.html');
            //});
        }
    });
}