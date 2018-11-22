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

    <div class="mysidebar">
        <div class="ui vertical menu">
            <a href="/" class="item">
                Home
                <i class="home icon"></i>
            </a>
            <a href="/report/create" class="item">
                Upload
                <i class="newspaper icon"></i>
            </a>
            <a href="/reward" class="item">
                Reward
                <i class="credit card icon"></i>
            </a>            
            <a href="/login" class="item">
                <div class="ui fluid button keluar">KELUAR</div>
            </a>
        </div>
    </div>

    <!-- Menu bar item -->
    <div class="ui top fixed menu">
        <a class="item logo" href="/">
            Lapor.
        </a>

        <div class="right menu" id="bars">        
            <a class="item">
                <i class="bars grey large icon"></i>
            </a>
        </div>

        <div class="right menu" id="right-menu">
            <a class="item" href="/report/create">Upload</a>
            <a class="item" href="/reward">Reward</a>
            <a class="item" href="/">Home</a>
            <a href="/login" class="item">
                <div class="ui button menubar">Keluar</div>
            </a>
        </div>
    </div>

    <div class="ui column centered stackable grid">

        <!-- Upload Form -->
        <div class="ui eight wide centered column content-laporan" id="content">

            <div class="form container">
                <!-- Detail -->
                <div class="ui fluid card" id="formdetail">
                    <div class="content">
                        <form action="/report" class="ui form box" id="form-laporan" method="POST" enctype="multipart/form-data">

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
                                        <div class="item" data-value="Pelanggaran Rambu">Pelanggaran Rambu</div>
                                        <div class="item" data-value="Kelengkapan Berkendara">Kelengkapan Berkendara</div>
                                        <div class="item" data-value="Melawan Arus">Melawan Arus</div>
                                        <div class="item" data-value="Kendaraan Tidak Sesuai Standar">Kendaraan Tidak Sesuai
                                            Standar
                                        </div>
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
                                <input type="text" name="number" id="plat" placeholder="Nomor plat pelanggar">
                                <div class="ripple form" target="plat"></div>
                            </div>
                            <div class="field">
                                <label class="label form">
                                    LOKASI PELANGGARAN
                                </label>
                                <input type="text" name="location" id="lokasi" data-toggle="datepicker" placeholder="Lokasi kejadian pelanggaran">
                                <div class="ripple form" target="lokasi"></div>
                            </div>
                            <div class="field">
                                <label class="label form">
                                    GAMBAR BUKTI PELANGGARAN
                                </label>
                                <div class="ui action input">
                                    <input type="file" name="image" id="gambar" style="display: none">
                                    <input type="text" placeholder="filename" disabled id="filename">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ui fluid card">
                    <label class="ui large button next" id="buttongambar" for="gambar">
                        <i class="camera icon"></i>
                        UNGGAH GAMBAR
                    </label>
                </div>

                <div class="ui fluid card">
                    <button class="ui large button next" id="buttonbukti" type="submit">BUAT LAPORAN</button>
                </div>


                <!-- UPLOAD -->
                <div class="ui fluid card" id="formbukti">
                    <div class="ui image">
                        <img class="imgbuffer" src="">
                    </div>
                </div>

                <div class="ui mini modal type">
                    <div class="header">Tipe berkas tidak didukung</div>
                    <div class="content">
                        <p>Bukti yang dapat anda unggah hanya berupa foto dengan format</p>
                        <span class="ui blue label type">.JPG</span>
                        <span class="ui blue label type">.JPEG</span>
                        <span class="ui blue label type">.PNG</span>
                        <span class="ui blue label type">.GIF</span>
                    </div>
                </div>

                <div class="ui mini modal size">
                    <div class="header">Berkas melebihi batas maksimal</div>
                    <div class="content">
                        <p>Bukti yang dapat anda unggah maksimal berukuran 4mb</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ url('js/page/upload.js') }}"></script>

</html>