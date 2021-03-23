@extends('layouts.adminlayout')

@section('content')

<div class="page-inner ad-inr">
    @if(Session::has('message'))
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    <span>Assign Role</span>
                </div>
                <div class="page-btn">
                    <a href="javascript:void(0)" class="add-btn addUser">User</a>
                    <div class="modal fade" id="myAssignModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Assign <span> Role</span></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('assignrole.store') }}" method="POST" class="">
                                        @csrf
                                        <div class="form-group">
                                            <label> User Name</label>
                                            <input type="text" placeholder="" name="name" id="u_name" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label> User Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="email" autofocus>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label> Assign Role</label>
                                            <select name="user_type" id="user_type">
                                                <option value="">--Select Role--</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>
                                        <div class=" text-center">
                                            <input type="submit" name="save" class="login-btn" id="save" value="Create User">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-table" id="">
                <table id="example" class="table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Assign</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        @php $i = 0; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>{{ $user->name }}</td>
                            <td class="sorting_1">{{ $user->user_type }}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="edit-btn">
                                        <a class="editrole" data-href="{{ route('assignrole.edit',$user->id) }}" data-id="{{$user->id}}">
                                            <img src="{{url('/')}}/assets/image/feather-edit.svg" width="16px" alt=""></a>
                                    </button>

                                    @if(Auth::check() && Auth::user()->user_type == "Admin")
                                    <a href="javascript:void(0)" type="submit" class="delete-btn deleterole" data-id="{{$user->id}}"><img src="{{url('/')}}/assets/image/feather-trash.svg" width="16px" alt=""></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="RoleDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" style="width:55%;">
                    <div class="modal-content">
                        <form action="{{url('roledelete')}}" method="POST" class="remove-record-model">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title text-center" id="custom-width-modalLabel">Delete Applicant Record</h4>
                            </div>
                            <div class="modal-body">
                                <h4>You Want You Sure Delete This Record?</h4>
                                <input type="hidden" , name="role_id" id="app_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
                <div class="modal fade" id="myAssignEModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Assign <span> Role</span></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('editrole') }}" method="POST" class="">
                                    <input type="hidden" name="u_id" id="uid">
                                        @csrf
                                        <div class="form-group">
                                            <label> User Name</label>
                                            <input type="text" placeholder="" name="name" id="uname" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label> User Password</label>
                                            <input id="passwords" type="password" class="form-control" name="password" autocomplete="">
                                          
                                        </div>
                                        <div class="form-group">
                                            <label> Assign Role</label>
                                            <select name="user_type" id="user_types">
                                                <option value="">--Select Role--</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>
                                        <div class=" text-center">
                                            <input type="submit" name="save" class="login-btn"  value="Update Role">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    @endsection