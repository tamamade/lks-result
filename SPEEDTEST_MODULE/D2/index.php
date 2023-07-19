<?php
$file = file_get_contents('result.json');
$data = json_decode($file, true);
$messageSentCount = 0;
$messageReceivedCount = 0;
$messageReceived = [];
$messageSent = [];
$messageBudi = [];


foreach ($data['messages'] as $message) {
    if ($message['from'] ==  'Budi') {
        $messageSentCount++;
        array_push($messageSent, strlen($message['text']));
        array_push($messageBudi, $message['text']);
    } elseif ($message['from'] ==  'Bot') {
        $messageReceivedCount++;
        array_push($messageReceived, strlen($message['text']));
        array_push($messageBudi, $message['text']);
    }
}

$avgSent = floor(array_sum($messageSent) / count(array_filter($messageSent)));
$avgReceived = floor(array_sum($messageReceived) / count(array_filter($messageReceived)));

foreach ($messageBudi as $mekey => $mevalue) {
    $messageBudi[$mekey] = str_replace(',', '', $messageBudi[$mekey]);
    $messageBudi[$mekey] = str_replace('.', '', $messageBudi[$mekey]);
    $messageBudi[$mekey] = str_replace('?', '', $messageBudi[$mekey]);
}

$sayu = [];

foreach ($messageBudi as $message) {
    array_push($sayu, explode(' ', $message));
}

$mes = [];

foreach ($sayu as $s) {
    foreach ($s as $j) {
        array_push($mes, $j);
    }
}
$mes = array_count_values($mes);

arsort($mes);

$count = 1;

$top = [];

foreach ($mes as $x => $x_value) {
    array_push($top, [$x => $x_value]);
    if ($count == 5) {
        break;
    }
    $count++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li> Top 5 Sent Words :
            <?php foreach ($top as $tops => $tips) : ?>
                <ul>
                    <?php foreach ($tips as $t => $y) : ?>
                        <li>
                            <?= $t ?> (<?= $y ?>x)
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </li>
        <li>
            Total messages sent : <?= $messageSentCount ?>
        </li>
        <li>
            Total messages received : <?= $messageReceivedCount ?>
        </li>
        <li>
            Average character length sent : <?= $avgSent ?>
        </li>
        <li>
            Average character length received : <?= $avgReceived ?>
        </li>
    </ul>
</body>

</html>