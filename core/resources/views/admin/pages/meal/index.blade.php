@extends('admin.master')

@section('title', 'borders')
@section('body')

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Meal List
            <a href="{{route('meal.create')}}"
               class="btn btn-primary btn-md float-right customs_btn" >
                <i class="fa fa-plus"></i> Create
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Meal</th>
                    <th scope="col">borders</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meals as $meal)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$meal->date}}</td>
                        <td>{{$meal->today_total_meal}}</td>
                        <td>{{$meal->meal_details}}</td>
                        <td>
                            <button type="submit" class="btn btn-info font-weight-bold"
                                    data-id="{{$meal->id}}" data-toggle="modal" data-target="#ac_clo">
                                <i class="fa fa-edit"></i> View
                            </button>
                            <button type="submit" class="btn btn-success font-weight-bold"
                                    data-id="{{$meal->id}}" data-toggle="modal" data-target="#ac_clo">
                                <i class="fa fa-edit"></i> Edit
                            </button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>





@endsection

@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#meals li:nth-child(2)').addClass('active');
        $('#meals').addClass('show');
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

