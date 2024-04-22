<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


    <form method="post" action="onzichtbaar.php">
    <h2>Bling Bling Nail Studio Chantal</h2>

    <p>Kies 4 basiskleuren voor uw nagels:</p>
    <input type="color" name="color1" value="#CD00FF">
    <input type="color" name="color2" value="#FF0000">
    <input type="color" name="color3" value="#F0FF00">
    <input type="color" name="color4" value="#2AFF00">

    <p>Uw telefoonnummer:</p>
    <input type="tel" name="tel">

    <p>Uw e-mailadres:</p>
    <input type="email" name="email">

    <p>Afspraak datum:</p>
    <input type="datetime-local" name="dateOfAppointment">

    <p>Soort behandeling:</p>
    <input type="checkbox" name="treatment1"><label for="vraag1">Nagelbijt arrangement (termijnbetaling mogelijk) €180</label><br>
    <input type="checkbox" name="treatment2"><label for="vraag2">Luxe manicure (massage en handpakking) €30,00</label><br>
    <input type="checkbox" name="treatment3"><label for="vraag3">Nagelreparatie per nagel (in de eerste wee gratis) €5,00</label><br>
    
    <?php
    // PHP om de lokale tijd en datum op te halen
    $localDateTime = date("Y-m-d\TH:i:s");
    ?>
        
    <input type="hidden" value="<?php echo $localDateTime ?>" name="localDateTime">
    
        <input type="submit" value="Sla op"> <input type="reset" value="Reset">
</form>



</body>
</html>