<?php
require '../vendor/autoload.php';
require '../vendor/kingmaster772/php-database-connector/controllers/DatabaseController.php';
require_once '../vendor/dompdf/dompdf/lib/html5lib/Parser.php';
// require_once '../vendor/dompdf/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
// require_once '../vendor/dompdf/dompdf/lib/php-svg-lib/src/autoload.php';
require_once '../vendor/dompdf/dompdf/src/Autoloader.php';

Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$db = new DatabaseController("mysql", "localhost", "root", "", "certificate_generator");
$db->select("SELECT * FROM student WHERE id BETWEEN 37 AND 71");

// reference the Dompdf namespace


$html = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <style>
            @page { margin: 0; padding: 0; page-break-after: always; }

            html, body { margin: 0; padding: 0;}

            body > *:last-child {
                page-break-after: auto
            }

            *, *:before, *:after {
                box-sizing: border-box;
            }

            h1, h2, h3, h4, p {
                margin: 0;
            }

            .frame {
                position: relative;
                top: 0;
                left: 0;
            }

            .frame:first-child {
                position: absolute;
                top: 0;
                left: 0;
            }

            .container {
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                padding: 80px 0;
            }

            h2.name {
                width: 100%;
                /* background: grey; */
                display: block;
                text-align: center;
                position: absolute;
                top: 53.5%;
                font-size: 30pt;
                color: #02354a;
            }
        </style>
    </head>
    <body>";
    foreach ($db->getResultArray() as $row) {
    // for ($i=0; $i<71; $i++) {
        $html .= "
        <img src='template/cert_template.jpg' alt='' width='100%' class='frame'>
        <div class='container'>
            <div class='wrapper'>
                <h2 class='name'>".$row['name']."</h2>
            </div>
        </div>
        ";
    }

$html .= "
    </body>
    </html>
";

generateBasic($html);

function generateBasic($html) {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("sample.pdf", array("Attachment"=>0));
}

?>