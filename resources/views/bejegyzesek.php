<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/Ajax.js"></script>
    <script src="../js/JSbejegyzes.js"></script>
    <script src="../js/Bejegyzes.js"></script>
    <script src="../js/Urlap.js"></script>

    <link rel="stylesheet" href="../css/szerkezet.css" />
    <title>Kizöldítjük a Földet!</title>

    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawAnnotations);

        function drawAnnotations() {
            var data = google.visualization.arrayToDataTable([
                ['Osztályok', 'Pontszám'],
                ['SZFA1', 5],
                ['SZFA2', 2],
                ['IRÜ', 7],
            ]);

            var data = google.visualization.arrayToDataTable([
                ['Osztályok', 'Pontszám', {
                        type: 'string',
                        role: 'annotation'
                    },
                ],
                ['SZFA1', 5, '5'],
                ['SZFA2', 2, '2'],
                ['IRÜ', 7, '7'],
            ]);

            var options = {
                title: 'Pontszámok osztályonként',
                chartArea: {
                    width: '50%'
                },
                annotations: {
                    alwaysOutside: true,
                    textStyle: {
                        fontSize: 12,
                        auraColor: 'none',
                        color: '#555'
                    },
                    boxStyle: {
                        stroke: '#ccc',
                        strokeWidth: 1,
                        gradient: {
                            color1: '#f3e5f5',
                            color2: '#f3e5f5',
                            x1: '0%',
                            y1: '0%',
                            x2: '100%',
                            y2: '100%'
                        }
                    }
                },
                hAxis: {
                    title: 'Pontszám',
                    minValue: 0,
                },
                vAxis: {
                    title: 'Osztályok',
                }
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>

    <h1>Kizöldítjük a Földet!</h1>

    <form class="szuresek">
        <fieldset>
            <legend>Mit tettél ma a Földért?</legend>
            <select id="osztalyok">
            </select>
            <select id="tevekenysegek">
                <option value="">Válassz tevékenységet!</option>
            </select>
            <button class="kuld">Küld</button>
        </fieldset>
    </form>
<br>
    <div id="chart_div"></div>
<br>
    <table>
        <tr class="fejlec">
            <th>Osztály</th>
            <th>Tevékenység</th>
            <th>Pont</th>
            <th>Státusz</th>
        </tr>
        <tbody class="adatok">
            <tr class="sablon">
                <td class="osztaly"></td>
                <td class="tevekenyseg_nev"></td>
                <td class="pontszam"></td>
                <td class="allapot"></td>
            </tr>
        </tbody>
    </table>
</body>

</html>