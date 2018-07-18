<?php include_once dirname(__FILE__). "/../include/header.php"; ?>
    <?php include_once dirname(__FILE__). "/../include/gallery/gallery_list.php"; ?>
<?php include_once dirname(__FILE__). '/../include/footer.php' ?>
<script>
        // fancybox
$(document).ready(function() {
            $('.fancybox-thumbs').fancybox({
                prevEffect : 'none',
                nextEffect : 'none',
                width: 566,
                height: 377,
                autoSize : false,
                closeBtn  : true,
                arrows    : false,
                nextClick : true,
                helpers : {
                    thumbs : {
                        width  : 100,
                        height : 100
                    }
                }
            });

            
        });
</script>
</body>
</html>