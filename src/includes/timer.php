    <?php 
   
    $tempVar = $_SESSION['DUMMY_ARRAY'];

  ?>
    <script>
    // function gestTimer() {
// Fixez la date à laquelle nous comptons
<?php foreach($_SESSION['DUMMY_ARRAY'] as $key => $items):?>
    var countDownDate = new Date(); //.getTime()
    console.log(countDownDate);
    // Fixez la durée de l'enchère
    var clickAuction = <?php echo $_SESSION['DUMMY_ARRAY'][$key]['duree']?>;
    countDownDate.setHours(countDownDate.getHours() + clickAuction);
    console.log(countDownDate);

    // Mettez à jour le compte à rebours toutes les 1 seconde
    var maFonction = setInterval(function() {

      // Obtenir la date et l'heure du jour
      var now = new Date(); //.getTime()

      // Trouvez la distance entre maintenant et la date du compte à rebours
      var timeRemaning = countDownDate - now;

      // Calculs de temps pour les jours, heures, minutes et secondes
      var days = Math.floor(timeRemaning / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeRemaning % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) + days * 24;
      var minutes = Math.floor((timeRemaning % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeRemaning % (1000 * 60)) / 1000);
      
      // Afficher le résultat dans l'élément avec id = "demo"
      document.getElementById("<?= $key ?>").innerHTML = hours + "h : "
      + minutes + "m : " + seconds + "s ";


      // Si le compte à rebours est terminé, écrivez du texte
      if (timeRemaning < 0) {
        clearInterval(maFonction);
        document.getElementById("demo").innerHTML = "EXPIRÉ";
      }

    }, 1000);
    // }
    <?php endforeach?>
    </script>
  