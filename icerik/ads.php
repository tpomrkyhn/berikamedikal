<table>

<?

    $i = 1;
    while($i <= 10){

        ?> <tr>

            <?

            $a = 1;
            while ($a <= 3){

                ?>

                    <td style="border: 1px solid #000; padding: 5px"><?= $i.". satır ".$a.". sütun" ?></td>

                <?

                $a++;

            }

            ?>

        </tr>  <?

        $i++;

    }


?>

</table>


<img src="" alt="">