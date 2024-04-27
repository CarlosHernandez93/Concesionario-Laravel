<div class="modal fade" id="modal-delete-{{ $aut->id_automovil }}">
    <div class="modal-dialog">
        <form action="{{ route('Automoviles.destroy', $aut->id_automovil) }}" method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Automovil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseas eliminar el automovil {{ $aut->marca ." ". $aut->referencia }} {{$aut->descripcion}} </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                </div>
            </div>
            <!--/.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.modal -->