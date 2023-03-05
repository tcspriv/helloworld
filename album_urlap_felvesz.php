<?php
//az alábbi megoldással nem kell a $_POST["album_egyuttes"] megoldást alkalmazni, mert átforgatja név szerinti változókba 
foreach ($_POST as $key => $value) {
    $$key = $value;
}

//if (count($_POST) > 0 and $album_egyuttes<>"" and $album_cim<>"") {
    /* bemenet ellenőrzése */

    //--- DB Connect 
    include("dbconn.php"); 


?>

    <html>
    <head>
        <title>Új felvitele...</title>
    </head>
    <body>

    <?php
    /*echo $_POST[album_egyuttes];
    echo $_POST[album_cim];
    echo $_POST[album_ev];*/
    /*echo $_GET["album_egyuttes"];
    echo $_GET["album_cim"];
    echo $_GET["album_ev"];*/
    echo $album_egyuttes;
    echo $album_cim;
    echo $album_ev;


        //$sql ="INSERT INTO albumok (egyuttes,cim,ev) VALUES ($album_egyuttes,$album_cim,$album_ev)";
        //$sql ="INSERT INTO albumok (egyuttes,cim,ev) VALUES ($_POST["album_egyuttes"],$_POST["album_cim"],$_POST["album_ev"])";
        //$sql ="INSERT INTO albumok (egyuttes,cim,ev) VALUES ($_GET["album_egyuttes"],$_GET["album_cim"],$_GET["album_ev"])";
        //$sql ="INSERT INTO albumok (egyuttes,cim,ev) VALUES ($_POST["album_egyuttes"],$_POST["album_cim"],$_POST["album_ev"])";
        //$sql ='INSERT INTO albumok (egyuttes,cim,ev) VALUES ($album_egyuttes,$album_cim,$album_ev);';
        $sql ="INSERT INTO albumok (egyuttes,cim,ev) VALUES ('$album_egyuttes','$album_cim','$album_ev');";
        //$sql ="INSERT INTO albumok (egyuttes,cim,ev) VALUES ('album_egyuttes','album_cim',1967)";

        // a \n itt miért nem működik?
        echo "\n---".$sql."---\n";
        mysqli_query($link, $sql);

    ?>

    <br><a href="hello_world2.php">Új tétel felvétele</a> 

    <p>Adatbázis lezárás indul urlap_felvesz-ből...</p>
    <?php
    mysqli_close($link);
    ?>
    <p>Adatbázis lezárás kész urlap_felvesz-ből...</p>

    <?php
    }
else {
 echo " NEM volt rögzítendő tétel!!!";   
}?>

</body>

</html>



