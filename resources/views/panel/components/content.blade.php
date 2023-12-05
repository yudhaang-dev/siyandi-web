<div class="position-relative">
    @include('panel.components.navbar')
    @include('panel.components.content-heading')
</div>
<div class="container-fluid content-inner mt-n5 py-0">
    @yield('content-body')
</div>
@include('panel.components.footer')