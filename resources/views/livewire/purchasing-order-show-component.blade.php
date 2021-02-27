<div>
    @if ($order)
    <div class=" w-full  flex flex-col">
        <div class="flex flex-col mx-3 my-1 w-full">
            <div class="align-middle p-3 bg-white rounded-lg shadow-lg">
                <h1>Order Information</h1>
                <button type="button" wire:click="edit" class="text-center mt-12 text-white bg-gray-800  p-1  rounded-sm hover:bg-green-500">Edit</button>

                <hr>
                <div class="w-full mt-2 grid grid-cols-2  gap-3">
                    <div class="grid grid-cols-2  gap-1">
                        <div>Supplier </div>
                        <div>{{$order->supplier->name}} </div>
                    </div>
                    <div class="grid grid-cols-2  gap-1">
                        <div>Branch </div>
                        <div>{{$order->branch->name}} </div>
                    </div>
                    <div class="grid grid-cols-2 gap-1">
                        <div>Created By </div>
                        <div>{{$order->created_by_user->name}} </div>
                    </div>
                    <div class="grid grid-cols-2 gap-1">
                        <div>Created At </div>
                        <div>{{$order->created_at->diffForHumans()}} </div>
                    </div>
                    <div class="grid grid-cols-2 gap-1">
                        <div>Status </div>
                        <div>{{$order->status}} </div>
                    </div>
                    <div class="grid grid-cols-2 gap-1">
                        <div>Total Invoice </div>
                        <div>{{$order->total_invoice}} </div>
                    </div>

                </div>
            </div>
            <div class="align-middle p-3 bg-white rounded-lg mt-2 shadow-lg">
                  <h2>Order Detail:</h2>
                <div class="grid grid-cols-4 gap-2">
                    @forelse ($order->purchasing_order_details as $order_detail)
                        @if ($loop->first)
                            <div class="my-2 text-sm">
                                <label for="product_id" class="block text-black">Product</label>
                                {{$order_detail->product->name}}
                            </div>
                            <div class="my-2 text-sm">
                                <label for="product_id" class="block text-black">Unit</label>
                                {{$order_detail->unit->name}}
                            </div>
                            <div class="my-2 text-sm">
                                <label for="product_id" class="block text-black">Quantity</label>
                                {{$order_detail->quantity}}
                            </div>
                            <div class="my-2 text-sm">
                                <label for="product_id" class="block text-black">Unit Price</label>
                                {{$order_detail->unit_price}}
                            </div>

                        @else
                        <div class="my-2 mt-1  text-sm">
                            {{$order_detail->product->name}}
                        </div>
                        <div class="my-2 mt-1  text-sm">
                            {{$order_detail->unit->name}}
                        </div>
                        <div class="my-2 text-sm">

                            {{$order_detail->quantity}}
                        </div>
                        <div class="my-2 text-sm">
                            {{$order_detail->unit_price}}
                        </div>

                        @endif

                    @empty
                        <h2>Empty</h2>
                    @endforelse
                </div>
                <div class="grid grid-cols-5 mt-1 gap-2">
                    <div class="my-2 text-sm">
                        <label for="product_id" class="block text-black">Product</label>
                        <label class="block mt-4">
                            <select wire:model="product_id" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                <option value="">Select Product</option>
                                @forelse ( \App\Models\Product::all() as $product)

                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @empty
                                    <option value="">Empty</option>
                                @endforelse
                            </select>
                          </label>
                        @error('product_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="my-2 text-sm">
                        <label class="block text-black">Unit</label>
                        <label class="block mt-4">
                            <select wire:model="unit_id" class="form-select mt-1 block w-full rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full">
                                <option value="">Select Unit</option>
                                @forelse ( \App\Models\Unit::all() as $unit)

                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @empty
                                    <option value="">Empty</option>
                                @endforelse
                            </select>
                          </label>
                        @error('unit_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="my-2 text-sm">
                        <label for="quantity" class="block text-black">Quantity</label>
                        <input type="number" wire:model="quantity" class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Quantity" />
                        @error('quantity') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="my-2 text-sm">
                        <label for="unit_price" class="block text-black">Unit Price</label>
                        <input type="number" wire:model="unit_price" class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Unit Price" />
                        @error('unit_price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="justify-end">
                        <button type="button" wire:click="add" class="text-center mt-12 text-white bg-gray-800  p-1  rounded-sm hover:bg-green-500">Add</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @endif
</div>
