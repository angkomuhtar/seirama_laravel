<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,600&display=swap');
        /* @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap'); */

        body,
        html {
            height: 100%;
        }

        .bg {
            position: relative;
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .name {
            text-transform: uppercase;
            font-family: Nunito Sans, sans-serif;
            position: absolute;
            top: 215;
            font-size: 18px;
            left: 300;
            right: 50;
            text-align: center;
        }
    </style>
</head>

<body class="bg">
    <img style="width: 100%; border: 1px dashed #565151 " src="{{ public_path('images/sertifikat.jpg') }}" alt=""
        srcset="">
    <h3 class="name">{{ $name }}</h3>
</body>

</html>
