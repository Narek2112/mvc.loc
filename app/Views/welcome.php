<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>mvc.loc</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/cerulean/bootstrap.min.css" />
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            /*color: #636b6f;*/
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Welcome Page
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>username</th>
                    <th>password</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>admin1</td>
                    <td>admin1</td>
                </tr>
                <tr>
                    <td>admin2</td>
                    <td>admin2</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Config</th>
                    <th>File</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>DB</td>
                    <td>/config/db.php</td>
                </tr>
                <tr>
                    <td>Constants</td>
                    <td>/config/constants.php</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="links">

            <a href="<?= url('/admin/login') ?>">Login As Admin</a>
        </div>
    </div>
</div>
</body>
</html>
