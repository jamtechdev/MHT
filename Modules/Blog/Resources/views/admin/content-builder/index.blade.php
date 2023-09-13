@extends('front.layouts.app')
@section('title',$module_name)

@push('styles')
<link href="{{ config('content-builder.bootstrapcdn_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.content_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.contentbuilder_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.googlefont_css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container">
        <div id="contentarea" class="is-container container content-builder-data">
            @if(isset($result['html_content']))
                {!! $result['html_content'] !!}
            @elseif(isset($blog['description']))
                {!! $blog['description'] !!}
            @else
                <div class="row clearfix">
                    <div class="column full">
                        <div class="center">
                            <i class="icon ion-leaf size-48"></i>
                            <h1 style="font-size: 1.3em">BEAUTIFUL CONTENT</h1>
                            <div class="display">
                                <h1>LOREM IPSUM IS SIMPLY DUMMY TEXT</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="column full">
                        <hr>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="column half">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus leo ante, consectetur sit amet vulputate vel, dapibus sit amet lectus.</p>
                    </div>
                    <div class="column half">
                        <img src="{{ asset('vendor/content-builder/assets/minimalist-basic/e09-1.jpg') }}" alt="">
                    </div>
                </div>
            @endif

        </div>

        <!-- CUSTOM PANEL (can be used for "save" button or your own custom buttons) -->
        <div id="panelCms" class="text-right mb-3">
            <button onclick="save(this)" class="btn btn-primary">Save</button>
        </div>
    </div>

        <form id='description-form' method="POST" action= "{{  (isset($module_name) && $module_name=='Cms' ) ? route('Cms::content.save', $result['id']) : route('blog::description.save', $blog['id']) }}" style="display:none">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <textarea name="{{  (isset($module_name) && $module_name=='Cms' ) ? 'html_content' : 'description' }}" id="description"></textarea>
        </form>
@stop

@push("scripts")
<script type="text/javascript" src="{{ config('content-builder.jquery') }}"></script>
        <script type="text/javascript" src="{{ config('content-builder.jquery-ui') }}"></script>
        <script type="text/javascript" src="{{ config('content-builder.contentbuilder-src') }}"></script>
        <script type="text/javascript" src="{{ config('content-builder.saveimages') }}"></script>

        <script type="text/javascript">
            jQuery(document).ready(() => {

                    var builder = $("#contentarea").contentbuilder({
                                    snippetFile: "/vendor/content-builder/assets/minimalist-basic/snippets-bootstrap.html",
                                    snippetOpen: false,
                                    toolbar: "left",
                                    iconselect: "/vendor/content-builder/assets/ionicons/selecticon.html",
                                });
            });

            function save(ele) {
                $(ele).prop('disabled', true);
                $(ele).html(`<img src="/vendor/content-builder/assets/loader.gif" style="margin-right: 10px;" /> Saving...`);

                // Save all images
                $("#contentarea").saveimages({
                    handler: "{{ route('media::media.store') }}",
                    _token: "{{ csrf_token() }}",
                    onComplete: function () {

                        //Get content
                        var sHTML = $('#contentarea').data('contentbuilder').html();

                        $("#description-form").find("#description").val(sHTML);
                        $( "#description-form" ).submit();

                        $(ele).prop('disabled', false);
                        $(ele).html(`Save`);
                    }
                });
                $("#contentarea").data('saveimages').save();

            }

            function view() {
                /* This is how to get the HTML (for saving into a database) */
                var sHTML = $('#contentarea').data('contentbuilder').viewHtml();

            }
        </script>
@endpush
