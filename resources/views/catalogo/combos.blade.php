@extends('layouts.app')
@section('title', 'Combos - Catálogo')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Catálogo</div>
        <h1 class="page-title">Combos</h1>
        <p class="page-sub">Gestiona los combos del menú</p>
    </div>
    <div class="head-actions">
        <button class="btn-ghost-brand" onclick="window.location.href='{{ route('catalogo.productos.index') }}'">
            <i class="bi bi-box-seam"></i> Productos
        </button>
        <button class="btn-primary-brand" data-bs-toggle="modal" data-bs-target="#modalCombo">
            <i class="bi bi-plus-lg"></i> Nuevo combo
        </button>
    </div>
</div>

<div class="table-panel">
    <table class="table display" id="tablaCombos" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th class="col-num">Precio USD</th>
                <th>Estado</th>
                <th style="text-align:right">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade" id="modalCombo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formCombo" class="ajax-form" method="POST" action="{{ route('catalogo.combos.store') }}">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header modal-header-brand">
                    <h5 class="modal-title">Nuevo combo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Nombre <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nombre" class="form-control input-brand" required pattern="[A-Za-záéíóúñÁÉÍÓÚÑ\s\-\.]+" minlength="2" maxlength="255" placeholder="Ej. Combo Especial">
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Categoría <span style="color:var(--danger)">*</span></label>
                        <select name="categoria_id" class="form-select select-brand" required>
                            <option value="">Selecciona categoría</option>
                            @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Precio USD <span style="color:var(--danger)">*</span></label>
                        <input type="number" name="precio_usd" class="form-control input-brand" step="0.01" min="0" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn-primary-brand">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initDataTable('tablaCombos', '{{ route("catalogo.combos.data") }}', [
        {data:'DT_RowIndex',name:'',orderable:false,searchable:false},
        {data:'nombre',name:'nombre'},
        {data:'categoria.nombre',name:'categoria_id'},
        {data:'precio_usd',name:'precio_usd'},
        {data:'activo',name:'activo'},
        {data:'acciones',name:'acciones',orderable:false,searchable:false}
    ]);
});
</script>
@endpush
