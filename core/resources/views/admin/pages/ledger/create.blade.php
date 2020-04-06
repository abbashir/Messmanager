@extends('admin.master')

@section('title', 'borders')
@section('body')

    <h2 class="mb-4"> New Ledger
        <a href="{{route('ledger.index')}}" class="btn btn-primary btn-md float-right customs_btn">
            <i class="fa fa-list"></i> View Ledger List
        </a>
    </h2>

    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{route('ledger.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Ex: month name" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" id="selectall" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Select All</label>
                    </div>

                    <div class="row">
                        @foreach($borders as $border)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input selectedId" name="{{$border->id}}" type="checkbox" value="{{$border->userName}}" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$border->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">CREATE</button>
                    </div>


                </form>
            </div>

        </div>
    </div>



{{--    <table id="notificationsTableId" style="width: 1744px;">--}}
{{--        <thead>--}}
{{--        <tr role="row">--}}
{{--            <th rowspan="1" colspan="1" style="width: 10px;" aria-label="" align="center">--}}
{{--                <input type="checkbox" id="selectall">Select all</input>--}}
{{--            </th>--}}
{{--            <th tabindex="0" rowspan="1" colspan="1" style="width: 203px;" align="left">Type</th>--}}

{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody role="alert">--}}
{{--        <tr class="results-table-row odd">--}}
{{--            <td align="center">--}}
{{--                <input type="checkbox" class="selectedId" name="selectedId" />--}}
{{--            </td>--}}
{{--            <td>Checkbox 1</td>--}}

{{--        </tr>--}}
{{--        <tr class="results-table-row even">--}}
{{--            <td align="center">--}}
{{--                <input type="checkbox" class="selectedId" name="selectedId" />--}}
{{--            </td>--}}
{{--            <td>Checkbox 2</td>--}}

{{--        </tr>--}}
{{--        <tr class="results-table-row even odd">--}}
{{--            <td align="center" class=" ">--}}
{{--                <input type="checkbox" class="selectedId" name="selectedId" />--}}
{{--            </td>--}}
{{--            <td class=" ">Checkbox 3</td>--}}

{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}
@endsection

@section('scripts')

    {{--dropdown active--}}
    <script>
        $('#ledger li:nth-child(1)').addClass('active');
        $('#ledger').addClass('show');
    </script>


    <script>
        $(document).ready(function () {
            $('#selectall').click(function () {
                $('.selectedId').prop('checked', this.checked);
            });

            $('.selectedId').change(function () {
                var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
                $('#selectall').prop("checked", check);
            });
        });
    </script>
@endsection

