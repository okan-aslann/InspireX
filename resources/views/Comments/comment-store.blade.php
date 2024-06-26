<div class="mb-2">
    <form action="{{ route('tweets.comments.store', $tweet->id) }}" method="POST">
        @csrf
        <div class="comment flex items-center mb-2">
            <textarea name="content" placeholder="Write your comment" class="border rounded-lg px-4 py-2 w-full focus:outline-none resize-none"></textarea>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-2 rounded-full ml-2">Post</button>
        </div>
    </form>
</div>
