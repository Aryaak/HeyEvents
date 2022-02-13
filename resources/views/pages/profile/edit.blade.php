@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <section class="mx-auto flex flex-col md:flex-row gap-y-5 justify-between  items-center relative ml-20">
        <div class="flex justify-start gap-x-1  md:gap-x-3 items-center relative  text-sm md:text-base">
            <span class="text-grey">{{$user->name}}</span>
            <span class="text-grey font-semibold mt-1">
                <img src="{{asset('img/ic_right2.svg')}}">
            </span>
            <span class="text-prime font-semibold">Edit Profil</span>
        </div>
        @if (Auth::user()->status_id == 3)
        <a href="{{route('profile.verification')}}" class="btn-primary">Ajukan Verifikasi</a>
        @endif
        @if (Auth::user()->status_id == 2)
        <button class="link-secondary">Menunggu Verifikasi</button>
        @endif
    </section>

    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data" >

    <section class="flex flex-col mx-auto text-center md:mt-16 mt-10 items-center w-max ">
        <h3 class="text-black font-bold text-3xl">Edit Profil</h3>
        <p class="text-grey text-lg mt-2">Atur data pribadi dan representasikan diri</p>
        @error('photo')
        <span class="text-red-600 italic text-xs">{{$message}}</span>
        @enderror
        <div class="mt-10 flex items-center gap-x-5">
            <img id="preview" src="{{asset('storage/' . $user->photo)}}" width="90" height="90">
          
            <div class="relative">
                <input onchange="show()" id="input_file" type="file" name="photo" class="absolute left-0 opacity-0 cursor-pointer">
                <button id="btn_file" class="btn-primary z-50">Upload Foto</button>
            </div>
        </div>
        <div class="mt-10 text-left w-full">
            @csrf
            @method('PUT')
            <div class="flex flex-col mb-5">
                <label for="name" class="text-prime font-semibold text-xl">Nama</label>
                @error('name')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input value="{{old('name') ?old('name') : $user->name }}" type="text" name="name" id="name" class="form-control mt-2"
                    placeholder="Nama lengkap atau nama instansi dsb">
            </div>
            <div class="flex flex-col mb-5">
                <label for="bio" class="text-prime font-semibold text-xl">Bio</label>
                @error('bio')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input value="{{old('bio') ?old('bio') : $user->bio }}" type="text" name="bio" id="bio" class="form-control mt-2"
                    placeholder="Pekerjaan, status, atau instansi tentang apa">
            </div>
            <div class="flex flex-col mb-5">
                <label for="address" class="text-prime font-semibold text-xl">Lokasi</label>
                @error('address')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input value="{{old('address') ?old('address') : $user->address }}" type="text" name="address" id="address" class="form-control mt-2"
                    placeholder="Kota tinggal">
            </div>

            <button class="btn-primary mt-10">Simpan</button>
        </div>
        </form>
    </section>
</main>
@endsection

@push('js')
<script>
document.getElementById('btn_file').addEventListener('click', () => {
    document.getElementById('input_file').click()
})

function show (){
    console.log('OK')
    let preview  = URL.createObjectURL(document.getElementById('input_file').files[0])
    document.getElementById('preview').src = preview
}


</script>
@endpush