@extends('admin.master')

@section('title', 'edit ledger')
@section('body')

    <h2 class="mb-4"> Edit ledger
        <a href="{{route('ledger.index')}}" class="btn btn-primary btn-md float-right customs_btn">
            <i class="fa fa-list"></i> View Ledger List
        </a>
    </h2>

    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{route('ledger.update',$ledgers->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control form-control-lg" value="{{$ledgers->name}}"
                               required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" id="selectall" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Select All</label>
                    </div>

                    @php
                        $borders_info = json_decode($ledgers->borders);
                        $border_in_ledger = array();
                        foreach ($borders_info as $id => $name){
                            $border_in_ledger[] = $id;
                        }
                    @endphp


                    <div class="row">
                        @foreach($borders as $border)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input selectedId" name="{{$border->id}}" type="checkbox"
                                           value="{{$border->userName}}"
                                           id="defaultCheck1" {{in_array($border->id,$border_in_ledger) ? "checked" : ""}} >
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$border->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">UPDATE</button>
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

