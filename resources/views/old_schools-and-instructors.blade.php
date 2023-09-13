
@extends('front.layouts.app')
<style>
    h1.our-school {
        font-size: 2.75rem;
        font-weight: 100;
    }
    select#selInstructorDropdown {
        border-color: #bad8fd;
    }
    .maz__instructor-content {
        height: 100px;
        max-height: 88px;
    }
</style>

@section('content')
<section class="maz__bg_gray maz__sections">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-4 col-md-6">
                <h1 class="our-school">Our Schools</h1>
            </div>
            <div class="col-xl-3 col-md-3">
                <select class="form-select dropdown-list" id="selInstructorDropdown">
                    <option value="All" {{ ($selIns == 'All') ? 'selected' : '' }}>Filter by Discipline ...</option>
                    @if(count($discplineDropdownData))
                        @foreach($discplineDropdownData as $insdropData)
                            <option value="{{ $insdropData->id }}" {{ ($selIns == $insdropData->id) ? 'selected' : '' }}>{{ ucwords($insdropData->title) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
       
        <div class="row mt-4">
            @if(count($instructorData))
                @foreach($instructorData as $insData)
                @php
                    $data = "";

                    $disc = array();

                    $instructorDisciplines= \App\Models\InstructorDiscipline::where('instructor_id', '=', $insData['id'])->get();

                    if(count($instructorDisciplines))
                    {
                        foreach($instructorDisciplines as $disciplines)
                        {
                            $instructorDisc = \App\Models\Discipline::where('id', '=', $disciplines->discipline_id)->first();

                            
                            if($instructorDisc)
                            {
                                array_push($disc, $instructorDisc->title);
                            }

                            
                        }

                        $data = implode(" , ",$disc);

                    }
                @endphp
               
                <div class="col-md-6 col-xl-4">
                    <div class="maz__school__instructor__block">
                        <a href="{{ route('schools-and-instructors-detail',  $insData['id']) }}">
                            <div class="maz__instructor-img">
                                @if($insData['photo'] != '')
                                    {{-- Storage::url($insData->photo) --}}
                                    <img data-src="{{ $insData['photo'] }}" class="lazy" alt="{{ $insData['name'] }}">
                                @else
                                    <img data-src="{{ asset('assets/front/images/avtar.png') }}" class="lazy" alt="{{ $insData['name'] }}">
                                @endif
                            </div>
                            <div class="maz__instructor-content">
                                <p class="fs-4 mb-0">{{ ucwords($insData['school_name']) }}</p>
                                <!-- <p class="fs-4 mb-0"> {{ $data }}</p> -->
                               
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        @if($selIns == "All")
        <div style="float:right;">
            {{ $instructorData->links() }}
        </div>
       @endif
       {{--<div class="row mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="fas fa-angle-double-left align-middle"></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true" class="fas fa-angle-double-right align-middle"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>--}} 
    </div>
</section>
@endsection
@push('scripts')
    <script>
        $(function() {
            // Instructor Search Dropdown Filter
            $("#selInstructorDropdown").change(function() {
                if($(this).val() != 'All') {
                    var baseURL = '{{ url("/") }}';
                    window.location.href = baseURL + '/schools-and-instructors?selIns='+ $(this).val();
                } else {
                    window.location.href = '{{ url("schools-and-instructors") }}';
                }
            });
        });
    </script>
@endpush