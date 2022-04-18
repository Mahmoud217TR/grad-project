<div class="row mb-3 px-5">
    <div class="col">
        <label for="name" class="col-form-label text-start ">{{ __('Language Name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $language->name??old('name') }}" required autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3 px-5">
    <div class="col">
        <label for="description" class="col-form-label text-start">{{ __('Language Description') }}</label>
        <ckeditor-component input-id='description' input-name='description' data='{{ $language->description??old('description') }}'></ckeditor-component>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>