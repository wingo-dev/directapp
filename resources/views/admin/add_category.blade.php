@extends('layouts.adminlayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper mt-50">
                <h5 class="hk-sec-title mb-40">Add Category name</h5>
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('add.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="hidden" name="g_id" value="{{ $group_id }}">
                                    <input type="text" class="form-control" name="ctg_name" placeholder="category name" aria-label="category name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            {{-- category lists --}}
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Category Lists</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no=0)
                                        @foreach ($ctgs as $ctg)
                                            @php($no++)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $ctg->ctg_name }}</td>
                                            <td>
                                                <a href="{{ route('delete.category', $ctg->id) }}" data-toggle="tooltip" data-original-title="Close"> 
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