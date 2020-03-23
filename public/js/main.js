/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('.carousel').carousel();
    $('.collapsible').collapsible();
    $('select').material_select();
    $('ul.tabs').tabs();
    $('.modal').modal();
    
    
 
});

function setArrayDezenas() {


    var checks = document.querySelectorAll("input[type='checkbox']:checked"),
            i = checks.length,
            arr = [];
    var text = '';
    var count = 0;
    while (i--) {
        var valor = checks[i].value;
        arr.push(checks[i].value);
        text = text + valor + ' - ';
        count++;

    }

    arr.sort();
    var arrayDezenas;
    if (count < 6) {
        arrayDezenas = 'Total selecionado <b>' + count + '</b>: [' + text + ']';
    } else {
        var dadosParaPHP = JSON.stringify(arr);
        arrayDezenas = 'Total selecionado <b>' + count + '</b>: [' + text + ']';
        document.getElementById('btnSubmit').innerHTML = "</br><button onclick='salvarJogo()' class='btn'>Salvar</button>";
        document.getElementById('arrayDezenas').style.display = 'block';
    }
    document.getElementById('arrayDezenas').innerHTML = arrayDezenas;
}
function add_ap_grupo() {
    $('#add_ap_grupo').append('oioio');
    alert();
}

//    document.getElementById('add_ap_grupo').innerHTML = "oioiio";
////    $.get('/add_ap_grupo', function (data) {
//        
////        document.getElementById('add_ap_grupo').innerHTML = 'pppp';
////    });
//    alert();

