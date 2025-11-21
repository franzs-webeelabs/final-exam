@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded shadow-lg"
        >
            {{ session('success')}}
        </div>
    @endif
    <div class="relative isolate overflow-hidden 0 px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg aria-hidden="true" class="absolute top-0 left-[max(50%,25rem)] h-256 w-512 -translate-x-1/2 mask-[radial-gradient(64rem_64rem_at_top,white,transparent)] stroke-gray-800">
            <defs>
                <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-800/50">
                <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" stroke-width="0" />
            </svg>
        </div>
        <div>
            @if(Auth::check() && Auth::id() === $post->user_id)
                <div class="flex w-full justify-between items-center gap-3 my-6">
                    <a class="text-white flex gap-1 items-center" href="{{ route('post.index') }}">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                        </svg>
                        Back
                    </a>
                    <div class="flex items-center gap-2">
                        {{-- Edit Button --}}
                        <a href="{{ route('post.edit', $post->id) }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Edit
                        </a>
                        {{-- Delete Button --}}
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-block px-5 py-1.5 bg-red-500/30 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="lg:px-8">

                <div class="lg:pr-4">
                    <div class="">
                        <p class="text-base/7 font-semibold text-indigo-400">{{ $post->user->name }}</p>
                        <h1 class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">{{ $post->title }}</h1>
                        <p class="mt-6 text-xl/8 text-gray-300">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
            <div class="-mt-12 -ml-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
            {{-- <img src="https://tailwindcss.com/plus-assets/img/component-images/dark-project-app-screenshot.png" alt="" class="w-3xl max-w-none rounded-xl bg-gray-800 shadow-xl ring-1 ring-white/10 sm:w-228" /> --}}
            </div>
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
            <div class="lg:pr-4">
                <div class="max-w-xl text-base/7 text-gray-400 lg:max-w-lg">
                    <ul role="list" class="mt-8 space-y-8 text-gray-400">
                        <li class="flex gap-x-3">
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="mt-1 size-5 flex-none text-indigo-400">
                                <path d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                            <span><strong class="font-semibold text-white">Created at </strong>{{ $post->created_at->format('M d, Y H:i A') }}</span></li>
                        <li class="flex gap-x-3">
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="mt-1 size-5 flex-none text-indigo-400">
                                <path d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                            <span>
                                @if($post->published_at)
                                    <strong class="font-semibold text-white">Published at</strong>
                                    {{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y H:i A') }}
                                @else
                                    Not published yet
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
