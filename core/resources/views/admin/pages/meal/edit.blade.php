@extends('admin.master')

@section('title', 'Edit Meal')
@section('body')
    <h2 class="mb-4">Edit Meal</h2>
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Edit Meal

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('meal.update',$meals->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Ledger</label>
                    <input type="text" class="form-control" value="{{$meals->ledger_id}}" disabled>
                    <input type="hidden" name="ledger_id" value="{{$meals->ledger_id}}" >
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Select Date</label>
                    <input id="datepicker" class="form-control" name="date" value="{{$meals->date}}" placeholder="Select" required>
                </div>
                @php $meal_details = json_decode($meals->meal_details); @endphp
                @foreach($meal_details as $border_id => $meal_quantity)
                    <input type="hidden" name="border_id[]" value="{{$border_id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{get_user($border_id)}}</label>
                        <input type="number" step="0.5" name="meal_quantity[]" value="{{$meal_quantity}}" class="form-control"
                               placeholder="meal quantity" required>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap',
            format: 'dd/mm/yyyy'
        });
    </script>
    {{--dropdown active--}}
    <script>
        $('#meals li:nth-child(2)').addClass('active');
        $('#meals').addClass('show');
    </script>
@endsection
