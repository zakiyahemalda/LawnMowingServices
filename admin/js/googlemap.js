function loadMap(){
	var malaysia = new {lat: 3.519863, lng: 101.538116};
	var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: malaysia   
        });
}