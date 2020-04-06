@extends('admin.master')

@section('title', 'Admin Dashboard')
@section('body')

    @php $total_expense = 0 ; @endphp
    @foreach($expenses as $expense)
        @php $total_expense += $expense->total_price ; @endphp
    @endforeach

    @php $total_meal = 0 ; @endphp
    @foreach($meals as $meal)
        @php $total_meal += $meal->today_total_meal ; @endphp
    @endforeach

    <h2 class="mb-4">Ledger: {{$active_ledger->name}}</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="d-flex border">
                <div class="badge-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fas fa-3x fa-fw fa-pause"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Total
                            Cost</p></a>
                    <h3 class="font-weight-bold mb-0">{{$total_expense}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex border">
                <div class="bg-warning text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-spinner"></i>

                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Total
                            Meal</p></a>
                    <h3 class="font-weight-bold mb-0">{{$total_meal}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fas fa-3x fa-fw fa-check"></i>

                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Current Meal
                            Rate</p></a>

                    <h3 class="font-weight-bold mb-0">{{number_format($total_expense/$total_meal, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>

    <div class="row " style="overflow-x:auto;">
        <p>Bordered table:</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">1</th>
                <th scope="col">2</th>
                <th scope="col">3</th>
                <th scope="col">4</th>
                <th scope="col">5</th>
                <th scope="col">6</th>
                <th scope="col">7</th>
                <th scope="col">8</th>
                <th scope="col">9</th>
                <th scope="col">10</th>
                <th scope="col">11</th>
                <th scope="col">12</th>
                <th scope="col">13</th>
                <th scope="col">14</th>
                <th scope="col">15</th>
                <th scope="col">16</th>
                <th scope="col">17</th>
                <th scope="col">18</th>
                <th scope="col">19</th>
                <th scope="col">20</th>
                <th scope="col">21</th>
                <th scope="col">22</th>
                <th scope="col">23</th>
                <th scope="col">24</th>
                <th scope="col">25</th>
                <th scope="col">26</th>
                <th scope="col">27</th>
                <th scope="col">28</th>
                <th scope="col">29</th>
                <th scope="col">30</th>
                <th scope="col">31</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Kanon</th>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <th scope="row">Imran</th>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <th scope="row">Bashir</th>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <th scope="row">Royel</th>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>3</td>
                <td>4.6</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
            </tr>

            </tbody>
        </table>

    </div>


@endsection
