
$(document).ready(function() {
	    
	   

   		checknotif();
	    setInterval(function(){ checknotif(); }, 1000);




	  
});





function checknotif() {
	

	if (!Notification) {
		//$('body').append('<h4 style="color:red">*Browser does not support Web Notification</h4>');

		return;
	}



	if (Notification.permission !== "granted"){
		Notification.requestPermission();
		//$('body').append('<h4 style="color:red">*Not Granted</h4>');

		  
	}





	else {
    
  //$('body').append('<h4 style="color:red">*Not ddGranted</h4>'); 
		$.ajax({
			url : "ajax.php",
			type : "POST",
            

			success: function(data, textStatus, jqXHR)
			{
            console.log("sssss");

				  //$('body').append('<h4 style="color:red">*Not Gdvdsovhdovdivhranted</h4>'); 
			
             

				var dataa =  jQuery.parseJSON(data);

				 	if(dataa.result == true){ 
				 		

					      
									 
				 var data_notif = dataa.notif;

				 						


			
					
				 	for (var i = data_notif.length - 1; i >= 0; i--) {
				 		
				 		
						//var theurl = data_notif[i]['url'];
				 		var notification = new Notification(data_notif[i]['title'], {
				 		//icon: data_notif[i]['icon'],
						body: data_notif[i]['type'],

				 		});
				 		notification.onclick = function () {
							//window.open(theurl); 
							notification.close();     
				 		};
			 		setTimeout(function(){
				 			notification.close();
					
						}, 5000);


				 	};

				 }


				 else{
				 	alert("wroooooooong");

				 }


			},

			error: function(jqXHR, textStatus, errorThrown)
			{

			}




		});	

	}




};




