<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,600&display=swap');

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
            text-transform: capitalize;
            font-family: Nunito Sans, sans-serif;
            position: absolute;
            font-size: 20px;
            top: {{ $data->top }};
            left: {{ $data->left }};
            right: {{ $data->right }};
            text-align: center;
        }
    </style>
</head>

<body class="bg">
    <img style="width: 100%; border: 1px dashed #565151 " src="{{ public_path('storage/cert/' . $data->file) }}"
        alt="" srcset="">
    <h3 class="name">{{ $name }}</h3>
</body>

</html>
