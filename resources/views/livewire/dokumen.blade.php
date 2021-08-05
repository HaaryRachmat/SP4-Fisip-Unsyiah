{{-- Because she competes with no one, no one can compete with her. --}}
<div>
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
          <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
              <h2>Galeri</h2>
              <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li>Dokumen</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->


        {{-- Button and Search --}}
        <div class="flex justify-between mt-4 ml-8">               
            {{-- Search form --}}
            <div class="flex flex-wrap items-stretch w-1/3 mb-4 ml-4 relative">
                <input wire:model="search" type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex border h-10 border-grey-light rounded rounded-r-none px-3 relative" placeholder="Cari disini">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-gray-800 rounded rounded-l-none border border-l-0 border-gray-600 px-3 whitespace-no-wrap text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </span>
                </div>	
            </div>	
            {{-- End Search form --}}
        </div>
        {{-- Search --}}

        <!-- ======= Tabel Card ======= -->
        <div class="container mb-6">
            <div class="bg-white p-2 w-full mx-1 sm:w-full sm:py-4 h-auto sm:h-2/3 rounded-2xl shadow flex flex-col  justify-center items-center sm:flex-row gap-5 select-none">
                <div class="table w-full p-2">
                    <table class="w-full ">
                        <thead>
                            <tr class="bg-white border-blue-300 border-b">
                                <th class=" p-2">
                                    <input type="checkbox">
                                </th>
                                {{-- <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500">
                                    <div class="flex items-center justify-center">
                                        No
                                    </div>
                                </th> --}}
                                
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Nama
                                    </div>
                                </th>
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Tahun
                                    </div>
                                </th>
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Keterangan
                                    </div>
                                </th>
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500 ">
                                    <div class="flex items-center justify-center">
                                        Berkas
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-none  text-center">
                                <td class="p-2">
                                    
                                </td>
                                <td class="p-2">
                                    <input type="text" class="border p-1">
                                </td>
                                <td class="p-2">
                                    <input type="text" class="border p-1">
                                </td>
                                <td class="p-2">
                                    <input type="text" class="border p-1">
                                </td>
                                
                                
                            </tr>
                            @forelse ($dokumens as $item)
                            <tr class="bg-white text-center border-none text-sm text-gray-600">
                                <td class="p-2">
                                    <input type="checkbox">
                                </td>
                                {{-- <td class="p-2">{{ $loop->index+1 }}</td> --}}
                                {{-- <td class="p-2 flex justify-center"></td> --}}
                                <td class="p-2 font-bold flex justify-center">
                                    {{ $item->nama }}
                                </td>
                                <td class="p-2 font-bold">{{ $item->tahun }}</td>
                                <td class="p-2 font-bold">{{ $item->keterangan }}</td>
                                <td class="p-2 font-bold flex flex-row justify-center">
                                    {{-- <a href="{{ $item->link }}" class="w-4 mr-2 transform text-blue-600 hover:text-blue-500" target="_blank">
                                            Download
                                    </a> --}}
                                    <a href="{{ $item->link }}" class=" bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded inline-flex items-center" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                          </svg>
                                        <span class="ml-1">Download</span>
                                      </a>
                                </td>
                            </tr>
                            @empty
                            <div class="py-3 px-5 bg-yellow-100 rounded-md text-sm border border-gray-200">
                                <h1 class="text-yellow-800 font-semibold text-center ">Tidak Ada Data</h1>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $dokumens->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tabel Card -->

      </main><!-- End #main -->
</div>
