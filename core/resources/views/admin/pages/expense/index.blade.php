@extends('admin.master')

@section('title', 'expense list')
@section('body')
    <h2 class="mb-4">Expense List</h2>
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Expense search box
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('show_ledger')}}">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group form-check">
                            <input class="form-check-input" name="ledger_id" type="checkbox" value="" id="ledger_id"
                                   onclick="ledger_disable()">
                            <label class="form-check-label" for="defaultCheck1">
                                Current Ledger
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" id="ledgerDisable" name="ledger_id" required>
                                <option selected value="">select ledger</option>
                                @foreach($ledgers as $ledger)
                                    <option value="{{$ledger->id}}">{{$ledger->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group form-check">
                            <input class="form-check-input" name="manager_id" type="checkbox" value="" id="manager_id"
                                   onclick="manager_disable()">
                            <label class="form-check-label" for="defaultCheck1">
                                for me
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" id="managerDisable" name="border_id" required>
                                <option selected value="">select manager</option>
                                @foreach($borders as $border)
                                    <option value="{{$border->id}}">{{$border->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block customs-btn-bd">Show</button>
                    </div>
                </div>

            </form>
        </div>
    </div>





@endsection

@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#expenses li:nth-child(2)').addClass('active');
        $('#expenses').addClass('show');
    </script>

    <script>
        function ledger_disable() {
            var remember = document.getElementById('ledger_id');
            if (remember.checked) {
                document.getElementById("ledgerDisable").disabled = true;
            } else {
                document.getElementById("ledgerDisable").disabled = false;
            }

        }

        function manager_disable() {
            var remember = document.getElementById('manager_id');
            if (remember.checked) {
                document.getElementById("managerDisable").disabled = true;
            } else {
                document.getElementById("managerDisable").disabled = false;
            }

        }

    </script>

@endsection

