<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>

        <div class="mb-2 text-lg text-gray-500">
            {!! $post->extract !!}

        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- contenido principal --}}

            <div class="lg:col-span-2">

                <figure>
                    @if ($post->image)
                    <img class="object-cover object-center w-full h-80" src="{{ Storage::url($post->image->url) }}" alt="">
                    @else
                    <img class="object-cover object-center w-full h-80" src="https://cdn.pixabay.com/photo/2021/03/02/13/04/laptop-6062423_960_720.jpg" alt="">
                    @endif
                </figure>

                <div class="mt-4 text-base text-gray-500">
                    {!! $post->body !!}
                </div>

            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="mb-4 text-2xl font-bold text-gray-600">Más en {{ $post->category->name }}</h1>

                <ul>
                    @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('posts.show', $similar)}}">
                            @if ($similar->image)
                            <img class="object-cover object-center h-20 w-36 " src="{{Storage::url($similar->image->url)}}">
                            @else
                            <img class="object-cover object-center h-20 w-36 " src="https://cdn.pixabay.com/photo/2021/03/02/13/04/laptop-6062423_960_720.jpg">
                            @endif
                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                        </a>
                    </li>
                        
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>



</x-app-layout>
