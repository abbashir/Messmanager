@extends('admin.master')

@section('title', 'borders')
@section('body')

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Border List
            <a href="{{route('borders.create')}}"
               class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
               data-target="#create_border">
                <i class="fa fa-plus"></i> ADD NEW
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($borders as $border)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$border->name}}</td>
                        <td>{{$border->phone}}</td>
                        <td>{{$border->email}}</td>
                        <td>
                            <button type="submit" class="btn btn-info font-weight-bold"
                                    data-name="{{$border->name}}"
                                    data-phone="{{$border->phone}}"
                                    data-email="{{$border->email}}"
                                    data-id="{{$border->id}}"
                                    data-toggle="modal" data-target="#edit_border">
                                <i class="fa fa-edit"></i> Edit
                            </button>

                            <button type="submit" class="btn btn-danger font-weight-bold"
                                    data-id="{{$border->id}}"
                                    data-toggle="modal" data-target="#Border_delete"><i class="fa fa-trash"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{--<!-- Create Modal -->--}}
    <div class="modal modal-danger fade" id="create_border" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Add Border</h4>
                </div>
                <form action="{{route('borders.store')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" required>
                            </div>
                        </div>


                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Phone</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="phone" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Email</strong></label>
                                <input class="form-control form-control-lg mb-3" type="email" name="email" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>userName</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="user_name" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>password</strong></label>
                                <input class="form-control form-control-lg mb-3" type="password" name="password"
                                       required>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<!-- Edit Modal -->--}}
    <div class="modal modal-danger fade" id="edit_border" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Border</h4>
                </div>
                <form action="{{route('borders.update',1)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" id="name" required>
                            </div>
                        </div>


                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Phone</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="phone" id="phone" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Email</strong></label>
                                <input class="form-control form-control-lg mb-3" type="email" name="email" id="email" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<!-- delete service Alert Modal -->--}}
    <div class="modal modal-danger fade" id="Border_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-trash"></i> Delete !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('borders.destroy','delete')}}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <strong>Are you sure you want to Delete ?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    {{--social edit--}}
    <script>
        $('#edit_border').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var name = button.data('name');
            var phone = button.data('phone');
            var email = button.data('email');
            var id = button.data('id');


            var modal = $(this);

            modal.find('#name').val(name);
            modal.find('#phone').val(phone);
            modal.find('#email').val(email);
            modal.find('#id').val(id);

        })
    </script>

    {{--script for modal Delete--}}
    <script>
        $('#Border_delete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection

