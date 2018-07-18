<?php include_once dirname(__FILE__). "/../include/header.php"; ?>
<?php include_once dirname(__FILE__). "/../include/company/companies.php"; ?>
<?php include_once dirname(__FILE__). '/../include/footer.php' ?>
<script>
    if(window.innerWidth<600){
        document.getElementById("note").style.display="none";
            $(document).ready(function() {
                $('.fancybox-thumbs').fancybox({
                    prevEffect : 'none',
                    nextEffect : 'none',
                    closeBtn  : true,
                    arrows    : true,
                    nextClick : true,
                    minWidth:250,
                    minHeight:100,
                    helpers : {
                        thumbs : {
                            width  : 50,
                            height : 50
                        }
                }
            });
        });
    } else{
        $(document).ready(function() {
                $('.fancybox-thumbs').fancybox({
                    prevEffect : 'none',
                    nextEffect : 'none',

                    closeBtn  : true,
                    arrows    : true,
                    nextClick : true,
                    maxWidth:800,
                    minWidth:519,
                    minHeight:300,
                    autoWidth:true,
                    helpers : {
                        thumbs : {
                            width  : 50,
                            height : 50
                        }
                    }
                });
            });
    }
    </script>
</body>
</html>
