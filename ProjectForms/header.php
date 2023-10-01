<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle;?></title>
    <link rel="stylesheet" href="drugpage.css">
</head>
<body>
    <header class="box0">
      <div id="header-desc">
          <img class= "logo" src="logoremoved.png">
            <h1> MyDispenser</h1>

            <ul class="nav">
                <li class="Analgesics <?php if($section == "Analgesics"){echo "on";} ?>">
				  <a href="catalog.php?cat=Analgesics">Analgesics</a></li>

                <li class="Anesthetics <?php if($section == "Anesthetics"){echo "on";} ?>">
                    <a href="catalog.php?cat=Anesthetics">Anesthetics</a></li>

                <li class="Anticoagulants <?php if($section == "Anticoagulants"){echo  "on";} ?>">
				  <a href="catalog.php?cat=Anticoagulants">Anti coagulants</a></li>

                <li class="Antibiotics <?php if($section == "Antibiotics"){echo "on";}?>">
				  <a href="catalog.php?cat=Antibiotics">Anti biotics</a></li>
            </ul>
      </div>       
    </header>