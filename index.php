<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Sakda_63110282</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map {
        height: 500px;
        width: 500px;
      }

      .bg {
            background-color: rgb(197, 190, 179);
        }

    </style>
</head>

<body class="bg">
    
    <div class="container mt-5 col-4">
        <div class="container mx-auto">
            <p class="text-center h1">Weather in other areas</p>
            <br />
            <div class="from-group mb-3 ">
                <span class="from-group-text">Latitude :</span>
                <input type="text" class="form-control" aria-label="Latitude"
                    aria-describedby="Latitude" id="Latitude">
            </div>
            <div class="from-group mb-3">
                <span class="from-group-text">Longitude :</span>
                <input type="text" class="form-control" aria-label="Longitude"
                    aria-describedby="Longitude" id="Longitude">
            </div>
            <div class="container-fluid mt-5  d-flex justify-content-center">
                <button type="button" class="btn btn-primary" id="btnSearch">Search</button>
            </div>
        </div>
        </br>
        <div id="map"></div>
        <br />
        <div class="container mt-5 d-flex justify-content-center">
            <div class="card" id="cardWeather" style="width: 30rem; ">
            </div>

        </div>
    </div>

</body>
<script>

    function setDefault() {
        var urlDefualt = "https://api.openweathermap.org/data/2.5/weather?lat=7.568287&lon=99.62807152&appid=7c7dff8e6ca8cceabec723c0f24fde3c";
        $.getJSON(urlDefualt)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(0) + " °C");
                var humid = (data.main["humidity"] + "%");
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);

                    }
                })


                var line = "<div id='dataWeather'>";
                line += "<img src='https://sites.google.com/site/attractionsintrangjt/_/rsrc/1438857651830/prawati-khwam-pen-ma-khxng-canghwad-trang/trang01.jpg' class='card-img-top' ><div class='card-body'>"
                line += "<p class='card-title my-3 '>สถานที่ :" + place + "</p>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + "</p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "</p>";
                line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : " + sunrise + "</p>";
                line += "<p class='card-text'>อาทิตย์ตกเวลา : " + sunset + "</p>";
                line += "<p class='card-text'>เวลา: " + datetime + "</p>";

                line += "</div>"
                $("#cardWeather").append(line);
            }).fail((xhr, status, error) => { })
    }

    function LoadForcast() {
        var lat = $("#Latitude").val();
        var long = $("#Longitude").val();
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + long + "&appid=7c7dff8e6ca8cceabec723c0f24fde3c"
        $.getJSON(url)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(0) + " °C");
                var humid = (data.main["humidity"] + "%");
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);

                    }
                })
                var line = "<div id='dataWeather'>";
                line += "<img src='https://vicworldwide.com/img/download.png' class='card-img-top' ><div class='card-body'>"
                line += "<p class='card-title my-3'>สถานที่ : " + place + "</p>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + "</p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "</p>";
                line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : " + sunrise + "</p>";
                line += "<p class='card-text'>อาทิตย์ตกเวลา : " + sunset + "</p>";
                line += "<p class='card-text'>เวลา : " + datetime + "</p>";

                line += "</div>"
                $("#cardWeather").append(line);

            }).fail((xhr, status, error) => { })
    }

    function convertHMS(value) {
        let time = value;
        var convert = new Date(time * 1000);
        var hours = convert.getHours();
        var minutes = "0" + convert.getMinutes();
        var seconds = "0" + convert.getSeconds();
        return (hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2));

    }

    $(() => {
        setDefault();
        $("#btnSearch").click(() => {
            LoadForcast();
            $("#dataWeather").hide();

        });
    });

    var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 7.568287, lng: 99.62807152},
          zoom: 11
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap"
    async defer></script>
</script>

</html>
