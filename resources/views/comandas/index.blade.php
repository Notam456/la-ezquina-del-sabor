@extends('layouts.app')
@section('title', 'Comandas')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Operación</div>
        <h1 class="page-title">Comandas</h1>
        <p class="page-sub">Gestiona las comandas del sistema</p>
    </div>
    <div class="head-actions">
        <a href="{{ route('cocina.index') }}" class="btn-ghost-brand"><i class="bi bi-chef-hat"></i> Cocina</a>
        <button class="btn-primary-brand" data-bs-toggle="modal" data-bs-target="#modalComanda">
            <i class="bi bi-plus-lg"></i> Nueva comanda
        </button>
    </div>
</div>
<div class="filter-bar">
    <input type="text" placeholder="Buscar comanda…" class="form-control" style="max-width:300px;">
    <select class="form-select" style="max-width:160px;">
        <option>Todos los estados</option>
        <option>Montar</option>
        <option>Entrega</option>
        <option>Cobrar</option>
        <option>Cerrada</option>
    </select>
</div>
<div class="table-panel">
    <table class="table display" id="tablaComandas" style="width:100%">
        <thead>
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th class="col-num">Total USD</th>
                <th class="col-num">Total Bs</th>
                <th>Fecha</th>
                <th style="text-align:right">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade" id="modalComanda" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formComanda" class="ajax-form" method="POST" action="{{ route('comandas.store') }}">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header modal-header-brand">
                    <h5 class="modal-title">Nueva comanda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Nombre del cliente (temporal)</label>
                        <input type="text" name="nombre_cliente_temporal" class="form-control input-brand" maxlength="255" placeholder="Si no está registrado">
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Teléfono delivery</label>
                        <input type="text" name="telefono_delivery" class="form-control input-brand" maxlength="20" pattern="[0-9+\-\s]+">
                    </div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label-brand">Notas</label>
                        <textarea name="notas_generales" class="form-control textarea-brand" rows="2" maxlength="500"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn-primary-brand">Crear comanda</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initDataTable('tablaComandas', '{{ route("comandas.data") }}', [
        {data:'DT_RowIndex',name:'',orderable:false,searchable:false},{data:'numero_correlativo_diario',name:'numero_correlativo_diario'},
        {data:'cliente.nombre',name:'cliente'},{data:'estado_comanda',name:'estado_comanda'},
        {data:'total_usd',name:'total_usd'},{data:'total_ve',name:'total_ve'},
        {data:'fecha_creacion',name:'fecha_creacion'},{data:'acciones',name:'acciones',orderable:false,searchable:false}
    ]);
});
</script>
@endpush
