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
            <div><a href="{{route('a_home')}}">Administrator Dashboard</a> > Price List </div>
        </div>
    </div>
</div>    
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Price List
                    <span class="pull-right"> 
                        <button type="button" class="btn mr-2 mb-2 btn-primary fundsmodal" data-toggle="modal" data-target="#fundsmodal">
                            <i class="pe-7s-plus text-white"></i> Add Price
                        </button>
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
                                <th><small>#Id</small></th>
                                <th><small>Deadline(hours)</small></th>
                                <th><small>Deadline(label)</small></th>
                                <th><small>Price(per pg)</small></th>
                                <th><small>Work group</small></th>
                                <th><small>Edit</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recents))
                                @foreach( $recents as $r )
                                    @php($kind = 'Word')
                                    @php($pr = "'" . $r['factor'] . "'")
                                    @if($r['type'] == '2')
                                        @php($kind = 'Tech')
                                    @endif
                                    <tr>
                                        <td>{{ $r['id'] }}</td>
                                        <td>{{ $r['name'] }}</td>
                                        <td>{{ $r['alias'] }}</td>
                                        <td>${{ $r['factor'] }}</td>
                                        <td>{{ $kind }}</td>
                                        <td><a href="#" onclick="loadEditor({{ $r['id'] }}, {{ $pr }})">Edit price</a></td>
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

<div class="modal fade" id="fundsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add Work Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add_price')}}" method="POST" id="newcourse">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Deadline(hours 1day = 24hr)</label><br>
                            <div class="position-relative form-group">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="name" id="name" placeholder="e.g. 48" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Deadline(label)</label><br>
                            <div class="position-relative form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="alias" id="alias" placeholder="e.g. 2 days" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Group</label><br>
                            <div class="position-relative form-group">
                                <div class="input-group">
                                    <select class="form-control" name="type" id="type" aria-describedby="inputGroupPrepend" required>
                                        <option value="1">Word</option>
                                        <option value="2">Tech</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Price</label><br>
                            <div class="position-relative form-group">
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control" name="factor" id="factor" placeholder="Price e.g. 10.55" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 btn btn-danger">Add now</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


<button style="display:none;" type="button" id="btnprice" data-toggle="modal" data-target="#editpricemodal"></button>
<div class="modal fade" id="editpricemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('edit_price')}}" method="POST" id="newcourse">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>New Price</label><br>
                            <div class="position-relative form-group">
                                <div class="input-group">
                                    <input type="hidden" id="newpriceid" name="id"/>
                                    <input type="number" step="0.01" class="form-control" name="newprice" id="newprice" placeholder="Price e.g. 10.55" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
