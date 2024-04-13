<h4> Share yours ideas </h4>
<div class="row">
    <form action={{ route('idea.create') }} method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="idea" rows="3" name="idea"></textarea>
        </div>
        <div class="">
            <button class="btn btn-outline-success"> Share </button>
        </div>
    </form>
</div>
