

<!-- JQUERY FIRST -->
<script type="text/javascript" src="src/js/jquery-2.1.4.js"></script>
<!-- wow js-->
<script type="text/javascript" src="src/js/wow.min.js"></script>
<!-- Materialize Js -->
<script type="text/javascript" src="src/js/materialize.min.js"></script>
<!-- Progress bar -->
<script src='src/js/nprogress.js'></script>
<!-- Main Js -->
<script type="text/javascript" src='src/js/main.js'></script>
<script type="text/javascript">
$(window).load(function() { // makes sure the whole site is loaded
   NProgress.start();
   NProgress.inc(0.3);
   NProgress.done();

  $('body').delay(350).css({
    'overflow': 'visible'
  });
})
</script>
</body>
</html>
