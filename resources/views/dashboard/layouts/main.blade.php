@include('dashboard.layouts.header')
<div id="wrapper">
    @include('dashboard.layouts.sidebar')
    <div id="page-wrapper">
         @yield('content')
    </div>
</div>
@include('dashboard.layouts.footer')
