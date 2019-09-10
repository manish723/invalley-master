@extends('layouts.main', [
    'pageTitle' => 'Services - Invalley',
    'pageClass' => 'services',
    'navItem' => 'services'
])

@section('content')
<div class="section bg-transparent">

    <div class="container px-sm-0 mx-auto">
        <h2>Find Your Link Building Package!</h2>
        <p class="text-left ml-0">Launch effective SEO link building campaigns in less than 2 minutes. Reaching the top of search engines takes hard work.
But, with quality content, awesome backlinks, and an innovative plan, your summit to the top can become a reality.</p>

        <div class="row">
            @foreach ($serviceBlocks as $serviceBlock)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 my-5 {{ $serviceBlock->f_highlight ? 'package-highlight' : '' }}">
                    <div class="bg-white px-4 pt-3 text-center">
                        <img class="d-block mx-auto mb-2" src="img/icons/{{ $serviceBlock->icon }}"/>
                        <span class="d-block h6 mt-3 mb-1 tracking-200">{{ $serviceBlock->title }}</span>
                        <span class="d-block display-4 leading-1">
                                <small class="currency">$</small>{{ number_format($serviceBlock->price, 0, '', ',') }}
                    </span>

                        @if (empty($serviceBlock->price_subheading) || is_null($serviceBlock->price_subheading))
                            <div style="height: 10px;"></div>
                        @else
                            <span class="text-cards tracking-200 d-block mb-2 mx-auto">{{ $serviceBlock->price_subheading }}</span>
                        @endif

                        <span class="text-cards px-md-1 px-lg-2 px-xl-4 mt-2 d-block mx-auto">{!! $serviceBlock->description !!}</span>
                        <a href="{{ $serviceBlock->button_url }}" class="btn btn-primary btn-block rounded-0">Discover</a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</div>
@append