<!DOCTYPE html>
<html>
    <head>
        <title>Arusku - Change Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>

        <style>
        .margin-kiri-kanan {
            margin: 70px 200px;
        }
        .padding-kiri-kanan {
            padding: 50px 275px 50px;
        }
        @media screen and (max-width:750px){
            #my-content { display: none; }
            .margin-kiri-kanan {
                margin: 100px 20px;
            }
            .padding-kiri-kanan {
                padding: 10px;
            }
        }
        </style>
    </head>
    <body>
        <!-- <div style="background-color: blue; width: 100%; height: 100vh; position: relative;">
            <div style="background-color: black; width: 100px; height: position: absolute; 100px;-ms-transform: translateY(50%); transform: translateY(50%);">
            </div>
        </div> -->
        <div style="background-color: #112D54; width: 100%; height: 100vh; position: absolute;">
            <div class="uk-card uk-card-default margin-kiri-kanan" style="border-radius: 10px;">
                <div class="uk-grid-collapse uk-child-width-1-1@s uk-child-width-1-1@s" uk-grid>
                    <div class="padding-kiri-kanan">
                        <h3 class="uk-text-center"><b>Change Password</b></h3>
                        <p class="uk-text-center" style="margin-bottom: 0;">Sudah punya akun? <a href="/login">Login disini</a></p>
                        <p class="uk-text-center" style="margin-top: 0;">Atau belum punya akun? <a href="/register">Register disini</a></p>
                            @if(session()->has('sukses'))
                            <div class="uk-alert-success" style="border-radius: 5px" uk-alert>
                              <p class="uk-text-center">{{ session()->get('sukses') }}</p>
                            </div>
                            @elseif(session()->has('gagal'))
                            <div class="uk-alert-danger" style="border-radius: 5px" uk-alert>
                              <p class="uk-text-center">{{ session()->get('gagal') }}</p>
                            </div>
                            @endif
                        <form action="/changepassword/aksi" method="POST">
                            {{ csrf_field() }}
                            <fieldset class="uk-fieldset">
                                <input class="uk-input" name="id" style="border-radius: 5px;" type="hidden" value="{{ $id }}">
                                <div class="uk-margin">
                                    <label style="text-align: left;">Password Baru</label>
                                    <input class="uk-input" name="password" style="border-radius: 5px;" type="password" required="">
                                </div>
                                <div class="uk-margin">
                                    <label style="text-align: left;">Re-Type</label>
                                    <input class="uk-input" name="konfirmasipassword" style="border-radius: 5px;" type="password" required="">
                                </div>
                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary" style="width: 100%; border-radius: 5px; text-transform: none;">Update</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>