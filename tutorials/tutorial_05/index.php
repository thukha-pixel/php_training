<?php
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 05 | Index Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="inner-container">
        <!-- read txt file start -->
        <h2>No(1) Read Text File</h2>
        <?php
        $txt = file_get_contents('sample.txt'); //  Read the entire (txt)file into string
        ?>

        <p><?php echo $txt; ?></p><br>
        <!-- read txt file end -->

        <!-- read doc and docx file start -->
        <h2>No(2) Read Doc or Docx File</h2>

        <?php
        /* 
        *Read Doc or Docx file and return plain text
        *
        * 
        *@params $filename(resource type)
        *@return plain text a.k.a paragraph
        */
        function readDocFile($filename)
        {
            if (file_exists($filename)) {

                if (($fhstream = fopen($filename, 'r')) !== false) {

                    $headers = fread($fhstream, 0xA00);
                    // 1 = (ord(n)*1) ; Document has from 0 to 255 characters
                    $n1 = (ord($headers[0x21C]) - 1);
                    // 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
                    $n2 = ((ord($headers[0x21D]) - 8) * 256);
                    // 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
                    $n3 = ((ord($headers[0x21E]) * 256) * 256);
                    // 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
                    $n4 = (((ord($headers[0x21F]) * 256) * 256) * 256);
                    // Total length of text in the document
                    $textLength = ($n1 + $n2 + $n3 + $n4);
                    $extractedPlaintext = fread($fhstream, $textLength);

                    // simple print character stream without new lines
                    //echo $extractedPlaintext;
                    // if you want to see your paragraphs in a new line, do this
                    return nl2br($extractedPlaintext);
                    // need more spacing after each paragraph use another nl2br
                }
            }
        }

        echo "<p>" . readDocFile("sample.doc") . "</p>";
        ?>
        <!-- read doc and docx file end -->

        <!-- read csv file start-->
        <h2>No(3) Read CSV File</h2>

        <table>
            <?php
            $csvFile = fopen("sample.csv", "r");

            while (($singleLine = fgetcsv($csvFile)) !== false) {
                echo "<tr>";
                foreach ($singleLine as $singleTxtLine) {
                    echo "<td>" . $singleTxtLine . "</td>";
                }
                echo "</tr>";
            }
            fclose($csvFile);
            ?>
        </table>
        <!-- read csv file end-->

        <!-- read xlsx file  start-->
        <h2>No(4) Read Excel File</h2>

        <table>
            <?php

            use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

            $reader = new Xlsx();
            $spreadsheet = $reader->load("sample.xlsx");

            $sheetArray = $spreadsheet->getActiveSheet()->toArray();

            foreach ($sheetArray as $singlesheetData) {
                echo "<tr>";
                echo "<td>" . $singlesheetData[0] . "</td>";
                echo "<td>" . $singlesheetData[1] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <!-- read xlsx file  end-->
    </div>
</body>

</html>