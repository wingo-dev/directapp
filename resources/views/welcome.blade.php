@extends('layouts.frontlayout')
@section('content')
    <!-- Preview Sec -->
    <section id="preview_sec" class="bg-white hk-landing-sec pb-30">
        <div class="container position-relative pt-50 ">
            <div class="row">
                <div class="col-lg-6 col-sm-6 text-left">
                    <span>Find Lawyers by</span>
                    <h1 class="font-48" style="color: black;">PRACTICE AREA</h1>
                </div>
                <div class="col-lg-6 col-sm-6 mt-30">
                    <form>
                        <div class="input-group d-inline-flex">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-grey" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Preview Sec -->
    <!-- Utilities Sec -->
    <section class="bg-white pb-35">
        <div class="container">
            <div class="row">
                @foreach ($dirs as $dir)
                    <div class="col-lg-4 col-sm-6 mb-45">
                        <h5 class="mb-20" style="color: black;">
                            <span class="d-flex align-items-center">
                                <i class="glyphicon glyphicon-th-list mr-15"></i>
                                {{ $dir[0]->group_name }}
                            </span>
                        </h5>
                        @for($i=0; $i<count($dir);$i++)
                            <a href="{{ route('detail', $dir[$i]->id) }}"><p>{{ $dir[$i]->ctg_name }}</p></a>
                        @endfor
                    </div>                            
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Utilities Sec -->
@endsection
