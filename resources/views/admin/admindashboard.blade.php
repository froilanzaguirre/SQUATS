<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    @include('admin.css')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')
        <!-- partial -->

        @include('admin.navbar')

        <!-- partial -->
        @include('admin.body')
        <!-- container-scroller -->
        <!-- plugins:js -->


        @include('admin.script')
        <!-- End custom js for this page -->

        @if ($iscurfew == 1)
        <script>
        Swal.fire({
            title: '<strong class="text-dark">Visitor Curfew Hour</strong>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Go`,
            cancelButtonText: `Close`,
        }).then((result) => {
            if (result.value) {
                window.location.href = `curfewtable`
            }
        });
        </script>
        @endif

</body>

</html>