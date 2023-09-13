<div class="row">
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Benefit <span class="text-danger">*</span></label>
			<input id="benefit" type="text" class="form-control @error('benefit') @enderror" name="benefit"
				value="{{ isset($result) ? $result['benefit'] : old('benefit') }}">
			@error('benefit')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
</div>

