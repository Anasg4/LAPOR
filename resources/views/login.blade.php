<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lapor: Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/page/guest.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/semantic.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/anime.min.js"></script>
</head>

<body class="background">

    <!-- Menu bar item -->
    <div class="ui top fixed menu">
        <div class="item logo" href="./index.html">
            Lapor.
        </div>
        <div class="right menu">
            <a class="item" href="#">Tentang</a>
            <a class="item" href="/register">
                <div class="ui button menubar">Daftar</div>
            </a>
        </div>
    </div>


    <div class="ui two column stackable grid">
        <div class="ui nine wide  column section left" id="section-left">
            <div class="column">
                <i class="inverted camera huge icon"></i>
                <div>
                    <h3 class="heading">Laporkan pelanggaran<br> disekitar kamu.</h3>
                </div>
                <div>
                    <p class="subheading">
                        beritahukan kepada kami dan <br> dapatkan poin hadiahnya
                    </p>
                </div>
            </div>
        </div>
        <div class="ui five wide centered column" id="section-right">
            <div class="column">
                <div class="ui fluid card">
                    <div class="content">                        

                        @if($errors)
                            @foreach ($errors as $error)
                                {{ $item }}
                            @endforeach
                        @endif                        

                        <form action="/login" class="ui form" id="formlogin" method="post">

                            @csrf
                            <div class="field">
                                <label class="label form">
                                    NIK
                                </label>
                                <input type="text" name="NIK" id="NIK">
                                <div class="ripple form" target="NIK"></div>
                            </div>
                            <div class="field">
                                <label class="label form">
                                    PASSWORD
                                </label>
                                <input type="password" name="password" id="password">
                                <div class="ripple form" target="password"></div>
                            </div>                            

                            <button class="ui fluid small button form" type="submit">MASUK</button>
                            <p class="label form emphasis">Belum punya akun, daftar <a href="daftar.html">di sini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="js/semantic.min.js"></script>
<script src="js/page/login.js"></script>

</html>
