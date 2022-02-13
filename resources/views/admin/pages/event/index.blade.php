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
                                    <div class="text-lg text-center">🇺🇸</div>
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
@endsection
