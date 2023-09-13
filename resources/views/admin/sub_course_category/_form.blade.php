<div class="row">
<div class="col-md-6">
        <label class="col-form-label">Select Main Category<span class="text-danger">*</span></label>
        <div class="input-group mb-1">
            <select class="form-control" id="main_category_id" name="main_category_id">
            @php    
                if(isset($result))
                {
                  
                    foreach($courseCategories as $key=>$value)
                    {
                        if($key == $result->main_category_id)
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
					echo "<option value=''>Select Main Category</option>";
                    foreach($courseCategories as $key=>$value)
                    {
                        echo "<option value='$key'>$value</option>";
                    }
                }
            @endphp    
            </select>   

            @error('main_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
               
        </div> 
    </div>
	<div class="col-md-6">
		<div class="form-group mb-3">
			<label class="col-form-label">Sub Category Name <span class="text-danger">*</span></label>
			<input id="sub_cat_name" type="text" class="form-control @error('name') @enderror" name="sub_category_name"
				value="{{ isset($result) ? $result['sub_category_name'] : old('sub_category_name') }}">
			@error('sub_cat_name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
</div>
