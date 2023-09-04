const map = L.map('map',
{
    center: [0, 0],
    zoom: 3.5

});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      

      
      
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
console.log('Locations Data:', locationsData);
console.log('Locations Data:', areasData);
for (const entry of locationsData) {
    var marker = L.marker([entry.north, entry.east]);
    marker.bindPopup(entry.Name).openPopup()
    marker.addTo(map);
}
for (const zone of areasData) {
    var circle = L.circle([zone.north, zone.east],{
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: zone.radius
    });
    circle.bindPopup(zone.Name);
    circle.addTo(map);
}



