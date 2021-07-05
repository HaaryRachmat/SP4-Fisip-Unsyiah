<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
          <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
              <h2>Galeri</h2>
              <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li>Galeri</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->

        <!-- ======= Gambar Card ======= -->
        <section id="portfolio-details" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 ml-6 mr-6">
          @forelse ($galeris as $item)
            <div class='flex max-w-sm w-72 bg-white shadow-lg rounded-lg overflow-hidden mx-auto'>
                <div class='flex items-center w-full px-1 py-2'>
                    <div class='mx-3 w-full'>
                        <div class="flex flex-row mb-2">
                            <div class="flex flex-col mb-2 ml-4 mt-1">
                                <div class='text-gray-600 font-semibold'>{{ $item->judul }}</div>
                                <div class='text-gray-600 font-base text-sm'>{{ $item->tanggal }}</div>
                            </div>
                        </div>
                        <div class='text-gray-400 font-medium text-sm shadow rounded-md mb-4 w-60'><img class="rounded" src="{{ asset('storage/'. $item->file_name) }}"></div>
                        <div class="flex justify-start mb-4">
                            <div class="flex flex-col w-full justify-evenly items-center mt-1">
                                <p class="text-gray-700 mb-2">Deskripsi</p>
                                <div class='font-medium text-xs '><span class=" px-2 py-1 text-center rounded text-gray-700 cursor-pointer">{{ $item->deskripsi }}</span></div>
                                <div class='font-medium text-xs mt-4'><button class="bg-yellow-600 px-3 py-2  shadow hover:bg-yellow-500 text-center rounded-lg text-gray-100 cursor-pointer">Detail</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h1 class="text-center txt-gray-600">Data Tidak Tersedia</h1>
            @endforelse
        </section><!-- End Gambar Card -->

    
      </main><!-- End #main -->
</div>
