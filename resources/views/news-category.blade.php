@extends('layouts.app')
@section('title') @stop

@section('content')
    
    <div class="mt-5">
        <div class="flex">
            {{-- <div class="flex-1"><h1 class="text-blue-100 text-2xl">{{__($category_blog->title)}}</h1></div> --}}
        </div>


        <div class="flex-none lg:flex md:flex-none">
            <div class="flex-0 lg:w-4/5 md:w-full lg:pe-8 md:pe-0">
            
                {{-- news --}}
                <h1 class="text-blue-100"></h1>
                <section>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        {{-- @foreach ($category_blog->blog()->orderBy('created_at', 'desc')->get() as $blog) --}}
                        @foreach($categoryBlog as $blog)
                            @if($blog->language->code == app()->getLocale() && $blog->status == "active")
                                <div class="bg-gray-900 rounded-xl hover:-translate-y-2 hover:shadow-xl ease-in-out duration-200 relative">
                                    <a href="/news/{{$blog->slug}}" class="w-full absolute h-full bg-transparent"></a>
                                    <div class="mb-2 object-cover lg:h-48 sm:h-48 h-80"><img class="w-full h-full object-cover rounded-t-xl" src="{{url('images/' . $blog->image)}}" alt=""></div>
                                    <div class="bg-gray-900 pb-4 px-4 rounded-b-xl">
                                        <div class="flex mb-2 text-gray-500">
                                            <div class="flex-0">
                                                <small>{{$blog->category->title}}</small>
                                            </div>
                                            <div class="flex-0 px-2">
                                                <small>•</small>
                                            </div>
                                            <div class="flex-0">
                                                <small>{{$blog->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                        <div class="mb-2"><h1 class="text-blue-100 text-md font-bold mb-4 leading-6">{{$blog->title}}</h1></div>
                                        <div class="mb-2">
                                            <span class="text-blue-100">{!! Str::limit($blog->short_description, 80) !!}</span>
                                            <span><a href="/news/{{ $blog->slug }}" class="text-gray-500 hover:text-gray-400 ease-in-out duration-200">{{__('Read more')}}</a></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="text-white">{{$categoryBlog->links('pagination::tailwind')}}</div>
                </section>
                @include('layouts.news-recommended')
                @include('layouts.feature-game')
            </div>

            <div class="flex-0 lg:w-1/5 md:w-100 lg:pt-0 md:pt-12">
                <div class="p-4 hidden lg:block bg-gray-900 rounded-xl text-blue-100">
                    <h1 class="text-xl pb-4">{{__('Categories')}}</h1>
                    <ul class="">
                    @foreach ($categories as $category)
                        <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200 hover:text-indigo-400">
                            <a href="/news/category/{{$category->slug}}">{{__($category->title)}}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
    </div>

@endsection