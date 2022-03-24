<div class="row mb-3 px-5">
    <div class="col">
        <label for="title" class="col-form-label text-start ">{{ __('Code Title') }}</label>
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $code->title??old('title') }}" required autofocus>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3 px-5">
    <div class="col">
        <label for="description" class="col-form-label text-start">{{ __('Code Description') }}</label>
        <textarea  rows="5" id="description"  class="form-control @error('description') is-invalid @enderror" name="description" required >{{ $code->title??old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>