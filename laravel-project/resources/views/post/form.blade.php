<div class="row">
    <div class="col-10 form-group">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title</span>
            <input type="text" class="form-control shadow-none" placeholder="Post Title" id='title' name='title' value="{{ $post->title??old('title') }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <div class="input-group mb-3">
            <ckeditor-component input-id='content' input-name='content' data='{{ $post->content??old('content') }}'></ckeditor-component>
        </div>
        @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-12">
        <label for="status" class="col-form-label text-start">{{ __('Status') }} {{ $post->status }}</label>
        <select name="status" id="status"  class="form-select">
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected($post->status == $status)>{{ $status }}</option>
            @endforeach
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>