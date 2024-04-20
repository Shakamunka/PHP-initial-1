<!DOCTYPE html>

<head>
    <html lang="fr">
    <meta charset="utf-8">
    <title>Coivoiturage</title>
</head>

<body>
    <?php
    $departure = array('Paris', 'Orleans', 'Dublin', 'Nice', 'Tours');
    $travels = [
        ['departure' => 'Paris', 'arrival' => 'Nantes', 'departureTime' => '11:00', 'arrivalTime' => '12:34', 'driver' => 'Thomas'],
        ['departure' => 'Orleans', 'arrival' => 'Nantes', 'departureTime' => '05:15', 'arrivalTime' => '09:32', 'driver' => 'Mathieu'],
        ['departure' => 'Dublin', 'arrival' => 'Tours', 'departureTime' => '07:23', 'arrivalTime' => '08:50', 'driver' => 'Nathanaël'],
        ['departure' => 'Paris', 'arrival' => 'Orléans', 'departureTime' => '03:00', 'arrivalTime' => '05:26', 'driver' => 'Clément'],
        ['departure' => 'Paris', 'arrival' => 'Nice', 'departureTime' => '10:00', 'arrivalTime' => '12:09', 'driver' => 'Audrey'],
        ['departure' => 'Nice', 'arrival' => 'Nantes', 'departureTime' => '10:40', 'arrivalTime' => '13:00', 'driver' => 'Pollux'],
        ['departure' => 'Nice', 'arrival' => 'Tours', 'departureTime' => '11:00', 'arrivalTime' => '16:10', 'driver' => 'Edouard'],
        ['departure' => 'Tours', 'arrival' => 'Amboise', 'departureTime' => '16:00', 'arrivalTime' => '18:40', 'driver' => 'Priscilla'],
        ['departure' => 'Nice', 'arrival' => 'Nantes', 'departureTime' => '12:00', 'arrivalTime' => '16:00', 'driver' => 'Charlotte'],
    ];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $cityDeparture = $_POST['departure'];
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];

        echo "<h2>Trajet depuis " . $cityDeparture . " pour vous, " . $nom . "</h2>";
        foreach ($travels as $index => $travel) {
            if ($travel["departure"] === $cityDeparture) {
                echo "<p>Trajet de " . $travel["departure"] . " à " . $travel["arrival"] . " (Conducteur : " . $travel["driver"] . " à ".$travel["departureTime"].")</p>";
            }
        }
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <p><input type="text" name="nom"> Votre Prénom</p>
        <p><input type="text" name="mail"> Email</p>
        <p><input type="text" name="phone"> Téléphone</p>

        <p>Ville de départ</p>
        <select name="departure">
            <?php foreach ($departure as $index => $city): ?>
                <option value="<?php echo $city; ?>">
                    <?php echo $city; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>