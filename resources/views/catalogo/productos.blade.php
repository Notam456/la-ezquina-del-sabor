@extends('layouts.app')
@section('title', 'Productos - Catálogo')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Catálogo</div>
        <h1 class="page-title">Productos</h1>
        <p class="page-sub">Gestiona el catálogo de productos del menú</p>
    </div>
    <div class="head-actions">
        <button class="btn-ghost-brand" id="btnCombos" onclick="window.location.href='{{ route('catalogo.combos.index') }}'">
            <i class="bi bi-collection"></i> Combos
        </button>
        <button class="btn-primary-brand" data-bs-toggle="modal" data-bs-target="#modalProducto">
            <i class="bi bi-plus-lg"></i> Nuevo producto
        </button>
    </div>
</div>

<div class="filter-bar">
    <input type="text" id="buscar" placeholder="Buscar producto…" class="form-control" style="max-width: 300px;">
    <select id="filtroCat" class="form-select" style="max-width: 200px;">
        <option value="">Todas las categorías</option>
        <option value="Hamburguesas">Hamburguesas</option>
        <option value="Perros calientes">Perros calientes</option>
        <option value="Arepas">Arepas</option>
        <option value="Combos">Combos</option>
        <option value="Bebidas">Bebidas</option>
        <option value="Extras">Extras</option>
    </select>
    <select id="filtroEstado" class="form-select" style="max-width: 160px;">
        <option value="">Todos los estados</option>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>
    <span id="contador" style="display:flex;align-items:center;color:#7a7066;"></span>
</div>

<div class="table-panel">
    <table class="table display" id="tablaProductos" style="width:100%">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Tipo de precio</th>
                <th class="col-num">Precio USD</th>
                <th class="col-num">Precio Bs</th>
                <th>Estado</th>
                <th style="text-align:right">Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Producto -->
<div class="modal fade" id="modalProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formProducto" class="ajax-form" method="POST" action="{{ route('catalogo.productos.store') }}">
                @csrf
                <input type="hidden" name="tipo_precio" id="fTipoPrecio" value="margen">
                <input type="hidden" name="precio_usd" id="fPrecioUsd" value="0">
                <input type="hidden" name="_method" id="fMethod" value="POST">
                <div class="modal-header modal-header-brand">
                    <h5 class="modal-title" id="modalProductoTitle">Nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="display:grid; grid-template-columns: minmax(0,1fr) 320px; gap: 24px;">
                        <div>
                            <div class="panel" style="margin-bottom:20px;">
                                <div class="panel-head"><div class="panel-title">Datos del producto</div></div>
                                <div class="panel-body">
                                    <div style="margin-bottom:16px;">
                                        <label class="form-label-brand">Nombre <span style="color:var(--danger)">*</span></label>
                                        <input type="text" name="nombre" id="fNombre" class="form-control input-brand" placeholder="Ej. Hamburguesa Esquina" required pattern="[A-Za-záéíóúñÁÉÍÓÚÑ\s\-\.]+" minlength="2" maxlength="255">
                                    </div>
                                    <div style="margin-bottom:16px;">
                                        <label class="form-label-brand">Categoría <span style="color:var(--danger)">*</span></label>
                                        <select name="categoria_id" id="fCategoria" class="form-select select-brand" required>
                                            <option value="">Selecciona categoría</option>
                                            @foreach($categorias as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="margin-bottom:16px;">
                                        <label class="form-label-brand">Imagen</label>
                                        <input type="text" name="imagen" id="fImagen" class="form-control input-brand" placeholder="URL de imagen">
                                    </div>
                                    <div style="margin-bottom:16px;">
                                        <label class="form-label-brand">Descripción</label>
                                        <textarea name="descripcion" id="fDesc" class="form-control textarea-brand" rows="2" placeholder="Breve descripción visible en el menú…"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-head"><div class="panel-title">Cómo calcular el precio</div></div>
                                <div class="panel-body">
                                    <div style="margin-bottom:12px;">
                                        <div style="display:flex; gap:8px;">
                                            <button type="button" class="btn-ghost-brand" id="tipoMargen" onclick="setTipoPrecio('margen')">Margen de ganancia</button>
                                            <button type="button" class="btn-ghost-brand" id="tipoDefinido" onclick="setTipoPrecio('definido')">Precio definido</button>
                                        </div>
                                    </div>
                                    <div id="bloqueMargen">
                                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
                                            <div><label class="form-label-brand">Costo (USD)</label><input type="number" name="costo" id="fCosto" class="form-control input-brand" step="0.01" min="0" value="0"></div>
                                            <div><label class="form-label-brand">Ganancia %</label><input type="number" name="margen_ganancia" id="fMargen" class="form-control input-brand" step="0.01" min="0" max="200" value="35"></div>
                                        </div>
                                        <div style="margin-top:12px; padding:12px; background:#f5f1ea; border-radius:8px;">
                                            <div style="display:flex; justify-content:space-between;"><span>Costo:</span><span id="cCosto" class="mono">$ 0,00</span></div>
                                            <div style="display:flex; justify-content:space-between;"><span>Ganancia:</span><span id="cGanancia" class="mono">$ 0,00</span></div>
                                            <div style="display:flex; justify-content:space-between;"><span>Precio:</span><span id="cPrecio" class="mono" style="font-weight:700; color:var(--accent)">$ 0,00</span></div>
                                            <div style="display:flex; justify-content:space-between;"><span>Precio Bs:</span><span id="cPrecioBs" class="mono" style="color:var(--accent)">Bs 0,00</span></div>
                                        </div>
                                    </div>
                                    <div id="bloqueDefinido" style="display:none;">
                                        <div><label class="form-label-brand">Precio fijo (USD)</label><input type="number" name="precio_def" id="fPrecioDef" class="form-control input-brand" step="0.01" value="0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="panel" style="margin-bottom:20px;">
                                <div class="panel-head"><div class="panel-title">Receta y estado</div></div>
                                <div class="panel-body">
                                    <div style="margin-bottom:16px;">
                                        <label class="form-label-brand">Vínculo a receta</label>
                                        <select name="receta_id" id="fReceta" class="form-select select-brand">
                                            <option value="">Sin receta vinculada</option>
                                            @foreach($recetas as $r)
                                            <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="margin-bottom:16px;">
                                        <label class="switch">
                                            <input type="checkbox" name="activo" id="fActivo" checked>
                                            <span class="slider"></span> Activo / Visible y vendible
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="panel" style="position:sticky; top:80px;">
                                <div class="panel-body" style="text-align:center;">
                                    <div id="resK" style="font-size:12px; color:#7a7066;">Resumen de precio</div>
                                    <div id="resUsd" style="font-family:var(--font-display); font-size:24px; font-weight:700;">$ 0,00</div>
                                    <div id="resBs" style="font-family:var(--font-mono); font-size:14px; color:var(--accent);">Bs 0,00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn-primary-brand" id="btnGuardar">Guardar producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initDataTable('tablaProductos', '{{ route("catalogo.productos.data") }}', [
        {data:'DT_RowIndex',name:'',orderable:false,searchable:false},{data:'nombre',name:'nombre'},{data:'categoria.nombre',name:'categoria_id'},
        {data:'tipo_precio',name:'tipo_precio'},{data:'precio_usd',name:'precio_usd'},
        {data:'activo',name:'activo'},{data:'acciones',name:'acciones',orderable:false,searchable:false}
    ]);
});
</script>
@endpush
