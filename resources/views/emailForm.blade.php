@extends('front.layouts.app')

@section('content')
<style>
    .error{
        color:red;
    }
    ::placeholder {
        color:#636060 !important;
      opacity: 0.7 !important; /* Firefox */
    }

</style>
<section class="maz__register maz__sections">
    <div class="container">
        <div class="maz__register-plan">
            <form method="POST" action="{{ route('sendReferralEmail') }}" class="maz__register-form" id="subscribeVideoForm">
                @csrf
                <div class="row">
                    <!-- SELECT PACKAGE PLAN HTML -->
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Enter the email's of friends or family members who you want to refer!</h4>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row justify-content-center">
                                    <div class="row">
                                        <div class="col-lg-9 mb-4 mx-auto">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                <textarea class="form-control" name="emails" id="emails" placeholder="enthusiast@martialartszen.com, student@martialartszen.com, apprentice@martialartszen.com" onfocus="this.placeholder=''" onblur="this.placeholder='enthusiast@martialartszen.com, student@martialartszen.com, apprentice@martialartszen.com'"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex  align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-login btn-primary btn-rounded btn-step-1">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script>
        // $(document).ready(function() {
        //     $("#subscribeVideoForm").validate({
        //         errorElement: 'div',
        //         errorPlacement: function (error, element) {
            
        //             error.insertAfter($(element).parent('div').css('color','red'));
                    
        //         },
        //         rules: {
        //             emails: {
        //                 required: true,          
        //             }
        //         },
        //         messages: {
        //             emails: {
        //                 required: "Please enter valid email's",
                      
        //             }
        //         },
                
        //     })
        // });

        $(document).ready(function() {
            $('#emails').blur(function() {
                validateMultipleEmails($('#emails').val());
            });
        });

        function validateMultipleEmails(emailInput) {
            // Get value on emails input as a string
            var emails = emailInput;
            
            // Split string by comma into an array
            emails = emails.split(",");

            var valid = true;
            var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
            var invalidEmails = [];
            
            for (var i = 0; i < emails.length; i++) {
                // Trim whitespaces from email address
                emails[i] = emails[i].trim();
                
                // Check email against our regex to determine if email is valid
                if( emails[i] == "" || ! regex.test(emails[i])){
                    invalidEmails.push(emails[i]);
                }
            }
            
            // Output invalid emails
            $('.input-group .text-danger').remove();
            if(invalidEmails != 0) {
                $('.input-group').append('<div class="col-md-12"><p class="text-danger">Invalid emails. Input commas directly after emails to send.</p></div>');
            }
        }
    </script>
@endpush
