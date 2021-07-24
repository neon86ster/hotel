$(document).ready(function(){
	
	//Sidebar Accordion Menu:
		
		$("#main-nav li ul").hide(); // Hide all sub menus
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu	
				$("#main-nav li a.nav-top-item").each(function(){
					$(this).removeClass("current");
				});
				$("#main-nav ul li a").each(function(){
					//$(this).removeClass("current");
				});
				$(this).addClass("current");
				return false;
			}
		);
		
		$("#main-nav ul li a").click( // When a top menu item is clicked...
			function () {
				$("#main-nav ul li a").each(function(){
					$(this).removeClass("current");
				});
				$(this).addClass("current");
				window.location.href=(this.href);
				return false;
			}
		);
		
		$("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				$("#main-nav ul li a").each(function(){
					$(this).removeClass("current");
				});
				return false;
			}
		); 

    // Sidebar Accordion Menu Hover Effect:
		
		$("#main-nav li .nav-top-item").hover(
			function () {
				$(this).stop().animate({ paddingRight: "25px" }, 200);
			}, 
			function () {
				$(this).stop().animate({ paddingRight: "15px" });
			}
		);
		
});