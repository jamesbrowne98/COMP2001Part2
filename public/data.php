<?php
include_once '../public/header.php';
include_once '../public/index.php';
include_once '../src/model/DataAccess.php';
include_once '../src/model/statistics_crime.php';

if(!isset($db)) {
    $db = new DataAccess();
}

$coords = [];

?>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
              integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
              crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
                integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
                crossorigin=""></script>
    </head>
    <body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Data</li>
        </ol>
    </nav>

    <div class="container-fluid col-md-12">
        <h1>Plymouth Crime Data</h1>
        <p>This data is displayed from the csv data set provided from Plymouth City Council
            found here.  <a href=""> //put in file from crime
                https://plymouth.thedata.place/dataset/crime/resource/26904f63-e13a-450c-85c7-954b66229871?view_id=c921bd69-0cff-4fe6-8396-e98715288296</a></p>


        <div class="container-fluid col-12">
            <div class="row">
                <div class="col-6">
                    <table class="table table-striped table-bordered border-success">
                        <thead class="bg-success text-white">
                        <tr>
                            <th>Offence</th>
                            <th>2003</th>
                            <th>2004</th>
                            <th>2005</th>
                        </tr>
                        </thead>
                        <tbody class="border-success">
                        <?php
                        $HTML = "";
                        $crime = $db->Statistics_Crime();
                        if($crime)
                        {
                            foreach($crime as $cr)
                            {
                                $HTML .= "<tr>";
                                $HTML .= "<td>".$cr->Offence()."</td>";
                                $HTML .= "<td>".$cr->Year()."</td>";
                                $HTML .= "<td>".$cr->YearTwo()."</td>";
                                $HTML .= "<td>".$cr->YearThree()."</td>";
                                $HTML .= "</tr>";


                            }
                        }
                        echo $HTML;


                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-1">

                </div>
                <div class="col-5">
                    <div id="mapid" style="width: 100%; height: 600px;"></div>
                    <script>

                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>

<?php include_once 'footer.php'; ?>