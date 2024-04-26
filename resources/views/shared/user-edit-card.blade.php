<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="Post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" {{ $user->getImageURL() }}"
                        alt="{{ $user->name }} ">
                    <div>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth()
                        @if (Auth::id() == $user->id)
                            <a href="{{ route('users.show', $user->id) }}"><button
                                    class="btn btn-outline-success btn-sm">View</button></a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="mt-5">
                <label for="" class="mb-2">Profile Image :</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5 "> Bio : </h5>


                <div class="mb-3">
                    <textarea class="form-control" id="content" rows="3" name="bio">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class=" d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>


                <a href="{{ route('users.update', $user->id) }}"><button
                        class="btn btn-success btn-sm mb-3 ">Save</button></a>



                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>

            </div>
        </form>
    </div>
</div>
