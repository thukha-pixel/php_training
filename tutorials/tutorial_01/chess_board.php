<?php
    /*
        *Draw black and white Chess Board
        *
        *@param $num
    */
    function drawChessBoard($num)
    {
        //rows loop
        for ($row = 1; $row <= $num; $row++) {
            echo "<tr class='table-row'>";

            //columns loop
            for ($col = 1; $col <= $num; $col++) {

                //evens are white and odds are black
                if (($row + $col) % 2 === 0) {
                    echo "<td></td>";
                } else {
                    echo "<td class='black-color'></td>";
                }
            }
            echo "</tr>";
        }
    }

    drawChessBoard(8);
?>