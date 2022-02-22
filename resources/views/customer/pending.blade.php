@extends('layouts.customerlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-50">
                    <h5 class="hk-sec-title">Pending listings</h5>
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
                                            @foreach ($listings as $listing)
                                                <tr class="thead-info">
                                                    <td>
                                                        <h6>{{ $listing[0]['group_name'] }}</h6>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @for ($category_num = 0; $category_num < count($listing); $category_num++)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $listing[$category_num]['ctg_name'] }}</td>
                                                        <td><img src="{{ asset('profile_image/' . $listing[$category_num]['p_img']) }}"
                                                                width="100"></td>
                                                        <td>{{ $listing[$category_num]['name'] }}</td>
                                                        <td>{{ $listing[$category_num]['email'] }}</td>
                                                        <td>{{ $listing[$category_num]['phone'] }}</td>
                                                        <td><span class="badge badge-info">Pending</span></td>
                                                        <td><a href="{{ route('user.approve', $listing[$category_num]['id']) }}"
                                                                class="btn btn-primary">Approve</a></td>
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
