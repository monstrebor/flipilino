<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 50px; /* Collapsed width */
            height: 100vh;
            background: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            transition: width 0.3s ease-in-out;
            overflow-x: hidden;
            padding-top: 20px;
        }

        /* Expand sidebar on hover */
        .sidebar:hover {
            width: 300px;
        }

        /* Navigation links */
        .sidebar .nav-link {
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            display: flex;
            align-items: center;
            transition: 0.3s;
            white-space: nowrap;
            overflow: hidden;
        }

        /* Add hover effect */
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Icon styling */
        .sidebar .nav-link i {
            font-size: 20px;
            width: 30px;
            text-align: center;
        }

        /* Hide text when collapsed */
        .sidebar span {
            display: none;
            transition: opacity 0.3s ease-in-out;
        }

        /* Show text when hovered */
        .sidebar:hover span {
            display: inline;
            opacity: 1;
            margin-left: 10px;
        }

        /* Active and Disabled styles */
        .sidebar .nav-link.active {
            background: #007bff;
        }

        .sidebar .nav-link.disabled {
            opacity: 0.5;
        }

        /* Main content area */
        .content {
            margin-left: 80px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        /* Shift content when sidebar expands */
        .sidebar:hover + .content {
            margin-left: 220px;
        }
    </style>
    <title>@yield('title')</title>
    @yield('script')
</head>

<body>
    @yield('content')
</body>

</html>
