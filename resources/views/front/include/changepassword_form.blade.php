<div class="row mb-3">
    <div class="col-md-4 col-lg-4 col-xl-4">
        <label for="currentpassword" class="col-form-label text-md-end">{{ __('Current Password') }} <span class="text-primary">*</span></label>
        <input id="currentpassword" type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="currentpassword" required maxlength="20">
        @error('currentpassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-lg-4 col-xl-4">
        <label for="password" class="col-form-label text-md-end">{{ __('New Password') }} <span class="text-primary">*</span></label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required maxlength="20">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-lg-4 col-xl-4">
        <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm New Password') }} <span class="text-primary">*</span></label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required maxlength="20">
    </div>
</div>