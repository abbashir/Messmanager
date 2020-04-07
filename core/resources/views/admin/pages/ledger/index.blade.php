@extends('admin.master')

@section('title', 'borders')
@section('body')

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Ledger List
            <a href="{{route('ledger.create')}}"
               class="btn btn-primary btn-md float-right customs_btn" >
                <i class="fa fa-plus"></i> Create
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Borders</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ledgers as $ledger)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$ledger->name}}</td>
                        <td>
                            <div class="show">
                                <div class="alert alert-primary" role="alert">
                                    Hover to see  Border
                                </div>
                                <ul class="list-categories list-group">
                                    @php $ledger_details = json_decode($ledger->borders); @endphp
                                    @foreach($ledger_details as $border_id => $border_name)
                                        <li class="list-group-item disabled">
                                            {{$border_name}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td>
                            @if ($ledger->active_status==1)
                                <span class="badge  badge-pill  badge-success">Active</span>
                            @else
                                <span class="badge  badge-pill  badge-danger">Closed</span>
                            @endif
                            </td>
                        <td>
                            @if ($ledger->active_status==1)
                                <button type="submit" class="btn btn-danger font-weight-bold"
                                        data-id="{{$ledger->id}}" data-status="{{$ledger->active_status}}" data-toggle="modal" data-target="#ac_clo">
                                    <i class="fa fa-edit"></i> Close
                                </button>
                            @else
                                <button type="submit" class="btn btn-info font-weight-bold"
                                        data-id="{{$ledger->id}}" data-status="{{$ledger->active_status}}" data-toggle="modal" data-target="#ac_clo">
                                    <i class="fa fa-edit"></i> Active
                                </button>
                            @endif

                                <a href="{{route('ledger.edit',$ledger->id)}}" class="btn btn-success font-weight-bold">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{--<!-- active/close Alert Modal -->--}}
    <div class="modal modal-danger fade" id="ac_clo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-check"></i> Action !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('ledger.destroy','delete')}}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="status" id="status">
                        <strong>Are you sure you want to do this ?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#ledger li:nth-child(1)').addClass('active');
        $('#ledger').addClass('show');
    </script>

    {{--script for modal--}}
    <script>
        $('#ac_clo').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var status = button.data('status');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);
        })
    </script>
@endsection

