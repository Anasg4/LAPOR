<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lapor: Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/page/upload.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/semantic.css') }}" />
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/semantic.js') }}"></script>
    <script src="{{ url('js/anime.min.js') }}"></script>
</head>

<body class="background">
    <!-- Menu bar item -->
    <div class="ui top fixed menu">
        <a class="item logo" href="index.html">
            Lapor.
        </a>
        <div class="right menu">
            <a class="item" href="#">Bantuan</a>
            <a href="/login" class="item">
                <div class="ui button menubar">Keluar</div>
            </a>
        </div>
    </div>

    <div class="ui column centered stackable grid">

        <!-- Upload Form -->
        <div class="ui eight wide centered column content" id="content">

            <div class="form container">
                <!-- Detail -->
                <div class="ui fluid card" id="formdetail">
                    <div class="content">
                        <form action="/report" class="ui form box" method="post">

                            @csrf
                            <div class="field">
                                <label class="label form">
                                    JENIS PELANGGARAN
                                </label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="violation">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Jenis pelanggaran</div>
                                    <div class="menu">
                                        <div class="item" data-value="1">Pelanggaran Rambu</div>
                                        <div class="item" data-value="2">Kelengkapan Berkendara</div>
                                        <div class="item" data-value="3">Melawan Arus</div>
                                        <div class="item" data-value="4">Kendaraan Tidak Sesuai Standar</div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label form">
                                    KETERANGAN
                                </label>
                                <input type="text" name="description" id="keterangan" placeholder="Beri keterangan lebih lanjut">
                                <div class="ripple form" target="keterangan"></div>
                            </div>
                            <div class="field">
                                <label class="label form">
                                    PLAT
                                </label>
                                <input type="email" name="number" id="plat" placeholder="Nomor plat pelanggar">
                                <div class="ripple form" target="plat"></div>
                            </div>
                            <div class="field">
                                <label class="label form">
                                    LOKASI PELANGGARAN
                                </label>
                                <input type="text" name="location" id="lokasi" data-toggle="datepicker" placeholder="HH/BB/TTTT">
                                <div class="ripple form" target="lokasi"></div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- UPLOAD -->
                <div class="ui fluid card" id="formbukti">
                    <div class="image">
                        <img class="imgbuffer" src="">
                    </div>
                    <div class="content">
                        <form action="" class="ui form box">
                            <div class="field">
                                <label class="label form">
                                    GAMBAR BUKTI PELANGGARAN
                                </label>
                                <div class="ui action input">
                                    <input type="file" name="evidence" id="gambar" style="display:none;">
                                    <input type="text" placeholder="filename" disabled id="filename">
                                    <label class="ui teal right labeled icon button gambar" id="buttongambar" for="gambar">
                                        <i class="camera icon"></i>
                                        Cari
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button class="ui bottom atached button next" id="buttonbukti">BUAT LAPORAN</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ url('js/page/upload.js') }}"></script>

</html>
