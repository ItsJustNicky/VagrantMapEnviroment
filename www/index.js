const map = L.map('map',
{
    center: [0, 0],
    zoom: 3.5

});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      

      
      
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);





