<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edition de ' . $post->title) }}
        </h2>
    </x-slot>

    <div class="overflow-x-hidden bg-gray-100">
    
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="mt-10">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <x-label for="title">Titre du post</x-label>
                    <x-input id="title" name="title" value="{{ $post->title ?? old('title') }}" />
                    <p class="text-red-500">{{ $errors->first('title') }}</p>
                </div>

                <div class="mb-3">
                    <x-label for="content">Contenu du post</x-label>
                    <textarea name="content" id="content" cols="30" rows="10">{{ $post->content ?? old('content') }}</textarea>
                    <p class="text-red-500">{{ $errors->first('content') }}</p>
                </div>

                <div class="mb-3">
                    <x-label for="image">Image</x-label>
                    <x-input id="image" name="image" type="file" value="{{ $post->image ?? old('image') }}" />
                    <p class="text-red-500">{{ $errors->first('image') }}</p>
                </div>

                <div class="mb-3">
                    <x-label for="category">Catégorie du post</x-label>
                    <select name="category" id="category">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                        
                    </select>
                </div>

                <div class="mt-5">
                    <x-button>Modifier</x-button>
                </div>

            </form>

        </div>

        {{-- @include('partials.footer') --}}
    </div>

</x-app-layout>