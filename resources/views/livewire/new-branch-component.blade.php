<div>
 <div class="flex items-center  bg-white dark:bg-gray-900">
    <div class="container mx-auto">
           <div class="mx-7 flex flex-col md:flex-row">
               <div class="w-full md:w-1/3">
                <div class="mb-2">
                    <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Name</label>
                    <input type="text" wire:model="name"  placeholder="Branch Name" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2">
                    <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Address</label>
                    <input type="text" wire:model="address"  placeholder="Branch Address" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    @error('address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2">
                    <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Phone</label>
                    <input type="text" wire:model="phone" placeholder="Branch Phone" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    @error('phone') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2">
                    <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Mobile</label>
                    <input type="text" wire:model="mobile" placeholder="Branch Mobile" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    @error('mobile') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2">
                    <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Type</label>
                    <select wire:model="type" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        <option value="">Select Type</option>
                        <option value="both">Both</option>
                        <option value="branch">Branch</option>
                        <option value="inventory">Inventory</option>
                    </select>
                    @error('type') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2">
                    <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Store</label>
                    <select wire:model="store_id" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        <option value="">Select Store</option>
                        @forelse ( \App\Models\Store::all() as $store)

                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @empty
                            <option value="">Empty</option>
                        @endforelse
                    </select>
                    @error('store_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-6">
                    <button type="button" wire:click='save' class="w-full px-3 py-1 text-white bg-blue-800 rounded-md focus:bg-blue-600 focus:outline-none">Save</button>
                </div>
               </div>
               {{-- the new table --}}
            <div class="w-full md:w-2/3">
               <div>
                <div class="flex flex-col max-w-full shadow-md m-6">
              <!-- Header -->
              <div class="items-center bg-gray-50 border-b px-6 py-4 text-center">
                <p class="text-xl text-gray-800 font-semibold ">All Branches</p>
              </div>
              <!-- End Header -->

              <!-- Tools -->
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
                  <div class="divide-x-2 border border-gray-300 shadow-sm rounded-md">
                    <button class="p-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                      </svg>
                    </button>

                    <button class="p-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                      </svg>
                    </button>

                    <button class="p-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                      </svg>
                    </button>
                  </div>

                  <div class="relative">
                    <input type="text" placeholder="Search by" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />

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
              <!-- End Tools -->

              <!-- Table -->
              <div class="flex flex-wrap justify-between items-center bg-white border-b p-2 space-y-2 md:space-y-0">
                <table class="overflow-x-auto w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-50 text-gray-500 text-sm">
                    <tr class="divide-x divide-gray-300">
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Id</th>
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Adress</th>
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Phone</th>
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Mobile</th>
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-3 py-2 text-left text-xs text-center font-medium text-gray-500 uppercase">Store</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase"></th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-500 text-xs divide-y divide-gray-200">
                        @forelse (  $data as $branch)
                    <tr class="text-center">
                        <td class="py-3">{{$branch->id}}</td>
                        <td class="py-3 text-red-400">{{$branch->name}}</td>

                        @if ($branch->address)
                        <td class="py-3">{{$branch->address}}</td>
                        @else
                        <td class="py-3">null</td>
                        @endif
                        @if ($branch->phone)
                        <td class="py-3">{{$branch->phone}}</td>
                        @else
                        <td class="py-3">null</td>
                        @endif
                        @if ($branch->mobile)
                        <td class="py-3">{{$branch->mobile}}</td>
                        @else
                        <td class="py-3">null</td>
                        @endif


                        @if ($branch->type == "both")
                        <td class="py-3">
                          <span class="bg-indigo-200 text-indigo-500 text-xs font-semibold rounded-md py-1 px-2">{{$branch->type}}</span>
                        </td>

                        @elseif($branch->type == "branch")
                        <td class="py-3">
                          <span class="bg-green-200 text-green-500 text-xs font-semibold rounded-md py-1 px-2">{{$branch->type}}</span>
                        </td>
                        @else
                        <td class="py-3">
                          <span class="bg-red-200 text-red-500 text-xs font-semibold rounded-md py-1 px-2">{{$branch->type}}</span>
                        </td>
                        @endif
                        <td class="py-3">{{$branch->store->name}}</td>
                        <td class="py-3">
                        <div class="flex justify-center space-x-1">
                            <button class="border-2 border-indigo-200 rounded-md p-1" wire:click="edit({{$branch->id}})" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            </button>
                            <button class="border-2 border-red-200 rounded-md p-1" wire:click="delete({{$branch->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            </button>
                        </div>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
                </table>
              <!-- End Table -->
            </div>

            </div>
            </div>
            </div>
        </div>
</div>
</div>
