<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lapor: Cockpit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/page/index.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/semantic.css') }}" />
    <script src="{{ url('js/jquery.min.js') }}"></script>
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
            Lapor. <span>/admin</span>
        </a>
        
        <div class="right menu" id="bars">        
            <a class="item">
                <i class="bars grey large icon"></i>
            </a>
        </div>
        
        <div class="right menu" id="right-menu">
            <a class="item" href="/admin/reward/add">Users</a>
            <a class="item" href="/admin/reward/add">Create rewards</a>
            <a class="item" href="/">Home</a>
            <a href="/logout" class="item">
                <div class="ui button menubar">Keluar</div>
            </a>
        </div>
    </div>

    <div class="ui column stackable grid panel-container">

        <div class="four wide column left-panel">
            
            <div class="ui fluid card" id="user-detail">
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
                    <span class="left floated">
                        <i class="yellow lock icon"></i>
                        Admin
                    </span>
                </div>
            </div>
        </div>


        <!-- Laporan Container -->
        <div class="ten wide column laporan-container">

            <!-- laporan Panel Container of Items -->
            <div class=" laporan-panel">

                <!-- ITEMS -->
                <div class="ui divided link items" id="list-laporan">

                    @if(count($reports) == 0)
                    <div class="item">
                        <div class="content">
                            <div class="header">Laporan tidak ditemukan</div>
                            <div class="meta">
                                <p>Anda belum pernah membuat laporan silakan klik tombol dibawah ini untuk memulai!</p>
                            </div>
                            <a href="/report/create" class="ui fluid button create">BUAT LAPORAN</a>
                        </div>
                    </div>
                    @else @foreach ($reports as $report)
                    <div class="item laporan" data-laporan-id="{{ $report['id'] }}">
                        <div class="content">                            
                            <div class="header">{{ $report['violation'] }}</div>                            
                            <div class="meta">
                                <span>{{ strftime("%d %b %Y",strtotime($report->created_at))  }}</span>                                                                                            
                            </div>
                            <div class="description">
                                <p>{{ $report['description'] }}</p>
                            </div>
                            <div class="extra">
                                <span class="right floated">
                                    <i class="user icon"></i>
                                    {{ $report['name'] }}
                                </span>
                                <div class="ui mini {{ $colors[$report['report_status']] }} label">
                                    {{ $report_status[$report['report_status']] }}
                                </div>
                                <div class="ui mini label">{{ $report['number'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach @endif

                </div>
                <!-- END of ITEMS -->

            </div>
            <!-- END of Mid-panel -->

        </div>
        <!-- END of Laporan container -->


        <!-- Detail Panel -->
        <div class="five wide column detail-panel" id="detail-panel">

            <div class="ui fluid link card detail">
                <div class="content" id="back-panel">
                    <div class="right floated">
                        <div class="ui mini label" id="status-laporan"></div>
                    </div>
                    <div class="header" id="violation-laporan"></div>
                    <div class="meta">
                        <span id="created-laporan"></span>
                    </div>
                    <div class="description" id="description-laporan">
                        <p></p>
                    </div>
                </div>
                <div class="content">

                    <div class="right floated meta">
                        <i class="user icon"></i>
                        <span id="username-laporan"></span>
                    </div>
                    <div class="meta">
                        <i class="map marker icon"></i>
                        <span id="location-laporan"></span>
                    </div>
                </div>

                <form action="/admin/report" method="POST" id="form-delete">
                    {{ method_field('DELETE') }}
                    @csrf
                </form>                
                <button class="ui button back" id="delete-laporan">HAPUS</button>

            </div>
            
            <div class="ui fluid card">
                <form action="/admin/report" method="POST" id="form-update">
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" name="report_status" value="0">                                                        
                    <button class="ui fluid button back" id="update-laporan">BATAL VERIFIKASI</button>   
                </form>                                    
            </div>            

            <div class="ui fluid card">
                <div class="ui image">
                    <img src="/image/Wireframe.png" alt="" id="evidence-laporan">
                </div>
            </div>

        </div>
        <!-- END of Detail Panel -->

    </div>


</body>
<script src="{{ url('js/semantic.min.js') }}"></script>
<script src="{{ url('js/page/index.js') }}"></script>

</html>