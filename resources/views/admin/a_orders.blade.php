@extends('layouts.inner')


@section('topnav')
    @include('commons/topnav')
@endsection


@section('sidenav')
    @include('commons/sidenav_admin')
@endsection


@section('content')
<style>
.modal-header, .modal-footer {
    background: #4267b4!important;
}
.modal-header {
    border-bottom: 1px solid #4267b4!important;
}
.input-group-text-custom {
    display: flex;
    align-items: center;
    padding: .375rem .75rem;
    margin-bottom: 0;
    font-size: .88rem;
    font-weight: 400;
    line-height: 1.5;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    background-color: #4267b4;
    border: 1px solid #4267b4;
    border-radius: .25rem;
}
.app-main {
    display: block!important;
}
.form-control {
    border: solid 0px;
    border-bottom: 1px solid #ced4da;
    border-radius: .2rem;
}
</style>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home text-info">
                </i>
            </div>
            <div><a href="{{route('a_home')}}">Administrator Dashboard</a> > Orders </div>
        </div>
    </div>
</div>    
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">All orders
                    <span class="pull-right"> 
                        <!-- <button type="button" class="btn mr-2 mb-2 btn-primary fundsmodal" data-toggle="modal" data-target="#fundsmodal"> <i class="pe-7s-plus text-white">
                </i> Add Course</button> -->
                    </span>
                </h5>
                <br>
                <!-- messges -->
                @if(Session::get('status') && Session::get('status') == 200)
                <!-- hp( $courses = Session::get('courses')) -->
                <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                @if(Session::get('status') && Session::get('status') == 201)
                <!-- pp( $courses = Session::get('courses')) -->
                <div class="alert alert-danger">{{Session::get('message')}}</div>
                @endif
                <!-- recents -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="mb-0 table table-sm reportable">
                        <thead>
                            <tr>
                                <th><small>Order. no</small></th>
                                <th><small>Work type</small></th>
                                <th><small>Subject</small></th>
                                <th><small>Acad. Level</small></th>
                                <th><small>Work pages</small></th>
                                <th><small>Spacing</small></th>
                                <th><small>Urgency</small></th>
                                <th><small>Client email</small></th>
                                <th><small>Client phone</small></th>
                                <th><small>Client timezone</small></th>
                                <th><small>Amount</small></th>
                                <th><small>Topic</small></th>
                                <th><small>Instructions</small></th>
                                <th><small>References</small></th>
                                <th><small>Format</small></th>
                                <th><small>Uploads</small></th>
                                <th><small>Paid</small></th>
                                <th><small>Paid amount</small></th>
                                <th><small>Created</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recents))
                                @foreach( $recents as $r )
                                    @php( $spacing = 'Double-spaced')
                                    @if( $r['work_spacing'] > 1 )
                                        @php( $spacing = 'Single-spaced')
                                    @endif
                                    @php($stream = '#')
                                    @if( strlen($r['content']) )
                                    @php($stream = route('stream', ['file' => $r['content'] ]) )
                                    @endif
                                    <tr>
                                        <td style="min-width: 300px;">{{ $r['orderid'] }}</td>
                                        <td style="min-width: 200px;">{{ \App\Work::find($r['type_of_work'])->name }}</td>
                                        <td>{{ \App\Subject::find($r['subject'])->name }}</td>
                                        <td>{{ $r['work_level'] }}</td>
                                        <td>{{ $r['work_pages'] }}</td>
                                        <td>{{ $spacing }}</td>
                                        <td>{{ \App\Scale::find($r['work_urgency'])->alias }}</td>
                                        <td style="min-width: 120px;">{{ $r['user_email'] }}</td>
                                        <td style="min-width: 120px;">{{ $r['user_phone'] }}</td>
                                        <td>{{ $r['user_timezone'] }}</td>
                                        <td>{{ $r['order_amount'] }}</td>
                                        <td style="min-width: 300px;">{{ $r['work_topic'] }}</td>
                                        <td style="min-width: 300px;">{{ $r['work_instructions'] }}</td>
                                        <td>{{ $r['work_references'] }}</td>
                                        <td>{{ $r['work_format'] }}</td>
                                        <td><a target="_blank" href="{{ $stream }}">View file</a></td>
                                        <td>{{ $r['paid'] }}</td>
                                        <td>{{ $r['pay_amount'] }}</td>
                                        <td style="min-width: 150px;">{{ date('M, jS Y H:i:s', strtotime($r['created_at'])) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <br>
                </div>
                </div>
                <!-- end recents -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('commons/footer')
@endsection
