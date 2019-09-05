@extends('layouts.main', [
    'pageTitle' => 'Invalley - Get Awesome Links To Improve Your Rankings',
    'pageClass' => 'home',
    'navItem' => 'home'
])

@section('content')
    <div class="wrapper container header floatingOverHeader">
        <h1>Get Awesome Links To Improve Your Rankings</h1>
        <p class="mw-100">Launch your unique link building campaign in just under 2 minutes and strengthen your backlink profile so you can stay ahead of your competition.</p>
        <div id="packageCarousel" style="display: none;">

            @foreach ($serviceBlocks as $serviceBlock)
                <div class="bg-white px-4 pt-3 text-center {{ $serviceBlock->f_highlight ? 'package-highlight' : '' }}">
                    <img class="d-block mx-auto mb-2" src="img/icons/{{ $serviceBlock->icon }}"/>
                    <span class="d-block h6 mt-3 mb-1 tracking-200">{{ $serviceBlock->title }}</span>
                    <span class="d-block display-4 leading-1">
                        <small class="currency">$</small>{{ number_format($serviceBlock->price, 0, '', ',') }}</span>

                    @if (empty($serviceBlock->price_subheading) || is_null($serviceBlock->price_subheading))
                        <div style="height: 10px;"></div>
                    @else
                        <span class="text-cards tracking-200 d-block mb-2 mx-auto">{{ $serviceBlock->price_subheading }}</span>
                    @endif

                    <span class="text-cards px-md-1 px-lg-2 px-xl-4 mt-2 d-block mx-auto">{!! $serviceBlock->description !!}</span>
                    <a href="{{ $serviceBlock->button_url }}" class="btn btn-primary btn-block rounded-0">Discover</a>
                </div>
            @endforeach

        </div>
    </div>
    <div class="w-divider skew-up text-center"></div>
    <div class="section bg-neutral container mt-200">
        <div class="content">
            <h6 class="text-center mt-5">More Strategies</h6>
            <p class="text-center">Invalley creates and develops innovative backlink strategies.<br />We currently have more than 15 different link building packages for you to choose from.</p>
            <button onclick="window.location.href='/services'" class="px-5 d-block mx-auto btn btn-primary btn-simple rounded-0">explore</button>
            <div style="height: 10px;"></div>
        </div>
    </div>
    <div class="w-divider-highlight skew-down"></div>
    <div class="section bg-highlight">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-sm-12 py-5 text-center"><img class="img-fluid mb-4" src="img/imaging/gannett_logo.png" style="height:55px; width:242px">
                    <p class="blockquote">As a Fortune 500 company, we pride ourselves on partnering with only the best, and Invalley has been that partner. <span class="blockquote-footer">Alex Jovicich, Gannett Inc.</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-divider skew-down ">
        <div class="content">
            <a href="#partner" class="btn-continue shadow">
                <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="section bg-neutral pt-5 ">
    <div style="height: 10px;"></div>
        <h1 class="text-center mt-2" style="margin-bottom: 28px;">Let Us Help You Strengthen<br />Your Backlink Profile</h1>

        <p class="text-center" style="max-width:650px;">Since 2010, we have been supporting website owners and digital agencies with their offsite SEO work. SEO is often a complex puzzle, but we all understand the importance of backlinks. Through the data collected from a variety of SEO studies, each study continues to draw the same conclusion: <strong>the sites that rank #1 tend to have more backlinks than their competitors.</strong> Not only will our fresh, new backlinks help you beat out the competition, but they will also add an excellent layer of trust to your link profile.</p>
    <div style="height: 30px;"></div>
    </div>
    <div class="w-divider-highlight skew-up text-center"></div>
    <div class="section bg-gray bg-discover">
    <div style="height: 10px;"></div>
        <div class="container row py-5 mt-50 mx-auto align-items-center">
            <div class="col-12 col-md-6 px-2 px-sm-5 ">
                <h6 class="mt-0 mt-md-5 text-primary">Discover our services</h6>
                <p class="text-secondary">Do you have a webshop and want to discover ways to sell more products? Do you have an affiliate website and want to see higher conversion rates? Or, are you looking to wow your SEO clients with our high quality backlinks? Your website is unique, which is why you need a <strong>backlink plan that is tailored to your business</strong> so you can rank higher in search engines. We offer both one-off and monthly link building packages. Dip your toe in the water and give our services a try, or just go ahead and jump in with both feet! Our skilled guides will help you make the right decision for your site.</p>
            </div>
            <div class="col-12 col-md-6">
                <img class="card-shadow20" src="img/screens/SCREEN-1.png" />
            </div>
        </div>
        <div style="height: 30px;"></div>
        <div class="triangle-leftside-top "></div>
    </div>
    <div class="section bg-neutral bg-tents">
    <div style="height: 30px;"></div>
        <div class="container row mx-auto align-items-center">
            <div class="col-12 col-md-6">
                <img class="card-shadow20" src="img/screens/SCREEN-2.png" />
            </div>
            <div class="col-12 col-md-6 px-2 px-sm-2">
                <h6 class="mt-5 text-primary">Give Us The Deats</h6>
                <p class="text-secondary">Have you decided on your package? Great! But, before we get started on creating your roadmap to success, we need your help with a few things first to help us prepare. You’ll need to provide us with a few very important details so we can get to work. We need to know things like: what keywords you want to rank and which target URLs are important to your business. Also, you can <strong>easily communicate with us</strong> about your campaign through our dashboard.</p>
            </div>
        </div>
        <div style="height: 30px;"></div>
    </div>
    <div class="w-divider-highlight skew-up text-center"></div>
    <div style="height: 10px;"></div>
    <div class="section  bg-gray bg-computer">
        <div class="container row py-2 py-md-5 my-2 my-md-5 mx-auto align-items-center">
            <div class="col-12 col-md-6 px-2 px-sm-5">
                <h6 class="mt-2 mt-sm-5 text-primary">detailed reporting</h6>
                <p class="text-secondary">After we’ve completed your campaign, you can <strong>download a comprehensive report</strong>. Depending on the package and service you choose, your report is usually delivered in 2 to 4 weeks. In your report, we provide all important campaign details such as: where you can find your new backlinks, links to written and visual content, and the login details for each site. We can even brand the report with a logo for resellers. Indexation of your new links usually takes 4 to 8 weeks, but we can help you speed that up too.</p>
            </div>
            <div class="col-12 col-md-6">
                <img class="card-shadow20" src="img/screens/SCREEN-3.png" />
            </div>
        </div>
    </div>
    <div style="height: 10px;"></div>
    <div class="w-divider skew-down" style="background-color:#29a9c5;">
        <div class="content">
            <a href="#partner" class="btn-continue shadow">
                <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="section bg-highlight pt-5">
        <div class="container text-center pb-5">
            <h3 class="mb-5">Linkbuilding in a Safe & Sustainable Way</h3><br />
            <div class="row">
                <div class="col-xs-12 col-md-4 mb-5">
                    <div class="bg-white text-center px-3 p-3 py-lg-5 mx-1 mx-lg-3 mb-3 card-shadow20">
                        <img src="img/icons/whiteHat-whiteBg.png" class="mb-3 mb-lg-4" />
                        <p class="d-block text-center text-primary text-uppercase tracking-200 mb-2">Responsible Optimization</p>
                        <p class="text-secondary text-center">Invalley is careful about responsibly optimizing your website. This among other things means that we only use <strong>whitehat techniques</strong>, we build links to different pages on your website, we use natural anchor texts, and we maintain a consistent link building pace.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 mb-5">
                    <div class="bg-white text-center px-3 py-3 py-lg-5 mx-1 mx-lg-3 mb-3 card-shadow20">
                        <img src="img/icons/writers-icon.png" class="mb-3 mb-lg-4" />
                        <p class="d-block text-center text-primary text-uppercase tracking-200 mb-2">U.S-based Writers</p>
                        <p class="text-secondary text-center">Content to help optimize your website is written by American-based content writers. We never write content solely for SEO purposes. Our goal is to create content that contributes to <strong>higher conversion rates</strong> when readers click-through to your site.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 mb-5">
                    <div class="bg-white text-center px-3 py-3 py-lg-5 mx-1 mx-lg-3 mb-3 card-shadow20">
                        <img src="img/icons/algorithm-proof.png" class="mb-3 mb-lg-4" />
                        <p class="d-block text-center text-primary text-uppercase tracking-200 mb-2">Algorithm-proof</p>
                        <p class="text-secondary text-center">Pandas, penguins, dinosaurs... leave that to us! We always stay <strong>up to date on the latest SEO trends</strong>. This way you can focus on more important tasks. We can also quickly develop new link strategies when required to ensure your campaign remains a cut above the rest.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section p-0">
        <div class="joost">
            <div class="container mx-auto row py-5 h-100 align-items-center ">
                <div class="col-12 col-md-6">
                    <h1 class="text-primary my-5" >Hi there!</h1>
                    <p class="text-secondary mb-5">Thank you for taking the time to check out our services. You’re probably busy, so I’ll make this quick.<br /><br />Before we started Invalley, Joost and I were having fun building webshops. During that time, we learned a lot about valuable strategies that help rank websites higher in search engines. This was the foundation of Invalley. We decided to sell our webshops so we could completely focus on developing our link building packages. Our great team of talented writers and link builders are the backbone of our projects and have helped us make Invalley a reality and what it is today.<br /><br />
                    We’re proud to serve a solid client base – from the United States to Australia – with the optimization of their websites.
                    </p>
                    <h6 class="text-primary">Kay Evers, CO-FOUNDER</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="w-divider skew-up" style="background-color: #f7f7f7;">
        <div class="content">
            <a href="#partner" class="btn-continue shadow">
                <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="section bg-gray bg-pyramids p-2">
        <div class="container mx-auto">
            <div class="bg-white my-5 mx-auto card-shadow40 p-2 p-md-5">
                <h1 class="text-primary my-5 text-center">
                    It’s Time To<br />Start Your Journey
                </h1>
                <p class="text-secondary text-center w-75 mx-auto">
                    A journey through the valley isn’t something you do all by yourself! You will be appointed an account manager who comes with years of SEO experience, ready to guide you and help you setup your campaign the right way. You can ask questions at any time throughout your campaign to ensure you reach your destination with ease.</p>
                <button onclick="window.location.href='/services'" class="px-5 mt-5 d-block mx-auto btn btn-primary btn-simple">begin journey</button>
            </div>
        </div>
    </div>
@append