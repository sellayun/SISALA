<!DOCTYPE html>
<html>
    <head>
        <title>Arusku</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
        <link rel="stylesheet" href="/css/landing.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>

        <style>
            .uk-navbar-nav>li>a {
                text-transform: none;
            }
            .uk-button {
                text-transform: none;
            }
        </style>
    </head>
    <body>
        <nav class="uk-navbar-container uk-navbar-transparent navbarnya" uk-navbar>
            <div class="uk-navbar-left">
        
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="#" style="font-size: 30px; padding-left: 0;">
                            <span style="background-color: #458FF6; border-radius: 50%; width: 40px; height: 40px; color: white; text-align: center; margin-right: 15px;">A</span><b>Arusku</b>
                        </a>
                    </li>
                </ul>
        
            </div>
            <div class="uk-navbar-right" id="my-content">
        
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="#beranda"><b>Beranda</b></a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
        </nav>

        <div class="belakang" id="beranda">
            <div class="uk-child-width-expand@s" uk-grid>
                <div>
                    <h1 style="margin-bottom: 0;">Selamat Datang</h1>
                    <p style="margin-top: 0;">Media Digital Layanan Simulasi Arus & Level Air</p>
                    <a class="uk-button uk-button-primary" href="login" style="border-radius: 50px;">Login</a>
                    <a class="uk-button uk-button-primary" href="register" style="border-radius: 50px;">Registrasi</a>
                </div>
                <div class="uk-grid-item-match">
                    <div class="uk-card-body">
                        <img src="landing/img/Pria Belajar (1) 1.png" style="margin-top: 100px;" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="belakang">
            <div class="uk-child-width-expand@s" uk-grid>
                <div class="uk-grid-item-match">
                    <div class="uk-card-body">
                        <img src="landing/img/Layanan 1.png" alt="">
                    </div>
                </div>
                <div>
                    <h3 style="margin-bottom: 0;"><b>{{$judul}}</b></h3>
                    <p style="margin-top: 10px;">
                    {{$deskripsi}}
                    </p>
                </div>
            </div>
        </div>

        <div class="belakang" id="layanan">
            <div style="text-align: center;">
                <h3><b>Layanan Kami</b></h3>
                <hr class="uk-divider-small">
                <p style="font-size: small;" class="margin-kiri-kanan">Arusku memberikan layanan yang sebagai berikut</p>
            </div>
            <div class="uk-grid-match uk-child-width-expand@s" uk-grid>
                <div></div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body" style="background-color: #DDDDDD; border-radius: 20px;">
                        <img src="landing/img/jam.png" style="width: 30%;" alt="">
                        <h3><b>Kelola Simulasi</b></h3>
                        <p>Kelola simulasi digunakan untuk mengelola data perhitungan dan simulasi.</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body" style="background-color: #DDDDDD; border-radius: 20px;">
                        <img src="landing/img/pengaturan.png" style="width: 30%;" alt="">
                        <h3><b>Online Hitung</b></h3>
                        <p>Proses hitung dilakukan dengan bantuan Google.</p>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
        
        <!-- <div style="padding: 200px 100px 100px 100px;">
            <div style="text-align: center;">
                <h3><b>Check out our latest article</b></h3>
                <hr class="uk-divider-small" style="padding-bottom: 100px;">
            </div>
            <div class="uk-grid-match uk-child-width-1-1@s uk-child-width-1-3@m" uk-grid>
                <div>
                    <div style="border-radius: 10px;">
                        <div class="uk-card-media-top">
                            <img src="Mask Group.png" style="border-radius: 10px 10px 0 0; height: 200px; width: 100%;" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h5><b>Disease detection, check up in the laboratory</b></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <p><a href="#">Read more -></a></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="border-radius: 10px;">
                        <div class="uk-card-media-top">
                            <img src="Mask Group (1).png" style="border-radius: 10px 10px 0 0; height: 200px; width: 100%;" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h5><b>Herbal medicines that are safe for consumption</b></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <p><a href="#">Read more -></a></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="border-radius: 10px;">
                        <div class="uk-card-media-top">
                            <img src="Mask Group (2).png" style="border-radius: 10px 10px 0 0; height: 200px; width: 100%;" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h5><b>Natural care for healthy facial skin</b></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <p><a href="#">Read more -></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div style="margin-top: 100px" id="kontak">
            <div style="background-image: linear-gradient(to top, #5A98F2, #67C3F3); color: white;" class="footernya" uk-grid>
                <div class="uk-width-expand@m">
                    <a href="#" style="font-size: 30px;"><span style="background-color: white; color: #458FF6; border-radius: 50%; padding: 5px 15px; text-align: center; margin-right: 15px;">A</span><b style="color: white;">Arusku</b></a>
                    <p style="font-size: small;">Arus merupakan layanan yang mempermudah user dalam melakukan proses perhitungan yang dibantu oleh Google.</p>
                    <p>©Sela#2020. All rights reserved</p>
                </div>
                <div class="uk-width-1-5@m">
                    <ul type="none" class="kirinya">
                        <li style="padding-bottom: 10px; font-size: 20px;"><b>Kirimkan kami email</b></li>
                        <li style="font-size: smaller;"><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{$email}}">{{$email}}</a></li>
                    </ul>  
                </div>
                <div class="uk-width-1-5@m">
                    <ul type="none" class="kirinya">
                        <li style="padding-bottom: 10px; font-size: 20px;"><b>Kota</b></li>
                        <li style="font-size: smaller;">{{$kota}}</li>
                    </ul>  
                </div>
                <div class="uk-width-1-5@m">
                    <ul type="none" class="kirinya">
                        <li style="padding-bottom: 10px; font-size: 20px;"><b>Alamat</b></li>
                        <li style="font-size: smaller;">{{$alamat}}</li>
                    </ul>  
                </div>
            </div>
        </div>
    </body>
</html>