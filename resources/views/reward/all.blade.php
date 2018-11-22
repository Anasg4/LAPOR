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
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/page/reward.css') }}" />
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
            <a href="/logout" class="item">
                <div class="ui button menubar">Keluar</div>
            </a>
        </div>
    </div>

    <div class="ui column stackable grid panel-container">
        <div class="four wide column left-panel" id="user-detail">
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
        <div class="ten wide column reward-container">

            @if(count($userReward) > 0)
            <div class="ui four stackable cards">

                @foreach($userReward as $reward)
                <div class="ui link card user reward" data-reward-id="{{ $reward['redeem_code'] }}">
                    <div class="image">
                        <img src="/storage/voucher/{{ $reward['image'] }}" alt="">
                    </div>
                    <div class="content">
                        <p>
                            {{$reward['name']}}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
            @endif

            <!-- laporan Panel Container of Items -->
            <div class="reward-panel">

                <!-- Available Rewards -->
                <div class="ui divided items" id="list-reward">

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
                    <div class="item reward" data-reward-id="{{ $reward['id'] }}">
                        <div class="ui tiny image">
                            <img src="/storage/voucher/{{ $reward['image'] }}" alt="">
                        </div>
                        <div class="content">
                            <div class="header">{{ $reward['name'] }}</div>
                            <div class="meta">
                                <span>{{ $reward['point'] }} point</span>
                            </div>
                            <div class="description">
                                <p>{{ $reward['description']}}</p>
                            </div>
                            <form action="/reward/{{ $reward['id']}}" method="POST" id="form-reward">
                                @csrf
                                <button class="ui right floated mini button back" id="claim-reward">CLAIM</button>
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

    </div>

    <div class="ui mini modal">
        <div class="header" id="reward-title"></div>
        <div class="content">
            <div class="ui fluid action input">
                <input type="text" value="http://ww.short.url/c0opq" readonly id='reward-code'>
                <button class="ui teal right labeled icon button copy" id="button-copy">
                    <i class="copy icon"></i>
                    Copy
                </button>
            </div>
            <div class="ui positive message transition hidden copy">
                <i class="close icon"></i>
                <div class="header">
                    Berhasil disalin!
                </div>
                <p>Silahkan gunakan kode untuk pembayaran sesuai voucher</p>
            </div>
        </div>

    </div>


</body>
<script src="{{ url('js/semantic.min.js') }}"></script>
<script src="{{ url('js/page/reward.js') }}"></script>

</html>