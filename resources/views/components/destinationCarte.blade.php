<script>
    // Choisir la destination sur la carte
    var mapid = L.map('mapid').setView([15.3031, -4.3322], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapid);

    $(function() {
        $("#depart, #destination").autocomplete({
            source: function(request, response) {
                // Effectuer la recherche via l'API Nominatim de OpenStreetMap
                axios.get('https://nominatim.openstreetmap.org/search?format=json&q=' + request
                        .term)
                    .then(function(res) {
                        var data = res.data;
                        var results = data.map(function(item) {
                            return {
                                label: item.display_name,
                                value: item.display_name,
                                lat: parseFloat(item.lat),
                                lon: parseFloat(item.lon)
                            };
                        });
                        response(results);
                    })
                    .catch(function(error) {
                        console.error('Erreur lors de la recherche:', error);
                        response([]);
                    });
            },
            select: function(event, ui) {
                // Récupérer la latitude et la longitude du lieu sélectionné
                var latitude = ui.item.lat;
                var longitude = ui.item.lon;

                // Centrer la carte sur le lieu sélectionné
                mapid.setView([latitude, longitude], 13);

                // Ajouter un marqueur sur la carte
                var marker = L.marker([latitude, longitude], 13).addTo(mapid);

                // Afficher le nom du lieu dans le popup du marqueur
                if (event.target.id === 'depart') {
                    marker.bindPopup('<b>Départ:</b><br>' + ui.item.value).openPopup();
                    $('#latitude_depart1').val(latitude);
                    $('#longitude_depart1').val(longitude);
                } else {
                    marker.bindPopup('<b>Destination:</b><br>' + ui.item.value).openPopup();
                    $('#latitude_destination1').val(latitude);
                    $('#longitude_destination1').val(longitude);
                }
            },
            minLength: 2 // Nombre de caractères minimum pour déclencher l'autocomplétion
        }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };
    });
</script>
