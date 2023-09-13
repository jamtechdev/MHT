@extends('admin.layouts.app')
@section('title', $module_name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2>{{ $module_name }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url(config('settings.ADMIN_PREFIX')) }}">Home</a>
            </li>
        </ol>
    </div>
</div>
{{-- Start Statistic Section --}}
<div class="row mt-4">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right">{{$statisticsData['totalStudent']}}</span>
                </div>
                <h5>Total {{ ($statisticsData['totalStudent'] > 1) ? 'Students' : 'Student' }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$statisticsData['totalStudent']}}</h1>
                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                <small>Total {{ ($statisticsData['totalStudent'] > 1) ? 'Students' : 'Student' }}</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right">{{$statisticsData['totalInstructor']}}</span>
                </div>
                <h5>Total {{ ($statisticsData['totalInstructor'] > 1) ? 'Instructors' : 'Instructor' }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$statisticsData['totalInstructor']}}</h1>
                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                <small>Total {{ ($statisticsData['totalInstructor'] > 1) ? 'Instructors' : 'Instructor' }}</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-primary float-right">{{$statisticsData['totalFreeStudent']}}</span>
                </div>
                <h5>Total Free {{ ($statisticsData['totalFreeStudent'] > 1) ? 'Students' : 'Student' }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$statisticsData['totalFreeStudent']}}</h1>
                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                <small>Total Free {{ ($statisticsData['totalFreeStudent'] > 1) ? 'Students' : 'Student' }}</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-danger float-right">{{$statisticsData['totalPaidStudent']}}</span>
                </div>
                <h5>Total Paid {{ ($statisticsData['totalPaidStudent'] > 1) ? 'Students' : 'Student' }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$statisticsData['totalPaidStudent']}}</h1>
                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                <small>Total Paid {{ ($statisticsData['totalPaidStudent'] > 1) ? 'Students' : 'Student' }}</small>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right">{{$statisticsData['totalVerifiedStudent']}}</span>
                </div>
                <h5>Total Verified {{ ($statisticsData['totalVerifiedStudent'] > 1) ? 'Students' : 'Student' }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$statisticsData['totalVerifiedStudent']}}</h1>
                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                <small>Total Verified {{ ($statisticsData['totalVerifiedStudent'] > 1) ? 'Students' : 'Student' }}</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right">{{$statisticsData['totalPendingStudent']}}</span>
                </div>
                <h5>Total Pending {{ ($statisticsData['totalPendingStudent'] > 1) ? 'Students' : 'Student' }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{$statisticsData['totalPendingStudent']}}</h1>
                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                <small>Total Pending {{ ($statisticsData['totalPendingStudent'] > 1) ? 'Students' : 'Student' }}</small>
            </div>
        </div>
    </div>
</div>
{{-- End Statistic Section --}}
@endsection
