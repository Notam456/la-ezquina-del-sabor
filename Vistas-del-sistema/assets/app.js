/* ============================================================
   La Esquina del Sabor · app.js — Núcleo compartido
   Navegación global del shell (sidebar) y utilidades comunes.
   Se carga en todas las vistas con sidebar.
   ============================================================ */
(function () {
  'use strict';

  var RUTAS = {
    dashboard: 'dashboard.html',
    comandas: 'comandas.html',
    cocina: 'cocina.html',
    ventas: 'ventas.html',
    creditos: 'creditos.html',
    catalogo: 'catalogo.html',
    recetas: 'recetas.html',
    inventario: 'inventario.html',
    clientes: 'clientes.html',
    reportes: 'reportes.html',
    usuarios: 'usuarios.html',
    configuracion: 'configuracion.html'
  };

  var W = window.W = window.W || {};

  // ── Fecha de hoy automática ────────────────────────────────
  function stampFecha() {
    var el = document.getElementById('todayDate');
    if (!el) return;
    var t = new Date();
    var dias = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
    var meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
    el.textContent = t.getDate() + ' de ' + meses[t.getMonth()] + ' de ' + t.getFullYear();
  }

  // ── Toast ──────────────────────────────────────────────────
  W.toast = function (msg, tipo) {
    var slot = document.getElementById('toastSlot');
    if (!slot) return;
    var el = document.createElement('div');
    el.className = 'mini-toast' + (tipo === 'ok' ? ' ok' : '');
    el.innerHTML = (tipo === 'ok'
      ? '<i class="bi bi-check-circle-fill"></i>'
      : '<i class="bi bi-info-circle-fill"></i>') + '<span></span>';
    el.querySelector('span').textContent = msg;
    slot.appendChild(el);
    setTimeout(function () {
      el.style.opacity = '0';
      el.style.transition = 'opacity 220ms';
      setTimeout(function () { el.remove(); }, 230);
    }, 2200);
  };

  // ── Cerrar offcanvas móvil ─────────────────────────────────
  function cerrarMenu() {
    var off = null;
    var nav = document.getElementById('mobileNav');
    if (nav && window.bootstrap) {
      off = window.bootstrap.Offcanvas.getInstance(nav);
      if (off) off.hide();
    }
  }

  // ── Marcar item activo según la página actual ──────────────
  function marcarActivo() {
    var name = (location.pathname.split('/').pop() || '').toLowerCase();
    var key = null;
    for (var k in RUTAS) {
      if (RUTAS[k].toLowerCase() === name) { key = k; break; }
    }
    if (!key) return;
    document.querySelectorAll('.nav-item[data-module]').forEach(function (n) {
      n.classList.toggle('active', n.getAttribute('data-module') === key);
    });
  }

  // ── Navegación por clic ────────────────────────────────────
  function navegar(key) {
    var destino = RUTAS[key];
    if (!destino) return false;
    window.location.href = destino;
    return true;
  }

  // Delegación global: clics en .nav-item[data-module] y [data-module-link]
  document.addEventListener('click', function (e) {
    var item = e.target.closest('.nav-item[data-module]');
    if (item) {
      e.preventDefault();
      if (navegar(item.getAttribute('data-module'))) { cerrarMenu(); }
      return;
    }
    var link = e.target.closest('[data-module-link]');
    if (link) {
      e.preventDefault();
      if (navegar(link.getAttribute('data-module-link'))) { cerrarMenu(); }
    }
  });

  // Utilidades expuestas
  W.rutas = RUTAS;
  W.navegar = navegar;
  W.cerrarMenu = cerrarMenu;

  // Init
  stampFecha();
  marcarActivo();
})();
