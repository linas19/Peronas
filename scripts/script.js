


$(document).ready(function(){
  $('.carousel').carousel();
  $(".button-collapse").sideNav();
 $('.parallax').parallax();


$.get("nextgame.php", function(data) {

var lentele = $(data).find("table.scores th.r").text();

$(".nextgame-container").append(lentele);
});
});

$(document).ready(function(){
$.get("astats.php", function(data) {
var atsakymai = $(data).find("table.scores");

$(".atsakymai-container").append(atsakymai);
});
});


$('.balas-1').keyup(average1);
$('.balas-1').change(average1);
function average1(){

	 var suma1 = 0;
    var vidurkis1;

    $('.balas-1').each(function() {
        suma1 += Number($(this).val());

    });
    vidurkis1 = suma1 /5;
       $('#total-1').val(vidurkis1);


};

$('.balas-2').keyup(average2);
$('.balas-2').change(average2);
function average2(){

	var  suma2 = 0;
    var vidurkis2;

    $('.balas-2').each(function() {
        suma2 += Number($(this).val());

    });
    vidurkis2 = suma2 /5;
       $('#total-2').val(vidurkis2);

};

$('.balas-3').keyup(average3);
$('.balas-3').change(average3);
function average3(){

	 var suma3 = 0;
    var vidurkis3;

    $('.balas-3').each(function() {
        suma3 += Number($(this).val());

    });
    vidurkis3 = suma3 /5;
       $('#total-3').val(vidurkis3);

};

$('.balas-4').keyup(average4);
$('.balas-4').change(average4);
function average4(){

	 var suma4 = 0;
    var vidurkis4;

    $('.balas-4').each(function() {
        suma4 += Number($(this).val());

    });
    vidurkis4 = suma4 /5;
       $('#total-4').val(vidurkis4);

};

$('.balas-5').keyup(average5);
$('.balas-5').change(average5);
function average5(){

	 var suma5 = 0;
    var vidurkis5;

    $('.balas-5').each(function() {
        suma5 += Number($(this).val());

    });
    vidurkis5 = suma5 /5;
       $('#total-5').val(vidurkis5);

};

$('.balas-6').keyup(average6);
$('.balas-6').change(average6);
function average6(){

	 var suma6 = 0;
    var vidurkis6;

    $('.balas-6').each(function() {
        suma6 += Number($(this).val());

    });
    vidurkis6 = suma6 /5;
       $('#total-6').val(vidurkis6);

};

$('.balas-7').keyup(average7);
$('.balas-7').change(average7);
function average7(){

	 var suma7 = 0;
    var vidurkis7;

    $('.balas-7').each(function() {
        suma7 += Number($(this).val());

    });
    vidurkis7 = suma7 /5;
       $('#total-7').val(vidurkis7);

};

$('.balas-8').keyup(average8);
$('.balas-8').change(average8);
function average8(){

	 var suma8 = 0;
    var vidurkis8;

    $('.balas-8').each(function() {
        suma8 += Number($(this).val());

    });
    vidurkis8 = suma8 /5;
       $('#total-8').val(vidurkis8);

};

$('.balas-9').keyup(average9);
$('.balas-9').change(average9);
function average9(){

	 var suma9 = 0;
    var vidurkis9;

    $('.balas-9').each(function() {
        suma9 += Number($(this).val());

    });
    vidurkis9 = suma9 /5;
       $('#total-9').val(vidurkis9);

};

$('.balas-10').keyup(average10);
$('.balas-10').change(average10);
function average10(){

	 var suma10 = 0;
    var vidurkis10;

    $('.balas-10').each(function() {
        suma10 += Number($(this).val());

    });
    vidurkis10 = suma10 /5;
       $('#total-10').val(vidurkis10);

};

$('.balas-11').keyup(average11);
$('.balas-11').change(average11);
function average11(){

	 var suma11 = 0;
    var vidurkis11;

    $('.balas-11').each(function() {
        suma11 += Number($(this).val());

    });
    vidurkis11 = suma11 /5;
       $('#total-11').val(vidurkis11);

};

$('.balas-12').keyup(average12);
$('.balas-12').change(average12);
function average12(){

	 var suma12 = 0;
    var vidurkis12;

    $('.balas-12').each(function() {
        suma12 += Number($(this).val());

    });
    vidurkis12 = suma12 /5;
       $('#total-12').val(vidurkis12);


};
$(document).ready(function() {
$('select').material_select();
});
