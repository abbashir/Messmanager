@extends('admin.master')

@section('title', 'Add Meal')
@section('body')
    <h2 class="mb-4">Add Expense</h2>
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Add Expense

            <span class=" float-right">
                 Total expense: <span class="text-danger"> <span id="totalPrice">00</span></span> TK.
            </span>

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('expense.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-form-label">Select Date</label>
                            <input id="datepicker" class="form-control" name="expense_date" placeholder="select date"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="field_wrapper">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="item_name[]" class="form-control"
                                       placeholder="Item Name" required>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="quantity[]" class="form-control"
                                       placeholder="Quantity [optional]" required>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="number" name="price[]" class="form-control item_price"
                                       placeholder="Price" required>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <a href="javascript:void(0);" class="add_button" title="Add field"><i
                                    class="fa fa-plus-circle"> </i></a>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
    </script>
    {{--dropdown active--}}
    <script>
        $('#expenses li:nth-child(1)').addClass('active');
        $('#expenses').addClass('show');
    </script>

    {{--    dynamic field--}}
    <script type="text/javascript">
        $(document).ready(function () {
            var maxField = 20; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="row">         <div class="col-md-4">' +
                '                            <div class="form-group">' +
                '                                <input type="text" name="item_name[]" class="form-control"' +
                '                                       placeholder="Item Name" required>' +
                '                            </div>' +
                '' +
                '                        </div>' +
                '                        <div class="col-md-3">' +
                '                            <div class="form-group">' +
                '                                <input type="text" name="quantity[]" class="form-control"' +
                '                                       placeholder="Quantity [optional]" required>' +
                '                            </div>' +
                '' +
                '                        </div>' +
                '                        <div class="col-md-3">' +
                '                            <div class="form-group">' +
                '                                <input type="number" name="price[]" class="form-control item_price"' +
                '                                       placeholder="Price" required>' +
                '                            </div>' +
                '' +
                '                        </div class="col-md-2"> <a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle"> </i></a></div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function () {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

    {{-- caculate total expense--}}
    <script>

        $('.item_price').keyup(function () {

            var sum = 0;
            $('.item_price').each(function () {
                sum += Number($(this).val());
            });
            console.log(sum);
            document.getElementById("totalPrice").innerHTML = sum;

        });

    </script>
@endsection
