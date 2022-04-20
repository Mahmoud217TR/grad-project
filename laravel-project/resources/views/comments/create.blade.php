<div class="col-lg-8 ps-2 my-2">
    <form method="POST" action="{{ route('comment.store') }}">
        @csrf
        <input type="text" name="post_id" hidden value="{{ $post->id }}">
        <div class="row row-cols-auto">
            <div class="col-12 col-sm-7 form-floating">
                <label for="floatingTextarea"><p class="text-dark">Comments</p></label>
                <ckeditor-component input-id='floatingTextarea' input-name='content' data='{{ old('content') }}'></ckeditor-component>
                @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-12 col-sm-5">
                <button type="submit" class="d-block btn button-primary btn-sm shadow-none me-2" type="button">Post comment</button>
                <button class="d-block btn btn-outline-danger btn-sm shadow-none" type="button">Cancel</button>
            </div>
        </div>
    </form>
</div>