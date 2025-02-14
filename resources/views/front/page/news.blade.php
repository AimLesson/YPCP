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
                <img src="{{ asset('storage/' . $news->image) ?? asset('default.jpeg') }}" alt="{{ $news->title }}" class="w-full max-w-12xl mx-auto border shadow-md grid justify-items-center rounded-lg mb-6">
                

                <!-- News Content with Embedded YouTube Video -->
                @php
                    $paragraphs = explode('<br><br>', $news->content);
                @endphp

                <div class="prose max-w-none text-lg text-justify">
                    @foreach ($paragraphs as $index => $paragraph)
                        {!! $paragraph !!}<br><br> {{-- Re-add paragraph separation --}}
                        
                        @if ($news->youtube_link || $news->tiktok_link || $news->instagram_link)
                        <div class="my-8 space-y-8">
                            
                            {{-- Embed YouTube Video --}}
                            @if ($news->youtube_link)
                                <div class="flex justify-center">
                                    <iframe width="660" height="415" 
                                            src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::afterLast($news->youtube_link, '/') }}" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            @endif
                    
                            {{-- Embed TikTok Video --}}
                            @if ($news->tiktok_link)
                                @php
                                    preg_match('/video\/(\d+)/', $news->tiktok_link, $matches);
                                    $tiktokVideoId = $matches[1] ?? null;
                                @endphp
                    
                                @if ($tiktokVideoId)
                                    <div class="flex justify-center">
                                        <blockquote class="tiktok-embed" 
                                                    cite="{{ $news->tiktok_link }}" 
                                                    data-video-id="{{ $tiktokVideoId }}" 
                                                    data-embed-from="embed_page" 
                                                    style="max-width: 605px; min-width: 325px;">
                                            <section>
                                                <a target="_blank" title="TikTok Video" href="{{ $news->tiktok_link }}">View on TikTok</a>
                                            </section>
                                        </blockquote>
                                    </div>
                                @endif
                            @endif
                    
                            {{-- Embed Instagram Post --}}
                            @if ($news->instagram_link)
                                @php
                                    $instagramLink = strtok($news->instagram_link, '?');
                                @endphp
                    
                                <div class="flex justify-center">
                                    <blockquote class="instagram-media" 
                                                data-instgrm-captioned 
                                                data-instgrm-permalink="{{ $instagramLink }}" 
                                                data-instgrm-version="14" 
                                                style="background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; -webkit-calc(100% - 2px); calc(100% - 2px);">
                                        <div style="padding:16px;">
                                            <a href="{{ $instagramLink }}" style="background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                                                <div style="display: flex; flex-direction: row; align-items: center;">
                                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 40px; width: 40px; margin-right: 14px;"></div>
                                                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                        <div style="background-color: #F4F4F4; border-radius: 4px; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                                                        <div style="background-color: #F4F4F4; border-radius: 4px; height: 14px; width: 60px;"></div>
                                                    </div>
                                                </div>
                                                <div style="padding: 19% 0;"></div>
                                                <div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
                                                    <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                                <g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 Z"></path></g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div style="padding-top: 8px;">
                                                    <div style="color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-weight:550; line-height:18px;">
                                                        Lihat postingan ini di Instagram
                                                    </div>
                                                </div>
                                            </a>
                                            <p style="color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                                <a href="{{ $instagramLink }}" style="color:#c9c8cd; text-decoration:none;" target="_blank">
                                                    Sebuah kiriman dibagikan oleh Dicoding Indonesia
                                                </a>
                                            </p>
                                        </div>
                                    </blockquote>
                                </div>
                            @endif
                    
                        </div>
                    
                        {{-- Load scripts once --}}
                        <script async src="https://www.tiktok.com/embed.js"></script>
                        <script async src="//www.instagram.com/embed.js"></script>
                    
                        {{-- Force re-rendering for dynamic embeds --}}
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                if (window.instgrm) {
                                    window.instgrm.Embeds.process();
                                }
                            });
                        </script>
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

        <script async src="https://www.tiktok.com/embed.js"></script>
    </div>
</div>
@endsection
