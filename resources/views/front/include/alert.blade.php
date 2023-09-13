@if(session()->has('success'))
    <div class="alert alert-success mb-0" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('success1'))
    <div class="alert1 alert-success mb-0" id="success1" role="alert" style="position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;border-radius: 0.25rem;">
        {{ session()->get('success1') }}
    </div>
@endif

@if(session()->has('status'))
    <div class="alert alert-success mb-0" role="alert">
        {{ session()->get('status') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger mb-0" role="alert">
        {{ session()->get('error') }}
    </div>
@endif
@if(session()->has('errors'))
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif