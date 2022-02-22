@extends('layouts.adminlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-50">
                    <h5 class="hk-sec-title">site owners</h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-flush mb-0">
                                        <thead>
                                        <tr class="thead-info">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($owners as $owner)
                                            <tr>
                                                <td>{{ $owner->name }}</td>
                                                <td>{{ $owner->email }}</td>
                                                <td>
                                                    <a href="{{ route('admin.owner.edit', $owner->id) }}" class="mr-25" data-toggle="tooltip"
                                                       data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                    <a href="{{ route('admin.owner.delete', $owner->id) }}"
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
