<?php include_once dirname(__FILE__). "/../include/header.php"; ?>
	<?php include_once dirname(__FILE__). "/../include/news/news_list.php" ?>
<?php include_once dirname(__FILE__). "/../include/footer.php" ?>
<script>
		
	$(document).ready(function() {
		if(window.innerWidth<800){
			$("div#hide").css("display","none");

		}
		else{
			$("div#more").hide();
		}
		
		$("div#more").click(function() {
			$("div#hide").show();
			$("div#more").hide();
		});

	});
</script>
</body>
</html>