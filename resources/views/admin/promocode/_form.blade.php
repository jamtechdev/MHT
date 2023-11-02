<div class="row">
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Promocode <span class="text-danger">*</span></label>
			<input id="promocode" type="text" class="form-control @error('promocode') @enderror" name="promocode"
				value="{{ isset($result) ? $result['promocode'] : old('promocode') }}">
			@error('promocode')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="col-md-6">
    <label class="col-form-label">Price Type<span class="text-danger">*</span></label>
		<select name="price_type" id="price_type" class="form-control" style="height:2.2rem;" {{ isset($result) ? 'disabled' : '' }}>
			<option value="">------ Select Price Type -----</option>
			@if(isset($result))
				<option value="1" {{ $result->price_type == 1 ? 'selected' : '' }}>Percentage</option>
				<option value="2" {{ $result->price_type == 2 ? 'selected' : '' }}>Amount</option>
			@else
				<option value="1">Percentage</option>
				<option value="2">Amount</option>
			@endif
			
		</select>
		@error('validity')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
        
    </div>

	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Value <span class="text-danger">*</span></label>
			
			<input id="value" type="number" class="form-control @error('value') @enderror" name="value"
				value="{{ isset($result) ? $result['value'] : old('value') }}" {{ isset($result) ? 'readonly="true"' : '' }}>
			
			@error('value')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<!-- <div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Description <span class="text-danger">*</span></label>
			<textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') @enderror">{{ isset($result) ? $result['description'] : old('description') }}</textarea>

			@error('description')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div> -->
</div>

