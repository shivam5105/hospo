$(document).ready(function(){

$(".select-op span").click(function(){

$(".select-op span:after").css("display","none");
$(".drop-op").slideToggle();

});


});


$(document).ready(function(){

$(".view-more").click(function(){
$(".full-pro").show();

});
$(".close").click(function(){
$(".full-pro,.product-info").hide();
}); 
$(".tog-fil").click(function(){
$(".job-drop-up").toggle();
$(".fa-caret-down").toggle();
$(".fa-caret-up").toggle();

});
});


$(document).ready(function(){

$(".shop-img-cvr").click(function(){
$(".product-info").css({"display": "table"});

});
 $(".cl-ose").click(function(){
$(".product-info").fadeOut(500);
}); 
});




$(document).ready(function(){
$(".add-rs .view-more").click(function(){
$(".product-info.d-pop").css({"display": "table"});

});
 $(".cl-ose").click(function(){
$(".product-info").fadeOut(500);
}); 
});



$(document).ready(function(){
$(".crt-click").click(function(){
$(".cart-drop").slideToggle();

});
});


$(document).ready(function(){
$(".two-btn div").click(function(e){
$(this).next(".tooltips").toggle();
  event.stopPropagation();
});
});

$(document).ready(function(){
$('body').click(function(){
$(".tooltips").hide();
});

$('#f-option').click(function(){
$(".uploading").show();
});

$('#s-option').click(function(){
$(".uploading").hide();
});
});








        $(document).ready(function() {

var doc_height = $(window).height();
   $(".section.full-pro").css({"height":doc_height});
 
});

$(window).resize(function() {
var doc_height1 = $(window).height();
   $(".section.full-pro").css({"height":doc_height1});
});
