@extends('layouts.customerlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-50">
                    <h5 class="hk-sec-title">Your listings</h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-flush mb-0">
                                        <thead>
                                        <tr>
                                            <th>Group Name</th>
                                            <th>Category Name</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listings as $listing)
                                        <tr class="thead-info">
                                            <td><h3>{{$listing[0]["group_name"]}}</h3></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            @for($category_num=0; $category_num < count($listing); $category_num++)
                                             <tr>
                                                <td></td>
                                                <td>{{$listing[$category_num]["ctg_name"]}}</td>
                                                <td><img src="{{asset('profile_image/'.$listing[$category_num]["p_img"])}}" width="50"></td>
                                                <td>
                                                    <a href="{{ route('view.edit.listing', $listing[$category_num]["id"]) }}" class="mr-25" data-toggle="tooltip"
                                                       data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                    <a href="{{route('view.listings.delete', $listing[$category_num]["id"])}}"
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
