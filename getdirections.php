<!DOCTYPE html>
<html> 
<head> 
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
   <meta name="txtweb-appkey" content="1e4f1f2e-80e2-49d2-9de4-6e2e76c51619" />
   <title>Google Maps API v3 Directions Example</title> 
   <script type="text/javascript" 
           src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head> 
<body style="font-family: Arial; font-size: 12px;"> 
   <div style="width: 600px;">
    
     <div id="panel" style="width: 300px; float: right;"></div> 
   </div>

   <script type="text/javascript"> 

     var directionsService = new google.maps.DirectionsService();
     var directionsDisplay = new google.maps.DirectionsRenderer();

    /* var map = new google.maps.Map(document.getElementById('map'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

     directionsDisplay.setMap(map);
     directionsDisplay.setPanel(document.getElementById('panel'));*/
     var directions;
     var request = {
       origin: 'Brigade Road, Bangalore', 
       destination: 'Marathahalli',
       travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
        // directionsDisplay.setDirections(response);
         $.each(response, walker);
         function walker(key, value) {  
          if(key==="instructions")
            display(value);
          if (typeof value === "object") {
              $.each(value, walker);
          }
         }
      
        function display(msg) {
          var p = document.createElement('p');
          p.innerHTML = String(msg);
          document.body.appendChild(p);
        }
       }     
       
     });
   </script> 
</body> 
</html> 