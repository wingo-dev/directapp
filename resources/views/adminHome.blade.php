@extends('layouts.adminlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-lg-50 mt-sm-150">
                    <h5 class="hk-sec-title">Customer information</h5>
                    <p class="mb-25">Place fill out the information.</p>
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('add.customer') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10" for="exampleInputuname_1">User Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-envelope-open"></i></span>
                                        </div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="checkbox_1" type="checkbox" checked>
                                        <label class="custom-control-label" for="checkbox_1">Remember me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-10">Add</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
