<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Page Title'; ?></title> <!-- Set a default title if $pageTitle is not set -->
    <link rel="stylesheet" href="../css/drugpage.css">
</head>
<body>
    <header class="box0">
        <div id="header-desc">
            <a href="../drug/catalog.php?cat=Analgesics">
                <img class="logo" src="../photos/logoremoved.png" alt="MyDispenser Logo"> <!-- Fixed the image source -->
            </a>
            <h1>MyDispenser</h1>

            <ul class="nav">
                <li class="Analgesics <?php if($section == "Analgesics"){echo "on";} ?>">
                    <a href="../drug/catalog.php?cat=Analgesics">Analgesics</a></li>

                <li class="Anesthetics <?php if($section == "Anesthetics"){echo "on";} ?>">
                    <a href="../drug/catalog.php?cat=Anesthetics">Anesthetics</a></li>

                <li class="Anticoagulants <?php if($section == "Anticoagulants"){echo  "on";} ?>">
                    <a href="../drug/catalog.php?cat=Anticoagulants">Anticoagulants</a></li> <!-- Fixed the spelling of Anticoagulants -->

                <li class="Antibiotics <?php if($section == "Antibiotics"){echo "on";}?>">
                    <a href="../drug/catalog.php?cat=Antibiotics">Antibiotics</a></li>
            </ul>
        </div>       
    </header>
