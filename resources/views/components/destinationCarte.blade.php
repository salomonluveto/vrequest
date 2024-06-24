<script>
    // Choisir la destination sur la carte
    var mapid = L.map('mapid').setView([15.3031, -4.3322], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapid);

    $(function() {
        $("#depart").autocomplete({
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
                // Centrer la carte sur le lieu sélectionné
                mapid.setView([ui.item.lat, ui.item.lon], 13);
                var markerDepart = L.marker([ui.item.lat, ui.item.lon], 13).addTo(mapid);
                markerDepart.bindPopup('<b>Depart:</b><br>' + results.value).openPopup();
            },
            minLength: 2 // Nombre de caractères minimum pour déclencher l'autocomplétion
        }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };
    });
    $(function() {
        $("#destination").autocomplete({
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
                // Centrer la carte sur le lieu sélectionné
                mapid.setView([ui.item.lat, ui.item.lon], 13);
                var markerDepart = L.marker([ui.item.lat, ui.item.lon], 13).addTo(mapid);
                markerDepart.bindPopup('<b>Depart:</b><br>' + results.data).openPopup();
            },
            minLength: 2 // Nombre de caractères minimum pour déclencher l'autocomplétion
        }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };
    });
</script>