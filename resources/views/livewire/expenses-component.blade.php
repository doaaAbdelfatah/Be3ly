
        <div class="flex items-center  bg-white dark:bg-gray-900">
           <div class="container mx-auto">
                  <div class="mx-7 flex flex-col lg:flex-row">
                      <div class="w-1/3">
                       <div class="mb-2">
                           <label  class="block mb-2 text-sm text-gray-600 dark:text-gray-400"></label>
                           <input type="text" wire:model="name"  placeholder="expenses" class="w-full px-3 py-1 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                           @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                       </div>
                       <div class="mb-6">
                        <button type="button" wire:click='save' class="w-full px-3 py-1 text-white bg-blue-800 rounded-md focus:bg-blue-600 focus:outline-none">Save</button>
                    </div>
                    @forelse ( \App\Models\Expense::all() as $expense)

                    <option value="{{$expense->id}}">{{$expense->name}}</option>
                @empty
                    <option value="">Empty</option>
                @endforelse


                <div class="flex flex-col m-2 p-2">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    name
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse (\App\Models\Expense::all() as $expense)
                                <tr class=" cursor-pointer hover:bg-gray-200">
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                        </div>
                                        <div class="ml-4">
                                        <div class="text-sm font-medium text-red-600 text-gray-900">
                                            {{$expense->id}}  : {{$expense->name}}
                                        </div>
                                        </div>
                                    </div>
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
