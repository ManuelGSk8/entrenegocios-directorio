var ubigeoPeru = {
    ubigeos: new Array()
};

document.addEventListener('DOMContentLoaded', function() {
    var request = new XMLHttpRequest;
    request.open('GET', 'admin_user/ubigeo-peru.min.json', true);
    request.onload = onLoad_Request;
    request.send();

    function onLoad_Request() {
        if (request.status >= 200 && request.status < 400) {
            ubigeoPeru.ubigeos = JSON.parse(request.responseText);

            showRegionsList();
        }
    }
});



function showRegionsList() {
    ubigeoPeru.ubigeos.forEach(function(ubigeo) {
        if (ubigeo.codprov === '00' && ubigeo.coddist === '00') {

            var option = document.createElement('option')

            //var li = document.createElement('li');
            option.value = ubigeo.coddpto;
            option.textContent = ubigeo.nombre;



            document.querySelector('#departamento').appendChild(option);
        }
    });

    var select = document.getElementById('departamento');
    select.addEventListener('change', onChange_Region, false);

    $('#departamento').val('02')
}


function onChange_Region() {
    document.querySelector('#provincia').innerHTML = '';
    document.querySelector('#distrito').innerHTML = '';

    showProvincesList(this.value);
}


function showProvincesList(coddpto) {

    var option = document.createElement('option')

    //var li = document.createElement('li');
    option.value = 0;
    option.textContent = '-- Seleccione --';

    document.querySelector('#provincia').appendChild(option);

    ubigeoPeru.ubigeos.forEach(function(ubigeo) {
        if (ubigeo.coddpto === coddpto && ubigeo.codprov !== '00' && ubigeo.coddist === '00') {

            var option = document.createElement('option')

            //var li = document.createElement('li');
            option.value = ubigeo.codprov;
            option.textContent = ubigeo.nombre;



            document.querySelector('#provincia').appendChild(option);

        }
    });

    var select = document.getElementById('provincia');
    select.addEventListener('change', onChange_Province, false);
}

function onChange_Province() {
    document.querySelector('#distrito').innerHTML = '';

    var coddpto = $('#departamento').val();

    showDistrictsList(coddpto, this.value);
}


function showDistrictsList(coddpto, codprov) {
    ubigeoPeru.ubigeos.forEach(function(ubigeo) {
        if (ubigeo.coddpto === coddpto && ubigeo.codprov === codprov && ubigeo.coddist !== '00') {


            var option = document.createElement('option')

            //var li = document.createElement('li');
            option.value = ubigeo.coddist
            option.textContent = ubigeo.nombre;



            document.querySelector('#distrito').appendChild(option);
        }
    });
}