@extends('front.layouts.app')

@section('content')

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">Belt Test Grades</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="maz__instructor-grade-wrapper">
                                <h5 class="maz__belt-grade-info">Number of Tests Needing Grading:  <span class="text-dark ms-2">50</span></h5>
                                <h5 class="maz__belt-grade-info">Number of Try Again Tests Resubmitted:  <span class="text-dark ms-2">12</span></h5>
                                <h5 class="maz__belt-grade-info">Total Number of Unique Students:  <span class="text-dark ms-2">50</span></h5>
                                <h5 class="maz__belt-grade-title mb-4">Bronze (Bignners)</h5>
                                    
                                        <table class="table maz__dashboard__table table-bordered">
                                            <thead>
                                            <tr> 
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Belts</th>
                                            <th scope="col">Date Submitted</th>
                                            <th scope="col">Link to Video</th>
                                            <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td data-column="First Name">Vanessa</td>
                                            <td data-column="Last Name">Lason</td>
                                            <td data-column="Belts">White Yellow 1</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Jose</td>
                                            <td data-column="Last Name">Roberts</td>
                                            <td data-column="Belts">White Yellow 2</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Bob</td>
                                            <td data-column="Last Name">Keebler</td>
                                            <td data-column="Belts">White Yellow 3</td>
                                            <td data-column="Date Submitted">10/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                   
                                <h5 class="maz__belt-grade-title mb-4">Silver(intermediate)</h5>    
                                     
                                        <table class="table maz__dashboard__table table-bordered">
                                            <thead>
                                            <tr> 
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Belts</th>
                                            <th scope="col">Date Submitted</th>
                                            <th scope="col">Link to Video</th>
                                            <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td data-column="First Name">Vanessa</td>
                                            <td data-column="Last Name">Lason</td>
                                            <td data-column="Belts">White Yellow 1</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Jose</td>
                                            <td data-column="Last Name">Roberts</td>
                                            <td data-column="Belts">White Yellow 2</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Bob</td>
                                            <td data-column="Last Name">Keebler</td>
                                            <td data-column="Belts">White Yellow 3</td>
                                            <td data-column="Date Submitted">10/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    
                                <h5 class="maz__belt-grade-title mb-4">Gold(Advanced)</h5>  
                                   
                                        <table class="table maz__dashboard__table table-bordered">
                                            <thead>
                                            <tr> 
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Belts</th>
                                            <th scope="col">Date Submitted</th>
                                            <th scope="col">Link to Video</th>
                                            <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td  data-column="First Name">Vanessa</td>
                                            <td data-column="Last Name">Lason</td>
                                            <td data-column="Belts">White Yellow 1</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Jose</td>
                                            <td data-column="Last Name">Roberts</td>
                                            <td data-column="Belts">White Yellow 2</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Bob</td>
                                            <td data-column="Last Name">Keebler</td>
                                            <td data-column="Belts">White Yellow 3</td>
                                            <td data-column="Date Submitted">10/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                   
                                <h5 class="maz__belt-grade-title mb-4">National Certification</h5>    
                                   
                                        <table class="table maz__dashboard__table table-bordered">
                                            <thead>
                                            <tr> 
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Belts</th>
                                            <th scope="col">Date Submitted</th>
                                            <th scope="col">Link to Video</th>
                                            <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td data-column="First Name">Vanessa</td>
                                            <td data-column="Last Name">Lason</td>
                                            <td data-column="Belts">White Yellow 1</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Jose</td>
                                            <td data-column="Last Name">Roberts</td>
                                            <td data-column="Belts">White Yellow 2</td>
                                            <td data-column="Date Submitted">09/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            <tr>
                                            <td data-column="First Name">Bob</td>
                                            <td data-column="Last Name">Keebler</td>
                                            <td data-column="Belts">White Yellow 3</td>
                                            <td data-column="Date Submitted">10/01/2022</td>
                                            <td data-column="Link to Video">Link</td>
                                            <td data-column="Status" class="text-info">Needing Grading</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                      
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection