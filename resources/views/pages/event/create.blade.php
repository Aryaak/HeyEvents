@section('title', 'Buat Event')

@extends('layouts.app')

@section('content')
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <section id="step1">
        <div class="flex justify-between">
            <a href="{{route('home')}}" class="btn-secondary">Batal</a>
            <a onclick="next()" class="btn-primary">Selanjutnya</a>
        </div>
        
        <div class=" mt-20 text-center">
            <h3 class="text-black font-bold text-3xl">Berencana Mengadakan Event?</h3>
            <p class="text-grey mt-3">Upload foto event kamu. Foto juga akan digunakan sebagai thumbnail.</p>
            @error('photo')
            <span class="text-red-600 italic text-xs text-center">{{$message}}</span>
            @enderror
        </div>

     
        <div id="drop_zone" class="border-1 cursor-pointer border-prime mt-10 border-dashed py-28  relative md:w-8/12 mx-auto">
      
            <div id="btn_file_pick"
                class="  absolute top-0 bottom-0 left-0 right-0 flex justify-center items-center p-3">
                <!-- <div class="absolute">
                    <p id="file_info">Nama file: asdas</p>
                </div> -->
                <img src="" id="gambar" style="height: 100%; ">
            </div>
            <div id="upload_info" class="upload flex justify-center items-center flex-col px-5 md:px-0">
                <img src="{{asset('img/ic_image.svg')}}">
                <p class="text-prime mt-10 text-sm md:text-base">Drag and drop foto event di kotak ini. Atau <span
                        class="font-bold">upload</span></p>
                <p class="text-grey mt-3">*file harus dalam format jpg, jpeg, png, orientasi lanskap, dan berukuran maks 1 MB</p>
                <!-- <p><button type="button" id="" class="btn btn-primary"><span
                            class="glyphicon glyphicon-folder-open"></span> Select File</button></p> -->
                <input type="file" id="selectfile" name="photo" class="opacity-0">
                <p id="message_info"></p>
            </div>

        </div>

        <div class="image">
        </div>

    </section>

    <section id="step2" class="hidden">
        <div class="flex justify-between">
            <a onclick="back()" class="btn-secondary">Kembali</a>
            {{-- <button type="submit" class="btn-primary">Buat</button> --}}
        </div>

        <div class=" mt-20 text-center">
            <h3 class="text-black font-bold text-3xl">Detail Event</h3>
        </div>

        <div  class="mt-10 md:w-5/12 mx-auto">

            <div class="flex flex-col mb-5">
                <label for="name" class="text-prime font-semibold text-xl">Nama Event</label>
                @error('name')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control mt-2"
                    placeholder="Judul utama eventmu">
            </div>

            <div class="flex flex-col mb-5">
                <label for="description" class="text-prime font-semibold text-xl mb-2">Deskripsi</label>
                @error('description')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <textarea id="description" class="form-control " name="description" id="description" cols="30"
                    rows="10">{{old('description')}}</textarea>
            </div>

            <div class="flex flex-col mb-5">
                <label  class="text-prime font-semibold text-xl">Pengadaan</label>
                <div class="mt-2 flex">
                    <div class="flex items-center mr-4 mb-4">
                        <input @if (old('category_id') == 1)
                        checked
                    @endif  name="category_id" id="onsite" value="1" type="radio" class="hidden" checked />
                        <label for="onsite" class="flex items-center cursor-pointer text-lg text-grey">
                            <span
                                class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                            Onsite</label>
                    </div>
                    <div class="flex items-center mr-4 mb-4">
                        <input @if (old('category_id') == 2)
                        checked
                    @endif  name="category_id" id="online" value="2" type="radio" class="hidden" />
                        <label for="online" class="flex items-center cursor-pointer text-lg text-grey">
                            <span
                                class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                            Online</label>
                    </div>
                </div>
                @error('address')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input  value="{{old('address')}}" type="text" name="address" id="address" class="form-control mt-2"
                    placeholder="Lokasi event atau link video conference">
            </div>

            <div class="flex flex-col mb-5  relative">
                <label for="date" class="text-prime font-semibold text-xl">Jadwal</label>
                @error('date')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <div class="form-control relative mt-2">
                    <!-- <div class="bg-prime absolute bottom-0 right-0 h-full px-4 flex justify-center">
                        <img src="./img/ic_calendar2.svg" width="16">
                    </div> -->
                    <input value="{{old('date')}}"  type="date" name="date" id="date" class="w-full outline-none">
                </div>
            </div>

            <div class="flex flex-col mb-5  relative">
                <label for="quota" class="text-prime font-semibold text-xl">Jumlah Peserta</label>
                @error('quota')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <div class="form-control relative mt-2">
                    <p class="text-prime absolute right-0 bg-white pr-4">Peserta</p>
                    <input value="{{old('quota')}}" type="number" name="quota" id="quota" min="0"
                        class="w-full outline-none" value="0">
                </div>
            </div>

            <div class="flex flex-col mb-5">
                <label for="description" class="text-prime font-semibold text-xl">Akses</label>
                <div class="mt-2 flex">
                    <div class="flex items-center mr-4 mb-4">
                        <input @if (old('status_id') == 1)
                        checked
                    @endif onchange="changeAccess()" name="status_id" value="1" id="paid" type="radio" class="hidden"
                            checked />
                        <label for="paid" class="flex items-center cursor-pointer text-lg text-grey">
                            <span
                                class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                            Berbayar</label>
                    </div>
                    <div class="flex items-center mr-4 mb-4">
                        <input @if (old('status_id') == 2)
                            checked
                        @endif onchange="changeAccess()" name="status_id" value="2" id="free" type="radio" class="hidden" />
                        <label for="free" class="flex items-center cursor-pointer text-lg text-grey">
                            <span
                                class="w-8 h-8 inline-block mr-2 rounded-full border bg-smoke flex-no-shrink"></span>
                            Gratis</label>
                    </div>
                </div>
                <div id="price-group" class="flex flex-col">
                    @error('price')
                    <span class="text-red-600 italic text-xs">{{$message}}</span>
                    @enderror
                    <input value="{{old('price')}}" type="number" name="price" id="price" class="form-control mt-2 w-full" placeholder="Harga tiket"
                        min="0">
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="btn-primary w-full">Buat</button>
            </div>
        </div>
       
    </section>
</form>
</main>
@endsection

@push('js')
<script>
    CKEDITOR.replace('description');

    const changeAccess = () => {
        if(document.getElementById('free').checked){
            document.getElementById('price-group').style.display = 'none'
        } else {
            document.getElementById('price-group').style.display = 'block'
        }
    }

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
@endpush