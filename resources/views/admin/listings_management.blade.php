@extends('layouts.adminlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-50">
                    <h5 class="hk-sec-title">listings</h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-flush mb-0">
                                        <thead>
                                        <tr>
                                            <th>Group Name</th>
                                            <th>Category Name</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listings as $listing)
                                            <tr class="thead-info">
                                                <td><h6>{{$listing[0]["group_name"]}}</h6></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @for($category_num=0; $category_num < count($listing); $category_num++)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$listing[$category_num]["ctg_name"]}}</td>
                                                    <td><img src="{{asset('profile_image/'.$listing[$category_num]["p_img"])}}" width="100"></td>
                                                    <td>{{$listing[$category_num]['name']}}</td>
                                                    <td>{{$listing[$category_num]['email']}}</td>
                                                    <td>{{$listing[$category_num]['phone']}}</td>
                                                    <td>
                                                        @if($listing[$category_num]['status'] == 0)
                                                            <span class="badge badge-danger">Pending</span>
                                                        @else
                                                            <span class="badge badge-success">Approved</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.listing.edit', $listing[$category_num]['id']) }}" class="mr-25" data-toggle="tooltip"
                                                           data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                        <a href="{{ route('admin.listing.delete', $listing[$category_num]['id']) }}"
                                                           data-toggle="tooltip" data-original-title="Close">
                                                            <i class="icon-trash txt-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endfor
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
