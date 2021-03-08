<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard / Manage Todos
    </h2>
</x-slot>

<div class="overflow-x-auto">
    <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
           <button wire:click="create()" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mb-4 mt-7">Create New Todo</button>

            @if($isOpen)
                @include('livewire.todos.create')
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
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-center">Content</th>
                            <th class="py-3 px-6 text-center w-56">Created at</th>
                            <th class="py-3 px-6 text-center w-48">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($todos as $todo)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $todo->id }}</td>
                                <td class="py-3 px-6">{{ $todo->name }}</td>
                                <td class="py-3 px-6 text-center">{{ $todo->content }}</td>
                                <td class="py-3 px-6 text-center">{{ $todo->created_at->format('d M Y') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button wire:click="edit({{ $todo->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded">
                                            <i class="far fa-eye"></i>
                                        </button>

                                        <button wire:click="edit({{ $todo->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded">
                                            <i class="far fa-edit"></i>
                                        </button>

                                        <button wire:click="delete({{ $todo->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-5">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>