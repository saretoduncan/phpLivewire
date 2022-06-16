<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl"> Comments</h1>
        @error('newComment') <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-700 rounded">{{session('message')}}</div>

        @endif
        <form class="my-4 flex" wire:submit.prevent='addComment'>

            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="what's in your mind."
                wire:model='newComment'>
            <div class="py-2">
                <button class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
            </div>
        </form>

        @foreach($comments as $comment)

        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="font-bold text-lg">{{$comment->creator->name}}</p>
                    <p class="mx-3 text-xs text-gray-500 font-semibold align-middle">
                        {{$comment->created_at->diffForHumans()}}</p>
                </div>
                <button class="rounded" wire:click='remove({{$comment->id}})'>x</button>
            </div>
            <p class="text-gray-800">{{$comment['body']}}</p>
        </div>
        @endforeach
        {{$comments->links('pagination-links')}}
    </div>

</div>