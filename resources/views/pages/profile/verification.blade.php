<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="{{asset('img/logo.svg')}}" rel="shortcut icon" type="text/css" >
    <title>HeyEvents!</title>
</head>

<body>
    <!-- Navigation -->
    <div class="w-full bg-prime py-5 drop-shadow-lg">
        <div x-data="{ open: false, nav_open: false }"
            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="index.html" class="flex">
                    <img src="{{asset('img/logo-2.svg')}} " class="mr-3">
                    <p href="#" class="font-bold text-white text-2xl">HeyEvents!</p>
                </a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="#312B78" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}"
                class="flex-col justify-start  hidden md:flex md:justify-end md:flex-row mt-6 md:mt-0 mb-6 md:mb-0">
                <a href="{{route('home')}}" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Home</a>
                <a href="{{route('event.search')}}" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Cari Event</a>
                <a href="{{route('event.create')}}" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Buat Event</a>
                <a href="{{route('event.joined')}}" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Tergabung</a>
                <a href="{{route('event.manage')}}" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Kelola</a>
              
            </nav>
            <div :class="{'flex': open, 'hidden': !open}"
                class=" hidden  px-5 md:flex md:justify-end md:flex-row md:pl-14 items-center md:border-l-2 border-ghost z-50">
                <p class="text-white font-semibold text-xl mr-3 order-2 md:order-1">{{$user->name}}</p>
                <img src="{{asset('storage/' . $user->photo)}} " width="44" class="mr-3 order-1 md:order-2">
                <div class="relative order-3 cursor-pointer group br-prime " @click="nav_open = !nav_open">
                    <img src="{{asset('img/drop-down-2.svg')}} " width="24">
                    <div :class="{'flex transition ease-in-out duration-500': nav_open, 'hidden': !nav_open}"
                        class="hidden bg-white absolute p-5 -bottom-40 -right-16 shadow-md  flex-col justify-center ">
                        <a href="{{route('profile')}}" class="mg-5 btn-primary">Profile</a>
                        <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="mt-5 btn-secondary">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Navigation -->

    <!-- header -->
    <div
        class="bg-prime relative contentmax-w-screen-xl px-4 mx-auto md:items-center md:justify-center md:flex-row md:px-8 lg:px-8 py-5 pt-16">
        <div class="flex justify-center">
            <div class="md:w-2/5 w-42 flex justify-center">
                <h1 class="text-white md:text-4xl text-2xl font-bold text-center">Akun Terverifikasi, Dapatkan Kendali
                    Lebih</h1>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex flex-row justify-center mt-10">
                <img src="{{asset('img/Group 104.svg')}} " class="md:w-96 w-36">
                <img src="{{asset('img/Group 105.svg')}} " class="md:w-96 w-32">
                <img src="{{asset('img/Group 106.svg')}} " class="md:w-96 w-32">
            </div>
        </div>
    </div>
    <!-- end header -->

    <main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
        <form action="{{route('profile.verification.send')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class=" mt-20 text-center">
                <h3 class="text-black font-bold text-3xl">Verifikasi Akunmu Sekarang</h3>
                <p class="text-grey mt-3">Upload dokumen identitas pribadi atau organisasi perusahaan untuk verifikasi
                </p>

                @error('document')
                <span class="text-red-600 italic text-xs text-center">{{$message}}</span>
                @enderror
            </div>

          
            <div id="drop_zone" class="border-1 border-prime mt-10 border-dashed py-28  relative md:w-8/12 mx-auto">
                <div id="btn_file_pick"
                    class="  absolute top-0 bottom-0 left-0 right-0 flex justify-center items-center p-3">
                    <!-- <div class="absolute">
                        <p id="file_info">Nama file: asdas</p>
                    </div> -->
                    <img src="" id="gambar" style="height: 100%; ">
                </div>
                <div id="upload_info" class="flex justify-center items-center flex-col">
                    <img src="{{asset('img/ic_image.svg')}}">
                    <p class="text-prime mt-10">Drag and drop dokumen di kotak ini. Atau <span
                            class="font-bold">upload</span></p>
                    <p class="text-grey mt-3">*file harus dalam format jpg, jpeg, png, dpf</p>
                    <!-- <p><button type="button" id="" class="btn btn-primary"><span
                                class="glyphicon glyphicon-folder-open"></span> Select File</button></p> -->
                    <input name="document" type="file" id="selectfile" class="opacity-0">
                    <p id="message_info"></p>
                </div>


            </div>

            <div class="image">
            </div>

            <button type="submit" class="btn-primary mt-5 mx-auto">Ajukan Verifikasi</button>

            </form>
    </main>

    <footer class="text-center py-10 px-4 md:px-6">
        <p class="text-grey font-semibold">© 2022 HeyEvents! by Ampersand Team. All Rights Reserved.</p>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>

    <script>

        if (!document.getElementById('selectfile')) {
            document.getElementById('gambar').style.display = 'none';
            document.getElementById('upload_info').style.opacity = 1;
        }
        var fileobj;
        $(document).ready(function () {
            $("#drop_zone").on("dragover", function (event) {
                event.preventDefault();
                event.stopPropagation();
                return false;
            });
            $("#drop_zone").on("drop", function (event) {
                event.preventDefault();
                event.stopPropagation();
                fileobj = event.originalEvent.dataTransfer.files[0];
                gambar(event.originalEvent.dataTransfer);
                var fname = fileobj.name;
                var fsize = fileobj.size;
                if (fname.length > 0) {
                    document.getElementById('file_info').innerHTML = "Nama file : " + fname +
                        ' <br>Ukuran file : ' + bytesToSize(fsize);
                }
                document.getElementById('selectfile').files[0] = fileobj;
                // document.getElementById('btn_upload').style.display = "inline";
            });



            function gambar(a) {
                console.log('IMGAE', a.files)
                if (a.files && a.files[0]) {
                    if (document.getElementById('selectfile').files[0]) {
                        document.getElementById('upload_info').style.opacity = 0;
                        document.getElementById('gambar').style.display = 'block';
                    }
                    // let preview  = URL.createObjectURL(document.getElementById('selectfile').files[0])
                    //     document.getElementById('gambar').src = preview;
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('gambar').src = e.target.result;
                    }
                    reader.readAsDataURL(a.files[0]);
                }

            }
            $('#selectfile').change(function () {
                gambar(document.getElementById('selectfile'));
            });

            $('#btn_file_pick').click(function () {
                /*normal file pick*/
                gambar(document.getElementById('selectfile'));
                document.getElementById('selectfile').click();
                document.getElementById('selectfile').onchange = function () {
                    fileobj = document.getElementById('selectfile').files[0];
                    var fname = fileobj.name;
                    var fsize = fileobj.size;
                    if (fname.length > 0) {
                        document.getElementById('file_info').innerHTML = "Nama file : " + fname +
                            ' <br>Ukuran File : ' + bytesToSize(fsize);
                    }
                    // document.getElementById('btn_upload').style.display = "inline";
                };
            });
            $('#btn_upload').click(function () {
                if (fileobj == "" || fileobj == null) {
                    alert("Please select a file");
                    return false;
                } else {
                    ajax_file_upload(fileobj);
                }
            });
        });

        function ajax_file_upload(file_obj) {
            if (file_obj != undefined) {
                var form_data = new FormData();
                form_data.append('upload_file', file_obj);
                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    beforeSend: function (response) {
                        $('#message_info').html("Uploading your file, please wait...");
                    },
                    success: function (response) {
                        $('#message_info').html(response);
                        alert(response);
                        $('#selectfile').val('');
                    }
                });
            }
        }

        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
    </script>
</body>

</html>