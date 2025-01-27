@extends('front.layout.app')
@section('title', $news->title)
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main News Section -->
        <div class="lg:col-span-3">
            <div class="mb-12">
                <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
                <p class="text-gray-500 mb-6">{{ $news->created_at->format('d M Y') }} | {{ $news->branch->name ?? 'No Branch' }}</p>
                <img src="{{ asset('storage/' . $news->image) ?? asset('default-image.jpg') }}" alt="{{ $news->title }}" class="w-full max-w-12xl mx-auto border shadow-md grid justify-items-center rounded-lg mb-6">
                
                <!-- News Content with Embedded YouTube Video -->
                @php
                    // Split content by <br><br> to separate paragraphs
                    $paragraphs = explode('<br><br>', $news->content);
                    $embedPosition = 1; // Insert video after the 2nd paragraph (0-based index)
                @endphp

                <div class="prose max-w-none text-lg text-justify">
                    @foreach ($paragraphs as $index => $paragraph)
                        {!! $paragraph !!}<br><br> {{-- Re-add paragraph separation --}}
                        
                        @if ($index == $embedPosition && $news->youtube_link)
                        <!-- Embed YouTube Video -->
                        <div class="my-8 flex justify-center">
                            <iframe width="660" height="415" 
                                    src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::afterLast($news->youtube_link, '/') }}" 
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Related News Section -->
        <div class="lg:col-span-1">
            <h2 class="text-xl font-semibold mb-4">Related News</h2>
            @if($relatedNews->count())
            <div class="space-y-6">
                @foreach ($relatedNews as $n)
                <div class="flex flex-col overflow-hidden rounded-lg border bg-white shadow hover:shadow-lg transition duration-200">
                    <a href="{{ route('news.show', $n->slug) }}" class="group relative block h-36 overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $n->image) }}" loading="lazy" alt="{{ $n->title }}" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col p-4">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <a href="{{ route('news.show', $n->slug) }}" class="transition duration-100 hover:text-indigo-500">{{ $n->title }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 mt-2">{{ \Illuminate\Support\Str::limit(strip_tags($n->content), 60, '...') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
