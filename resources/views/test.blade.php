<!DOCTYPE html>
<html lang="en">
@include("layout.head")
<body>
        @include("layout.header")
        <div class="container">
            @yield("content")
    </div>
        @include("layout.footer")
</body>
</html>
