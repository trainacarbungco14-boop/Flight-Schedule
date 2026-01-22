<?php
date_default_timezone_set("Asia/Manila");
$manilaTime = date("D, M d Y | h:i:s A");

$paris = new DateTime("now", new DateTimeZone("Europe/Paris"));
$swiss = new DateTime("now", new DateTimeZone("Europe/Zurich"));
$japan = new DateTime("now", new DateTimeZone("Asia/Tokyo"));
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
        <span class="header-time">Manila Time: <?= $manilaTime;?></span>
    </div>
</div>

<div class="container">

<h2 class="section-title">Domestic Flights</h2>

 <!-- domestic -->
<?php
$domesticFlights = [
    ["MNL","Manila","manila.jpeg","CEB","Cebu","cebu.jpg","Mactan–Cebu International Airport","GMT+8 · Asia/Manila","Ninoy Aquino International Airport","GMT+8 · Asia/Manila"],
    ["CEB","Cebu","cebu.jpg","DVO","Davao","davao.jpg","Francisco Bangoy International Airport","GMT+8 · Asia/Manila","Mactan–Cebu International Airport","GMT+8 · Asia/Manila"],
    ["DVO","Davao","davao.jpg","ILO","Iloilo","iloilo.jpg","Iloilo International Airport","GMT+8 · Asia/Manila","Francisco Bangoy International Airport","GMT+8 · Asia/Manila"],
    ["ILO","Iloilo","iloilo.jpg","PPS","Puerto Princesa","pps.jpg","Puerto Princesa International Airport","GMT+8 · Asia/Manila","Iloilo International Airport","GMT+8 · Asia/Manila"],
    ["PPS","Puerto Princesa","pps.jpg","BCD","Bacolod","bcd.jpg","Bacolod–Silay International Airport","GMT+8 · Asia/Manila","Puerto Princesa International Airport","GMT+8 · Asia/Manila"],
];

foreach ($domesticFlights as $f):
?>
<div class="flight-row">

    <div class="airport-box departure">
        <div class="airport-img">
            <img src="images/<?= $f[2]?>" alt="<?= $f[1]?>">
        </div>
        <div class="airport-info">
            <span class="tag">DEPARTURE</span>
            <span class="code"><?= $f[0]?></span>
            <span class="city"><?= $f[1]?></span>
            <span class="airport-name"><?= $f[8]?></span>
            <span class="timezone"><?= $f[9]?></span>
        </div>
    </div>

    <div class="flight-line">⌯✈︎</div>

    <div class="airport-box arrival">
        <div class="airport-img">
            <img src="images/<?= $f[5] ?>" alt="<?= $f[4]?>">
        </div>
        <div class="airport-info">
            <span class="tag">ARRIVAL</span>
            <span class="code"><?= $f[3]?></span>
            <span class="city"><?= $f[4]?></span>
            <span class="airport-name"><?= $f[6]?></span>
            <span class="timezone"><?= $f[7]?></span>
        </div>
    </div>

</div>
<?php endforeach; ?>

<h2 class="section-title">International Flights</h2>

 <!-- international -->
<?php
$internationalFlights = [
    ["MNL","Manila","manila.jpeg","NRT","Tokyo","nrt.jpg","Narita International Airport","GMT+9 · Asia/Tokyo","Ninoy Aquino International Airport","GMT+8 · Asia/Manila"],
    ["NRT","Tokyo","nrt.jpg","ICN","Seoul","icn.jpg","Incheon International Airport","GMT+9 · Asia/Seoul","Narita International Airport","GMT+9 · Asia/Tokyo"],
    ["ICN","Seoul","icn.jpg","DXB","Dubai","dxb.jpg","Dubai International Airport","GMT+4 · Asia/Dubai","Incheon International Airport","GMT+9 · Asia/Seoul"],
    ["DXB","Dubai","dxb.jpg","CDG","Paris","cdg.jpg","Charles de Gaulle Airport","GMT+1 · Europe/Paris","Dubai International Airport","GMT+4 · Asia/Dubai"],
    ["CDG","Paris","cdg.jpg","ZRH","Zurich","zrh.jpeg","Zurich Airport","GMT+1 · Europe/Zurich","Charles de Gaulle Airport","GMT+1 · Europe/Paris"],
];

foreach ($internationalFlights as $f):
?>
<div class="flight-row">

    <div class="airport-box departure">
        <div class="airport-img">
            <img src="images/<?= $f[2]?>" alt="<?= $f[1]?>">
        </div>
        <div class="airport-info">
            <span class="tag">DEPARTURE</span>
            <span class="code"><?= $f[0]?></span>
            <span class="city"><?= $f[1]?></span>
            <span class="airport-name"><?= $f[8]?></span>
            <span class="timezone"><?= $f[9]?></span>
        </div>
    </div>

    <div class="flight-line">⌯✈︎</div>

    <div class="airport-box arrival">
        <div class="airport-img">
            <img src="images/<?= $f[5]?>" alt="<?= $f[4]?>">
        </div>
        <div class="airport-info">
            <span class="tag">ARRIVAL</span>
            <span class="code"><?= $f[3]?></span>
            <span class="city"><?= $f[4]?></span>
            <span class="airport-name"><?= $f[6]?></span>
            <span class="timezone"><?= $f[7]?></span>
        </div>
    </div>

</div>
<?php endforeach; ?>

 <!-- timezone -->
    <div class="timezones">
        <div class="timezone-card">Paris<span><?= $paris->format("h:i A")?></span></div>
        <div class="timezone-card">Switzerland<span><?= $swiss->format("h:i A")?></span></div>
        <div class="timezone-card">Japan<span><?= $japan->format("h:i A")?></span></div>
    </div>

</div>
</body>
</html>
