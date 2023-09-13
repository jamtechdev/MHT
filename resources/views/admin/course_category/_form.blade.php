<div class="row">
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Name <span class="text-danger">*</span></label>
			<input id="name" type="text" class="form-control @error('name') @enderror" name="name"
				value="{{ isset($result) ? $result['name'] : old('name') }}">
			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Description <span class="text-danger">*</span></label>
			<input id="description" type="text" class="form-control @error('description')@enderror" name="description"
				value="{{ isset($result) ? $result['description'] : old('description') }}">
			@error('description')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
</div>
