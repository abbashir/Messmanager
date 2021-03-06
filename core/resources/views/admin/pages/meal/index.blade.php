@extends('admin.master')

@section('title', 'borders')
@section('body')

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            My added meal in <span class="text-info">{{$active_ledger->name}}</span> ledger
            <a href="{{route('meal.create')}}"
               class="btn btn-primary btn-md float-right customs_btn">
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
                    <th scope="col" class="text-center">Details</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meals as $meal)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$meal->date}}</td>
                        <td>{{$meal->today_total_meal}}</td>
                        <td>
                            <div class="show">
                                <div class="alert alert-primary" role="alert">
                                    Hover to see  Name : Meal
                                </div>
                                <ul class="list-categories list-group">
                                    @php $meal_details = json_decode($meal->meal_details); @endphp
                                    @foreach($meal_details as $border_id => $meal_quantity)
                                        <li class="list-group-item disabled">
                                            {{get_user($border_id)}} : {{$meal_quantity}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('meal.edit',$meal->id)}}" class="btn btn-info font-weight-bold">
                                <i class="fa fa-edit"></i> Edit
                            </a>

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

@endsection

