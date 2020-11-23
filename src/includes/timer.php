<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Afficher le compte à rebours dans un élément -->
    <p id="demo"></p>

    <script>
    // Fixez la date à laquelle nous comptons
    let countDownDate = new Date(); //.getTime()
    console.log(countDownDate);
    // Fixez la durée de l'enchère
    let clickAuction = 48;
    countDownDate.setHours(countDownDate.getHours() + clickAuction);
    console.log(countDownDate);

    // Mettez à jour le compte à rebours toutes les 1 seconde
    let maFonction = setInterval(function() {

      // Obtenir la date et l'heure du jour
      let now = new Date(); //.getTime()

      // Trouvez la distance entre maintenant et la date du compte à rebours
      let timeRemaning = countDownDate - now;

      // Calculs de temps pour les jours, heures, minutes et secondes
      var days = Math.floor(timeRemaning / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeRemaning % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeRemaning % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeRemaning % (1000 * 60)) / 1000);

      // Afficher le résultat dans l'élément avec id = "demo"
      document.getElementById("demo").innerHTML = hours + "h : "
      + minutes + "m : " + seconds + "s ";

      // Si le compte à rebours est terminé, écrivez du texte
      if (timeRemaning < 0) {
        clearInterval(maFonction);
        document.getElementById("demo").innerHTML = "EXPIRÉ";
      }

    }, 1000);
    </script>
</body>
</html>