@php $analytics = config('services.analytics'); @endphp

@if($analytics['gtm_id'])
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{{ $analytics['gtm_id'] }}');</script>
<!-- End Google Tag Manager -->
@endif

@if($analytics['ga4_id'])
<!-- Google Analytics (GA4) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $analytics['ga4_id'] }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $analytics['ga4_id'] }}');
</script>
<!-- End Google Analytics -->
@endif

@if($analytics['clarity_id'])
<!-- Microsoft Clarity -->
<script>
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "{{ $analytics['clarity_id'] }}");
</script>
<!-- End Microsoft Clarity -->
@endif

@if($analytics['meta_pixel_id'])
<!-- Meta Pixel -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{ $analytics['meta_pixel_id'] }}');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" alt=""
    src="https://www.facebook.com/tr?id={{ $analytics['meta_pixel_id'] }}&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel -->
@endif

@if($analytics['linkedin_partner_id'])
<!-- LinkedIn Insight Tag -->
<script type="text/javascript">
    _linkedin_partner_id = "{{ $analytics['linkedin_partner_id'] }}";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script>
<script type="text/javascript">
    (function(l) {
        if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
        window.lintrk.q=[]}
        var s = document.getElementsByTagName("script")[0];
        var b = document.createElement("script");
        b.type = "text/javascript";b.async = true;
        b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
        s.parentNode.insertBefore(b, s);
    })(window.lintrk);
</script>
<noscript>
    <img height="1" width="1" style="display:none" alt=""
        src="https://px.ads.linkedin.com/collect/?pid={{ $analytics['linkedin_partner_id'] }}&fmt=gif" />
</noscript>
<!-- End LinkedIn Insight Tag -->
@endif
