<div class="row">
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Plan Name <span class="text-danger">*</span></label>
			<input id="plan_name" type="text" class="form-control @error('plan_name') @enderror" name="plan_name"
				value="{{ isset($result) ? $result['plan_name'] : old('plan_name') }}">
			@error('plan_name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Price <span class="text-danger">*</span></label>
			<input id="price" type="number" class="form-control @error('price')@enderror" name="price"
				value="{{ isset($result) ? $result['price'] : old('price') }}">
			@error('price')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
    <div class="col-md-6">
    <label class="col-form-label">Validity <span class="text-danger">*</span></label>
        <div class="input-group mb-1">
            <input type="number" class="form-control" id="validity_number" name="validity_number" value="{{ isset($result) ? $result['validity'] : old('validity') }}">
            <select name="validity_type" id="validity_type" class="form-control" style="height:2.2rem;">
                <option value="">------ Select Validity Type -----</option>
                @if(isset($result))
                {
                    <option value="1" {{ $result->validity_type == 1 ? 'selected' : '' }}>Day</option>
                    <option value="2" {{ $result->validity_type == 2 ? 'selected' : '' }}>Month</option>
                    <option value="3" {{ $result->validity_type == 3 ? 'selected' : '' }}>Year</option>
                    <option value="4" {{ $result->validity_type == 4 ? 'selected' : '' }}>Lifetime</option>
                }
                @else
                {
                    <option value="1">Day</option>
                    <option value="2">Month</option>
                    <option value="3">Year</option>
                    <option value="4">Lifetime</option>
                }
                @endif
               
            </select>
            @error('validity')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-form-label">Benefits <span class="text-danger">*</span></label>
        <div class="input-group mb-1">
            <select class="form-control" id="benefits" name="benefits[]" multiple="multiple">
            @php    
                if(isset($result))
                {
                    $selectedBenefits = array();
                    
                    $selectedBenefits = explode(",",$result->benefits);
            
                    foreach($benefits as $key=>$value)
                    {
                        if(in_array($key,$selectedBenefits))
                        {
                            echo "<option value='$key' selected>$value</option>";
                        }
                        else
                        {
                            echo "<option value='$key'>$value</option>";
                        }
                    }    
                }
                else
                {
                    foreach($benefits as $key=>$value)
                    {
                        echo "<option value='$key'>$value</option>";
                    }
                }
            @endphp    
            </select>   

            @error('benefits')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
               
        </div> 
    </div>
    <div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') @enderror">{{ isset($result) ? $result['description'] : old('description') }}</textarea>

			@error('description')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
</div>
