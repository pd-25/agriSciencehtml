<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | AgriScience</title>

    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 280px;
            --top-nav-height: 70px;
            --primary-bg: #f8fafc;
            --sidebar-bg: #ffffff;
            --accent-color: #4361ee;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--primary-bg);
            color: var(--text-main);
            overflow-x: hidden;
            margin: 0;
        }

        /* Sidebar Styling */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            z-index: 1000;
            transition: var(--transition);
        }

        /* Content Area Styling */
        #main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: var(--transition);
        }

        /* Responsive Sidebar */
        @media (max-width: 992px) {
            #sidebar {
                left: calc(-1 * var(--sidebar-width));
            }
            #sidebar.active {
                left: 0;
            }
            #main-wrapper {
                margin-left: 0;
            }
        }

        .content-body {
            padding: 30px;
            padding-top: calc(var(--top-nav-height) + 20px);
        }

        .premium-card {
            background: #fff;
            border: none;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar Include -->
    @include('admin.layout.sidebar')

    <div id="main-wrapper">
        <!-- Header Include -->
        @include('admin.layout.header')

        <!-- Main Content -->
        <div class="content-body">
            @yield('content')
        </div>

        <!-- Footer? (Optional) -->
    </div>

    <!-- JS Dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <script>
        // Sidebar Toggle for Mobile
        $(document).ready(function() {
            $('.toggle-sidebar').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
