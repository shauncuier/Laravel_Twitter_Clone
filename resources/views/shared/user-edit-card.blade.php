<div class="card">
    <div class="px-3 pt-4 pb-2">

        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}"
                        alt="{{ $user->name }}">
                    <div>

                        <input name="name" value="{{ $user-> name }}" type="text" class="form-control">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                @auth()
                    @if (Auth::id() === $user->id)
                        <div class="">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-primary">View</a>
                        </div>
                    @endif
                @endauth
            </div>


            <div>
                <label class="mt-4" for="">Profile Picture</label>
                
                <input name="image" type="file" class="form-control mt-3 ">

                @error('image')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>


                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3"> {{$user->bio}} </textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="mt-4 btn btn-outline-secondary  btn-sm ">Save</button>
                </div>

                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>
                @auth()
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth
            </div>

        </form>

    </div>
</div>
<hr>
