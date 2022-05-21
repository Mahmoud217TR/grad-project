<div class="row pt-2">
    <div class=" col-md-4  col-12 mb-2">
        <label for="title">Sheet Title</label>
    </div>
    <div class="row">
        <div class="col-md-7 col-12">
            <input type="text" name='title' id='title' class="form-control  box" id="title-sheet" placeholder="Sheet Title" value="{{ $sheet->title??old('title') }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row pt-3">
    <div class="form-group col-11">
        <label for="description" class="mb-2">Description</label>
        <ckeditor-component input-id='description' input-name='description' data='{{ $sheet->description??old('description') }}'></ckeditor-component>
        @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
</div>
<div class="row pt-3">
    <div class="form-group col-11">
        <label for="status" class="col-form-label text-start">{{ __('Status') }} {{ $sheet->status }}</label>
        <select name="status" id="status"  class="form-select">
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected($sheet->status == $status)>{{ $status }}</option>
            @endforeach
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>