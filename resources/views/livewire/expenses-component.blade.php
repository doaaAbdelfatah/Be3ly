<div>
    <div>
        <div class="flex items-center">
            <div class="container mx-auto mt-2">
                   <div class="mx-7 flex flex-col lg:flex-row">
                        <div class="w-1/3 bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-1 shadow-md">
                            <div class="py-8 px-8 rounded-xl">
                                <form action="" class="mt-6">
                                    <div class="my-2 text-sm">
                                        <h1 class="font-sm text-xl mt-2 text-center">Expenses</h1>
                                        <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400"></label>
                                        <input type="text" wire:model="name" class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Expenses">
                                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
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
                                                    <th scope="col" class=" text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        &nbsp;
                                                    </th>
                                                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Id
                                                    </th>
                                                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name
                                                    </th>
                                                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        &nbsp;
                                                    </th>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @forelse (\App\Models\Expense::all() as $expense)
                                                    <tr class=" cursor-pointer hover:bg-gray-200">
                                                        <td class="px-6 py-4 whitespace-nowrap ">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full" src="https://pbs.twimg.com/profile_images/755712662474858496/9hFApmNt.jpg" alt="">
                                                                </div>
                                                        </div>
                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900"> {{$expense->id}}</div>
                                                        <div class="text-sm text-gray-500"></div>
                                                        </td>
                                                        <td class="px-2 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900"> {{$expense->name}}</div>
                                                        </td>
                                                        <td class="p-1 whitespace-nowrap text-right text-sm font-medium">
                                                            <a type="button" title="Edit({{$expense->name}})" wire:click="edit({{$expense->id}})" class="cursor-pointer text-sm bg-green-500 hover:bg-green-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                                            <a type="button" title="Delete({{$expense->name}})" wire:click="delete({{$expense->id}})" class="cursor-pointer text-sm bg-red-500 hover:bg-red-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">Delete</a>
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
