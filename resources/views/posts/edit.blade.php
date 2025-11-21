@extends('layouts.app')

@section('content')
<div class="container mt-[50px]">
    <a class="text-white flex gap-1 items-center mb-5" href="{{ route('post.index') }}">
        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
        </svg>
        Back
    </a>
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <h2 class="text-base font-semibold text-white">Create Posts</h2>
                <p class="mt-1 text-sm/6 text-gray-400">What's on your mind?</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="title" class="block text-sm/6 font-medium text-white">Title</label>
                        <div class="mt-2">
                            <input
                                id="title"
                                value="{{ old('title', $post->title) }}"
                                type="text"
                                name="title"
                                autocomplete="title"
                                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-white sm:text-sm/6"
                            />
                            @error('title')
                                <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-3 py-2 shadow-md" role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-4 w-4 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                        <div>
                                        <p class="text-sm font-bold">{{ $message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="content" class="block text-sm/6 font-medium text-white">Content</label>
                        <div class="mt-2">
                            <textarea id="content" name="content" rows="8" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-white sm:text-sm/6">
                                {{ old('content', $post->content) }}
                            </textarea>
                        </div>
                        <p class="mt-3 text-sm/6 text-gray-400">Write a few sentences content yourself.</p>
                        @error('content')
                            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-3 py-2 shadow-md" role="alert">
                                <div class="flex">
                                    <div class="py-1"><svg class="fill-current h-4 w-4 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                    <div>
                                    <p class="text-sm font-bold">{{ $message }}</p>
                                    </div>
                                </div>
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ url()->previous() }}" type="button" class="text-sm/6 font-semibold text-white">Cancel</a>
            <button type="submit" name="action" value="publish"
                class="cursor-pointer rounded-md bg-white px-3 py-2 text-sm font-semibold text-black focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                Save
            </button>
            <button type="submit" name="action" value="publish"
                class="cursor-pointer rounded-md bg-white px-3 py-2 text-sm font-semibold text-black focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                Publish
            </button>
        </div>
    </form>
</div>
@endsection
