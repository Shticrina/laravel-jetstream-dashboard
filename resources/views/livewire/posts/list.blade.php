<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard / Manage Posts
    </h2>
</x-slot>

<div class="overflow-x-auto">
    <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="flex flex-wrap content-end">
                <button wire:click="create()" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mb-4 mt-7">Create New Post</button>
            </div>

            @if($isOpen)
                @include('livewire.posts.create')
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
                            <th class="py-3 px-6 text-center">Body</th>
                            <th class="py-3 px-6 text-center w-56">Created at</th>
                            <th class="py-3 px-6 text-center w-48">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($posts as $post)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $post->id }}</td>
                                <td class="py-3 px-6 text-left">{{ $post->title }}</td>
                                <td class="py-3 px-6 text-center">{{ $post->body }}</td>
                                <td class="py-3 px-6 text-center">{{ $post->created_at->format('d M Y') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button wire:click="edit({{ $post->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded">
                                            <i class="far fa-eye"></i>
                                        </button>

                                        <button wire:click="edit({{ $post->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded">
                                            <i class="far fa-edit"></i>
                                        </button>

                                        <button wire:click="delete({{ $post->id }})" class="text-gray-500 hover:text-gray-700 text-white font-bold p-2 rounded"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-5">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>