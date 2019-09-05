<!doctype html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53042845-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-53042845-1');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle or 'Invalley' }}</title>


    <link rel="stylesheet" href="/css/bootstrap-ver=2.58.css">
    <link rel="stylesheet" href="/css/now-ui-kit-ver=2.58.css">
    <link rel="stylesheet" href="/node_modules/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" href="/node_modules/slick-carousel/slick/slick-theme.css"/>
    <link rel="stylesheet" href="/css/app-ver=2.58.css">
    <link rel="stylesheet" href="/css/master.css">

    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#eaf7f7",
      "text": "#5c7291"
    },
    "button": {
      "background": "#56cbdb",
      "text": "#ffffff"
    }
  },
  "theme": "classic",
  "position": "bottom-left",
  "content": {
    "href": "https://www.invalley.com/privacy-policy/"
  }
})});
</script>

</head>
<body class="{{ $pageClass or 'home' }}">
<div class="full-header-bg" style="background-color: #29a9c5;">

    <nav class="navbar navbar-expand-lg  pt-lg-5">
    <div class="container px-lg-0">

        <div class="navbar-translate">
            <a class="navbar-brand svg" href="/" rel="tooltip"
               title="" data-placement="bottom">

                <object type="image/svg+xml" data="/svg/logo.svg"
                        style="width: 82.77px; height: 35px; margin-bottom: 6px; margin-right: 0.75rem; vertical-align: middle;"
                        onclick="location.href='/';" >

                </object>

                <span class="d-none d-md-inline-block">Invalley</span>
            </a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" data-nav-image="..//img/blurred-image-1.jpg">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ $navItem == 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $navItem == 'services' ? 'active' : '' }}" href="/services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $navItem == 'resellers' ? 'active' : '' }}" href="/resellers">Resellers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $navItem == 'reviews' ? 'active' : '' }}" href="/reviews">Reviews</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $navItem == 'about' ? 'active' : '' }}" href="/about-us">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $navItem == 'contact' ? 'active' : '' }}" href="/contact-us">Contact</a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link btn-outline" href="https://dashboard.invalley.com/login">Login</a><br />
                    <span>or</span><a class="nav-link signup" href="https://dashboard.invalley.com/signup">sign up</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

    <div class="modal fade" id="loginBox" tabindex="-1" role="dialog" aria-labelledby="loginBoxLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa fa-long-arrow-left code-blue" aria-hidden="true"></i></span>
                Back to the Valley
            </button>
          </div>
          <div class="modal-body">
            <h2 class="modal-title code-blue primary-text text-center mt-4" id="loginBoxLabel">Sign in</h2>
            <p class="w-23 mx-auto text-center text-secondary">Welcome Traveller!<br />Sign in and start Ranking up!</p>
            <br />
            <form id="loginBox-form">
              <div class="row mx-0">
                  <input class="w-50 mx-auto" type="email" name="email" placeholder="Email"/>
                  <img src="/img/icons/check-icon-blue_2x.png" class="true-check"/>
                  <img src="/img/icons/error-icon-red.png" class="false-check d-none"/>
              </div>
              <div class="row mx-0 mb-5">
                  <input class="w-50 mx-auto" type="password" name="password" placeholder="Password"/>
                  <img src="/img/icons/check-icon-blue_2x.png" class="true-check d-none"/>
                  <img src="/img/icons/error-icon-red.png" class="false-check"/>
              </div>
              <div class="checkboxes text-center">
                  <input type="checkbox" name="showPassword" />
                  <label>Show Characters</label>
              </div>
              <button type="submit" class="btn btn-primary d-block mx-auto rounded-0">sign in</button>
              <br />
              <p class="w-50  text-center float-left"><a href="#" class="text-secondary">Forgot password?</a></p>
              <p class="w-50 text-center float-left"><a href="#" class="text-secondary">Terms and Conditions</a></p>
              <p class="clearfix"></p>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>

@yield('content')


<div class="bg-custom">
    <div class="container">
        <div class="section payment">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-4 my-auto"><center><img src="/img/paymentIcons/paypal.png" width="50%" alt="Paypal"/></center></div>
                    <div class="col-md-2 col-4 my-auto"><center><img src="/img/paymentIcons/stripe.png" width="70%" alt="Stripe"/></center></div>
                    <div class="col-md-2 col-4 my-auto"><center><img src="/img/paymentIcons/mastercard.png" alt="Mastercard"/></center></div>
                    <div class="col-md-2 col-4 my-auto"><center><img src="/img/paymentIcons/visa.png" width="50%" alt="VISA"/></center></div>
                    <div class="col-md-2 col-4 my-auto"><center><img src="/img/paymentIcons/american-express.png" width="50%" alt="American Express"/></center></div>
                    <div class="col-md-2 col-4 my-auto"><center><img src="/img/paymentIcons/lets-encrypt.png" width="50%" alt="Let's Encrypt"/></center></div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer footer-hero ">
    <div class="container">
        <object type="image/svg+xml" data="svg/logo.svg" style="width: 180px;" class="d-block mx-auto mb-4 ">
        </object>
        <object type="image/svg+xml" data="svg/logo-type.svg" style="width: 220px; " class="d-block mx-auto mb-md-5 ">
        </object>

        <div class="row mt-5">
