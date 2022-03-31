
<div class="row mb-3 px-5">
    <div class="col">
        <label for="code_snippet" class="col-form-label text-start">{{ __('Code Snippet') }}</label>
        <textarea  rows="5" id="code_snippet"  class="form-control @error('code_snippet') is-invalid @enderror" name="code_snippet" required >{{ $snippet->code_snippet??old('code_snippet') }}</textarea>
        @error('code_snippet')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3 px-5">
    <div class="col">
        <label for="note" class="col-form-label text-start">{{ __('Note') }}</label>
        <textarea  rows="5" id="note"  class="form-control @error('note') is-invalid @enderror" name="note" required >{{ $snippet->note??old('note') }}</textarea>
        @error('note')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3 px-5">
    <div class="col">
        <label for="code_id" class="col-form-label text-start">{{ __('Code') }}</label>
        <select name="code_id" id="code_id"  class="form-select">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}" @selected($snippet->code_id == $code->id)>{{ $code->title }}</option>
            @endforeach
        </select>
        @error('code_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3 px-5">
    <div class="col">
        <label for="language_id" class="col-form-label text-start">{{ __('Language') }}</label>
        <select name="language_id" id="language_id" class="form-select">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected($snippet->language_id == $language->id)>{{ $language->name }}</option>
            @endforeach
        </select>
        @error('language_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>