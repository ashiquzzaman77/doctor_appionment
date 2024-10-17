<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand"><span>Appointment</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="sidebar-body">

        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Frontend Design</li>

            <li class="nav-item">

                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Content</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>

                <div class="collapse" id="emails">

                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="" class="nav-link">Department</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.doctor.index') }}" class="nav-link">Doctor</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">Appointment</a>
                        </li>

                    </ul>

                </div>
            </li>



        </ul>
    </div>
</nav>

