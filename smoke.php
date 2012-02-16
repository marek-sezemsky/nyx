<html>
<head>
<title>[sezi@agape]$ non-smoker list</title>
<link rel="stylesheet" type="text/css" href="http://www.nyx.cz/skins/forest3/nc.css">
</head>
<?php

$total_lidi = 0;
$total_cigar = 0;
$total_penez = 0;
$total_dni = 0;

// $name - nyx ID
// $date - when stopped with smoking (DD-Mon-YYYY)
// $... ?
function show_person($name, $date, $brand, $quantity, $price, $why, $weekly = false, $currency = "Kc") // {{{
{
        global $total_lidi, $total_cigar, $total_penez, $total_dni;

        if ( $date ) {
                $quit_smoking = strtotime($date);
        } else {
                $quit_smoking = 0;
        }
        $quit_smoking_str = date("j.n.Y", $quit_smoking);
        $days = floor((time() - $quit_smoking) / 86400);
        if ( $quantity == 0 ) $quantity = 1;
        if ( $price == 0 ) $price = 45;

        $saved = $days * $quantity * ( $weekly ? $price / 7 : $price );
        $cigarettes = $days * $quantity * 20; // assume 20 c. in box

        print '<div class="w">';

        if ( $name ) {
                print "<div class=\"wi\"><img class=\"i\" src=\"http://i.nyx.cz/$name[0]/$name.gif\" title=\"$name\"></div>";
        }
        print '<div class="wh">';
        if ( $name ) {
                print 'id ' . $name . ' s kourenim seklo ' . $quit_smoking_str;
        } else {
                print '<b>Celkove statistiky</b>';
        }
        print '</div>';

        print '<div class="wc">';
        if ( $weekly ) {
                $m1 = " tyden";
        } else {
                $m1 = " den";
        }

        if ( $name ) {
                print "Nekouri uz <b>" . $days . " dni</b>, znacka cigaret <i>$brand</i>, spotreba " . number_format($quantity, 2, ".", ".") . " balicku kazdy {$m1}.<br><br>";
                print "Prumerna cena " . number_format($price, 2, ",", ".") ." {$currency} za baleni, takze celkem usetreno " . number_format($saved, 2, ",", ".") . " {$currency}!<br>";
                print "Navic dost setri svoje zdravi, protoze si odreklo uz " . number_format($cigarettes, 0, ".", ".") . " cigaret.<br>";
                if ( $why ) {
                        print "<br><i>" . $why . "</i><br>";
                }
        } else {
                // zobraz celkove statistiky
                print "<p>Dohromady je na nyx non-smoker listu <b>$total_lidi lidi</b>";
                print "<p>Vsichni dohromady nekouri uz <b>$total_dni dni</b>";
                print "<p>Spolecne si odrekli <b>" . number_format($total_cigar, 0, ".", ".") . " cigaret</b>";
                print "<p>Hromadne usetreno (tzv. plicni fond) <b>" . number_format($total_penez, 2, ",", ".") . " Kc!</b>";
        }
        print '</div>';

        $total_lidi  += 1;
        $total_cigar += $cigarettes;
        $total_penez += $saved;
        $total_dni   += $days;

        print "</div>\n";

} // }}}

?>

<body class="p-lc">

<ul class="m 11">
<li class="i1"><a href="http://www.nyx.cz/"><span>nyx</span></a>
<li class="i2 a"><a href="<?php print $_ENV["SCRIPT_NAME"]; ?>"><span>non-smokers</span></a>
<li class="i1 r"><a href="http://www.marvin300.net/"><span>marvin300</span></a>
</ul>

