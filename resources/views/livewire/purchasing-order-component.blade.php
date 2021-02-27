<div>
    <div>
        <div class="flex items-center">
            <div class="container mt-2">
                   <div class="mx-1 flex flex-col lg:flex-row">
                        <div class="md:w-1/3 bg-white w-full my-1 shadow-md">
                            <div class="py-8 px-8 rounded-xl">
                                <h1 class="font-sm text-xl mt-2 text-center">Make New Order</h1>
                                <form action="" class="mt-6">
                                    <div class="my-2 text-sm">
                                        {{-- 1st Supplier Name  --}}
                                        <label for="name" class="block text-black">Supplier Name</label>
                                        <label class="block mt-4">
                                            <select wire:model="supplier_id" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                                <option value="">Select Supplier Name</option>
                                                @forelse ( \App\Models\Supplier::all() as $Supplier)
                                                    <option value="{{$Supplier->id}}">{{$Supplier->name}}</option>
                                                @empty
                                                    <option value="">Empty</option>
                                                @endforelse
                                            </select>
                                          </label>
                                        @error('supplier_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div>

                                    {{-- 3st Total invoice
                                    <div class="my-2 text-sm">
                                        <label for="total_invoice" class="block text-black">Total invoice</label>
                                        <input type="number" wire:model="total_invoice" class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Total Invoice" />
                                        @error('total_invoice') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div> --}}

                                    {{-- 3st Status  --}}
                                    {{-- <div class="my-2 text-sm">
                                        <label for="status" class="block text-black"> Status</label>
                                        <select wire:model="status" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                            <option value="">Select Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="canceled">Canceled</option>
                                                <option value="canceled from supplier">Canceled from Supplier</option>
                                        </select>
                                        <input type="text" disabled wire:model="status"  class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Status" />
                                        @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div> --}}
                                    {{-- 3st Updated By  --}}
                                    {{-- <div class="my-2 text-sm">
                                        <label for="updated_by" class="block text-black">Updated By</label>
                                        <select  wire:model="updated_by" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                            <option value="">Select Your Account</option>
                                            <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                        </select>
                                        @error('updated_by') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div> --}}
                                    {{-- 3st Received At  --}}
                                    {{-- <div class="my-2 text-sm">
                                        <label for="received_at" class="block text-black">Received At</label>
                                        <input type="time"  wire:model="received_at" class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Received At" />
                                        @error('received_at') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div> --}}
                                    {{-- 3st Branch Id  --}}
                                    <div class="my-2 text-sm">
                                        <label class="block text-black">Branch </label>
                                        <select wire:model="branch_id" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                            <option value="">Select Branch</option>
                                            @forelse (\App\Models\Branch::all() as $branch)

                                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse
                                        </select>
                                    @error('branch_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="button" wire:click="save" class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-green-500 w-full">Make Order</button>
                                </form>
                            </div>
                        </div>

                        {{-- <div class="w-2/3 bg-red flex flex-">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="flex flex-col m-2 p-2">
                                        <div class="-my-2 sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50 text-center text-center">
                                                <tr>
                                                    <th scope="col" class="px-1 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Order Id
                                                    </th>
                                                    <th scope="col" class="px-2 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Supplier
                                                    </th>
                                                    <th scope="col" class="px-1 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Created By
                                                    </th>
                                                    <th scope="col" class="px-1 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Updated By
                                                    </th>
                                                    <th scope="col" class="px-1 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Received At
                                                    </th>
                                                    <th scope="col" class="px-2 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Branch
                                                    </th>
                                                    <th scope="col" class="px-1 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Total Invoice
                                                    </th>
                                                    <th scope="col" class="px-2 py-3 text-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                    </th>
                                                    <th scope="col" class="px-2 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider tracking-wider">
                                                        &nbsp;
                                                    </th>
                                                    <th scope="col" class="px-2 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider tracking-wider">
                                                        &nbsp;
                                                    </th>
                                                    <th scope="col" class="px-2 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider tracking-wider">
                                                        &nbsp;
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 text-center">
                                                    @forelse (\App\Models\PurchasingOrder::all() as $order)
                                                    <tr class=" cursor-pointer hover:bg-gray-200">
                                                        <td class="px-6 py-4 whitespace-nowrap ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                            <div class="text-sm font-medium text-red-600 text-gray-900">
                                                                {{$order->id}}
                                                            </div>
                                                            <div class="text-sm text-gray-500">

                                                            </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        @if ($order->supplier_id)
                                                        <td class="px-1 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{$order->supplier->name}}</div>
                                                            <div class="text-sm text-gray-500"></div>
                                                        </td>
                                                            @else
                                                            The is no Supplier here
                                                            @endif
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{$order->user->name}}
                                                        </td>
                                                        @if ($order->updated_by)
                                                        <td class="px-2 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                            {{$order->user_update->name}}
                                                        </td>
                                                        @else
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            -
                                                        </td>
                                                        @endif

                                                        @if ($order->reacived_at)
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{$order->reacived_at}}
                                                        </td>
                                                        @else
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-blue-500">
                                                            1 Hour and will arrive
                                                        </td>
                                                        @endif
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{$order->branch->name}}
                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-black-500">
                                                            {{$order->total_invoice}}.L.E
                                                        </span>
                                                        </td>
                                                        @if ($order->status == 'pending')
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                {{$order->status}}
                                                            </span>
                                                        </td>
                                                        @elseif ($order->status == 'delivered')
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                {{$order->status}}
                                                            </span>
                                                        </td>
                                                        @elseif ($order->status == 'canceled')
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                {{$order->status}}
                                                            </span>
                                                        </td>
                                                        @elseif ($order->status == 'canceled from supplier')
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                {{$order->status}}
                                                            </span>
                                                        </td>

                                                        @endif

                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">

                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">

                                                        </td>
                                                        <td class="p-2 whitespace-nowrap text-right text-sm font-medium">
                                                            <a type="button" title="Edit {{$order->id}} " wire:click="edit({{$order->id}})" class="cursor-pointer text-sm bg-green-500 hover:bg-green-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                                            <button type="button" title="Delete {{$order->id}}"  class="cursor-pointer text-sm bg-red-500 hover:bg-red-700 text-white p-1 rounded focus:outline-none focus:shadow-outline" style="transition: all .15s ease" onclick="toggleModal('modal-{{$order->id}}')" >Delete</button>

                                                        </td>
                                                        </td>
                                                    </tr>
                                                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-{{$order->id}}">
                                                        <div class="relative w-auto my-6 mx-auto max-w-3xl">
                                                          <!--content-->
                                                          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                                            <!--header-->
                                                            <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                                            <h3 class="text-3xl font-semibold text-red-700">
                                                                Delete Order
                                                            </h3>
                                                              <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                                                                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                                  ×
                                                                </span>
                                                              </button>
                                                            </div>
                                                            <!--body-->
                                                            <div class="relative p-6 flex-auto">
                                                              <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                                Are You Sure You want Delete Order Number : <b class="text-red-900"> {{$order->id}} </b> ?
                                                              </p>
                                                            </div>
                                                            <!--footer-->
                                                            <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                                              <button class="text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" onclick="toggleModal('modal-{{$order->id}}')">
                                                                Cancel
                                                              </button>
                                                              <button wire:click="delete({{$order->id}})" class="bg-red-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" onclick="toggleModal('modal-{{$order->id}}')">
                                                                Delete
                                                              </button>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    @empty

                                                    @endforelse


                                                <!-- More items... -->
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                        </div> --}}
                    </div>
            </div>
        </div>
    </div>

</div>
