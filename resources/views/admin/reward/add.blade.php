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
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/page/reward.add.css') }}" />
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
            Lapor./admin
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

        <div class="four wide column left-panel">

            <div class="ui fluid card" id="user-detail">
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
                        <i class="yellow lock icon"></i>                        
                        Admin
                    </span>                    
                </div>
            </div>

            <div class="ui fluid card">
                <div class="ui button create" id="open-create-reward">BUAT LAPORAN</div>
            </div>
        </div>


        <!-- Reward create Container -->
        <div class="five wide column reward-container" id="create-reward">

            <div class="reward-panel">

                <div class="ui divided items">
                    <div class="item">
                        <div class="content">
                            <div class="header">Buat reward baru</div>
                            <div class="meta">
                                <p>Silahkan isi form berikut untuk membuat reward baru</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/admin/reward/store" method="post" enctype="multipart/form-data" class="ui form" id="form-reward">
                    <div class="field">
                        @csrf
                        <div class="field">
                            <label class="label form">
                                NAMA
                            </label>
                            <input type="text" name="name" id="name" placeholder="Nama reward">
                            <div class="ripple form" target="name"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                DESKRIPSI
                            </label>
                            <input type="text" name="description" id="description" placeholder="Deskripsi reward">
                            <div class="ripple form" target="description"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                POINT
                            </label>
                            <input type="text" name="point" id="point" placeholder="Point yang dibutuhkan">
                            <div class="ripple form" target="point"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                JUMLAH
                            </label>
                            <input type="text" name="amount" id="amount" placeholder="Point yang dibutuhkan">
                            <div class="ripple form" target="amount"></div>
                        </div>
                        <div class="field">
                            <label class="label form">
                                LOGO REWARD
                            </label>
                            <div class="ui action input">
                                <input type="file" name="image" id="gambar" style="display: none">
                                <input type="text" placeholder="filename" disabled id="filename">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- End of reward create -->

            <div class="ui fluid card">
                <label class="ui right labeled icon button gambar" for="gambar">
                    <i class="camera icon"></i>
                    CARI LOGO
                </label>
            </div>

            <div class="ui fluid card">
                <button class="ui button create" id="button-reward">BUAT LAPORAN</button>
            </div>


            <!-- Image Buffer -->
            <div class="ui fluid card" id="formbukti">
                <div class="ui image">
                    <img class="imgbuffer" src="">
                </div>
            </div>

        </div>
        <!-- END of Reward container -->


        <div class="ten wide column reward-container" id="created-reward">

            <!-- reward Panel Container of Items -->
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
                            <form action="/admin/reward/delete/{{ $reward['name'] }}" method="POST" id="form-delete-reward">
                                @csrf
                                <button class="ui right floated mini button back" id="claim-reward">DELETE</button>
                            </form>
                        </div>
                    </div>
                    @endforeach @endif

                </div>
                <!-- END of ITEMS -->

            </div>
            <!-- END of Mid-panel -->
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

</body>
<script src="{{ url('js/semantic.min.js') }}"></script>
<script src="{{ url('js/page/reward.add.js') }}"></script>

</html>