<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div x-data="{ showModal1: true }" :class="{'overflow-y-hidden': showModal1 }">
  <!-- Modal1 -->
  <div
    class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
    x-show="showModal1"
    x-transition:enter="transition duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
  >
    <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
      <div
        class="relative bg-white p-6 shadow-lg rounded-md text-gray-900 z-20"
        x-show="showModal1"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="scale-0"
        x-transition:enter-end="scale-100"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="scale-100"
        x-transition:leave-end="scale-0"
      >
        <header class="flex items-center justify-between ">
          <h2 class="font-semibold text-xl">Form Galeri</h2>
          <button class="focus:outline-none p-2" wire:click="closeModal()">
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
              ></path>
            </svg>
          </button>
        </header>
        <main class="p-2 text-center">
          <div class="">
              <label class="flex justify-start text-lg font-light text-gray-800" for="nama">Judul</label>
              <input class="w-full px-5 py-1 border border-gray-400  text-gray-700 bg-white rounded" type="text" required="" wire:model="judul" placeholder="Judul" aria-label="Judul">
              @error ('judul') <span class="text-red-500 flex justify-start">{{ $message }}</span> @enderror
            </div>
            <div class="mt-2">
              <label class="flex justify-start text-lg font-light text-gray-800" for="jenis">Tanggal</label>
              <input class="w-full px-5  py-1 border border-gray-400 text-gray-700 bg-white rounded" type="text" required="" wire:model="tanggal" placeholder="cth. 03 Juli 2021" aria-label="Tanggal">
              @error ('tanggal') <span class="text-red-500 flex justify-start">{{ $message }}</span> @enderror
            </div>
            <div class="mt-2">
              <label class="flex justify-start text-lg font-light text-gray-800" for="jenis">Deskripsi</label>
              <textarea class="w-full px-5  py-1 border border-gray-400 text-gray-700 bg-white rounded" type="text" required="" wire:model="deskripsi" placeholder="Deskripsi disini" aria-label="Deskripsi"></textarea>
              @error ('deskripsi') <span class="text-red-500 flex justify-start">{{ $message }}</span> @enderror
            </div>
            <div class="mt-2">
              
              <label class="flex justify-start text-lg font-light text-gray-800" for="jenis">Gambar</label>
              <input class="w-full px-5  py-1 text-gray-700 bg-white rounded" type="file" required="" wire:model="file_name" placeholder="Gambar Galeri" name="file_name" aria-label="file_name">
              @error ('file_name') <span class="text-red-500 flex justify-start">{{ $message }}</span> @enderror
            </div>
                @php
                    $array = explode(".",$file_name);
                @endphp
                @if ($array[count($array)-1] == "png" || $array[count($array)-1] == "jpg" || $array[count($array)-1] == "jpeg")
                    <div class="mb-4">
                        <img src="{{asset('storage/'.$file_name)}}" width="400" class="mx-auto shadow-xl">
                    </div>
                @endif
              {{-- Image message --}}
              <!-- Notifikasi succes akan tampil saat gambar berhasil dipilih -->
              @if ( $file_name == null)
              @else
              <div class='flex items-center text-white text-sm max-w-sm w-full bg-green-500 shadow-md rounded-lg overflow-hidden mx-auto'>
                <div class='w-10 border-r px-2'>
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                  </svg>
                </div>
                <div class='flex items-center px-2 py-3'>
                  <div class='mx-3'>
                    <p>{{ $file_name }}</p>
                  </div>
                </div>
              </div>
              @endif
              {{-- End Image message --}}
              
        </main>
        <footer class="flex justify-end p-2">
          <button
            class="bg-gray-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-gray-900 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" wire:click="closeModal()"
          >
            Batal
          </button>
          <button
            class="bg-blue-600 font-semibold text-white p-2 w-32 ml-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" wire:click="store()">
            Simpan
          </button>
        </footer>
      </div>
    </div>
  </div>
</div>




