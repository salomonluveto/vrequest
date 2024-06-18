<x-app-layout>
    @include('layouts.itemdemande')
    <x-slot name="header">
        <div class="flex items-center justify-between  py-5">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Demander une course') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Remplissez ce formulaire </h2>
        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('demandes.store') }}" method="post">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motifs</label>
                    <input type="text" name="motif" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="" required="">
                </div>
                <div class="w-full">
                    <label for="brand"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="text" name="date" id="date" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="" required="">
                </div>
               
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jour
                        et Heure de sortie</label>
                    <input type="datetime-local" name="date_deplacement" id="datetime"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="" required="">
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de
                        passagers</label>
                    <input type="number" name="nbre_passagers" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="" required="">
                </div>
                <div class="w-full">
                    <label for="choix-lieu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir
                        un lieu
                        :</label>
                    <div>
                        <label class="text-gray-900 dark:text-white">
                            <input type="radio" name="choix" value="liste" id="choix-liste"> Sur une liste
                        </label>
                    </div>

                    <div>
                        <label class="text-gray-900 dark:text-white">
                            <input type="radio" name="choix" value="carte" id="choix-carte"> Sur une carte
                        </label>
                    </div>
                </div>

                <div id="liste-lieux" class="col-span-2 grid gap-4 sm:grid-cols-2" style="display: none;">

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu de
                                depart</label>
                            <select id="lieuDepart" name="lieu_depart"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value=""></option>
                                @foreach ($sites as $site)
                                    <option value="{{ $site->nom }}">{{ $site->nom }}</option>
                                    <p class=" text-white" name="longitude_depart" required>
                                        {{ $site->longitude }}
                                    </p>
                                    <span name="latitude_depart" required>{{ $site->latitude }}</span>
                                @endforeach


                            </select>

                        </div>

                        <div class="col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination</label>
                            <select id="lieuArrivee" name="destination"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value=""></option>
                                @foreach ($sites as $site)
                                    <option value="{{ $site->nom }}">{{ $site->nom }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <div id="carte-lieux" style="display: none;" class="col-span-2 grid gap-4 sm:grid-cols-2">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="col-span-1">
                            <label for="depart"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu
                                de Depart
                            </label>
                            <input type="text" name="lieu_depart" id="depart"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <ul id="results"></ul>
                        </div>
                        <div class="col-span-1">
                            <label for="destination"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Destination
                            </label>
                            <input type="text" name="destination" id="destination"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                    </div>
                    

                </div>

                <div class="relative sm:col-span-2">
                    <div id="mapid"
                        style="height: 300px; width:860px;position: absolute; left: -1000000000000000px"></div>
                </div>




                <div class=" relative sm:col-span-2">

                    <div id="map" style=" height: 300px; width:860px; position: absolute;left:-100000000000px">
                    </div>
                </div>
            </div>
            <button type="submit"
                class="inline-flex items-center  mt-2 sm:mt-6  text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                Demander une course
            </button>

        </form>
        <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </div>
    <script>
        // Date du jour automatique
        document.getElementById('date').value = new Date().toISOString().slice(0, 10);
    </script>

    <script>
        // Choisir la destination soit par carte soit sur la liste des lieux

        var choixListe = document.getElementById('choix-liste');
        var choixCarte = document.getElementById('choix-carte');

        choixListe.addEventListener('change', function() {
            document.getElementById('liste-lieux').style.display = 'block';
            document.getElementById('carte-lieux').style.display = 'none';
            // hide map
            document.getElementById("mapid").style.position = "absolute"
            document.getElementById("mapid").style.left = "-100000000px"

            // show map
            document.getElementById("map").style.position = "relative"
            document.getElementById("map").style.left = "0px"
        });

        choixCarte.addEventListener('change', function() {
            document.getElementById('carte-lieux').style.display = 'block';
            document.getElementById('liste-lieux').style.display = 'none';
            // show map
            document.getElementById("mapid").style.position = "relative"
            document.getElementById("mapid").style.left = "0px"

            // hide map
            document.getElementById("map").style.position = "absolute"
            document.getElementById("map").style.left = "-100000000px"
        });
    </script>
    <script>
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
    <script>
        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var map = L.map('map').setView([15.3031, -4.3322], 8);
        var markerDepart = L.marker([0, 0], {
            icon: greenIcon
        }, ).addTo(map);
        var markerArrivee = L.marker([0, 0]).addTo(map);
        var polyline = L.polyline([], {
            color: 'blue'
        }).addTo(map);



        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);



        function updateMap() {
            var lieuDepart = document.getElementById('lieuDepart').value;
            var lieuArrivee = document.getElementById('lieuArrivee').value;

            fetch('/site/' + lieuDepart)
                .then(response => response.json())
                .then(dataDepart => {
                    markerDepart.setLatLng([dataDepart.latitude, dataDepart.longitude]);
                    map.setView([dataDepart.latitude, dataDepart.longitude], 8);
                    markerDepart.bindPopup('<b>Lieu de depart:</b><br>' + lieuDepart).openPopup();

                });

            fetch('/site/' + lieuArrivee)
                .then(response => response.json())
                .then(dataArrivee => {
                    markerArrivee.setLatLng([dataArrivee.latitude, dataArrivee.longitude]);
                    markerArrivee.bindPopup('<b>Lieu d\'arrivée:</b><br>' + lieuArrivee).openPopup();
                    polyline.setLatLngs([
                        [dataDepart.latitude, dataDepart.longitude],
                        [dataArrivee.latitude, dataArrivee.longitude]
                    ]);
                });
        }

        document.getElementById('lieuDepart').addEventListener('change', updateMap);
        document.getElementById('lieuArrivee').addEventListener('change', updateMap);

        // Mettre à jour la carte lorsque la page est chargée
        updateMap();
    </script>




</x-app-layout>
