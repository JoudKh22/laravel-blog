<div class="comments-section container max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Comments</h2>

    @foreach($comments as $comment)
    <div class="comment mb-4 p-4 bg-gray-100 rounded-lg shadow-sm">
        <div class="flex items-center mb-2">
            <span class="font-semibold text-gray-800">{{ $comment->user->name ?? 'Guest' }}</span>
            <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-gray-700">{{ $comment->body }}</p>
    </div>
    @endforeach

    @auth
    <div class="mt-6">
        <textarea wire:model="newComment" placeholder="Add a comment..." class="w-full p-3 border border-gray-300 rounded mb-2"></textarea>
        <button wire:click="addComment" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Post Comment</button>
    </div>
    @else
    <p class="text-gray-600 mt-4">You must <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> to post a comment.</p>
    @endauth
</div>
