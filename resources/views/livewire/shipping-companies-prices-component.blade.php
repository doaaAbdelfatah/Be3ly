<div>
    <div>
        <div class="flex items-center">
            <div class="container mx-auto mt-2">
                   <div class="mx-7 flex flex-col lg:flex-row">
                        <div class="w-1/3 bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-1 shadow-md">
                            <div class="py-8 px-8 rounded-xl">
                                <h1 class="font-sm text-xl mt-2 text-center">Add Prices To Shipping Company</h1>
                                <form action="" class="mt-6">
                                    <div class="my-2 text-sm">
                                        {{-- 1st Shipping Companies Name  --}}
                                        <label for="name" class="block text-black">Shipping Company</label>
                                        <label class="block mt-4">
                                            <select wire:model="name" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                                <option value="">Select Shipping Company</option>
                                                @forelse ( \App\Models\ShippingCompany::all() as $ship)

                                                    <option value="{{$ship->id}}">{{$ship->name}}</option>
                                                @empty
                                                    <option value="">Empty</option>
                                                @endforelse
                                            </select>
                                          </label>
                                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div>
                                    {{-- 2st Shipping Companies Locations  --}}
                                    <label for="name" class="block text-black">Shipping Company Location</label>
                                    <select wire:model="location" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select Locations</option>
                                        @forelse ( \App\Models\Location::all() as $location)

                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                        @empty
                                            <option value="">Empty</option>
                                        @endforelse
                                    </select>
                                    @error('location') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                                    {{-- 3st Shipping Companies Amount  --}}
                                    <div class="my-2 text-sm">
                                        <label for="amount" class="block text-black">Company Amount</label>
                                        <input type="number" wire:model="amount" class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Company Amount" />
                                        @error('amount') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div>

                                    <button type="button" wire:click="save" class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-green-500 w-full">Add</button>
                                </form>
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
                                                    Shipping Company
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Location
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Amount
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Phone
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @forelse (\App\Models\ShippingCompanyPrice::all() as $shipping_price)
                                                    <tr class=" cursor-pointer hover:bg-gray-200">
                                                        <td class="px-6 py-4 whitespace-nowrap ">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full" src="https://pbs.twimg.com/profile_images/755712662474858496/9hFApmNt.jpg" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                            <div class="text-sm font-medium text-red-600 text-gray-900">
                                                                 {{$shipping_price->shipping_company_id}}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{$shipping_price->location->name}}
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{$shipping_price->location->name}}</div>
                                                        <div class="text-sm text-gray-500"></div>
                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{$shipping_price->amount}}.L.E
                                                        </span>
                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{$ship->mobile}}
                                                        </td>
                                                        <td class="p-1 whitespace-nowrap text-right text-sm font-medium">
                                                            <a type="button" title="Edit({{$shipping_price->shipping_company_id}})" wire:click="edit({{$shipping_price->id}})" class="cursor-pointer text-sm bg-green-500 hover:bg-green-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                                            <a type="button" title="Delete({{$shipping_price->shipping_company_id}})" wire:click="delete({{$shipping_price->id}})" class="cursor-pointer text-sm bg-red-500 hover:bg-red-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Delete</a>
                                                        </td>
                                                        </td>
                                                    </tr>
                                                    @empty

                                                    @endforelse


                                                <!-- More items... -->
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

</div>
