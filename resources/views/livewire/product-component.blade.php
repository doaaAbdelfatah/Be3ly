<div>
    <div class="flex items-center">
        <div class="container mx-auto mt-2">
               <div class="mx-7 flex flex-col lg:flex-row">
                    <div class="w-1/3 bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-1 shadow-md">
                        <div class="py-8 px-8 rounded-xl">
                            <h1 class="font-medium text-2xl mt-2 text-center">Add New Shipping Company</h1>

                                <div class="my-5 text-sm">
                                    <label  class="block text-black">Name</label>
                                    <input type="text" wire:model="name" autofocus class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Name" />
                                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-2 text-sm">
                                    <label for="price" class="block text-black">Price</label>
                                    <input type="number"  wire:model="price"  class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Price" />
                                    @error('price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-2 text-sm">
                                    <label for="at" class="block text-black">Price</label>
                                    <input type="date"  wire:model="at"  class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Price" />
                                    @error('at') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-2 text-sm">
                                    <label for="description" class="block text-black">Description</label>
                                    <input type="text"  wire:model="description"  class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Description" />
                                    @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-2 text-sm">
                                    <label for="name" class="block text-black">Category</label>
                                    <label class="block mt-4">
                                        <select wire:model="category_id" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                            <option value="">Select Category</option>
                                            @forelse ( \App\Models\Category::all() as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse
                                        </select>
                                      </label>
                                    @error('category_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <button type="button" wire:click="save" class="block my-1 text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-green-500 w-full">Add</button>
                                <button type="button" wire:click="clear" class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-red-500 w-full">New</button>
                                <button type="button" wire:click="test" class="block mt-1 text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-red-500 w-full">Test</button>

                                    @foreach ($items as $item)
                                    {{$item}} -
                                    @endforeach
                        </div>
                    </div>
                    <div class="w-2/3 bg-red">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="flex flex-col m-2 p-2">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="flex flex-wrap justify-between items-center bg-white border-b p-2 space-y-2 md:space-y-0">
                                            <div class="space-x-1 mb-1 sm:mb-0">
                                              <button class="border border-gray-300 shadow-sm rounded-md p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                              </button>
                                              <button class="border border-gray-300 shadow-sm rounded-md p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                </svg>
                                              </button>
                                            </div>

                                            <div class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0">

                                              <div class="relative flex space-x-2">
                                                <input type="text" wire:model="search" placeholder="Search by" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
                                                <input type="number" wire:model="from_price" placeholder="From" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
                                                <input type="number" wire:model="to_price"  placeholder="To" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
                                                <input type="date" wire:model="search_at"  placeholder="At" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute left-3 bottom-2 h-4 w-4 text-gray-500">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                              </div>

                                              <button class="flex items-center space-x-1 text-xs text-gray-500 font-semibold border border-gray-300 shadow-sm rounded-md p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                                </svg>
                                                <span>Filter</span>
                                              </button>
                                            </div>
                                          </div>
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               Name
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               Category
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               Properties
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    &nbsp;
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse ($products as $product)
                                                <tr class=" cursor-pointer hover:bg-gray-200">
                                                    <td class="px-6 py-4 whitespace-nowrap ">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                        <div class="text-sm font-medium text-red-600 text-gray-900">
                                                           {{$product->name}}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{$product->price}}
                                                        </div>
                                                        <div class="text-sm text-green-500">
                                                            {{$product->at}}
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    <td class="px-2 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{$product->category->name}}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                            @forelse ($product->product_properties as $product_property)
                                                                <div class="text-sm text-gray-500">
                                                                    {{$product_property->property->name}} :{{$product_property->value}}
                                                                </div>
                                                            @empty
                                                            <div class="text-sm text-gray-500">
                                                               -
                                                            </div>
                                                            @endforelse

                                                            </div>
                                                        </div>
                                                        </td>
                                                    <td class="p-1 whitespace-nowrap text-right text-sm font-medium">
                                                        <a type="button" title="Manage Properties to {{$product->name}}" href="{{route('productproperty.show' , $product->id )}}" class="cursor-pointer text-xs bg-blue-500 hover:bg-blue-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Properie</a>
                                                        <a type="button" title="Edit {{$product->name}}" wire:click="edit({{$product->id}})" class="cursor-pointer text-xs bg-green-500 hover:bg-green-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                                        <a type="button" title="Delete {{$product->name}}" wire:click="delete({{$product->id}})" class="cursor-pointer text-xs bg-red-500 hover:bg-red-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Delete</a>                                                    </td>
                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse


                                            </tbody>
                                        </table>
                                        {{-- {{$products->links('livewire::simple-tailwind')}} --}}
                                        {{$products->links()}}
                                        </div>
                                    </div>
                                    </div>
                                </div>

                    </div>
                </div>
        </div>
    </div>
</div>
