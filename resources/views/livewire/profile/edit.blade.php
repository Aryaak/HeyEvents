
    <main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
        <section class="mx-auto flex flex-col md:flex-row gap-y-5 justify-between  items-center relative">
            <div class="flex justify-start gap-x-1  md:gap-x-3 items-center relative  text-sm md:text-base">
                <span class="text-grey">Jordan Frisay Himawan</span>
                <span class="text-grey font-semibold mt-1">
                    <img src="./img/ic_right2.svg">
                </span>
                <span class="text-prime font-semibold">Edit Profil</span>
            </div>
            <button class="btn-primary">Ajukan Verifikkasi</button>
        </section>

        <section class="flex flex-col mx-auto text-center md:mt-16 mt-10 items-center w-max ">
            <h3 class="text-black font-bold text-3xl">Edit Profil</h3>
            <p class="text-grey text-lg mt-2">Atur data pribadi dan representasikan diri</p>
            <div class="mt-10 flex items-center gap-x-5">
                <img src="./img/4.jpg" width="90" height="90">
                <button class="btn-primary">Upload Foto</button>
                <button class="btn-secondary">Hapus</button>
            </div>

            <form action="" class="mt-10 text-left w-full">
                <div class="flex flex-col mb-5">
                    <label for="title" class="text-prime font-semibold text-xl">Nama</label>
                    <input type="text" name="title" id="title" class="form-control mt-2"
                        placeholder="Nama lengkap atau nama instansi dsb">
                </div>
                <div class="flex flex-col mb-5">
                    <label for="title" class="text-prime font-semibold text-xl">Bio</label>
                    <input type="text" name="title" id="title" class="form-control mt-2"
                        placeholder="Pekerjaan, status, atau instansi tentang apa">
                </div>
                <div class="flex flex-col mb-5">
                    <label for="title" class="text-prime font-semibold text-xl">Lokasi</label>
                    <input type="text" name="title" id="title" class="form-control mt-2"
                        placeholder="Kota tinggal">
                </div>

                <button class="btn-primary mt-10">Simpan</button>
            </form>
        </section>
    </main>