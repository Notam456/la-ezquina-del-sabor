@extends('layouts.app')
@section('title', 'Materias Primas - Inventario')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Inventario</div>
        <h1 class="page-title">Materias Primas</h1>
        <p class="page-sub">Gestiona el inventario de materias primas</p>
    </div>
    <div class="head-actions">
        <button class="btn-ghost-brand danger" id="btnMerma">
            <i class="bi bi-trash3"></i> Registrar merma
        </button>
        <button class="btn-ghost-brand" id="btnCompra">
            <i class="bi bi-cart-plus"></i> Registrar compra
        </button>
        <button class="btn-primary-brand" data-bs-toggle="modal" data-bs-target="#modalMateriaPrima">
            <i class="bi bi-plus-lg"></i> Nueva materia prima
        </button>
    </div>
</div>

<div id="alertaCritica" class="alert-banner" style="display:none; padding:12px 20px; background:#f8e3dc; border-left:4px solid var(--danger); margin-bottom:16px; border-radius:8px;">
    <i class="bi bi-exclamation-triangle"></i> X materia(s) crítica(s) con stock bajo
</div>

<div class="filter-bar">
    <input type="text" id="buscar" placeholder="Buscar materia prima…" class="form-control" style="max-width: 300px;">
    <select id="filtroStock" class="form-select" style="max-width: 200px;">
        <option value="">Todo el stock</option>
        <option value="critico">Crítico</option>
        <option value="bajo">Stock bajo</option>
        <option value="optimo">Óptimo</option>
    </select>
</div>

<div class="table-panel">
    <table class="table display" id="tablaMaterias" style="width:100%">
        <thead>
            <tr>
                <th>Materia prima</th>
                <th>Unidad</th>
                <th class="col-num">Existencias</th>
                <th class="col-num">Nivel mínimo</th>
                <th class="col-num">Costo últ. compra</th>
                <th style="text-align:right">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Materia Prima -->
<div class="modal fade" id="modalMateriaPrima" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formMateriaPrima" class="ajax-form" method="POST" action="{{ route('inventario.materias-primas.store') }}">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header modal-header-brand">
                    <h5 class="modal-title" id="modalMateriaPrimaTitle">Nueva materia prima</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Nombre <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nombre" class="form-control input-brand" required pattern="[A-Za-záéíóúñÁÉÍÓÚÑ\s\-\.]+" minlength="2" maxlength="255">
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Unidad de medida <span style="color:var(--danger)">*</span></label>
                        <select name="unidad_medida" class="form-select select-brand" required>
                            <option value="unidad">unidad</option>
                            <option value="g">g</option>
                            <option value="ml">ml</option>
                            <option value="kg">kg</option>
                            <option value="lb">lb</option>
                        </select>
                    </div>
                    <div style="margin-bottom:16px; display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <div><label class="form-label-brand">Stock actual</label><input type="number" name="stock_actual" class="form-control input-brand" step="0.01" min="0" value="0" required></div>
                        <div><label class="form-label-brand">Stock mínimo</label><input type="number" name="stock_minimo" class="form-control input-brand" step="0.01" min="0" value="0" required></div>
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Costo unitario (USD)</label>
                        <input type="number" name="costo_unitario_usd" class="form-control input-brand" step="0.01" min="0" value="0" required>
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
    initDataTable('tablaMaterias', '{{ route("inventario.materias-primas.data") }}', [
        {data:'DT_RowIndex',name:'',orderable:false,searchable:false},{data:'nombre',name:'nombre'},{data:'unidad_medida',name:'unidad_medida'},
        {data:'stock_actual',name:'stock_actual'},{data:'stock_minimo',name:'stock_minimo'},
        {data:'costo_unitario_usd',name:'costo_unitario_usd'},{data:'acciones',name:'acciones',orderable:false,searchable:false}
    ]);
});
</script>
@endpush
