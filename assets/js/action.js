var GARYU_IMAGE_PATH = getCurrentPath()+'/wp-content/themes/garyu/assets/'
function getCurrentPath(){
	return window.location.protocol+'//'+window.location.hostname;
}

//sticky
var nav=document.getElementById("nav");
var posNav=nav.offsetTop;
window.onscroll = function(){
	funcScroll();
}
function funcScroll(){
	if(window.pageYOffset>posNav){
		nav.classList.add("sticky");
		document.getElementById("img_logo").src=GARYU_IMAGE_PATH+"images/common/logoNormal.png";
		document.getElementById("img_flag").style.display="none";
		document.getElementById("img_res").src=GARYU_IMAGE_PATH+"images/common/language-gray@4x.png";
		document.getElementById("img_arrow").src=GARYU_IMAGE_PATH+"images/common/arrow-down.svg";
		var color=document.querySelectorAll(".color");
			for (var i = 0; i < color.length; i++) {
			color[i].style.color="black";
		}
		if(window.innerWidth<=990)
		{
			document.getElementById("icon_lang").style.background="url('"+GARYU_IMAGE_PATH+"images/common/languageNormal.png') no-repeat center center/cover";
			document.getElementById("icon_menu").style.background="url('"+GARYU_IMAGE_PATH+"images/common/menuNormal.png') no-repeat center center/cover";
			for (var i = 0; i < color.length; i++) {
				color[i].style.color="white";
			}
		}
	}
	else{
		nav.classList.remove("sticky");
		document.getElementById("img_logo").src=GARYU_IMAGE_PATH+"images/top/svg/LOGONormal.svg";
		document.getElementById("img_flag").style.display="block";
		document.getElementById("img_res").src=GARYU_IMAGE_PATH+"images/common/language-white@4x.png";
		document.getElementById("img_arrow").src=GARYU_IMAGE_PATH+"images/common/arrow-down-white.png";
		var color=document.querySelectorAll(".color");
		
		
		if(window.innerWidth<=990){
			document.getElementById("icon_menu").style.background="url('"+GARYU_IMAGE_PATH+"images/common/menu-whiteNormal.png') no-repeat center center/cover";
			document.getElementById("icon_lang").style.background="url('"+GARYU_IMAGE_PATH+"images/common/language-whiteNormal.png') no-repeat center center/cover";
		}
		else{
			for (var i = 0; i < color.length; i++) {
				color[i].style.color="white";
			}
		}
	}
}
//end sticky
function openNav() {
	document.getElementById("navbar").style.display = "block";
}
function closeNav(){
	document.getElementById("navbar").style.display="none";
}
function openLang(){
	var close=document.getElementById("lang");
		if(window.innerWidth>900 && close.style.display===""){
			document.getElementById("lang").style.display="block";
			document.getElementById("closex").style.display="none";
		}
		else if(window.innerWidth>900 && close.style.display==="block"){
			document.getElementById("lang").style.display="";
		}
		else if(window.innerWidth<800){
			document.getElementById("lang").style.display="block";
		}
	

}
function onBLur(){
	var close=document.getElementById("lang");
	if(window.innerWidth>900 && close.style.display==="block"){
		document.getElementById("lang").style.display="";
	}
		
}
function closeLang(){
	document.getElementById("lang").style.display="none";
}