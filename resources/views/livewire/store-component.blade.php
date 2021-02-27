<div>
    <div class="flex items-center">
        <div class="container mx-auto mt-2">
               <div class="mx-7 flex flex-col lg:flex-row">
                    <div class="w-1/3 bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-1 shadow-md">
                        <div class="py-8 px-8 rounded-xl">
                            <h1 class="font-medium text-2xl mt-2 text-center">Add New store</h1>

                                <div class="my-5 text-sm">
                                    <label  class="block text-black">Name</label>
                                    <input type="text" wire:model="name" autofocus class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Name" />
                                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-2 text-sm">
                                    <label for="logo" class="block text-black">logo</label>
                                    <input wire:model="logo" type="file" class="block text-black" name="logo">
                                    @error('logo') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <button type="button" wire:click="save" class="block my-1 text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-green-500 w-full">Add</button>
                        </div>
                    </div>

                    <div class="w-2/3 bg-red">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="flex flex-col m-2 p-2">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               Name
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               logo
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    expenses
                                                     </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse (\App\Models\Store::all() as $store)
                                                <tr class=" cursor-pointer hover:bg-gray-200">
                                                    <td class="px-6 py-4 whitespace-nowrap ">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                        <div class="text-sm font-medium text-red-600 text-gray-900">
                                                           {{$store->name}}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{$store->price}}
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                       @forelse ($store->store_expenses as $store_expense)
                                                       <div class="text-sm text-gray-500">
                                                        {{$store_expense->expense->name}}
                                                    </div>
                                                       @empty
                                                       <div class="text-sm text-gray-500">
                                                       -
                                                       @endforelse

                                                            </div>
                                                        </div>
                                                        </td>

                                                    <td class="p-1 whitespace-nowrap text-right text-sm font-medium">
                                                        <a type="button" title="Edit {{$store->name}}" wire:click="edit({{$store->id}})" class="cursor-pointer text-xs bg-green-500 hover:bg-green-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                                        <a type="button" title="Delete {{$store->name}}" wire:click="delete({{$store->id}})" class="cursor-pointer text-xs bg-red-500 hover:bg-red-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Delete</a>                                                    </td>



                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse



                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                    </div>
                </div>
        </div>
    </div>






                                        </div>
