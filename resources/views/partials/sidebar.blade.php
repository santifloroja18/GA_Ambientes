
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="{{route('dashboard')}}" class="brand"><img class="icono-brand" src="{{url('asset/images/icono_sena.png')}}" alt="icono"> GA | System</a>
    <ul class="side-menu">
            <li><a href="{{route('dashboard')}}" class="active letter"><i class="ph-bold ph-house icon"></i>Dashboard</a></li>
            <li class="divider" data-text="Principal">Principal</li>
            <li><a href="{{route('floors')}}"><i class="ph-bold ph-building icon"></i> Ambientes</a></li>
            <li>
                    <a href="#"><i class="ph-bold ph-chalkboard-teacher icon"></i> Auditorios <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                            <li><a href="{{route('reservas-auditorio-301')}}">Reservar Auditorio 301</a></li>
                            <li><a href="{{route('reservas-auditorio-601')}}">Reservar Auditorio 601</a></li>
                    </ul>
            </li>
            <li>
                @can('schedules')
                <a href="#"><i class="ph-bold ph-calendar-dots icon"></i> Cronograma <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                        <li><a href="{{route('schedules')}}">Ver Cronograma</a></li>
                        @can('schedule.create')
                        <li><a href="{{route('schedule.create')}}">Importar Cronograma</a></li>
                        @endcan
                        
                </ul>
                @endcan 
            </li>
            @can('user.index')
            <li>
                    <a href="#"><i class="ph-bold ph-users icon"></i> Usuarios <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                            
                        <li><a href="{{route('users')}}">Ver Usuarios</a></li>
                            
                        <li><a href="{{route('user.create')}}">Crear Usuarios</a></li>
                    </ul>
            </li>
            @endcan
            {{-- <li class="divider" data-text="Cuenta">Cuenta</li>
            <li><a href="#"><i class="ph-bold ph-gear-six icon"></i> Configuración</a></li> --}}
            <li class="btn-exit"><a class="active letter" href="{{route('logout')}}"><i class="ph-bold ph-door-open icon"></i>Cerrar Sesión</a></li>
    </ul>
</section>
<!-- /SIDEBAR -->