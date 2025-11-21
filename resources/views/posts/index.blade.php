@extends('layouts.app')

@section('content')
<div class="container mt-[50px]">
    @if (session('success'))
         <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="fixed top-4 right-4 bg-red-100/15 border border-red-400 text-red-400 px-4 py-2 rounded shadow-lg"
        >
            {{ session('success')}}
        </div>
    @endif

    <ul role="list" class="divide-y divide-white/5">
        @auth
            <div class="w-full flex pb-7">
                <a
                class="cursor-pointer btn inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal"
                href="{{ route('post.create') }}">Create New Post
            </a>
            </div>
        @endauth
        @foreach ( $posts as $post )
            <a href="{{ route('post.show', $post->id) }}" class="hover:bg-white">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex items-center min-w-0 gap-x-4">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="" class="size-12 flex-none rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10" />
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-white">{{ $post->title }}</p>
                            <div class="flex row">
                                <p class="mt-1 text-xs/5 text-gray-400 truncate text-ellipsis xs:text-clip ...">
                                    <span>{{ $post->user->name }}</span> ●
                                    @if($post->published_at)
                                        <strong class="font-semibold text-white">Published at</strong>
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y H:i A') }}
                                    @else
                                        Created at
                                        {{ $post->created_at->format('M d, Y H:i A') }}
                                    @endif</span>
                                </p>
                            </div>
                            <p class="mt-1 text-xs/5 text-gray-400 truncate text-ellipsis xs:text-clip ...">{{ $post->content }}</p>
                        </div>
                    </div>
                </li>
            </a>
        @endforeach
    </ul>
    {{ $posts->links() }}

</div>
@endsection
