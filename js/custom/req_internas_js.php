<script type="text/javascript" >


      //-----------------------------------------------
             //1 - requisicao tras pagina interna
      //----------------------------------------------
        $(".infopdf").click(function() {

            var pdf   = $(this).attr('pdf');
            var pdf2  = $(this).attr('pdf2');

            var thumb = $(this).attr('img2');
            var data  = $(this).attr('data');
            var tit   = $(this).attr('tit');
            var taman = $(this).attr('taman');
            var dia   = $(this).attr('dia');
            var mes   = $(this).attr('mes');
            var mes1   = $(this).attr('mes1');
            var ano   = $(this).attr('ano');
            // var tamanho = $(this).attr('tamanho');
            $.ajax({
                url: "controller/interna.php",
                type: 'POST',
                data: {
                pdf: pdf,
                pdf2: pdf2,
                thum: thumb,
                data: data,
                tit: tit,
                taman: taman,
                dia: dia,
                mes: mes,
                mes1: mes1,
                ano: ano
                },
                success: function (data, status)
                {
                   $(".covers").html(data);
                   $("#loadmore,.total").hide();
                   $("#home span").html("<i class='fas fa-angle-left'></i> Voltar");
                },
                error: function (xhr, desc, err)
                {
                    console.log("error");
                }
            });
        });
        

        //----------------------------------------------
                //2 - requisicao voltar pra home
        //----------------------------------------------
        $("#home").click(function() {
            location.reload();
        });


  </script>