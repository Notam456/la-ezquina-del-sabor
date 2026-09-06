@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-head">
    <div>
        <div class="page-eyebrow">Panel principal</div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-sub">Resumen de la jornada</p>
    </div>
</div>

<div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
    <div class="card-kpi" style="background: var(--surface); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--elev-1);">
        <div class="kpi-label">Ventas del día</div>
        <div class="kpi-value" style="font-family: var(--font-display); font-size: 28px; font-weight: 700;">${{ number_format($ventasHoy, 2, ',', '.') }}</div>
        <div class="kpi-meta">{{ $pedidosHoy }} pedidos</div>
    </div>
    <div class="card-kpi accent" style="background: var(--surface); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--elev-1);">
        <div class="kpi-label">Comandas activas</div>
        <div class="kpi-value" style="font-family: var(--font-display); font-size: 28px; font-weight: 700;">{{ $comandasActivas->count() }}</div>
        <div class="kpi-meta">En preparación</div>
    </div>
    <div class="card-kpi" style="background: var(--surface); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--elev-1);">
        <div class="kpi-label">Clientes</div>
        <div class="kpi-value" style="font-family: var(--font-display); font-size: 28px; font-weight: 700;">{{ $totalClientes }}</div>
        <div class="kpi-meta">Registrados</div>
    </div>
    <div class="card-kpi" style="background: var(--surface); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--elev-1);">
        <div class="kpi-label">Tasa BCV</div>
        <div class="kpi-value" style="font-family: var(--font-mono); font-size: 28px; font-weight: 700; color: var(--accent);">{{ number_format((float)$tasaBcv, 2, ',', '.') }}</div>
        <div class="kpi-meta">Bs/USD</div>
    </div>
</div>

<div style="display:grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <div class="panel" style="background: var(--surface); border-radius: var(--radius-md); box-shadow: var(--elev-1);">
        <div class="panel-head">
            <div class="panel-title">Comandas activas</div>
        </div>
        <div class="panel-body">
            @forelse($comandasActivas as $comanda)
                <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0; @if(!$loop->last) border-bottom: 1px solid var(--border); @endif">
                    <div>
                        <span style="font-weight:600;">#{{ $comanda->numero_correlativo_diario }}</span>
                        <span style="color:var(--muted); margin-left:8px;">{{ $comanda->cliente->nombre ?? $comanda->nombre_cliente_temporal ?? 'Sin cliente' }}</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span style="font-family:var(--font-mono); font-weight:600;">${{ number_format($comanda->total_usd, 2, ',', '.') }}</span>
                        <span style="font-size:12px; padding:3px 8px; border-radius:20px; background:{{ match($comanda->estado_comanda) { 'montar' => '#fef3cd', 'entrega' => '#d1ecf1', 'cobrar' => '#d4edda', default => '#f8f9fa' } }}; color:{{ match($comanda->estado_comanda) { 'montar' => '#856404', 'entrega' => '#0c5460', 'cobrar' => '#155724', default => '#495057' } }};">{{ ucfirst($comanda->estado_comanda) }}</span>
                    </div>
                </div>
            @empty
                <p style="color: #7a7066;">No hay comandas activas en este momento.</p>
            @endforelse
        </div>
    </div>
    <div>
        <div class="panel" style="background: var(--surface); border-radius: var(--radius-md); box-shadow: var(--elev-1); margin-bottom: 16px;">
            <div class="panel-head"><div class="panel-title">Acceso rápido</div></div>
            <div class="panel-body" style="display:flex; flex-direction:column; gap:8px;">
                <a href="{{ route('catalogo.productos.index') }}" class="btn-ghost-brand" style="text-align:center;">
                    <i class="bi bi-box-seam"></i> Gestionar Productos
                </a>
                <a href="{{ route('comandas.index') }}" class="btn-ghost-brand" style="text-align:center;">
                    <i class="bi bi-receipt"></i> Nueva Comanda
                </a>
                <a href="{{ route('inventario.materias-primas.index') }}" class="btn-ghost-brand" style="text-align:center;">
                    <i class="bi bi-dropbox"></i> Inventario
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
