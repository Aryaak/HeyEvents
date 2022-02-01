@section('title', 'Buat Event')

@extends('layouts.app')

@section('content')
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <section id="step1">
        <div class="flex justify-between">
            <a href="index.html" class="btn-secondary">Batal</a>
            <button onclick="next()" class="btn-primary">Selanjutnya</button>
        </div>

        <div class=" mt-20 text-center">
            <h3 class="text-black font-bold text-3xl">Berencana Mengadakan Event?</h3>
            <p class="text-grey mt-3">Upload foto event kamu. Foto juga akan digunakan sebagai thumbnail.</p>
        </div>

        <div id="drop_zone" class="border-1 cursor-pointer border-prime mt-10 border-dashed py-28  relative md:w-8/12 mx-auto">
            <div id="btn_file_pick"
                class="  absolute top-0 bottom-0 left-0 right-0 flex justify-center items-center p-3">
                <!-- <div class="absolute">
                    <p id="file_info">Nama file: asdas</p>
                </div> -->
                <img src="" id="gambar" style="height: 100%; ">
            </div>
            <div id="upload_info" class="flex justify-center items-center flex-col">
                <img src="./img/ic_image.svg">
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

@endsection