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
                    <div class="mx-6 my-2">
                        <input name="name" class="w-full px-2 py-1  text-red-700 border-red-800 border-2 " placeholder="Name">
                        @error('name')
                        <span class="text-red-500">
                                {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div  class="mx-6 my-2">
                        <input name="logo" type="file"  class="w-full px-2 py-1  text-red-700 border-red-800 border-2 ">
                        @error('logo')
                        <span class="text-red-500">
                                {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div  class="mx-6 my-2">
                        <input class="h-8 w-full bg-red-800 text-white" value="Save" type="submit" >
                    </div>
                </form>
            </div>
         </div>
        <div class="md:w-2/3 w-full  h-screen bg-gray-300 ">
            <div class="mx-3 my-6 px-6 py-10 bg-white rounded-lg flex flex-wrap">
                @foreach (\App\Models\Store::all() as $store)
                    <div class="h-32 w-32 p-2 m-4 bg-red-300 text-center" >
                        @if ($store->logo)
                        <img class="w-full" src={{asset('/storage/' .$store->logo)}} alt="{{$store->name}}">
                        @endif
                        {{$store->name}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>
