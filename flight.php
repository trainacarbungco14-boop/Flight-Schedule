<?php
date_default_timezone_set("Asia/Manila");
$manilaTime = date("D, M d Y | h:i:s A");

$paris = new DateTime("now", new DateTimeZone("Europe/Paris"));
$swiss = new DateTime("now", new DateTimeZone("Europe/Zurich"));
$japan = new DateTime("now", new DateTimeZone("Asia/Tokyo"));

function computeFlightTime($originTZ, $destTZ, $minutes) {
    $dep = new DateTime("now", new DateTimeZone($originTZ));
    $arr = clone $dep;
    $arr->modify("+{$minutes} minutes");
    $arr->setTimezone(new DateTimeZone($destTZ));
    $dur = $dep->diff($arr);

    return [$dep, $arr, $dur];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Flight Schedule</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <div class="header-left">
        <span class="header-icon">✈</span>
        <span class="header-title">Flight Schedule</span>
    </div>
    <div class="header-right">
        <span class="header-time">Manila Time: <?= $manilaTime ?></span>
    </div>
</div>

<div class="container">

<h2 class="section-title">Domestic Flights</h2>

<?php
$domesticFlights = [
    ["MNL","Manila","manila.jpeg","CEB","Cebu","cebu.jpg","Mactan–Cebu International Airport","Asia/Manila","Ninoy Aquino International Airport","Asia/Manila",75],
    ["CEB","Cebu","cebu.jpg","DVO","Davao","davao.jpg","Francisco Bangoy International Airport","Asia/Manila","Mactan–Cebu International Airport","Asia/Manila",90],
    ["DVO","Davao","davao.jpg","ILO","Iloilo","iloilo.jpg","Iloilo International Airport","Asia/Manila","Francisco Bangoy International Airport","Asia/Manila",95],
    ["ILO","Iloilo","iloilo.jpg","PPS","Puerto Princesa","pps.jpg","Puerto Princesa International Airport","Asia/Manila","Iloilo International Airport","Asia/Manila",85],
    ["PPS","Puerto Princesa","pps.jpg","BCD","Bacolod","bcd.jpg","Bacolod–Silay International Airport","Asia/Manila","Puerto Princesa International Airport","Asia/Manila",80],
];

foreach ($domesticFlights as $f):
    [$dep,$arr,$dur] = computeFlightTime($f[9], $f[7], $f[10]);
?>
<div class="flight-row">

    <div class="airport-box departure">
        <div class="airport-img">
            <img src="images/<?= $f[2] ?>" alt="<?= $f[1] ?>">
        </div>
        <div class="airport-info">
            <span class="tag">DEPARTURE</span>
            <span class="code"><?= $f[0] ?></span>
            <span class="city"><?= $f[1] ?></span>
            <span class="airport-name"><?= $f[8] ?></span>
            <span class="timezone"><?= $f[9] ?></span>
            <span class="time"><?= $dep->format("M d, h:i A") ?></span>
        </div>
    </div>

    <div class="flight-line">
        ⌯✈︎
        <div class="duration">
            <?= $dur->h ?>h <?= $dur->i ?>m
        </div>
    </div>

    <div class="airport-box arrival">
        <div class="airport-img">
            <img src="images/<?= $f[5] ?>" alt="<?= $f[4] ?>">
        </div>
        <div class="airport-info">
            <span class="tag">ARRIVAL</span>
            <span class="code"><?= $f[3] ?></span>
            <span class="city"><?= $f[4] ?></span>
            <span class="airport-name"><?= $f[6] ?></span>
            <span class="timezone"><?= $f[7] ?></span>
            <span class="time"><?= $arr->format("M d, h:i A") ?></span>
        </div>
    </div>

</div>
<?php endforeach; ?>

<h2 class="section-title">International Flights</h2>

<?php
$internationalFlights = [
    ["MNL","Manila","manila.jpeg","NRT","Tokyo","nrt.jpg","Narita International Airport","Asia/Tokyo","Ninoy Aquino International Airport","Asia/Manila",260],
    ["NRT","Tokyo","nrt.jpg","ICN","Seoul","icn.jpg","Incheon International Airport","Asia/Seoul","Narita International Airport","Asia/Tokyo",150],
    ["ICN","Seoul","icn.jpg","DXB","Dubai","dxb.jpg","Dubai International Airport","Asia/Dubai","Incheon International Airport","Asia/Seoul",530],
    ["DXB","Dubai","dxb.jpg","CDG","Paris","cdg.jpg","Charles de Gaulle Airport","Europe/Paris","Dubai International Airport","Asia/Dubai",420],
    ["CDG","Paris","cdg.jpg","ZRH","Zurich","zrh.jpeg","Zurich Airport","Europe/Zurich","Charles de Gaulle Airport","Europe/Paris",85],
];

foreach ($internationalFlights as $f):
    [$dep,$arr,$dur] = computeFlightTime($f[9], $f[7], $f[10]);
?>
<div class="flight-row">

    <div class="airport-box departure">
        <div class="airport-img">
            <img src="images/<?= $f[2] ?>" alt="<?= $f[1] ?>">
        </div>
        <div class="airport-info">
            <span class="tag">DEPARTURE</span>
            <span class="code"><?= $f[0] ?></span>
            <span class="city"><?= $f[1] ?></span>
            <span class="airport-name"><?= $f[8] ?></span>
            <span class="timezone"><?= $f[9] ?></span>
            <span class="time"><?= $dep->format("M d, h:i A") ?></span>
        </div>
    </div>

    <div class="flight-line">
        ⌯✈︎
        <div class="duration">
            <?= $dur->h ?>h <?= $dur->i ?>m
        </div>
    </div>

    <div class="airport-box arrival">
        <div class="airport-img">
            <img src="images/<?= $f[5] ?>" alt="<?= $f[4] ?>">
        </div>
        <div class="airport-info">
            <span class="tag">ARRIVAL</span>
            <span class="code"><?= $f[3] ?></span>
            <span class="city"><?= $f[4] ?></span>
            <span class="airport-name"><?= $f[6] ?></span>
            <span class="timezone"><?= $f[7] ?></span>
            <span class="time"><?= $arr->format("M d, h:i A") ?></span>
        </div>
    </div>

</div>
<?php endforeach; ?>

<h2 class="section-title">Other Timezones</h2>

<div class="timezones">
    <div class="timezone-card">Paris <span><?= $paris->format("h:i A") ?></span></div>
    <div class="timezone-card">Switzerland <span><?= $swiss->format("h:i A") ?></span></div>
    <div class="timezone-card">Japan <span><?= $japan->format("h:i A") ?></span></div>
</div>

</div>

</body>
</html>
