<html>


<head>
    <style>
       table, th, td, tr {
          border: 1px solid black;
          border-collapse: collapse; //szimpla vonal a táblázatokban
}
    </style>
</head>
<body>

<?php 

echo "Hello World!";
//--- páros-e
function paros_e($parose)
{
    return ($parose % 2 == 0);
};
//---

?>
<br>
    <table width="50%">
        <tr ALIGN=center>
            <th width="50%">Szöveg</th>
            <th width="50%">Szám</th>
        </tr>
    </table>
<?php for ($i=1;$i<=5;$i++) {?>
    <table width="50%">
        <tr ALIGN=center>
            <td width="50%">
                <?php
                    if (paros_e($i))
                    { ?> Páros <?php }
                    else
                    { ?> Páratlan <?php }
                ?>
            </td width="50%">
            <td><?php echo $i; ?></td>
        </tr>
    </table>
    <?php } ?>

<?php

//--- DB Connect 
include("dbconn.php"); 

$sql = "SELECT albumok.egyuttes,albumok.cim,albumok.ev,zeneszamok.szerzo,zeneszamok.cim,zeneszamok.hossz FROM albumok,zeneszamok where albumok.id=zeneszamok.album_id ORDER BY albumok.egyuttes, zeneszamok.cim;";

if((($keres = mysqli_query($link, $sql)) && (mysqli_num_rows($keres)>0)))
{?>
    <p>van találat<br><br></p>
    <?php
    
    while ($sor=mysqli_fetch_array($keres))
    {
    $egyuttese=$sor["egyuttes"];
    $cime=$sor["cim"];
    $eve=$sor["ev"];
    
    echo "Együttes:".$egyuttese."---"."Címe:".$cime."---"."Éve:".$eve;?><br><?php
    }
}?>

<br>
<p>HTML űrlap</p>
<form name="album_urlap" action="album_urlap_felvesz.php" method="POST">

Album együttes:<input name="album_egyuttes" value="1albumegyuttes">
Album cím: <input name="album_cim" value="1albumcím">
Album év: <select name="album_ev">
    <option value="2011">2011
    <option value="2012">2012
    <option value="2013">2013
    <option value="2014">2014
</select>
<br><br>

ELKÜLDŐ gomb
<input type="submit"><br>
alaphelyzetbe állító gomb
<input type="reset"><br>
<input type="button" value="GOMBOCSKA"><br>



<br><br><br>

<br>
<input type="radio" name="fagyi" value="fagyi1v">fagyi1
<input type="radio" name="fagyi" value="fagyi2v">fagyi2
<input type="radio" name="fagyi" value="fagyi3v">fagyi3
<br>
szeretnék hírlevelet kapni:
<input type="checkbox" name="cb3" value="1">
<br>
<textarea cols=50 rows=10>Alapértelmeztt szöveg</textarea>




</p>

</form>

<p>Adatbázis lezárás indul...</p>
<?php
mysqli_close($link);
?>
<p>Adatbázis lezárás kész...</p>
</body>
</html>