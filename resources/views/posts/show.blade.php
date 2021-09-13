<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Détails de ' . $post->title) }}
        </h2>
    </x-slot>

    <div class="overflow-x-hidden bg-gray-100">
    
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <img src="{{ asset('/storage/' . $post->image) }}" alt="Image de {{ $post->title }}">

            <div class="my-5">
                <p>{{ $post->content }}</p>
            </div>

        </div>

        {{-- @include('partials.footer') --}}
    </div>

</x-app-layout>