<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lapor: Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/page/index.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/semantic.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/anime.min.js"></script>
</head>

<body class="background">

    <!-- Menu bar item -->
    <div class="ui top fixed menu">
        <a class="item logo" href="/home">
            Lapor.
        </a>
        <div class="right menu">
            <a class="item" href="#">Bantuan</a>
            <a class="item" href="#">Tentang</a>
            <a href="/logout" class="item">
                <div class="ui button menubar">Keluar</div>
            </a>
        </div>
    </div>

    <div class="ui column stackable grid panel-container">
        <div class="four wide column left-panel">
            <div class="ui fluid card">
                <div class="image">
                    <img src="/image/matthew.png">
                </div>
                <div class="content">
                    <a class="header">
                        {{ $userData['name'] }}
                    </a>
                    <div class="meta">
                        <a>Malang, Jawa Timur.</a>
                    </div>
                    <div class="description">
                        <p>You have not write any description yet.</p>
                    </div>
                </div>
                <div class="extra content">
                    <span class="left floated star">
                        <i class="yellow dollar sign icon"></i>
                        2300 Pts.
                    </span>
                    <span class="right floated star">
                        <i class="tag icon"></i>
                        23 Laporan
                    </span>
                </div>
            </div>
            <a href="/report/create" class="ui fluid button create">BUAT LAPORAN</a>
        </div>


        <!-- Laporan Container -->
        <div class="ten wide column laporan-container">

            <!-- laporan Panel Container of Items -->
            <div class=" laporan-panel">

                <!-- ITEMS -->
                <div class="ui divided link items" id="list-laporan">
                    <div class="item laporan" data-laporan-id="1">
                        <div class="content">
                            <div class="header">Kelengkapan Berkendara</div>
                            <div class="meta">
                                <span>2 Minggu lalu</span>
                            </div>
                            <div class="description">
                                <p>Kejadian berlangsung disekitar perempatan Jl. Bromo, pengguna tidak menggunakan helm saat
                                    berkendara
                                </p>
                            </div>
                            <div class="extra">
                                <div class="ui mini label">N 2291 KM</div>
                                <div class="ui mini red label">Ditolak</div>
                            </div>
                        </div>
                    </div>

                    @foreach ($reports as $report)
                    <div class="item laporan" data-laporan-id="{{ $report['id'] }}">
                        <div class="content">
                            <div class="header">{{ $report['violation'] }}</div>
                            <div class="meta">
                                <span>{{  strftime("%d %b %Y",strtotime($report->created_at)) }}</span>
                            </div>
                            <div class="description">
                                <p>{{ $report['description'] }}</p>
                            </div>
                            <div class="extra">
                                <div class="ui mini label">{{ $report['number'] }}</div>
                                
                                <div class="ui mini {{ $colors[$report['report_status']] }} label">
                                    {{ $report_status[$report['report_status']] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- END of ITEMS -->

            </div>
            <!-- END of Mid-panel -->

        </div>
        <!-- END of Laporan container -->


        <!-- Detail Panel -->
        <div class="five wide column detail-panel" id="detail-panel">

            <div class="ui fluid link card detail">
                <div class="content">
                    <div class="right floated">
                        <div class="ui yellow mini label">Proses Verifikasi</div>
                    </div>
                    <div class="header">Kelengkapan Berkendara</div>
                    <div class="meta">
                        <span>2 Minggu lalu</span>
                    </div>
                    <div class="description">
                        <p>Kejadian berlangsung disekitar perempatan Jl. Bromo, pengguna tidak menggunakan helm saat berkendara
                        </p>
                    </div>
                </div>
                <div class="content">

                    <div class="right floated meta">
                        <i class="yellow dollar sign icon"></i>
                        200 Pts.
                    </div>
                    <div class="meta">
                        <i class="user icon"></i>
                        Bambank
                    </div>
                    <div class="meta">
                        <i class="map marker icon"></i>
                        Malang, Jawa Timur
                    </div>
                </div>
                <div class="ui button back">HAPUS</div>
            </div>

            <div class="ui fluid card">
                <div class="ui image">
                    <img src="./res/Wireframe.png" alt="">
                </div>
            </div>

        </div>
        <!-- END of Detail Panel -->

    </div>


</body>
<script src="js/semantic.min.js"></script>
<script src="js/page/index.js"></script>

</html>