<div class="col-md-4  ">
<h6 class="small mb-4">The Journey</h6>

<p class="small text-left">Reaching the top of search engines takes hard work. Invalley helps you with a critical aspect of reaching the top: backlinks. With a solid SEO plan, your summit to the top can now become a reality. For the past 8 years, we've been helping our clients climb in rankings. If you're looking for a safe and sustainable path to help you reach greater heights, let the experienced guides at Invalley help you.</p>
<a class="btn btn-neutral btn-simple mb-5 mb-md-0 rounded-0" href="/about-us">Explore </a></div>

<div class="col-md-4"><img class="mt-3 mt-md-0" src="/img/imaging/gannett_logo.png" style="height:40px; width:176px" />
<p class="small">&quot;We&rsquo;ve been working with the team from Invalley for a number of years, and we&rsquo;ve always been impressed with their professionalism, flexibility and rapid response.&quot;</p>

<h6 class="small">Adam (QLD, Australia)</h6>
</div>

<div class="col-md-4 ">
<h6 class="small mb-4">Recent Blog Articles</h6>
    @include('partials.recent-blog-list')
</div>
</div>
    </div>
</footer>

<footer class="footer footer-big" style="background:#32393d">
<div class="container">
<div class="social"><a href="https://www.facebook.com/teaminvalley/"><span class="fa-fw fa-stack"><i class="fa fa-fw fa-facebook fa-stack-1x"></i> <i class="fa fa-fw fa-circle-thin fa-stack-2x"></i> </span> </a> <a href="https://twitter.com/teaminvalley"> <span class="fa-fw fa-stack"> <i class="fa fa-fw fa-twitter fa-stack-1x"></i> <i class="fa fa-fw fa-circle-thin fa-stack-2x"></i> </span> </a> <a href="https://www.instagram.com/teaminvalley/"> <span class="fa-fw fa-stack"> <i class="fa fa-fw fa-circle-thin fa-stack-2x"></i> <i class="fa fa-fw fa-instagram fa-stack-1x"></i> </span> </a></div>

<div class="text-center">
<h3 class="mb-5">Feel free to contact us!</h3>
</div>

<div class="row">
<div class="col-md-5 mx-auto text-left">
<p class="mb-5 small">We greatly enjoy hearing from both new and existing clients. Engaging with webmasters, bloggers, marketers, and other SEO professionals is one of the joys in our business. Let us help you find the right link strategy for your needs.</p>

<h6 class="brand"><img style="margin-left: 18px;" src="/img/logo_invalley.png" /> Invalley</h6>

<p class="contact">Steiger 23<br />
6581 KZ MALDEN<br />
The Netherlands <a href="mailto:help@invalley.com">help@invalley.com</a></p>
</div>

<div class="col-md-6 "><a href="https://goo.gl/maps/RmpsSdRfN1K2" target="_blank"><img class="img-fluid" src="/img/map-sm.png" /></a></div>
</div>
</div>
</footer>

<footer class="footer footer-big" data-background-color="black" style="background-color: #2e2e2e; ">
    <div class="container ">
        <p class="copyright">Invalley is powered by INVENDY V.O.F. &nbsp;<br class="d-lg-none" />
&copy; 2010 - <?php echo date("Y"); ?> &nbsp;All rights reserved.<br />Read our <a href="/terms" target="_blank">terms</a> & <a href="/privacy-policy" target="_blank">privacy policy</a>.</p>
    </div>
</footer>


<script>
    WebFontConfig = {
        google: {
            families: ['Montserrat:400,400i,500', 'Source+Sans+Pro:300,400,600,700']
        }
    };

    (function (d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);

    window.axios.defaults.headers.common = {
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
</script>

<script src="/js/popper.min.js"></script>

<script src="/js/manifest.js?ver=2.52"></script>
<script src="/js/vendor.js"></script>
<script src="/js/app.js?ver=2.52"></script>
<script src="/js/now-ui-kit.js?ver=2.52"></script>
<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/slick-carousel/slick/slick.js"></script>
<script src="/js/custom.js"></script>
    <script type="text/javascript">
(function(w,d){
  w.HelpCrunch=function(){w.HelpCrunch.q.push(arguments)};w.HelpCrunch.q=[];
  function r(){var s=document.createElement('script');s.async=1;s.type='text/javascript';s.src='https://widget.helpcrunch.com/';(d.body||d.head).appendChild(s);}
  if(w.attachEvent){w.attachEvent('onload',r)}else{w.addEventListener('load',r,false)}
})(window, document)
</script>

<script type="text/javascript">
  HelpCrunch('init', 'invalley', {
    applicationId: 4819,
    applicationSecret: 'qSyIDa/oAkVDrwDJzCXywWafb8aipZ3idIeU4RERhezeDNTFkOKyMsSMD2A46HFNyqKr6RskSfKUIcAerB8fOg=='
  });

  HelpCrunch('showChatWidget');
</script>

</body>
</html>
