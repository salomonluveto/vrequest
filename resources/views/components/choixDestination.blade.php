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