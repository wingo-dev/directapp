@extends('layouts.adminlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-50">
                    <h5 class="hk-sec-title">Update list, please</h5>
                    @if (Session::has('success'))
                        <div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span> {{Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('admin.listing.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $listing[0]->id }}" name="directory_id">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="Name" class="form-control" id="inputName" name="name" value="{{ $listing[0]->name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="inputEmail3" name="email" value="{{ $listing[0]->email }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPhone" class="col-sm-4 col-form-label">Phone Number</label>
                                    <div class="col-sm-8">
                                        {{-- <input type="number" class="form-control" id="inputPhone"  placeholder="Phone"> --}}
                                        <input type="text" id="inputPhone" data-mask="(999) 999-9999" name="phone" value="{{ $listing[0]->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputMailing" class="col-sm-4 col-form-label">Mailing Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputMailing" name="mailing" value="{{ $listing[0]->address }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputGraduation" class="col-sm-4 col-form-label">Undergraduate Institution & Graduation Year</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="inputGraduation" name="graduation" value="{{ $listing[0]->undergraduate_year }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLaw" class="col-sm-4 col-form-label">Law School & Graduation Year</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="inputLaw" name="law" value="{{ $listing[0]->law_year }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputBar" class="col-sm-4 col-form-label">Bar Admission State and Year</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="inputBar" name="bar" value="{{ $listing[0]->bar_year }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreas" class="col-sm-4 col-form-label">Practice Areas</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputAreas" name="areas" value="{{ $listing[0]->practice_area }}">
                                    </div>
                                </div>
                                {{-- group id --}}
                                <div class="form-group row">
                                    <label for="inputAreas" class="col-sm-4 col-form-label">Group Name</label>
                                    <div class="col-sm-8">
                                        <select class="form-control custom-select" id="group" name="group_name" required>
                                            <option selected>Select Group</option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- category id --}}
                                <div class="form-group row">
                                    <label for="inputAreas" class="col-sm-4 col-form-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <select class="form-control custom-select" name="category_name" id="category-dropdown" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Listing</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#group").change(function(){
                var group_id = this.value;
                $.post(
                    "{{ route('category') }}", {
                        group_id: group_id,
                        _token: '{{ csrf_token() }}'
                    }).done(function(result) {
                    console.log('categories', result);
                    // $('.tst8').trigger('click');
                    $('#category-dropdown').html('<option value="">Select Category</option>');
                    $.each(result, function(key, value) {
                        $("#category-dropdown").append('<option value="' + value.id +
                            '">' + value.ctg_name + '</option>');
                    });
                });
            });
        });
    </script>
@endsection

