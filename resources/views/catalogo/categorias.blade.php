@extends('layouts.app')
@section('title', 'Categorías - Catálogo')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Catálogo</div>
        <h1 class="page-title">Categorías</h1>
        <p class="page-sub">Gestiona las categorías de productos</p>
    </div>
    <div class="head-actions">
        <button class="btn-primary-brand" data-bs-toggle="modal" data-bs-target="#modalCategoria">
            <i class="bi bi-plus-lg"></i> Nueva categoría
        </button>
    </div>
</div>

<div class="filter-bar">
    <input type="text" id="buscar" placeholder="Buscar categoría…" class="form-control" style="max-width: 300px;">
</div>

<div class="table-panel">
    <table class="table display" id="tablaCategorias" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Activa</th>
                <th style="text-align:right">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Categoría -->
<div class="modal fade" id="modalCategoria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formCategoria" class="ajax-form" method="POST" action="{{ route('catalogo.categorias.store') }}">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header modal-header-brand">
                    <h5 class="modal-title" id="modalCategoriaTitle">Nueva categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Nombre <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nombre" class="form-control input-brand" required pattern="[A-Za-záéíóúñÁÉÍÓÚÑ\s\-\.]+" minlength="2" maxlength="255">
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="switch">
                            <input type="checkbox" name="activa" checked>
                            <span class="slider"></span> Categoría activa
                        </label>
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
    initDataTable('tablaCategorias', '{{ route("catalogo.categorias.data") }}', [
        {data:'DT_RowIndex',name:'',orderable:false,searchable:false},{data:'nombre',name:'nombre'},
        {data:'activa',name:'activa'},{data:'acciones',name:'acciones',orderable:false,searchable:false}
    ]);
});
</script>
@endpush
