<div class="row">
	<div class="col-md-4">
		<div class="form-group mb-3">
			<label class="col-form-label">First Name <span class="text-danger">*</span></label>
			<input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"
				value="{{ isset($result) ? $result['firstname'] : old('firstname') }}">
			@error('firstname')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
    <div class="col-md-4">
		<div class="form-group mb-3">
			<label class="col-form-label">Last Name <span class="text-danger">*</span></label>
			<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
				value="{{ isset($result) ? $result['lastname'] : old('lastname') }}">
			@error('lastname')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group mb-3">
			<label class="col-form-label">Email <span class="text-danger">*</span></label>
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($result) ? $result['email'] : old('email') }}">
			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
    <div class="col-md-4">
        <label for="phone" class="col-form-label text-md-end">Phone <span class="text-danger">*</span></label>
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ isset($result) ? $result['phone'] : old('phone') }}" maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="age_group" class="col-form-label text-md-end">Age Group <span class="text-danger">*</span></label>
        <select class="form-select @error('age_group') is-invalid @enderror" aria-label="Select Age Group" name="age_group">
            <option value="">Select Age Group</option>
            <option value="Under 10" @if (isset($result['age_group']) && $result['age_group'] == 'Under 10') selected="selected" @endif>Under 10</option>
            <option value="10-13" @if (isset($result['age_group']) && $result['age_group'] == '10-13') selected="selected" @endif>10-13</option>
            <option value="14-17" @if (isset($result['age_group']) && $result['age_group'] == '14-17') selected="selected" @endif>14-17</option>
            <option value="18-20" @if (isset($result['age_group']) && $result['age_group'] == '18-20') selected="selected" @endif>18-20</option>
            <option value="21-29" @if (isset($result['age_group']) && $result['age_group'] == '21-29') selected="selected" @endif>21-29</option>
            <option value="30-39" @if (isset($result['age_group']) && $result['age_group'] == '30-39') selected="selected" @endif>30-39</option>
            <option value="40-49" @if (isset($result['age_group']) && $result['age_group'] == '40-49') selected="selected" @endif>40-49</option>
            <option value="50-59" @if (isset($result['age_group']) && $result['age_group'] == '50-59') selected="selected" @endif>50-59</option>
            <option value="60+" @if (isset($result['age_group']) && $result['age_group'] == '60+') selected="selected" @endif>60+</option>
        </select>
        @error('age_group')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="gender" class="col-form-label text-md-end">Gender <span class="text-danger">*</span></label>
        <select class="form-select @error('gender') is-invalid @enderror" aria-label="Select Gender" name="gender">
            <option value="">Select Gender</option>
            <option value="Male" @if (isset($result['gender']) && $result['gender'] == 'Male') selected="selected" @endif>Male</option>
            <option value="Female" @if (isset($result['gender']) && $result['gender'] == 'Female') selected="selected" @endif>Female</option>
        </select>
        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="profile_picture" class="col-form-label text-md-end">Profile Picture <span class="text-danger">*</span></label>
        <input class="form-control @error('profile_picture') is-invalid @enderror" type="file" id="profile_picture" name="profile_picture">
        @error('profile_picture')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
	@if(!isset($result))
	<div class="col-md-4">
		<div class="form-group mb-3">
			<label class="col-form-label text-md-end">Password <span class="text-danger">*</span></label>
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
				name="password">
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group mb-3">
			<label class="col-form-label text-md-end">Confirm password <span class="text-danger">*</span></label>
			<input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation">
		</div>
	</div>
	@endif
    <div class="col mb-3">
        @if (isset($result['profile_picture']) != '')
        <div class="col-md-4 mt-3">
            <img src="{{ Storage::url($result['profile_picture']) }}" alt="Profile-Picture" width="150"></img>
        </div>
        @else
        <div class="col-md-4 mt-3">
            <img src="/assets/front/images/avatar.png" alt="Profile-Picture" width="150"></img>
        </div>
        @endif
    </div>
</div>

