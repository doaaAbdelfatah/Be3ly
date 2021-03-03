<div>
    <div class="flex items-center h-full bg-white dark:bg-wight-900">
       <div class="container mx-auto">
              <div class="mx-7 flex flex-col lg:flex-row">
                  <div class="w-1/3">
                   <div class="mb-2">
                       <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Supplier Name</label>
                       <input type="text" wire:model="name"  placeholder="Supplier Name" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                       @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>
                   <div class="mb-2">
                       <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Supplier Address</label>
                       <input type="text" wire:model="address"  placeholder="Supplier Address" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                       @error('address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>
                   <div class="mb-2">
                       <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Supplier Phone</label>
                       <input type="text" wire:model="phone" placeholder="Supplier Phone" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                       @error('phone') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>
                   <div class="mb-2">
                       <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Supplier Mobile</label>
                       <input type="text" wire:model="mobile" placeholder="Supplier Mobile" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                       @error('mobile') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                   </div>
                   <div class="mb-6">
                       <button type="button" wire:click='save' class="w-full px-3 py-1 text-white bg-blue-800 rounded-md focus:bg-blue-600 focus:outline-none">Save</button>
                   </div>
                  </div>
                  {{-- the new table --}}
                  <div class="w-2/3">
                  <div>
                   <div class="flex flex-col max-w-full shadow-md m-6">
                 <!-- Header -->
                 <div class="items-center bg-gray-50 border-b px-6 py-4 text-center">
                   <p class="text-xl text-gray-800 font-semibold ">All Supplieres</p>
                 </div>
                 <!-- End Header -->

                 <!-- Tools -->
                 <div class="flex flex-wrap justify-between items-center bg-white border-b p-2 space-y-2 md:space-y-0">

                   <div class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0">


                     <div class="relative">
                       <input type="text" placeholder="Search by" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
                       <input type="number" placeholder="From" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />
                       <input type="number" placeholder="To" class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs" />

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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            id
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               address
                           </th>
                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               phone
                           </th>
                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               mobile
                           </th>
                           <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase"></th>
                       </tr>
                       </thead>
                       <tbody class="text-gray-500 text-xs divide-y divide-gray-200">
                        @forelse (\App\Models\supplier::all() as $supplier)
                       <tr class="text-center">
                           <td class="py-3">{{$supplier->id}}</td>
                           <td class="py-3 text-red-400">{{$supplier->name}}</td>

                           @if ($supplier->address)
                           <td class="py-3">{{$supplier->address}}</td>
                           @else
                           <td class="py-3">null</td>
                           @endif
                           @if ($supplier->phone)
                           <td class="py-3">{{$supplier->phone}}</td>
                           @else
                           <td class="py-3">null</td>
                           @endif
                           @if ($supplier->mobile)
                           <td class="py-3">{{$supplier->mobile}}</td>
                           @else
                           <td class="py-3">null</td>
                           @endif
                           {{-- <td class="py-3">{{$branch->store->name}}</td> --}}
                           <td class="py-3">
                           <div class="flex justify-center space-x-1">
                               <button class="border-2 border-indigo-200 rounded-md p-1" wire:click="edit({{$supplier->id}})" >
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                               </svg>
                               </button>
                               <button class="border-2 border-red-200 rounded-md p-1" wire:click="delete({{$supplier->id}})">
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
