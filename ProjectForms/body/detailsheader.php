<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Page Title'; ?></title> <!-- Set a default title if $pageTitle is not set -->
    <link rel="stylesheet" href="../drug/drugpage.css">
</head>
<body>
    <header class="box0">
        <div id="header-desc">
            <a href="catalog.php?cat=Analgesics">
                <img class="logo" src="../photos/logoremoved.png" alt="MyDispenser Logo">
            </a>
            <h1>MyDispenser</h1>
        </div>       
    </header>
