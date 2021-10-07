@extends('layouts.app')

@section('scripts')

<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- Full Calendar -->
<link href='{{ asset('fullcalendar/main.css') }}' rel='stylesheet' />
<script src='{{ asset('fullcalendar/main.js') }}'></script>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    var url_="{{ url('/eventos') }}";
    var url_show="{{ url('/eventos/show') }}"; 
</script>

{{-- Vista FullCalendar llamando a la configuracion en main.js --}}
<script src='{{ asset('js/main.js') }}'></script>
    

@endsection

@section('content')
    <div class="row">
        <div class="col"></div>
        <div class="col-10">
            <div id="calendar"></div>
        </div>
        <div class="col"></div>    
    </div>     
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Planificador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="d-none">
                        <div class="col-2 mb-3">
                            <label for="txtID" class="form-label">Id</label>
                            <input class="form-control" type="text" name="txtID" id="txtID" aria-label="default input example">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtTitulo" class="form-label">Referencia</label>
                            <input class="form-control" type="text" name="txtTitulo" id="txtTitulo" aria-label="default input example">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="txtCliente" class="form-label">Cliente</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Entrega</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="txtDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" name="txtDescription" id="txtDescription"></textarea>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtColor" class="form-label">Color</label>
                            <input class="form-control" type="color" name="txtColor" id="txtColor" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cantidad</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Distribucion</h6>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="txtCliente" class="form-label">Destino</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Empaque</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Empacadores</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Acopio</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Empacadores</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Confeccion</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Talleres</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Estampado</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Talleres</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Paqueteo</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Talleres</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Corte</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Talleres</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                    <h6>Adquisiciones</h6>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Talleres</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtCliente" class="form-label">Cant. diaria</label>
                            <input class="form-control" type="text" name="txtCliente" id="txtCliente" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Inicio</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtFecha" class="form-label">Fin</label>
                            <input class="form-control" type="text" name="txtFecha" id="txtFecha" aria-label="default input example">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="txtHora" class="form-label">Hora</label>
                            <input class="form-control" type="time" min="07:00" max="20:00" step="600" name="txtHora" id="txtHora" aria-label="default input example">
                        </div>
                    </div>
                </form>  
            </div>
            <div class="modal-footer">
                <button id="btnAgregar" type="button" class="btn btn-success btn-sm">Agregar</button>
                <button id="btnModificar" type="button" class="btn btn-warning btn-sm">Modificar</button>
                <button id="btnEliminar" type="button" class="btn btn-danger btn-sm">Eliminar</button>
                <button id="btnCancelar" data-bs-dismiss="modal" type="button" class="btn btn-dark btn-sm">Cancelar</button>
            </div>
        </div>
    </div>
</div>
