<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="col-form-label">Title <span class="text-danger">*</span></label>
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ isset($result) ? $result['title'] : old('title') }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="col-form-label">Description <span class="text-danger">*</span></label>
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                value="{{ isset($result) ? $result['description'] : old('description') }}">
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
