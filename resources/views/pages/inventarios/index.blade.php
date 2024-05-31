@include('partials.headsection')
<div class="p-3 border border-1 rounded rounded-3">

    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">Ambiente</th>
              <th scope="col">Nombre Elemento</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Acciones</th>
            </tr>
         </thead>
        <tbody>
            @forelse($elements as $ele)

                <tr> 
                    <td>{{$ele -> environment}}</td>
                    <td>{{$ele -> element_name}}</td>
                    <td>{{$ele -> cantidad}}</td>
                    
                    <td >
                               {{-- BOTON PARA EDITAR UN ELEMENTO DE LA LISTA POR ID --}}
                        <div class="d-flex justify-content-start align-items-center">
                            <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalenvironmentstock{{$ele -> stock_id}}">
                            <i class="ph ph-pencil-line"></i>Editar
                            </a>

                                {{-- BOTON PARA ELIMINAR UN ELEMENTO DE LA LISTA POR ID --}}
                            <form class="d-flex justify-content-between align-items-center mx-2" action="{{route('element.destroy', $ele -> stock_id)}}" method="POST" class="form-destroy">
                                @csrf
                                @method('delete')
                                    <input class="btn btnn-style bg-dark text-light" type="submit" value="Eliminar" title="click para eliminar elemento">
                            </form>               
                        </div>
                    </td>
            
                    </tr>
   
               
                @include('components.modalStock')
            @empty
                No existen inventarios aun
            @endforelse
            
        </tbody>
    </table>
    <div class="option-floors d-flex justify-content-between align-items-center">
        @include('components.modalsInventario.modaldelete')
        <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modaladditem">
        <i class="ph ph-plus-square text-success fw-bold" style="font-size: 1.3rem"></i></i>Agregar elemento 
        </a>
        <div>
            <a  
            title="Regresar a pisos"
            style="background-color: #021b0f" class="btn fw-bold text-light" href="{{route('floors')}}"><i class="ph ph-arrow-u-up-left text-success fw-bold" style="font-size: 1.3rem"></i> Volver
            </a>
            <a  
            title="Generar artichivo pdf"
            style="background-color: #021b0f" class="btn fw-bold text-light" href="{{route('floors')}}">Exportar <i class="ph ph-file-pdf text-success fw-bold" style="font-size: 1.3rem"></i> <i class="ph ph-file-csv text-success fw-bold" style="font-size: 1.3rem"></i>
            </a>
        </div>
       
    </div>
</div>

@include('partials.footsection')