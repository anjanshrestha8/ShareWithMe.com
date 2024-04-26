<div>
    <form method="post" action="{{ route('ideas.like', $idea->id) }}">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                {{-- {{ $idea->likes()->count() }} --}}
            </span>
        </button>
    </form>
</div>
