<div>

    <section class="mt-10">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 ml-12 mr-12 mb-1 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
                <button wire:click="$set('showMessage', false)" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.93 2.435a1 1 0 01-1.456-1.381l3.19-2.658-3.206-2.654a1 1 0 111.456-1.381L10 8.586l2.929-2.434a1 1 0 111.456 1.381l-3.206 2.654 3.19 2.658a1 1 0 010 1.435z" />
                    </svg>
                </button>
            </div>
        @endif




        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <button wire:click="showAddUserForm" class="bg-black text-white rounded mb-1 px-3 py-1.5">Add New
                User</button>

            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-200 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.live.debounce.100ms='search' type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">

                        </div>

                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-800">User Type :</label>
                            <select wire:model.live='admin'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="0">Member</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3" wire:click="setSortBy('name')">

                                    <button class="flex items-center">
                                        NAME
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                        </svg>

                                    </button>

                                </th>
                                <th scope="col" class="px-4 py-3" wire:click="setSortBy('email')">
                                    <button class="flex items-center">
                                        EMAIL
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                        </svg>

                                    </button>


                                </th>
                                <th scope="col" class="px-4 py-3" wire:click="setSortBy('is_admin')">
                                    <button class="flex items-center">
                                        ROLE
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                        </svg>

                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3" wire:click="setSortBy('created_at')">
                                    <button class="flex items-center">
                                        JOINED
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                        </svg>

                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">Last update</th>
                                <th scope="col" class="px-4 py-3"> ACTIONS </th>
                            </tr>
                        </thead>
                        <tbody class="text-xs text-gray-800 bg-gray-550">

                            @foreach ($users as $user)
                                <tr wire:key="{{ $user->id }}" class="border-b dark:border-gray-50">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-800 whitespace-nowrap dark:text-gray">
                                        {{ $user->name }}
                                    </th>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3 {{ $user->is_admin ? 'text-green-500' : 'text-blue-500' }}">
                                        {{ $user->is_admin ? 'Admin' : 'Member' }}
                                    </td>
                                    <td class="px-4 py-3">{{ $user->created_at }}</td>
                                    <td class="px-4 py-3">{{ $user->updated_at }}</td>
                                    <td class="px-4 py-3 flex items-center justify-center">
                                        <button class="px-3 py-1 mr-4 bg-yellow-500 text-white rounded"
                                            wire:click="edit({{ $user->id }})">Edit</button>
                                        <button
                                            onclick="confirm('Are you sure that you want to delete {{ $user->name }} ?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $user->id }})"
                                            class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                                    </td>
                                </tr>
                
                                @if ($editMode && $editingUser->id === $user->id)
                                    <tr>
                                        <td colspan="6">
                                            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                                role="alert">
                                                <div class="flex justify-between">
                                                    <div class="flex">
                                                        <p class="font-bold">Editing User:</p>
                                                        <p class="ml-2">{{ $editingUser->name }}</p>
                                                        <p class="ml-10 text-red-500">Note: You are required to fill all the details </p>
                                                    </div>
                                                    <div>
                                                        <button wire:click="cancelEdit"
                                                            class="bg-red-500 text-white rounded px-3 py-1.5">Cancel</button>
                                                    </div>
                                                </div>
                                                <form wire:submit.prevent="updateUser">
                                                    <label for="name">Name:</label>
                                                    <input wire:model="name" type="text"
                                                        class="border-gray-300 rounded" placeholder="{{ $editingUser->name }}" required>
                                                    @error('editingUser.name')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror

                                                    <label for="email">Email:</label>
                                                    <input wire:model="email" type="email"
                                                        class="border-gray-300 rounded"  placeholder="{{ $editingUser->email }}" required>
                                                    @error('editingUser.email')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror

                                                    <label for="role">Role:</label>
                                                    <select wire:model="is_admin"
                                                        class="border-gray-300 rounded" required>
                                                        <option value="">Select Role</option>
                                                        <option value="0"
                                                            >Member
                                                        </option>
                                                        <option value="1"
                                                            >Admin
                                                        </option>
                                                    </select>
                                                    @error('editingUser.is_admin')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror

                                                    <button wire:click="updateUser"
                                                        class="bg-blue-500 text-white rounded px-3 py-1.5">Save</button>
                                                </form>
                                                
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-800">Per Page</label>
                            <select wire:model.live='perPage' name="perPage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
            @if ($showAddUserModal)
                <div class="fixed z-10 inset-0 overflow-y-auto" wire:ignore>
                    <div
                        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Add New User
                                        </h3>
                                        <div class="mt-5">
                                            
                                            <form wire:submit.prevent="createUser">
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Name</label>
                                                    <input wire:model="name" type="text" id="name"
                                                        name="name" placeholder="Enter name here" required
                                                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('name')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="email"
                                                        class="block text-sm font-medium text-gray-700">Email</label>
                                                    <input wire:model="email" type="email" id="email"
                                                        name="email" placeholder="Enter email here" required
                                                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('email')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="is_admin"
                                                        class="block text-sm font-medium text-gray-700">Role</label>
                                                    <select wire:model="is_admin" id="role" name="is_admin" required
                                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md">
                                                        <option value="" selected>Select Role</option>
                                                        <option value="0">Member</option>
                                                        <option value="1">Admin</option>
                                                    </select>

                                                    @error('is_admin')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="flex justify-end">
                                                    <button type="button" wire:click="closeAddUserModal"
                                                        class="ml-3 inline-flex justify-center px-3 py-1.5 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md hover:bg-gray-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-primary-500">
                                                        Cancel
                                                    </button>
                                                    <button type="submit"
                                                        class="bg-red-500 text-white px-3 py-1.5 ml-3 rounded-md">Save</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </section>

</div>
