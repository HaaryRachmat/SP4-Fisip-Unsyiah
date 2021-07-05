{{-- If your happiness depends on money, you will never be happy with yourself. --}}
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Galeri</h2>
</x-slot>
        
<div class="py-12">
    

    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full ml-4">
            @if (session()->has('message'))
                    <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-3 shadow-md my-3 rounded" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @if (session()->has('errMessage'))
                    <div class="bg-gradient-to-r from-red-400 to-yellow-500 text-white px-4 py-3 shadow-md my-3 rounded" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('errMessage') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
        {{-- Button and Search --}}
        <div class="flex justify-between">               
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
            {{-- Button --}}
            <div>
                <button wire:click="openModal()" @click="showModal1 = true"
                    type="button"
                    class=" bg-gray-700 text-white rounded-md px-4 py-2  transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                >
                    Tambah
                </button>
                @if ($modal)
                    @include('livewire.create')
                @endif

                {{-- Delete Confirmation Modal --}}
                @if ($deleteConfirmation)
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
                            <h2 class="font-semibold text-xl">Delete Confirmation</h2>
                            <button class="focus:outline-none p-2" wire:click="closeModal()">
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                                ></path>
                                </svg>
                            </button>
                            </header>
                            <main class="p-2 text-center">
                            <p>Apakah anda yakin?</p>
                            </main>
                            <footer class="flex justify-end p-2">
                            <button
                                wire:click="closeDeleteModal()"
                                class="bg-gray-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-gray-900 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" 
                            >
                                Batal
                            </button>
                            <button
                                wire:click.prevent="delete({{ $deleteId }})"
                                class="bg-red-600 font-semibold text-white p-2 w-32 ml-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" 
                            >
                                Hapus
                            </button>
                            </footer>
                        </div>
                        </div>
                        </div>
                </div>
                @endif
                {{-- End Delete Confirmation Modal --}}

            </div>	
            {{-- End Button --}}
        </div>
        {{-- Button and Search --}}
        
        <div class="">
            <div class="bg-white p-2 w-full mx-3 sm:w-full sm:py-4 h-auto sm:h-2/3 rounded-2xl shadow-lg flex flex-col  justify-center items-center sm:flex-row gap-5 select-none">
                <div class="table w-full p-2">
                    <table class="w-full ">
                        <thead>
                            <tr class="bg-white border-indigo-400 border-b">
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
                                        Judul
                                    </div>
                                </th>
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Tanggal
                                    </div>
                                </th>
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Deskripsi
                                    </div>
                                </th>
                                <th class="p-2 cursor-pointer text-sm font-semibold text-gray-500 ">
                                    <div class="flex items-center justify-center">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white text-center">
                                <td class="p-2">
                                    
                                </td>
                                <td class="p-2">
                                    <input type="text" class="border border-gray-300 p-1">
                                </td>
                                <td class="p-2">
                                    <input type="text" class="border p-1">
                                </td>
                                <td class="p-2">
                                    <input type="text" class="border p-1">
                                </td>
                                <td class="p-2">
                                    {{-- <input type="text" class="border p-1"> --}}
                                </td>
                                <td class="p-2">
                                    <!-- <input type="text" class="border p-1"> -->
                                </td>
                                
                            </tr>
                            @forelse ($galeris as $item)
                            <tr class="bg-white text-center border-b text-sm text-gray-600">
                                <td class="p-2">
                                    <input type="checkbox">
                                </td>
                                {{-- <td class="p-2">{{ $loop->index+1 }}</td> --}}
                                {{-- <td class="p-2 flex justify-center"></td> --}}
                                <td class="p-2 font-bold flex justify-center">
                                    <img src="{{ asset('storage/'. $item->file_name) }}" class=" w-8 lg:rounded lg:h-full mr-2" alt="" />
                                    {{ $item->judul }}
                                </td>
                                <td class="p-2 font-bold">{{ $item->tanggal }}</td>
                                <td class="p-2 font-bold">{{ $item->deskripsi }}</td>
                                <td class="p-2">
                                    <button wire:click="edit({{ $item->id }})" class="w-4 mr-2 transform hover:text-indigo-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button wire:click="openDeleteModal({{ $item->id }})" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
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
                        {{ $galeris->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
