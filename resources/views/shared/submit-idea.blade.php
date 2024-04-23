@auth()
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action={{ route('idea.create') }} method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" id="content" rows="3"name="content" resize="none"></textarea>
            </div>
            @error('content')
                <span class=" d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror

            <div class="">
                <button class="btn btn-success"> Share </button>
            </div>
        </form>
    </div>
@endauth

@guest()
    <h4>Please login to share your knowledge.....</h4>
@endguest
