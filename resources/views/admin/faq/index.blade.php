@extends('admin.layouts.app')
@section('title', 'Instructor')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Instructor</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>FAQ List</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="card-title mb-0">FAQ List</h5>
                </div>
                <div class="ibox-content">
                    <div class="add-button-container text-end my-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFaqHeading">Add <i class="fa fa-plus"></i></button>
                    </div>
                    <div class="accordion" id="accordionExample">
                        
                        {{-- Accordion Start --}}
                        @forelse ($faqs as $key => $faq)
                        <div class="row my-2">
                            <div class="col-md-10">
                                <div class="faq_heading accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                            {{ $faq->heading }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}">
                                        <div class="accordion-body">
                                            <div class="mb-2 text-end" role="group" aria-label="Accordion Item 1 Actions">
                                                <a class="btn btn-success" href="{{ route('admin::faq.create',$faq->id) }}">Add <i class="fa fa-plus"></i></a>
                                                {{-- <a class="btn btn-primary delete-faq-heading" href="{{ route('admin::faq.delete.heading.data',$f->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
                                            </div>
                                            
                                            <div class="faq_data">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Question</th>
                                                            <th>Answer</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($faq->faq as $k => $f)
                                                        <tr>
                                                            <td>{{ ++$k }}</td>
                                                            <td>{{ $f->question }}</td>
                                                            <td>{{ $f->answer }}</td>
                                                            <td>
                                                                <a class="text-success" href="{{ route('admin::faq.edit',$f->id) }}"><i class="fa fa-pencil"></i></a>
                                                                <a class="text-danger delete-faq-heading" href="{{ route('admin::faq.delete.heading.data',$f->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <th class="bg-light small text-center" colspan="4">No data available</th>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <a class="btn text-success" href="{{ route('admin::faq.create',$faq->id) }}"><i class="fa fa-plus"></i></a>
                                <a class="btn text-primary edit-faq" href="{{ route('admin::edit.faq.heading',$faq->id) }}"><i class="fa fa-pencil"></i></a>
                                {{-- <button class="btn text-danger"><i class="fa fa-trash"></i></button> --}}
                                <a class="text-danger delete-faq-heading" href="{{ route('admin::faq.delete.heading.data',$faq->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        @empty
                        
                        @endforelse
                        
                        {{-- Accordion End --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addFaqHeading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form class="headingFormSubmit" action="{{ route('admin::store.faq.heading') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add FAQ Heading</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-2">
                        <label class="mb-2" for="heading">Enter Heading <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter heading">
                        <p class="heading_error my-2 text-danger"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    $(document).ready(function(){
        
        // delete faq heading
        $('.delete-faq-heading').click(function(e){
            e.preventDefault();
            var $this = $(this);
            var url = $this.attr('href');
            // alert(url);
            // return false;
            swal({
                title: "Are you sure?",
                text: `You will not be able to recover this Data`,
                icon: "warning",
                buttons: [true, "Yes, delete it!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios.get(url).then((response) => {
                        if(response.data.status == 'error'){
                            toastr.error(response.data.message);
                        }
                        else{
                            toastr.success(response.data.message);
                            setTimeout(function(){
                                window.location.reload();
                            }, 3000);
                        }
                    }).catch((error) => {
                        let data = error.response.data
                        toastr.error(data.message);
                    });
                }
            });
        });
        
        // submit headingFormSubmit
        $('form.headingFormSubmit').submit(function(e){
            e.preventDefault();
            var $this = $(this);
            var method = $(this).attr('method');
            var url = $(this).attr('action');
            console.log(method + '\n' + url + '\n' + $this.serialize());
            // return false;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                method: method,
                data: $this.serialize(),
                url: url,
                dataType: 'json',
                success: function(response){
                    if(response.status == 'error'){
                        $('p.heading_error').text(response.message);
                        toastr.error(response.message);
                    }
                    else{
                        $('p.heading_error').text('');
                        toastr.success(response.message);
                        setTimeout(function(){
                            window.location.reload();
                        },3000)
                    }
                },
                error: function(response){
                }
                
            });
        });

        $('button.edit-faq').click(function(){
            alert();
        });
    });
    
    
</script>
@endpush
