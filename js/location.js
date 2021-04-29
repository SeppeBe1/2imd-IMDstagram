var x = document.getElementById("currentLocation");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    fetch('https://eu1.locationiq.com/v1/reverse.php?key=pk.b0c9a5d12bacf7a08f6c9d6b125b919b&lat=' + position.coords.latitude + '&' + 'lon=' + position.coords.longitude + '&format=json')
        .then(response => response.json())
        .then(function(data) {
            //console.log(data);
            document.getElementById('location-search').value = data.address.city + ', ' + data.address.country;
        });
}