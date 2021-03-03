@extends('layouts.adminlayout')

@section('content')
<div class="page-inner ad-inr">
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
</div>
    @endif
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    <span>Assign Role</span>
                </div>
                <div class="page-btn">
                    <a href="{{ route('assignrole.create') }}" class="add-btn">User</a>
                </div>
            </div>
            <div class="page-table" id="">
                <table id="example" class="table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
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
                            <td>{{ $user->email }}</td>
                            @foreach ($user->roles as $role)
                            <td class="sorting_1">{{ $role->name }}</td>
                            @endforeach
                            <td>
                                <div class="d-flex">
                                    <button class="edit-btn">
                                        <a class="" href="{{ route('assignrole.edit',$user->id) }}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection