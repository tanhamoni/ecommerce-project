<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css"
        rel="stylesheet">

    <!-- Admin Custom Style -->
    @include('admin.includes.style')

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <!-- App Wrapper -->
    <div class="app-wrapper">

        <!-- Header -->
        @include('admin.includes.header')

        <!-- Sidebar -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

            @include('admin.includes.sidebar')

        </aside>

        <!-- Main Content -->
        <main class="app-main">

            @yield('content')

        </main>

        <!-- Footer -->
        @include('admin.includes.footer')

    </div>
    <!-- End App Wrapper -->


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <!-- Admin Custom Script -->
    @include('admin.includes.script')

    <!-- Page Wise Script -->
    @stack('script')
    

</body>

</html>