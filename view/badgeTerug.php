<?php
require_once "../google/config.php";
if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
    header("location:" . SITE_URL);
    exit();
}
mysql_connect('oege.ie.hva.nl', 'artsn001', '7L1fsVAUG5KngR') or
        die("Could not connect: " . mysql_error());
mysql_select_db('zartsn001');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>IJburg College - Badge Terugtrekken</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../view/stylesheets/badgeList.css" rel="stylesheet">
        <link href="stylesheets/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">IJ-vaardigheden</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Overzicht</a></li>
                        <li><a href="#">Profiel</a></li>
                        <li><a href="../signout.php">Uitloggen</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Zoeken...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="#">Overzicht <span class="sr-only">(current)</span></a></li>
                <li><a href="badgeUit.php">Badge uitreiken</a></li>
                <li class="active"><a href="badgeTerug.php">Badge terugtrekken</a></li>
                <li><a href="#">Klassenoverzicht</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Badge uitreiking</h1>
            <h3>Vul de gegevens van de leerling in</h3>
            <form action="<?php $_PHP_SELF ?>" method="post">
                <div class="leftpanel">
                    Klas:<br>
                    <?php
                    $badge_post = mysql_real_escape_string($_POST['badge']);
                    $leerling_post = mysql_real_escape_string($_POST['leerling']);
                    if ($badge_post && $leerling_post) {
                        $sql = "INSERT INTO hasBadge (leerlingnr, badgenr) "
                                . "VALUES('$leerling_post', '$badge_post' )";
                        mysql_query($sql);
                    }
                    
                    
                    if ($leerling_post) {
                        $sql_klas = "SELECT klasnaam FROM Klas";
                        $klas = mysql_query($sql_klas);

                        echo "<select name='klas'>";
                        echo "<option value='" . $klas_post . "' selected>" . $klas_post . "</option>";
                        while ($row = mysql_fetch_array($klas)) {
                            echo '<option value="' . $row['klasnaam'] . '">' . $row['klasnaam'] . '</option>';
                        }
                        echo '</select><br><br>Leerling:<br>';

                        #Leerling
                        $sql_leerling = "SELECT leerlingnr, voornaam, achternaam FROM Leerling WHERE klasnaam = '$klas_post' ORDER BY achternaam ASC, voornaam ASC";
                        $leerling = mysql_query($sql_leerling);

                        echo "<select name='leerling'>";
                        echo "<option value='" . $leerling_post . "' selected>" . $leerling_post . "</option>";
                        while ($row = mysql_fetch_array($leerling)) {
                            echo '<option value="' . $row['leerlingnr'] . '">' . $row['voornaam'] . ' ' . $row['achternaam'] . '</option>';
                        }
                        echo "</select><br><br>Vak:<br>";
                        
                        #Vak
                        $sql_vak = "SELECT vaknaam FROM Vak ORDER BY vaknaam ASC";
                        $vak = mysql_query($sql_vak);

                        echo "<select name='vak'>";
                        echo "<option disabled selected value> kies een vak </option>";
                        while ($row = mysql_fetch_array($vak)) {
                            echo '<option value="' . $row['vak'] . '">' . $row['vaknaam'] . '</option>';
                        }
                        echo "</select><br><br>Badge:<br>";

                        #Badge
                        #$sql_badge = "SELECT badgenaam, badgenr FROM hasBadge WHERE leerlingnr = '$leerling_post' ORDER BY badgenr ASC";
                        $sql_badge = "SELECT b.*, h.* FROM Badge b JOIN hasBadge h ON h.badgenr = b.badgenr WHERE h.leerlingnr =  '$leerling_post'";
                        $badge = mysql_query($sql_badge);

                        echo "<select name='badge'>";
                        echo "<option disabled selected value> kies een badge </option>";
                        while ($row = mysql_fetch_array($badge)) {
                            echo '<option value="' . $row['badgenr'] . '">' . $row['badgenaam'] . '</option>';
                        }
                        echo '</select><br><br><br><br><br><input name="toewijzen" class="button" type="submit" value="Toewijzen">';
                        if ($badge_post && $leerling_post){
                            $naamLeerling = mysql_fetch_array($leerling);
                            echo '<br><br>Succesvol badge teruggetrokken van' . $naamLeerling['voornaam'] . ' ' . $naamLeerling['achternaam'];
                        }
                    }
   
                    $klas_post = mysql_real_escape_string($_POST['klas']);
                    if ($klas_post) {
                        $sql_klas = "SELECT klasnaam FROM Klas";
                        $klas = mysql_query($sql_klas);

                        echo "<select name='klas'>";
                        echo "<option value='" . $klas_post . "' selected>" . $klas_post . "</option>";
                        while ($row = mysql_fetch_array($klas)) {
                            echo '<option value="' . $row['klasnaam'] . '">' . $row['klasnaam'] . '</option>';
                        }
                        echo '</select><br><br>Leerling:<br>';

                        #Leerling
                        $sql_leerling = "SELECT leerlingnr, voornaam, achternaam FROM Leerling WHERE klasnaam = '$klas_post' ORDER BY achternaam ASC, voornaam ASC";
                        $leerling = mysql_query($sql_leerling);

                        echo "<select name='leerling'>";
                        echo "<option disabled selected value> kies een leerling </option>";
                        while ($row = mysql_fetch_array($leerling)) {
                            echo '<option value="' . $row['leerlingnr'] . '">' . $row['voornaam'] . ' ' . $row['achternaam'] . '</option>';
                        }
                        echo '</select></div><li><a href="badgeTerug.php">Terug</a></li><div><br><br><br><br><br><input name="verder" class="button" type="submit" value="Verder">';
                        

                    } else {
                        $sql_klas = "SELECT klasnaam FROM Klas";
                        $klas = mysql_query($sql_klas);

                        echo "<select name='klas'>";
                        echo "<option disabled selected value> kies een klas </option>";
                        while ($row = mysql_fetch_array($klas)) {
                            echo '<option value="' . $row['klasnaam'] . '">' . $row['klasnaam'] . '</option>';
                        }
                        echo '</select></div><div><br><br><br><br><br><input name="verder" class="button" type="submit" value="Verder">';
                    }
                    ?>
                </div>
            </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>');</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>