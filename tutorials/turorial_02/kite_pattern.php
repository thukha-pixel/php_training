<?php
    /*
        *Draw the picture like kite with '*'
        *
        *@param $num
    */
    function drawKitePattern($num)
    {
        $midPoint = floor((2 * $num - 1) / 2);

        for ($row = 0; $row < $num; $row++) {
            $level = "";

            for ($col = 0; $col < (2 * $num - 1); $col++) {

                if ($midPoint - $row <= $col && $midPoint + $row >= $col) {
                    $level .= "*";
                } else {
                    $level .= "&ensp;";
                }
            }
            echo $level;
            echo "<br>";
        }

        for ($row = $num - 1; $row >= 0; $row--) {
            $level = "";

            for ($col = 0; $col < (2 * $num - 1); $col++) {

                if ($midPoint - $row + 1 <= $col && $midPoint + $row - 1 >= $col) {
                    $level .= "*";
                } else {
                    $level .= "&ensp;";
                }
            }
            echo $level;
            echo "<br>";
        }
    }

    drawKitePattern(6);
?>