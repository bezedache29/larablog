<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="text-5xl font-bold text-center mb-7">Liste de mes posts</h1>

                    <table class="w-full border border-gray-500">
                        <thead>
                            <tr>
                                <th class="p-2 text-white bg-black border-r border-white">#</th>
                                <th class="p-2 text-white bg-black border-r border-white">Titre</th>
                                <th class="p-2 text-white bg-black border-r border-white">Contenu</th>
                                <th colspan="2" class="p-2 text-white bg-black border-l border-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr class="border border-gray-400">
                                    <td class="px-2 py-4 text-center border border-gray-400">{{ $key + 1 }}</td>
                                    <td class="px-2 py-4 border border-gray-400">
                                        <a href="{{ route('posts.show', $post) }}" 
                                            class="text-blue-400 hover:text-blue-500 hover:underline">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td class="px-2 py-4 border border-gray-400">{{ Str::limit(ucfirst($post->content), 40) }}</td>
                                    <td class="px-2 py-4 text-center">
                                        <a href="{{ route('posts.edit', $post) }}" class="p-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-400">
                                            Modifier
                                        </a>
                                    </td>
                                    <td class="px-2 py-4 text-center">
                                        <a href="{{ route('posts.destroy', $post) }}" class="p-2 text-white bg-red-500 rounded-md hover:bg-red-400">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
