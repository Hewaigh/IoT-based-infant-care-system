
$(document).ready(function() {
	    
	     document.write("dddddd");

   		checknotif();
	    setInterval(function(){ checknotif(); }, 10000);




	  
});





function checknotif() {
	 $('body').append('<h4 style="color:red">*Not Granted</h4>');

	if (!Notification) {
		//$('body').append('<h4 style="color:red">*Browser does not support Web Notification</h4>');

		return;
	}



	if (Notification.permission !== "granted"){
		Notification.requestPermission();
		//$('body').append('<h4 style="color:red">*Not Granted</h4>');

		  
	}





	else {
       

		$.ajax({
			url : "ajax.php",
			type: "POST",
            





			success: function(data, textStatus, jqXHR)
			{


				
			
             

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





