<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lapor: Rewards</title>
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

    <!-- Menu bar item -->
    <div class="ui top fixed menu">
        <a class="item logo" href="/">
            Lapor.
        </a>
        <div class="right menu">
            <a class="item" href="/admin/reward/add">Reward</a>
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
                        {{ $user['name'] }}
                    </a>
                    <div class="meta">
                        <a>Malang, Jawa Timur.</a>
                    </div>
                    <div class="description">
                        <p>You have not write any description yet.</p>
                    </div>
                </div>
                <div class="extra content">
                    <span class="">
                        <i class="yellow dollar sign icon"></i>
                        {{ $user['points']}} Pts.
                    </span>
                    <span class="right floated">
                        <i class="tag icon"></i>                        
                        {{ $user['laporan']}} Laporan
                    </span>
                    <div>
                    <i class="credit card yellow icon"></i>
                        {{ count($userReward) }} Voucher
                    </div>
                </div>
            </div>
        </div>


        <!-- Laporan Container -->
        <div class="ten wide column laporan-container">

            <!-- laporan Panel Container of Items -->
            <div class=" laporan-panel">

                <!-- ITEMS -->
                <div class="ui divided items" id="list-laporan">

                    @if(count($rewards) == 0)
                    <div class="item">
                        <div class="content">
                            <div class="header">Tidak ada reward</div>
                            <div class="meta">
                                <p>Silahkan kembali lagi nanti ketika terdapat reward baru</p>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="item">
                        <div class="content">
                            <div class="header">Voucher yang tersedia</div>                            
                        </div>
                    </div>
                    
                    @foreach ($rewards as $reward)
                    <div class="item laporan" data-reward-id="{{ $reward['id'] }}">
                        <div class="ui tiny image">
                            <img src="/storage/voucher/{{ $reward['image'] }}" alt="">
                        </div>
                        <div class="content">
                            <div class="header">{{ $reward['name'] }}</div>
                            <div class="meta">
                                <span>{{ $reward['point'] }} point</span>
                            </div>
                            <div class="description">
                                <p>Voucher indomaret</p>
                            </div>
                            <form action="/reward/{{ $reward['id']}}" method="POST" id="form-reward">
                                @csrf
                                <button class="ui right floated mini button back" id="claim-reward">GET</button>
                            </form>
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

                    <div class="header" id="nama-reward"></div>
                    <div class="meta">
                        <span id="point-reward"></span>
                    </div>                    

                </div>                                

            </div>
        
            <div class="ui fluid card">
                <div class="ui image">
                    <img src="/image/Wireframe.png" alt="" id="image-reward">
                </div>
            </div>

        </div>
        <!-- END of Detail Panel -->

    </div>


</body>
<script src="{{ url('js/semantic.min.js') }}"></script>
<script src="{{ url('js/page/reward.js') }}"></script>

</html>