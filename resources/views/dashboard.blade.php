@include("layouts.head")
<!-- Sidebar -->
@include("layouts.sidebar")
<!-- End Sidebar -->
    <div class="main-panel">
    @include("layouts.header")
@yield("content")
    <!-- Custom template | don't include it in your project! -->
    @include("layouts.setting")
    <!-- End Custom template -->
</div>
{{-- footer --}}
@include("layouts.footer")
