<div class="row">
    <div class="col-md-8">
        <h2>Referencias</h2>
        <div class="mt-2 table-responsive-md">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acción</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($referencias as $referencia)
                        <tr>
                            <td>{{ $referencia->id }}</td>
                            <td>{{ $referencia->name }}</td>
                            <td>{{ $referencia->description }}</td>
                            <td>
                                <button type="button" class="btn btn-success">Editar</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $referencias->links('pagination::Bootstrap-4') }}
        </div>
    </div>
    <div class="col-md-4">
    </div>
</div>
