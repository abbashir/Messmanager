@extends('admin.master')

@section('title', 'Add Meal')
@section('body')
    <h2 class="mb-4">Add Meal</h2>
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Add Meal

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('meal.store')}}">
                @csrf
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Ledger</label>
                    <input type="text" class="form-control" value="{{$ledgers[0]['name']}}" disabled>
                    <input type="hidden" name="ledger_id" value="{{$ledgers[0]['id']}}" >
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Select Date</label>
                    <input id="datepicker" class="form-control" name="date" placeholder="Select" required>
                </div>
                @foreach($borders as $border)
                    <input type="hidden" name="border_id[]" value="{{$border->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{$border->name}}</label>
                        <input type="number" step="0.5" name="meal_quantity[]" class="form-control"
                               placeholder="meal quantity" required>
                    </div>
                @endforeach

{{--                <div class="form-group row">--}}
{{--                    <label for="inputEmail3" class="col-sm-4 col-form-label">Select Date</label>--}}
{{--                    <div class="col-sm-6">--}}

{{--                        <input id="datepicker" class="form-control" name="date" placeholder="Select" required>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4 col-form-label">Kanon</label>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <input type="number" step="0.5" name="kanon_meal_quantity" class="form-control"--}}
{{--                               placeholder="meal quantity" required>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#meals li:nth-child(1)').addClass('active');
        $('#meals').addClass('show');
    </script>
@endsection
