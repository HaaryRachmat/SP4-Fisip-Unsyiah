<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div x-data="{ showModal1: true }" :class="{'overflow-y-hidden': showModal1 }">
    <!-- Modal1 -->
    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showModal1" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div class="relative bg-white p-6 shadow-lg rounded-md text-gray-900 z-20" x-show="showModal1"
                x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                <header class="flex items-center justify-between ">
                    <h2 class="font-semibold text-xl">Gambar Galeri</h2>
                    <button class="focus:outline-none p-2" wire:click="closeViewModal()">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </header>
                <main class="p-2 text-center">
                    {{-- <p>{{ postId }}</p> --}}
                    {{-- <livewire:additional-photos /> --}}

                    {{-- @foreach($galeris as $item)

                    <img src="{{ asset('storage/additional_photos'. $item->getGaleriId->filename) }}"
                    class=" w-8 lg:rounded lg:h-full mr-2" alt="" />

                    @endforeach --}}

                    {{-- Akses Ke array Galeri --}}
                    {{-- <p wire:model="filename">{{ $filename }}</p> --}}


                    {{-- Multiple Image --}}
                    @foreach ($galeriDetail as $item)
                    <img src="{{ asset('storage/additional_photos/'. $item->filename) }}"
                        class=" w-24 lg:rounded lg:h-full mr-2" alt="" /> <br />
                    @endforeach


                    {{-- Baru Bisa mendapatkan nama file dari database --}}
                    {{-- @foreach ($galeriDetail as $item)
                    {{ $item->filename }}
                    @endforeach --}}



                    {{-- <p wire:model="getGaleriId">{{ $getGaleriId }}</p> --}}
                    {{-- <p wire:model="getGaleriId"></p> --}}

                </main>
                <footer class="flex justify-end p-2">
                    <button wire:click="closeViewModal()"
                        class="bg-gray-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-gray-900 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300">
                        Batal
                    </button>
                    <button wire:click.prevent="delete({{ $deleteId }})"
                        class="bg-green-600 font-semibold text-white p-2 w-32 ml-2 rounded-full hover:bg-green-500 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300">
                        Hapus
                    </button>
                </footer>
            </div>
        </div>
    </div>
</div>