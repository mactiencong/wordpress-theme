<?php include_once "include/header.php"; ?>
	<?php include_once "include/top/intro.php"; ?>
	<?php include_once "include/top/history.php"; ?>
    <?php include_once 'include/top/news.php' ?>
	<?php include_once 'include/top/company.php' ?>
	<?php include_once 'include/top/partner.php' ?>
	<?php include_once 'include/top/contact.php' ?>
<?php include_once 'include/footer.php' ?>
<script>
	$(document).ready(function() {
		if(window.innerWidth<800){
			$("div#hide").css("height","17rem");
		}
		else{
			$("div#more").hide();
		}
		
		$("div#more").click(function() {
			$("div#hide").css("height","auto");
			$("div#more").hide();
		});
	});
</script>
</body>
</html>