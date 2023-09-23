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
                <li class="drug1 <?php if($section == "drug1"){echo "on";} ?>">
				  <a href="catalog.php?cat=drug1">Analgesics</a></li>

                <li class="drug2 <?php if($section == "drug2"){echo  "on";} ?>">
				  <a href="catalog.php?cat=drug2">Anesthetics</a></li>

                <li class="drug3 <?php if($section == "drug3"){echo  "on";} ?>">
				  <a href="catalog.php?cat=drug3">Anti coagulants</a></li>

                <li class="drug4 <?php if($section == "drug4"){echo "on";}?>">
				  <a href="catalog.php?cat=drug4">Anti biotics</a></li>
            </ul>
      </div>       
    </header>