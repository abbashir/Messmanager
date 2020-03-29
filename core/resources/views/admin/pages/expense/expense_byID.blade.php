@extends('admin.master')

@section('title', 'expense list')
@section('body')

    @if(count($expenses) > 0)
        <div class="alert alert-primary" role="alert">
            @php $sum = 0 ; @endphp
            @foreach($expenses as $expense)
                @php $name =  $expense->users->name; @endphp
                @php $sum += $expense->total_price ; @endphp
            @endforeach
            Name: <b>{{$name}}</b> | Total Expense : <b>{{$sum}}</b>
        </div>
        @foreach($expenses as $expense)
            @php
                $items = json_decode($expense->item_name);
                $quantities = json_decode($expense->quantity);
                $prices = json_decode($expense->price);
            @endphp
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    {{$expense->date}}
                    <div class="float-right">Total = {{$expense->total_price}}</div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $key => $value)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$value}}</td>
                                <td>{{$quantities[$key]}}</td>
                                <td>{{$prices[$key]}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @else
        <h2 class="text-info text-center mt-3"> Data Not Found</h2>
    @endif

@endsection

@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#expenses li:nth-child(2)').addClass('active');
        $('#expenses').addClass('show');
    </script>


@endsection

