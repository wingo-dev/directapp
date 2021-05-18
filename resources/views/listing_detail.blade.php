@extends('layouts.frontlayout')
@section('content')
<div class="container">
    <section class="hk-sec-wrapper" style="margin-top:15%; margin-bottom: 5%;">
        <h2 class="hk-sec-title text-center text-capitalize mb-50" style="color: black;">{{ $group_name[0]->group_name }}</h2>
        @foreach ($listings as $listing)
            <div class="row border pt-25">
                <div class="col-lg-2">
                    <img class="align-self-start mr-15 d-150" src="{{ asset('profile_image/'.$listing->p_img) }}" alt="profile image">
                </div>
                <div class="col-lg-10 media-body ">
                    <h4 class="mb-5">{{ $listing->name }}</h4>
                    <p class="">Atlanta, GA Criminal Law Lawyer with 23 years of experience.</p>
                    <div class="row mt-3 border-bottom">
                        <div class="col-lg-4 border-right">
                            <h5>{{ $listing->phone }}</h5>
                            <p>75 Fourteenth Street</p>            
                            <p>Suite 3000</p>            
                            <p>Atlanta, GA 30309</p>            
                        </div>
                        <div class="col-lg-8">
                            <h6>Free Consultation + offers Video Conferencing</h6>
                            <p><i class="pe-7s-hammer"></i>Criminal and White Collar Crime</p>
                            <p><i class="fa fa-building"></i>Emory University School of Law</p>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between">
                                <a href="#"><i class="glyphicon glyphicon-search"></i>View Website</a>
                                <a href="mailto:{{ $listing->email }}" class="d-flex"><i class="glyphicon glyphicon-envelope"></i><span class="ml-2 mb-2">Email lawyer</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</div>
@endsection