var HttPRequest = false;

	function changeimg(id,img){
		var imgobj = document.getElementById(id);
		imgobj.src = img;
	}
		function clearTextBox(){
			var email = document.getElementById('subemail');
			
			if(email.value=="Your Email"){
				email.value = "";
			}

	}
		function clearTextBox1(){

			var name = document.getElementById('subcsname');

			if(name.value=="Your Name"){
				name.value = "";
			}
	}
	
