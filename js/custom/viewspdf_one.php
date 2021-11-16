<script type="text/javascript">
    $(document).ready(function () {

        //========================================================================
                    //1 - ABRIR PDF SECUNDARIOS
        //========================================================================
        // var url = new URL(window.location);
        // var pdf = url.searchParams.get("pdf");
        // $("#pdfDow").attr('href',pdf);
        $("#read").flipBook({
        // pdfUrl:'pdf/pdf.pdf',
        //Layout Setting
        // pdfUrl:'anos/1971/09_Setembro/05/Caderno_B/arquivos/assets/downloads/publication.pdf',
        pdfUrl: 'data:application/pdf;base64,<?php echo $PDF_principal; ?>',
        lightBox:true,
        layout:3,
        currentPage:{vAlign:"bottom", hAlign:"left"},
        // BTN SETTING
        btnShare : {enabled:false},
        btnPrint : {
            hideOnMobile:true
        },
        btnDownloadPages : {
            enabled: true,
            title: "Download pages",
            icon: "fa-download",
            icon2: "file_download",
            url: "images/pdf.rar",
            name: "allPages.zip",
            hideOnMobile:false
        },
        btnColor:'rgb(255,120,60)',
        sideBtnColor:'rgb(255,120,60)',
        sideBtnSize:60,
        sideBtnBackground:"rgba(0,0,0,.7)",
        sideBtnRadius:60,
        btnSound:{vAlign:"top", hAlign:"left"},
        btnAutoplay:{vAlign:"top", hAlign:"left"},
        // SHARING
        btnShare : {
            enabled: true,
            title: "Share",
            icon: "fa-share-alt"
        },
        facebook : {
            enabled: true,
            url: "#"
        },
        google_plus : {
            enabled: false
        },
        email : {
            enabled: true,
            url: "#",
            title: "PDF KPK",
            description: "Silahkan click link di bawah untuk melihat / mengunduf pdf"
        },
        twitter : {
            enabled: true,
            url: "#"
        },
        pinterest : {
        enabled: true,
        url: "#"
        }
    });

    })//document jquery
</script>