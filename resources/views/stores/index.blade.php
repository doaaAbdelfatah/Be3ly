<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('messages.Store')}}
        </h2>
    </x-slot>

    <div class="w-full flex md:flex-row flex-col">
        <div class="md:w-1/3 w-full h-screen bg-gray-300 ">
            <div class="mx-3 my-6 px-6 py-10 bg-white rounded-lg">
                <form method="POST" action="{{route('store.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="py-2 h-screen px-2">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg">
                            <div class="md:flex">
                                <div class="w-full px-4 py-6 ">
                                    <div class="mb-1"> <span class="text-sm">Branch name</span>
                                        <input type="text" name="name" placeholder="Name" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                                        @error('name')
                                        <span class="text-red-500">
                                                {{$message}}
                                        </span>
                                        @enderror
                                        <div class="mb-1"> <span>Branch Logo</span>
                                        <div class="relative border-dotted h-32 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                            <div class="absolute">
                                                <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-3x text-blue-700"></i> <span class="block text-gray-400 font-normal">Attach Branch Logo Here</span> </div>
                                            </div>
                                            <input type="file" class="h-full w-full opacity-0" name="logo">
                                            @error('logo')
                                            <span class="text-red-500">
                                                    {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3 text-right">
                                    <input value="Save" type="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
         </div>
         <div class="md:w-2/3 w-full h-screen">
            <main class="grid place-items-center min-h-screen bg-gradient-to-t from-blue-200 to-indigo-900 p-5">
                <div>
                  <h1 class="text-xl sm:text-xl md:text-3xl text-center font-bold text-gray-200 mb-5">Branches Info</h1>
                  <section class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- CARD 1 -->
                    @foreach (\App\Models\Store::all() as $store)
                    <div class="bg-gray-900 shadow-lg rounded p-3 cursor-pointer hover:bg-gray-500" >
                      <div class="group relative">
                        <div class="h-100 w-100 p-2 m-4" >
                            @if ($store->logo)
                            <img class="w-full" src={{asset('/storage/' .$store->logo)}} alt="{{$store->name}}">
                            @endif
                        </div>
                      </div>
                      <div class="p-2">
                        <h3 class="text-white text-lg text-center">{{$store->name}}</h3>
                      </div>
                    </div>
                    @endforeach
                </div>
</x-app-layout>
