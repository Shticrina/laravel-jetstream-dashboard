<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard / Manage Users
    </h2>
</x-slot>

<div class="overflow-x-auto">
    <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <button wire:click="create()" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mb-4 mt-7">Create New User</button>

            @if($isOpen)
                @include('livewire.users.create')
            @endif

            @if (session()->has('message'))
                <div class="rounded-b bg-green-100 text-teal-900 px-4 py-3 my-3" role="alert">
                    <div class="flex">
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl rounded">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left w-32">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-center">Email</th>
                            <th class="py-3 px-6 text-center">Role</th>
                            <th class="py-3 px-6 text-center w-56">Created at</th>
                            <th class="py-3 px-6 text-center w-48">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $user->id }}</td>
                                <td class="py-3 px-6">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        </div>

                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">member</span>
                                </td>
                                <td class="py-3 px-6 text-center">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button wire:click="edit({{ $user->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded">
                                            <i class="far fa-eye"></i>
                                        </button>

                                        <button wire:click="edit({{ $user->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded">
                                            <i class="far fa-edit"></i>
                                        </button>

                                        <button wire:click="delete({{ $user->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-5">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>