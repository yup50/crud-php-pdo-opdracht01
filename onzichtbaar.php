<?php
// Verbinding maken met de database
include('config/config.php');

$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

try {
    // Verbinding maken met de database
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Gegevens ophalen van het formulier
    $treatment1 = isset($_POST["treatment1"]) ? '1' : '0'; // 1 als aangevinkt, 0 als niet aangevinkt
    $treatment2 = isset($_POST["treatment2"]) ? '1' : '0'; // 1 als aangevinkt, 0 als niet aangevinkt
    $treatment3 = isset($_POST["treatment3"]) ? '1' : '0'; // 1 als aangevinkt, 0 als niet aangevinkt

    $sql = "INSERT INTO afspraak (kleur1, kleur2, kleur3, kleur4, telefoonNummer, email, afspraakDatum, nagelbijt, luxeManicure, nagelreparatie, datumVanSchrijven)
            VALUES (:color1, :color2, :color3, :color4, :telephone, :email, :dateOfAppointment, :treatment1, :treatment2, :treatment3, :localDateTime)";

    $statement = $pdo->prepare($sql);
    
    // Binden van parameters aan waarden
    $statement->bindValue(':color1', $_POST["color1"], PDO::PARAM_STR);
    $statement->bindValue(':color2', $_POST["color2"], PDO::PARAM_STR);
    $statement->bindValue(':color3', $_POST["color3"], PDO::PARAM_STR);
    $statement->bindValue(':color4', $_POST["color4"], PDO::PARAM_STR);
    $statement->bindValue(':telephone', $_POST["tel"], PDO::PARAM_STR);
    $statement->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
    $statement->bindValue(':dateOfAppointment', $_POST["dateOfAppointment"], PDO::PARAM_STR);
    $statement->bindValue(':treatment1', $treatment1, PDO::PARAM_STR);
    $statement->bindValue(':treatment2', $treatment2, PDO::PARAM_STR);
    $statement->bindValue(':treatment3', $treatment3, PDO::PARAM_STR);
    $statement->bindValue(':localDateTime', $_POST["localDateTime"], PDO::PARAM_STR); // localDateTime is niet gedefinieerd in het formulier, zorg ervoor dat je het in het formulier toevoegt.

    // Uitvoeren van het statement
    if ($statement->execute()) {
        echo "Afspraak is succesvol opgeslagen in de database.";
    } else {
        echo "Er is een fout opgetreden bij het opslaan van de afspraak.";
    }

} catch (PDOException $e) {
    echo "Er is een fout opgetreden: " . $e->getMessage();
}
?>
