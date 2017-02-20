<!-- //SMOOTH SCROLL -->
                $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
                  if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length && target.selector.indexOf("#top") > -1) {
                      $('html, body').animate({
                        scrollTop: (target.offset().top-55)
                      }, 1000);
                      e.preventDefault();
                    }
                    else if (target.length && target.selector.indexOf("#top") < 1 && target.selector != '') {
                      $('html, body').animate({
                        scrollTop: target.offset().top
                      }, 1000);
                      e.preventDefault();
                    }
                  }
                });
              <!-- //SMOOTH SCROLL -->

$(document).ready(function() {
  $('select').material_select();
});


new WOW().init();


 $(".value2").change(function(){

   if ($(".value1").val() === $(".value2").val()) {
     $(".value2").css('color','#4caf50');
     $("#confirmed").prop("disabled",false);
   }
   else {
     $(".value2").css('color','#b71c1c');
     $("#confirmed").prop("disabled",true);
   }
 });

$(document).ready(function(){
    $('ul.tabs').tabs();
  });

  $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
