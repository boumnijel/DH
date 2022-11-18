<?php

$connection = new PDO("mysql:host=152.228.129.137;dbname=novatel", 'doctohere', '4D9zhl7*');
$result = $connection->query('SELECT * FROM sensor');
while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <li>
        <?= $row['title'] ?>

    </li>
<?php endwhile ?>