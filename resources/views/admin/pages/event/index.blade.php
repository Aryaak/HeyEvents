@extends('admin.layouts.dashboard')

@section('page', 'Event')
    
@section('content')
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Event</h2>
            </header>
            <div class="p-3 card-body px-4 pb-2">
                <div class="table-responsive">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <table class="table table-auto align-items-center mb-0">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Penyelenggara</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Tanggal Pelaksanaan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Aksi</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse ($data as $item)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="{{asset('storage/' . $item->photo)}}" width="50" height="50" alt="{{$item->name}}"></div>
                                        <div class="font-medium text-gray-800">{{$item->name}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$item->user->name}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    @if ($item->is_ended)
                                    <span class="text-grey ml-3">Selesai</span>
                                    @else
                                    <span class="text-grey ml-3">{{ \Carbon\Carbon::parse($item->date)->isoFormat('D MMMM Y')}}</span>
                                    @endif
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">
                                        <button class="btn bg-primee text-white"  data-toggle="modal" data-target="#showModal{{$item->id}}">LIHAT</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Tidak ada data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>  

@foreach ($data as $item)
<div class="modal  fade" id="showModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{$item->id}}" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content"  >
            <div class="modal-header">
            <h5 class="modal-title" id="showModalLabel">{{$item->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Detail Event</p>
                <table class="table table-auto align-items-center mb-0">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Nama</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Penyelenggara</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Tanggal Pelaksanaan</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Kategori</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Status</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img  src="{{asset('storage/' . $item->photo)}}" width="50" height="50" alt="{{$item->name}}"></div>
                                    <div class="font-medium text-gray-800">{{$item->name}}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{$item->user->name}}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                @if ($item->is_ended)
                                    <span class="text-grey ml-3">Selesai</span>
                                    @else
                                    <span class="text-grey ml-3">{{ \Carbon\Carbon::parse($item->date)->isoFormat('D MMMM Y')}}</span>
                                    @endif
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                {{$item->category->name}}
                        </td>
                            <td class="p-2 whitespace-nowrap">
                                    {{$item->status->name}}
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <form action="{{route('admin.event.block')}}">
                                    <input type="hidden" name="event_id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-danger mx-3">Blokir</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="mt-3">Anggota</p>
                <table class="table table-auto align-items-center mb-0">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Nama</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @forelse ($item->users->where('id', '!=', $item->user->id) as $user)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img  src="{{asset('storage/' . $user->photo)}}" width="50" height="50" alt="{{$user->name}}"></div>
                                    <div class="font-medium text-gray-800">{{$user->name}}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{$user->name}}</div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center"  colspan="2">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <p class="mt-5">Laporan</p>
                <table class="table table-auto align-items-center mb-0">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Pelapor</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Laporan</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @forelse ($item->reports as $report)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img  src="{{asset('storage/' . $report->reporter->photo)}}" width="50" height="50" alt="{{$report->name}}"></div>
                                    <div class="font-medium text-gray-800">{{$report->reporter->name}}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{$report->report}}</div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td  colspan="2"  class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn bg-primee text-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