<?php
        // parameters: ($name, $date, $brand, $quantity, $price, $why)
        show_person("MARPA", "01-Feb-2000", "?", "", "", "");
        show_person("GAF", "01-Mar-2004", "?", "", "", "");
        show_person("BODLINKA", "5-Jan-2006", "?", "", "", "");
        show_person("H2O", "10-Mar-2006", "Marlboro a Camel", "1", "60", "ale uz ne-e!! :) stale se drzim a mam ze sebe radost!!<br>navzajem se s ID snow_white pordporujeme a musim uznat ze ve dvou se to lepe tahne... :)");
        // 2008-07-28 show_person("SNOW_WHITE", "26-Mar-2006", "Malboro", "1.5", "60", "");
        // show_person("JANK", "01-Apr-2006", "?", "", "", "");
        // show_person("DOCTOR23", "20-May-2006", "", "", "", "");
        show_person("PECH", "29-Jun-2006", "start/red+white", "1", "50", "");
        show_person("DOCKINEZ", "01-Jul-2006", "Start", 0.75, 40, "");
        show_person("CZECH_M8", "03-Aug-2006", "modry sparty", 1, 46, "");
        show_person("ENDREW", "08-Aug-2006", "LakyStrajky", 1, 54, "");
        show_person("HAWRAN", "05-Sep-2006", "Sparta", 0.5, 46, "");
        show_person("FLATAK", "17-Nov-2006", "LM", 0.5, 49, "");
        show_person("MAJKA", "01-Jan-2007", "Lucky Strike", 0.75, 56, "");
        // 2008-09-09 show_person("VASHA", "01-Jan-2007", "Champion Tobbaco", 1/7, (22*23)/7, "");
        show_person("TOMASH", "04-Jan-2007", "Marlboro lights", 1, 66, "");
        show_person("TRIMUS", "07-Jan-2007", "Sparta", 1.5, 46, "");
        show_person("RONDALUS", "13-Feb-2007", "Petra", 0.5, 55, "");
        show_person("VINNY", "24-Apr-2007", "?", "", "", "");
        show_person("SIBETH", "07-May-2007", "", "", "", "Muj velky dik patri Lopikovi, ktery se ukazal jako pravy gentleman a ze solidarity prestal kourit taky. Tak hlavne at nam to obema vydrzi.");
        show_person("LOPIK", "01-Jun-2007", "Petry", "1", "60", "");
        show_person("COCA", "13-Jun-2007", "Sparty", "1.5", "60", "");
        show_person("SANDIS", "01-Jul-2007", "Javanse Cerny", 0.3, 100, "");
        show_person("DOCTOR23", "19-Oct-2007", "", "", "", "(druhy pokus)");
        show_person("HASHLERKA", "17-Nov-2007", "", .3, 50, "");
        show_person("ONDRASH", "24-Nov-2007", "Marlboro", .75, 72.5, "");
        show_person("JUNGLER", "25-Nov-2007", "Lucky Strike", 1, 70, "");
        show_person("2BFREE", "08-Dec-2007", "Moon", 1, 50, "");
        // 2008
        //show_person("LEWIN", "02-Jan-2008", "Sparty nebo R&W", "1", "46", "(druhy pokus)");
        show_person("MONYKKA", "01-Jan-2008", "", "", "", "");
        show_person("P4INTER", "02-Jan-2008", "Startky nebo Javanese", "1", "75", "");
        show_person("PEEDIA", "25-Mar-2008", "Marlboro", "1", "74", "");
        show_person("BOAR", "09-Apr-2008", "Camel", "1", "68", "");
        // show_person("CHEESS", "16-May-2008", "Startky", "1", "50", "");
        show_person("FRIX211", "10-Jun-2008", "Kentky", "1", "74", "");
        show_person("GLAVER", "05-Jul-2008", "", "1.2", "58", "");
        show_person("SYREC", "31-Aug-2008", "Start", "0.8", "58", "");
        // show_person("GASPODA", "14-Sep-2008", "Lucky Strike", "0.75", "70", "");
        show_person("JIRA666", "18-Sep-2008", "Petra", 1, 67, "");
        show_person("SHEALA", "19-Sep-2008", "", "0.1", "70", "");
        show_person("MYKO", "30-Oct-2008", "Start", "1.0", "58", "");
        show_person("WYNDMYLL_238", "19-Oct-2008", "Start", "0.8", "58", "");
        show_person("BRUISE", "07-Nov-2008", "modre LM", "0.5", "63", "");
        show_person("LOUZICKA", "22-Nov-2008", "Tabak", "0.5", "", "");
        show_person("PANDA_JE_MRTVA", "01-Jan-2009", "?", 1, 60, "");
        show_person("HAUSNUMERO", "22-Jan-2009", "Start", 1, 60, "");
        show_person("HAEDIX", "14-Jan-2009", "Marlboro", 1.5, 84, "");
        show_person("LU_LU", "01-Mar-2009", "LM", 1.5, 64, "");
        // 2009-04-28
        // show_person("DARKJESUS", "24-Mar-2009", "Camel", 0.4, 76, "");
        // 2009-05-22
        //show_person("MATHES", "24-Mar-2009", "Camel", 0.6, 76, "");
        show_person("ADDALBERT", "27-Mar-2009", "Davidoff", 0.5, 84, "");
        // show_person("SEZI", "07-Jan-2009", "Start", 1.5, 58, "");
        show_person("LNDT", "19-Jun-2009", "Camel", 0.75, 68, "");
        show_person("MCD", "09-Jul-2009", "3/4 javaanse", .85, 47, "");
        // show_person("EMIS", "20-Jul-2009", "Start", 1, 58, "");
        show_person("VERUKEBA", "23-Jul-2009", "Petra", .75, 64, "");
        show_person("GRED", "16-Aug-2009", "Start", .75, 60, "");
        show_person("SHADOWPLAYER", "04-Dec-2009", "", 1, 180, "");
        // fuuuuuuu show_person("SEZI", "23-Apr-2010", "Start", 1.5, 62, "");
        show_person("GASPODA", "16-Jan-2010", "LM Lights", 0.5, 66, "");
        show_person("MATHEW", "14-Mar-2011", "Start", "0.8", "64", "");
        show_person("PRASOPES", "12-Dec-2011", "LM", "0.35", "72", "");
        show_person("SEZI", "11-Jan-2012", "Start", "1.2", "65", "");


        // hall of shame
        // show_person("CHEESS", "05-Jun-2007", "Startky", "1", "50", "");

        // suma
        show_person("", "", "", "", "", "");

?>



</body>
</html>
