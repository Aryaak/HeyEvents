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
                <a href="index.html" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Home</a>
                <a href="search.html" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Cari Event</a>
                <a href="create.html" class="text-white font-bold nav-active  px-5 mb-4 md:mb-0">Buat Event</a>
                <a href="joined.html" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Tergabung</a>
                <a href="manage.html" class="text-white px-5 hover:text-prime mb-4 md:mb-0">Kelola</a>
                <!-- <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="#">Contact</a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Dropdown</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Link #1</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Link #2</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Link #3</a>
                        </div>
                    </div>
                </div> -->
            </nav>
            <div :class="{'flex': open, 'hidden': !open}"
                class=" hidden  px-5 md:flex md:justify-end md:flex-row md:pl-14 items-center md:border-l-2 border-ghost z-30">
                <p class="text-white font-semibold text-xl mr-3 order-2 md:order-1">{{$user->name}}</p>
                <img src="{{asset('img/3.jpg')}} " width="44" class="mr-3 order-1 md:order-2">
                <div class="relative order-3 cursor-pointer group br-prime " @click="nav_open = !nav_open">
                    <img src="{{asset('img/drop-down-2.svg')}} " width="24">
                    <div :class="{'flex transition ease-in-out duration-500': nav_open, 'hidden': !nav_open}"
                        class="hidden bg-white absolute p-5 -bottom-40 -right-16 shadow-md  flex-col justify-center ">
                        <a href="profile.html" class="mg-5 btn-primary">Profile</a>
                        <a class="mt-5 btn-secondary">Keluar</a>
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
        <section id="step1">

            <div class=" mt-20 text-center">
                <h3 class="text-black font-bold text-3xl">Verifikasi Akunmu Sekarang</h3>
                <p class="text-grey mt-3">Upload dokumen identitas pribadi atau organisasi perusahaan untuk verifikasi
                </p>
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
                    <img src="./img/drop-down-2.svg">
                    <p class="text-prime mt-10">Drag and drop foto event di kotak ini. Atau <span
                            class="font-bold">upload</span></p>
                    <p class="text-grey mt-3">*file harus dalam format jpg, jpeg, png</p>
                    <!-- <p><button type="button" id="" class="btn btn-primary"><span
                                class="glyphicon glyphicon-folder-open"></span> Select File</button></p> -->
                    <input type="file" id="selectfile" class="opacity-0">
                    <p id="message_info"></p>
                </div>

            </div>

            <div class="image">
            </div>

        </section>

        <section id="step2" class="hidden">
            <div class="flex justify-between">
                <button onclick="back()" class="btn-secondary">Kembali</button>
                <button class="btn-primary">Buat</button>
            </div>

            <div class=" mt-20 text-center">
                <h3 class="text-black font-bold text-3xl">Detail Event</h3>
            </div>

            <form action="" class="mt-10 md:w-5/12 mx-auto">

                <div class="flex flex-col mb-5">
                    <label for="title" class="text-prime font-semibold text-xl">Nama Event</label>
                    <input type="text" name="title" id="title" class="form-control mt-2"
                        placeholder="Judul utama eventmu">
                </div>

                <div class="flex flex-col mb-5">
                    <label for="description" class="text-prime font-semibold text-xl mb-2">Deskripsi</label>
                    <textarea id="description" class="form-control " name="description" id="description" cols="30"
                        rows="10"></textarea>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="description" class="text-prime font-semibold text-xl">Pengadaan</label>
                    <div class="mt-2 flex">
                        <div class="flex items-center mr-4 mb-4">
                            <input name="procurement" id="onsite" type="radio" class="hidden" checked />
                            <label for="onsite" class="flex items-center cursor-pointer text-lg text-grey">
                                <span
                                    class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                Onsite</label>
                        </div>
                        <div class="flex items-center mr-4 mb-4">
                            <input name="procurement" id="online" type="radio" class="hidden" />
                            <label for="online" class="flex items-center cursor-pointer text-lg text-grey">
                                <span
                                    class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                Online</label>
                        </div>
                    </div>
                    <input type="text" name="info" id="info" class="form-control mt-2"
                        placeholder="Lokasi event atau link video conference">
                </div>

                <div class="flex flex-col mb-5  relative">
                    <label for="date" class="text-prime font-semibold text-xl">Jadwal</label>
                    <div class="form-control relative mt-2">
                        <!-- <div class="bg-prime absolute bottom-0 right-0 h-full px-4 flex justify-center">
                            <img src="./img/ic_calendar2.svg" width="16">
                        </div> -->
                        <input autofocus="true" type="date" name="date" id="date" class="w-full outline-none">
                    </div>
                </div>

                <div class="flex flex-col mb-5  relative">
                    <label for="quota" class="text-prime font-semibold text-xl">Jumlah Peserta</label>
                    <div class="form-control relative mt-2">
                        <p class="text-prime absolute right-0 bg-white pr-4">Peserta</p>
                        <input autofocus="true" type="number" name="quota" id="quota" min="0"
                            class="w-full outline-none" value="0">
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="description" class="text-prime font-semibold text-xl">Akses</label>
                    <div class="mt-2 flex">
                        <div class="flex items-center mr-4 mb-4">
                            <input onchange="changeAccess()" name="access" id="paid" type="radio" class="hidden"
                                checked />
                            <label for="paid" class="flex items-center cursor-pointer text-lg text-grey">
                                <span
                                    class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                Berbayar</label>
                        </div>
                        <div class="flex items-center mr-4 mb-4">
                            <input onchange="changeAccess()" name="access" id="free" type="radio" class="hidden" />
                            <label for="free" class="flex items-center cursor-pointer text-lg text-grey">
                                <span
                                    class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                                Gratis</label>
                        </div>
                    </div>
                    <input type="number" name="price" id="price" class="form-control mt-2" placeholder="Harga tiket"
                        min="0">
                </div>
            </form>
        </section>
    </main>

    <footer class="text-center py-10 px-4 md:px-6">
        <p class="text-grey font-semibold">© 2022 HeyEvents! by Ampersand Team. All Rights Reserved.</p>
    </footer>

    <script>
    </script>

    <script>
        CKEDITOR.replace('description');

        const next = () => {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        }

        const back = () => {
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
        }

        var x = document.getElementById("date").autofocus;
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