<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Maps Full</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/leaflet/leaflet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html,
        body,
        #mapid {
            height: 100%;
            width: 100%;
        }

        .add {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: #5dcf74;
            font-weight: 700;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 37px;
            box-shadow: 2px 2px 3px #999;
            pointer-events: auto;
        }

        .location {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 100px;
            right: 30px;
            background-color: #62a7e8;
            font-weight: 700;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 37px;
            box-shadow: 2px 2px 3px #999;
            pointer-events: auto;
        }
    </style>
</head>

<body>

    <div id="mapid"></div>
    <div class="leaflet-bottom leaflet-right">
        <a href="javascript:void" data-toggle="modal" data-target="#exampleModal"
            class="add text-white leaflet-clickable">
            <div style="margin-top: 2px;">
                <i class="fa fa-plus"></i>
            </div>
        </a>
        <a href="javascript:void" class="location text-white leaflet-clickable">
            <div style="margin-top: 2px;">
                <i class="fa fa-map-marker-alt"></i>
            </div>
        </a>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="formCoord">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Coordinates</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Place</label>
                            <input type="text" class="form-control" required id="place" name="place">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Langitude</label>
                            <input type="text" class="form-control" id="lng" name="lng" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{-- Leaflet --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="assets/leaflet/leaflet.js"></script>
    <script>
        $(function () {

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var mymap = L.map('mapid').setView([-1, 117], 5);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                subdomains: ['a', 'b', 'c'],
                maxZoom: 19,
                minZoom: 5
            }).addTo(mymap);

            function mapMarker(data, show = false) {
                for (var i = 0; i < data.length; i++) {
                    var marker = L.marker([data[i].lat, data[i].lng]).addTo(mymap);
                    if (show) {
                        marker.bindPopup('<b>Added! </b>' + data[i].place).openPopup();
                    } else {
                        marker.bindPopup(data[i].place);
                    }
                }
            }

            function onLocationFound(e) {
                var radius = e.accuracy / 2;
                L.marker(e.latlng).addTo(mymap)
                    .bindPopup("Akurat sampai " + Math.round(radius) + " meter").openPopup();
                L.circle(e.latlng, radius).addTo(mymap);
            }

            function onLocationError(e) {
                alert(e.message);
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('getCoord') }}",
                data: {
                    "_token": csrf
                },
                success: function (data) {
                    //var locations = data;
                    mapMarker(data);
                }
            });

            $("#formCoord").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('addCoord') }}",
                    data: $(this).serialize(),
                    type: "POST",
                    success: function (response) {
                        $("#exampleModal").modal('hide');
                        mapMarker(response, true);
                        $(this)[0].reset();
                    }
                });
            });

            $('.location').on('click', function () {
                mymap.on('locationfound', onLocationFound);
                mymap.on('locationerror', onLocationError);

                mymap.locate({
                    setView: true,
                    maxZoom: 19
                });
            });

        })

    </script>
</body>

</html>