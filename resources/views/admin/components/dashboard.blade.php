<style>
    /* Body and Container Styles */
    body {
        overflow-x: hidden;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .container-fluid {
        padding-left: 260px;
        padding-top: 20px;
    }

    /* Sidebar Styles */
    .side-nav {
        width: 250px;
        height: 100vh;
        background: linear-gradient(180deg, #0d1f2f, #153b62);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        color: #ffffff;
    }
    .side-nav h3 {
        font-weight: bold;
        font-size: 1.5rem;
    }
    .side-bar-item {
        color: #ffffff;
        text-decoration: none;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        font-weight: 500;
        transition: background-color 0.3s, padding-left 0.2s;
    }
    .side-bar-item:hover {
        background-color: #3a506b;
        padding-left: 25px;
    }
    .side-bar-item i {
        margin-right: 12px;
    }

    /* Navbar Styles */
    .navbar {
        margin-left: 250px;
        background: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .navbar-toggler-icon {
        color: #495057;
    }
    .dropdown-toggle {
        color: #495057;
    }
    .dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    /* Card Styles */
    .card {
        background: #ffffff;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #1e3d5d;
        color: #ffffff;
        font-weight: 600;
        font-size: 1.25rem;
    }
    .card-body {
        padding: 2rem;
    }
</style>

<!-- Sidebar -->
<div class="side-nav">
    <h3 class="text-center mt-3 mb-4 side-bar-item">Admin Panel</h3>
    <a type="button" onclick="DashboardPage()" class="side-bar-item">
        <i class="fas fa-chart-line"></i> Dashboard
    </a>
    <a type="button" onclick="TeacherPage()" class="side-bar-item">
        <i class="fas fa-users"></i> Teacher
    </a>
    <a type="button" onclick="StudentPage()" class="side-bar-item">
        <i class="fas fa-users"></i> Student
    </a>
    <a href="#" class="side-bar-item">
        <i class="fas fa-cogs"></i> Settings
    </a>
    <a href="#" class="side-bar-item">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

<!-- Main Content -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
    <div class="container-fluid">
        <!-- Toggler Button for Small Screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Content -->

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid" id="Content">

</div>

<script>
    document.addEventListener("DOMContentLoaded", loadDashboard);

    async function loadDashboard() {
        await DashboardPage();
    }

</script>

