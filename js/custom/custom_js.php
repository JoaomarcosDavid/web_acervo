
<script type="text/javascript" >

     //--------------------------------------
            //2 -SCROOLL TOP
    //---------------------------------------
    $(window).scroll(
    function () {
        if ($(window).scrollTop() > 100) {
            $('.page_top').fadeIn(300);
        } else {
            $('.page_top').fadeOut(300);
        }
    });
    $(function(){
        $( '.page_top' ).click(
        function()
        {
            $( 'html,body' ).animate( {scrollTop:0} , 'slow' ) ;
        }
        ) ;
    })


     //------------------------------
       //3 --datepicker
    //-------------------------------
    $( "#datepicker" ).datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR"
    });
    $( "#datepicker2" ).datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR"
    });
    


</script>

