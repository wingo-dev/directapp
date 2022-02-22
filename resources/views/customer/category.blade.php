@extends('layouts.customerlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-50">
                    <h5 class="hk-sec-title mb-40">Add group name</h5>
                    @if (Session::has('success'))
                        <div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show"
                            role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('user.add.group') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="g_name" placeholder="group name"
                                            aria-label="group name" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Group Table</h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Group Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 0)
                                            @foreach ($groups as $group)
                                                @php($no++)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $group->group_name }}</td>
                                                    <td>
                                                        <a href="{{ route('user.view.category', $group->id) }}"
                                                            class="mr-25" data-toggle="tooltip"
                                                            data-original-title="Edit">
                                                            <i class="ion ion-md-add-circle-outline">Add Categories</i>
                                                        </a>
                                                        <a href="{{ route('user.delete.group', $group->id) }}"
                                                            data-toggle="tooltip" data-original-title="Close">
                                                            <i class="icon-trash txt-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
