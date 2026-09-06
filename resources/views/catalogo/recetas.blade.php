@extends('layouts.app')
@section('title', 'Recetas - Catálogo')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Catálogo</div>
        <h1 class="page-title">Recetas</h1>
        <p class="page-sub">Gestiona las recetas de productos</p>
    </div>
    <div class="head-actions">
        <button class="btn-primary-brand" data-bs-toggle="modal" data-bs-target="#modalReceta">
            <i class="bi bi-plus-lg"></i> Nueva receta
        </button>
    </div>
</div>

<div class="filter-bar">
    <input type="text" id="buscar" placeholder="Buscar receta o producto…" class="form-control" style="max-width: 300px;">
</div>

<div class="table-panel">
    <table class="table display" id="tablaRecetas" style="width:100%">
        <thead>
            <tr>
                <th>Receta</th>
                <th>Ingredientes</th>
                <th class="col-num">Costo USD</th>
                <th>Descripción</th>
                <th style="text-align:right">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Receta -->
<div class="modal fade" id="modalReceta" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formReceta" class="ajax-form" method="POST" action="{{ route('catalogo.recetas.store') }}">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header modal-header-brand">
                    <h5 class="modal-title" id="modalRecetaTitle">Nueva receta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Nombre <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nombre" class="form-control input-brand" required pattern="[A-Za-záéíóúñÁÉÍÓÚÑ\s\-\.]+" minlength="2" maxlength="255">
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Descripción</label>
                        <textarea name="descripcion" class="form-control textarea-brand" rows="3" maxlength="500"></textarea>
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Costo total (USD)</label>
                        <input type="number" name="costo_total_usd" class="form-control input-brand" step="0.01" min="0" value="0">
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
    initDataTable('tablaRecetas', '{{ route("catalogo.recetas.data") }}', [
        {data:'DT_RowIndex',name:'',orderable:false,searchable:false},
        {data:'nombre',name:'nombre'},
        {data:'ingredientes_count',name:'ingredientes_count'},
        {data:'costo_total_usd',name:'costo_total_usd'},
        {data:'descripcion',name:'descripcion'},
        {data:'acciones',name:'acciones',orderable:false,searchable:false}
    ]);
});
</script>
@endpush
