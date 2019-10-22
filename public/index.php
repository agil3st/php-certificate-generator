<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @page { margin: 0; padding: 0; }

        html, body { margin: 0; padding: 0; font-family: 'enriqueta';}

        body > *:last-child {
            page-break-after: auto
        }

        *, *:before, *:after {
            box-sizing: border-box;
        }

        h1, h2, h3, h4, p {
            margin: 0;
        }

        #frame {
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
            top: 464px;
            font-size: 30pt;
        }

    </style>
</head>
<body>
    <img src="cert_template.jpeg" alt="" width="100%">
    <div class="container">
        <div class="wrapper">
            <h2 class="name">Agil</h2>
        </div>
    </div>

</body>
</html>