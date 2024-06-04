
<section id="content">
    <!-- NAVBAR -->
    <nav class="nav-container">
            <i class='bx bx-menu toggle-sidebar' ></i>
            <form action="{{ route('loan.search')}}" method="POST">
                @csrf
                    <div class="form-group">
                            <input name="search_id" class="input-search" type="number" placeholder="Buscar disponibilidad de ambiente para asignar.">
                            <i class="ph-bold ph-magnifying-glass icon"></i>
                    </div>
            </form>
            <a href="#" class="nav-link">
                    <i class="ph-bold ph-bell icon"></i>
            </a>
            <a href="#" class="nav-link">
                    <i class="ph-bold ph-chat-circle-dots icon"></i>
            </a>
            <span class="divider"></span>
            <div class="profile">
                    <img src="{{url('asset/images/user-img.png')}}" alt="img-profile">
                    <ul class="profile-link">
                            <li><a href="#"><i class="ph-bold ph-user-circle"></i> Profile</a></li>
                            <li><a href="#"><i class="ph-bold ph-gear-six"></i> Settings</a></li>
                            <li><a href="{{route('logout')}}"><i class="ph-bold ph-sign-out"></i> Logout</a></li>
                    </ul>
            </div>
    </nav>
    <!-- /NAVBAR -->

    <!-- MAIN -->
    <main class="main-grl">
        <div class="letter">
                <h5 class="title">Bienvenido(a) @auth{{Auth::user()->name}}@endauth. </h5>
                
        </div>
            
            