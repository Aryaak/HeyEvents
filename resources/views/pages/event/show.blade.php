@section('title', 'Lihat Event')

@extends('layouts.app')

@section('content')
<main class="py-16  max-w-screen-xl mx-auto px-4 md:px-6">
    <div class="flex justify-start gap-x-1  md:gap-x-3 items-center relative  text-sm md:text-base ml-20">
        <span class="text-grey">Cari Event</span>
        <span class="text-grey font-semibold mt-1">
            <img src="{{asset('img/ic_right2.svg')}}">
        </span>
        <span class="text-prime font-semibold">{{$event->name}}</span>
    </div>

    <div class="flex justify-center mt-12 items-center">
        <a href="{{route('profile', $event->user->slug)}}" class="flex justify-center  items-center">
            <div>
                <img src="{{asset('storage/' . $event->user->photo)}}" width="53" height="53">
            </div>
            <div class="text-start px-4 flex flex-col justify-center">
                <div class="flex mb-3">
                    <p class="font-semibold text-prime mr-3">{{$event->user->name}}</p>
                    @if ($event->user->status_id == 1)
                        <img src="{{asset('img/check.svg')}}" >
                    @endif
                </div>
                <p class="text-grey">{{$event->user->bio ? $event->user->bio : 'Bio belum di set'}}</p>
            </div>
        </a>
        <div class="ml-36">
            @auth
                @if ($event->user_id == Auth::user()->id)
                <button class="link-secondary">Sedang Berlangsung</button>
                @else
                @if ($event->is_joined)
                <form action="{{route('event.leave')}}" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn-secondary md:ml-8">Keluar</button>
                </form>
                @elseif($event->is_pending)
                <button class="link-secondary">Proses Verifikasi</button>
                @else
                @if ($event->status_id == 1)
                <button class="btn-primary md:ml-8" id="btn2">Gabung</button>
                @else 
                <form action="{{route('event.join')}}" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn-primary md:ml-8" >Gabung</button>
                </form>
                @endif
                @endif
                @endif 
            @endauth
            @guest
            <form action="{{route('event.join')}}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
                        <input type="hidden" name="user_id" value="{{null}}">
                <button type="submit" class="btn-primary md:ml-8">Gabung</button>
            </form>
            @endguest

        </div>

    </div>

    @auth
    <div class="fixed md:left-32 left-5 md:top-72 top-96 flex flex-col justify-center items-center">
        @if ($event->is_joined)
        <a href="{{route('event.discussion', $event->slug)}}" class="group btn-event-action mb-3">
            <img class="img-event-action" src="{{asset('img/icon-1.svg')}}" >
        </a>
        @endif
        @if (Auth::user()->id != $event->user->id)
            @if ($event['is_saved'])
            <form action="{{route('event.unsave')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <button type="submit" class="group btn-event-action-active mb-3">
                    <img class="img-event-action-active" src="{{asset('img/icon-3.svg')}}" >
                </button>
            </form>
            @else
                <form action="{{route('event.save')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <button type="submit" class="group btn-event-action mb-3">
                        <img class="img-event-action" src="{{asset('img/icon-3.svg')}}" >
                    </button>
                </form>
            @endif
        @endif

        <button class="btn-event-action  mb-3">
            <img class="img-event-action" onclick="copy()"  src="{{asset('img/Discovery.svg')}}">
        </button>

        @if ($event->user_id != Auth::user()->id)
        <button id="btn" class="group btn-event-action mb-3">
            <img class="img-event-action" src="{{asset('img/info.svg')}}" >
        </button>
        @endif
    </div>
    @endauth
    
    <div class="mt-12 mx-auto w-6/12">
        @error('document')
        <span class="text-red-600 italic text-xs text-center mx-auto">{{$message}}</span>
        @enderror
        <h1 class="font-bold text-3xl">{{$event->name}}</h1>

        <img src="{{asset('storage/' . $event->photo)}}" width="786" height="481" class="mt-16 mx-auto blok">
        <div class="flex justify-center my-12">
            <div class="text-grey w-10/12 text-justify ">
                {!!$event->description!!}
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-2 gap-y-5 mb-5 ml-10 my-12">
            <div class="flex items-start">
                <img src="{{asset('img/Location.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">{{$event->category->name}}</p>
                    <p class="text-prime font-semibold">{{$event->address}}</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="{{asset('img/3 User.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Peserta</p>
                    <p class="text-prime font-semibold">{{$event->quota}} Peserta</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="{{asset('img/Calendar.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Jadwal</p>
                    <p class="text-prime font-semibold">{{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMMM Y')}}</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="{{asset('img/Ticket.png')}}">
                <div class="ml-3">
                    <p class="text-grey ">Akses</p>
                    <p class="text-prime font-semibold">{{$event->status_id == 1 ? 'Rp. ' . number_format($event->price,0,"",".").',-' : $event->status->name}}</p>
                </div>
            </div>
        </div>

        @if ($event->category_id == 1)
        <div class="flex justify-center my-12">
            <img src="{{asset('img/poster.png')}}" alt="">
        </div>
        @endif
      
        <hr>
    
        <div class="my-10">
            <h1 class="text-dark font-semibold mb-10">Partisipan bergabung</h1>
            @empty($members)
            <span>Belum ada partisipan yang bergabung</span>
            @endempty
        </div>
        <div class="grid md:grid-cols-6 grid-cols-3 gap-5 md:mt-12 mt-3 justify-items-center items-center ">
            @foreach ($members as $item)
            <a href="{{route('profile', $item['slug'])}}">
                <img src="{{asset('storage/' . $item['photo'])}}" width="100" height="100">
            </a>
            @endforeach
            @if (count( $event->users) > 11)
            <div class="border-1 w-full h-24 border-prime flex justify-center items-center">
                <h2 class="text-center font-bold text-prime text-2xl ">+{{count($event->users) - 11}}</h2>
            </div> 
            @endif
        </div>
    </div>

    @if ($event->status_id == 1 && count($pendings) > 0 && Auth::user()->id == $event->user->id)
    <div class="mt-12 mx-auto w-6/12">
        <hr>
        <h1 class="text-dark font-semibold mt-10">Partisipan tertunda</h1>
        <table class="table-auto w-full mt-10">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Nama</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Email</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Bukti Pembayaran</div>
                    </th>
                    <th class="p-2 whitespace-nowrap" >
                        <div class="font-semibold text-center">Aksi</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @foreach ($pendings as $item)
                <tr>
                    <td class="p-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img src="{{asset('storage/'.$item->photo)}}" width="40" height="40" ></div>
                            <div class="font-medium text-gray-800">{{$item->name}}</div>
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">{{$item->email}}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <a class="link-secondary" href="{{asset('storage/' .$item->pivot->document)}}" target="_blank">
                            Dokumen
                        </a>
                    </td>
                    <td class="p-2 whitespace-nowrap " >
                        <div class="flex justify-between gap-x-5 items-end">
                            <form action="{{route('event.accept')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$item->id}}">
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button type="submit" class="btn-primary">Setujui</button>
                            </form>
                            <form action="{{route('event.reject')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{$item->id}}">
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button type="submit" class="btn-secondary">Tolak</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
   
</main>

    {{-- modal --}}
    @auth
    <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-50" id="overlay">
        <div class="bg-white max-w-2xl py-2 px-3  shadow-xl ">
            <div class="p-6  mt-10 ">
                <div class="flex justify-between mb-3">
                    <h3 class="text-lg font-bold  text-black ">
                        Laporkan {{$event->name}}
                    </h3>
                </div>
                <p class="text-base leading-relaxed text-grey ">
                    Kami menangani laporan event dengan serius. Pihak HeyEvents!
                    tidak akan segan menindak pengguna yang melanggar ITE
                </p>
                <!-- input -->
                <form action="{{route('event.report')}}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="reporter_id" value="{{Auth::user()->id}}">
                <div class="mt-5 mb-3">
                    <label for="email" class="block mb-2 text-xl text-black font-bold">Mengapa Anda Melaporkan {{$event->name}}?</label>
                    @error('report')
                    <span class="text-red-600 italic text-xs">{{$message}}</span>
                    @enderror
                    <div class="border-1 border-black">
                        <textarea name="report" id="message" rows="9" class="block p-2.5 w-full text-sm text-black bg-white border border-black outline-none "></textarea>
                    </div>
                </div>
                <div class="flex items-center space-x-5 rounded-b border-gray-200  ">
                    <button data-modal-toggle="defaultModal" type="submit" type="button" class="btn-primary">Laporkan</button>
                    <button data-modal-toggle="defaultModal" id="close-btn" type="button" class="btn-secondary">Batal</button>
                </div>
                </form>
            
            </div>
        </div>
    </div>

    <form action="{{route('event.pay')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
        <input type="hidden" name="event_id" value="{{$event->id}}" >
        
    <!-- modal2 -->
    <div class="bg-black bg-opacity-50 fixed inset-0 hidden  justify-center items-center z-50" id="overlay2">
        <div  class="modal-box">
            <!-- Card -->
            <div class="card">
                <div class="mb-5">
                    <img src="{{asset('storage/' . $event->photo)}}" class="w-full h-200px">
                </div>
                <div class="mb-5 w-full">
                    <h4 class="text-prime font-bold text-xl w-full mb-2">{{Str::limit($event->name, 31, $end='...') }}</h4>
                    <div class="text-grey max-w-full break-words whitespace-pre-wrap card-text">{{strip_tags(Str::limit($event->description, 100, $end='...')) }}</div>
                </div>
                <div class="grid grid-cols-2 gap-y-5 mb-5">
                    <div class="flex items-center">
                        <img src="{{asset('img/ic_location.svg')}}">
                        <p class="text-grey ml-3">{{$event->category->name}}</p>
                    </div>
                    <div class="flex items-center">
                        <img src="{{asset('img/ic_people.svg')}}">
                        <p class="text-grey ml-3">{{$event->quota}} Peserta</p>
                    </div>
                    <div class="flex items-center">
                        <img src="{{asset('img/ic_calendar.svg')}}">
                        @if ($event->is_ended)
                        <p class="text-grey ml-3">Selesai</p>
                        @else
                        <p class="text-grey ml-3">{{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMMM Y')}}</p>
                        @endif
                    </div>
                    <div class="flex items-center">
                        <img src="{{asset('img/ic_ticket.svg')}}">
                        <p class="text-prime font-semibold ml-3">{{$event->status->name}}</p>
                    </div>
                </div>
                <div class="relative">
                    <a href="{{route('profile', $event->user->slug)}}" class="flex items-center">
                        <img src="{{asset('storage/' . $event->user->photo)}}" width="53" height="53">
                        <div class="ml-5">
                            <div class="flex ">
                                <p class="text-prime font-bold">{{$event->user->name}}</p>
                                @if ($event->user->status_id == 1)
                                <img src="{{asset('img/check.svg')}}" class="ml-3">
                                @endif
                            </div>
                            <p class="text-grey">{{$event->user->bio ? $event->user->bio : 'Bio belum di set'}}</p>
                        </div>
                    </a>
                </div>
                <a href="{{route('event.show', $event->slug)}}" class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                    <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                        width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                            fill="white" />
                    </svg>
                </a>
            </div>
            <!-- End Card -->
            <div class="line">
            </div>
            <div class="md:mx-10 mx-2 flex flex-col payment">
                <div class="w-1 h-full absolute bg-grey left-60"></div>
                    <div class="flex  mt-10">
                        <div >
                            <img src="img/Ticket.svg" alt="">
                        </div>
                        <div>
                            <div class="flex mb-2">
                                <img src="{{asset('img/ic_ticket.svg')}}">
                                <h1 class="text-2xl font-bold text-prime ml-3">Harga Akses</h1>
                            </div>
                            <p class="text-black ml-10">IDR 210.000,-</p>
                        </div>
                    </div>

                    <div class="mt-16">
                        <h1 class="text-2xl font-bold text-prime">Pilih Metode Pembayaran</h1>
                        <div class="mt-6">
                            <img src="{{asset('img/BNI.svg')}} " alt="">
                            <div class="flex gap-x-5 mt-2">
                                <p>0123456789</p>
                                <p class="text-gray-400 text-sm">copy</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <img src="{{asset('img/BCA.svg')}} " alt="">
                            <div class="flex gap-x-5 mt-2">
                                <p>0987654321</p>
                                <p class="text-gray-400 text-sm">copy</p>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 100px;" class="flex justify-center items-center space-x-2 rounded-b border-gray-200 mt-40">
                        <span data-modal-toggle="defaultModal"
                            class="btn-primary w-full" id="btn3">Upload Bukti</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal3 -->
    <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-50" id="overlay3">
        <div class="modal-box">
            <div class="py-10 w-full mx-auto px-4 md:px-6">
                <div >
                    <div class="flex justify-between">
                        <button  id="btn2" class="btn-secondary">Kembali</button>
                        <a class="btn-primary" id="btn4">Upload</a>
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
                            <img src="{{asset('img/ic_image.svg')}}">
                            <p class="text-prime mt-10">Drag and drop foto event di kotak ini. Atau <span
                                    class="font-bold">upload</span></p>
                            <p class="text-grey mt-3">*file harus dalam format jpg, jpeg, png</p>
                            <!-- <p><button type="button" id="" class="btn btn-primary"><span
                                        class="glyphicon glyphicon-folder-open"></span> Select File</button></p> -->
                            <input type="file" id="selectfile" name="document" class="opacity-0">
                            <p id="message_info"></p>
                        </div>
            
                    </div>
        
                    <div class="image">
                    </div>
        
                </div>
            </div>
        </div>
    </div>

    <!-- modal4 -->
    <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-50" id="overlay4">
        <div class="modal-box">
            <div class="py-10 w-full mx-auto px-4 md:px-6">
                <div class="flex justify-center">
                    <img src="{{asset('img/modal.svg')}} " alt="">
                </div>
                <div class="text-center mt-10">
                    <h1 class="text-xl text-prime text-center font-bold">Terima Kasih</h1>
                    <p class="text-black">Pembayaran anda telah diterima dan sedang diverifikasi</p>
                </div>
                <div class="flex justify-center mt-10">
                    <button type="submit" data-modal-toggle="defaultModal"
                        class="btn-primary" id="close-btn4">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</form>

    @endauth
 
@endsection

@push('js')

<script>
    const copy = () => {
    var dummy = document.createElement('input'),
        text = window.location.href;

        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
    }
</script>
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
<script>


    // modal report 
const overlay = document.querySelector('#overlay')
const delBtn = document.querySelector('#btn')
const closeBtn = document.querySelector('#close-btn')

const toggleModal = () => {
    overlay.classList.toggle('hidden')
    overlay.classList.toggle('flex')
}

delBtn.addEventListener('click', toggleModal)
closeBtn.addEventListener('click', toggleModal)


// modal1
window.addEventListener('DOMContentLoaded', () =>{
            const overlay1 = document.querySelector('#overlay1')
            const delBtn1 = document.querySelector('#btn1')
            const Closebtn2 = document.querySelector('#btn2')


            const toggleModal = () => {
                overlay1.classList.toggle('hidden')
                overlay1.classList.toggle('flex')
            }

            delBtn1.addEventListener('click', toggleModal)

            Closebtn2.addEventListener('click', toggleModal)
        })
// modal2
window.addEventListener('DOMContentLoaded', () =>{
            const overlay2 = document.querySelector('#overlay2')
            const delBtn2 = document.querySelector('#btn2')
            const closeBtn2 = document.querySelector('#btn3')

            const toggleModal = () => {
                overlay2.classList.toggle('hidden')
                overlay2.classList.toggle('flex')
            }

            delBtn2.addEventListener('click', toggleModal)

            closeBtn2.addEventListener('click', toggleModal)
})
// modal3
window.addEventListener('DOMContentLoaded', () =>{
            const overlay3 = document.querySelector('#overlay3')
            const delBtn3 = document.querySelector('#btn3')
            const closeBtn3 = document.querySelector('#btn4')

            const toggleModal = () => {
                overlay3.classList.toggle('hidden')
                overlay3.classList.toggle('flex')
            }

            delBtn3.addEventListener('click', toggleModal)

            closeBtn3.addEventListener('click', toggleModal)
        })
// modal4
window.addEventListener('DOMContentLoaded', () =>{
            const overlay4 = document.querySelector('#overlay4')
            const delBtn4 = document.querySelector('#btn4')
            const closeBtn4 = document.querySelector('#close-btn4')

            const toggleModal = () => {
                overlay4.classList.toggle('hidden')
                overlay4.classList.toggle('flex')
            }

            delBtn4.addEventListener('click', toggleModal)

            closeBtn4.addEventListener('click', toggleModal)
        })
</script>
@endpush
