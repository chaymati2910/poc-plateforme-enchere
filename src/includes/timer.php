<script>
    <?php
      foreach ($_SESSION['DUMMY_ARRAY'] as $key => $items): 
    ?>
    var end = <?= $items['date_fin']; ?>; // récupére la variable PHP

    var dateConvert = <?php echo mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));?>;
    console.log ("END", end);
    console.log("date:secondes", dateConvert);

    var <?php echo $items['timer']?> = setInterval(countDown(), 1000); // répéte la fonction toutes les 1 seconde

    function countDown() {

        var timeRemaining = end - dateConvert;
        var daysRemaining = parseInt(timeRemaining); // conversion en jours
        var hoursRemaining = parseInt(timeRemaining / 3600); // conversion en heures
        var minutesRemaining = parseInt((timeRemaining % 3600) / 60); // conversion en minutes
        var secondsRemaining = parseInt((timeRemaining % 3600) % 60); // conversion en secondes

        // Affiche le timer
        document.getElementById('<?= $items['id'] ?>').innerHTML = hoursRemaining + ' h : ' + minutesRemaining + ' m : ' + secondsRemaining + ' s ';

        // condition quand le timer est fini
        if ((hoursRemaining == 0 && minutesRemaining == 0 && secondsRemaining == 0)) {
            clearInterval(<?php echo $items['timer']?>);
            document.getElementById('<?= $items['id'] ?>').innerHTML = "expiré";
        }

    }
    <?php endforeach; ?>
    </script>