# La Esquina del Sabor — DESIGN.md

> Sistema de diseño de referencia para agentes de diseño UI.
> Punto de venta (POS) de comida rápida. Local tipo garaje con cocina, mesas y entrega a domicilio · Municipio Aristides Bastidas, Yaracuy, Venezuela · Operación en USD indexado a la tasa BCV.
>
> **Frase del sistema:** una sola línea, legible como señal de tránsito: *"Calor, orden y sabor: la cocina que nunca se detiene."*

---

## 1. Cómo usar este documento (para agentes)

Este archivo es el contrato visual del producto. Antes de generar cualquier vista, el agente debe:

1. **Leer primero** este documento completo (color, tipografía, layout, movimiento, estados).
2. **Copiar el bloque `:root`** (Sección 3) verbatim al primer `<style>` de cada artefacto. No redefinir tokens ni escribir hex fuera de ese bloque.
3. **Usar los patrones de layout** (Sección 7) en lugar de maquetas improvisadas.
4. **Verificar contra la Checklist** (Sección 10) antes de entregar.
5. Referenciar las vistas por módulo del `Vistas_Por_Modulo_OpenDesign.docx` que ya define la arquitectura de pantallas (13 módulos). Este DESIGN.md aporta la **capa de estilo** sobre esa arquitectura; no la sustituye.

Fuentes de autoridad, en orden de prioridad: (1) petición explícita del usuario en el turno, (2) este DESIGN.md, (3) contrato del sistema maestro, (4) documentos del producto.

---

## 2. Dirección visual — la idea rectora

La Esquina del Sabor es un **puesto de servicio de comida rápida**: operación veloz, muchos pedidos simultáneos, tres roles trabajando en paralelo (cocina, recepción, gerencia). El diseño debe sentirse como una **cocina bien organizada en hora pico**: densa pero sin caos, cada cosa en su lugar, altísima legibilidad a distancia de un vistazo.

**Estética rectora: “Cocina operativa premium”** — no un menú bonito para cliente final, sino el **panel de mando de quien cocina y cobra**. Tres palabras: **Calor** (naranja señal, la marca), **Orden** (cuadrícula y jerarquía firmes), **Ritmo** (movimiento breve y decisivo, nunca decorativo).

### Anti-patrones (lo que NO hacemos)
- ❌ **Dashboard genérico de SaaS**: tarjetas grises con sombra, iconos en círculo gris, charts rellenos de azul.
- ❌ **Gloss de IA**: degradados púrpura, "glassmorphism", emojis como iconos, esquinas 8–12px con tarjetas flotantes, botones sólidos duplicados.
- ❌ **Tema de "restaurante acogedor" cliché**: fondo crema beige, fotos de comida en todos los fondos, tipografía manuscrita/serif nostálgica.
- ❌ **Color de cara al cliente** reemplazando al color funcional: el naranja es herramienta de estado y marca, no relleno decorativo.
- ❌ **Densidad de datos plana**: números de comanda, precios y montos NUNCA se presentan como texto común; siempre como elementos tipográficos destacados y tabulares.

El resultado debe verse **shipped por un equipo de producto serio**: operativo, preciso, cálido por el material (naranja + tinta cálida) y nunca genérico.

---

## 3. Tokens de color — contrato

Copiar este bloque **verbatim** como primer `<style>` de cada artefacto.

```css
:root {
  /* Superficie cálida: nunca blanco puro como canvas raíz */
  --bg: #f5f1ea;            /* canvas: papel cálido, tipo cartón limpio */
  --surface: #ffffff;       /* superficies elevadas: tarjetas, paneles */
  --surface-sunken: #ece6dc;/* zonas hundidas / menú lateral inactivo */
  --fg: #201b16;            /* texto principal: tinta cálida, no negro frío */
  --fg-2: #4a423a;          /* texto secundario */
  --muted: #7a7066;         /* texto terciario / metadatos, legible */
  --meta: #a89e92;          /* texto "whisper"/deshabilitado, muy atenuado */

  /* Sistema de marca: un solo naranja, dos presentaciones */
  --accent: #e86a17;        /* naranja señal de marca (base indicada) */
  --accent-strong: #c9530a; /* naranja profundo para hover/press de acción */
  --accent-soft: #fbe3cf;   /* superficie de tintes naranja (estados, badges claros) */
  --accent-ghost: #a8460a;  /* texto/líneas sobre fondo claro, naranja quemado */

  /* Semántica de estados */
  --success: #238141;       /* verde: cobrado, cerrado, entregado */
  --success-soft: #e2f2e7;
  --danger: #a33a22;        /* rojo tierra: error, stock bajo crítico, eliminado */
  --danger-soft: #f8e3dc;
  --warn: #c77c08;          /* ámbar: atención, stock bajo, avisos */
  --warn-soft: #fcf0d9;
  --info: #3860be;          /* azul: enlaces y callouts informativos */
  --info-soft: #e7ecf8;

  --border: #ddd4c7;        /* borde en superficies claras */
  --border-strong: #c9beb0; /* borde en elementos interactivos/input */
  --footer-bg: #201b16;     /* pie de página / zonas de cierre */

  /* Tipografía */
  --font-sans: "Inter", "Roboto", system-ui, -apple-system, "Segoe UI", Arial, sans-serif;
  --font-display: "Space Grotesk", "Inter", var(--font-sans);
  --font-mono: "JetBrains Mono", ui-monospace, "SFMono-Regular", Menlo, monospace;

  /* Escala tipográfica (px) */
  --text-xs:  12px;
  --text-sm:  14px;
  --text-base: 16px;
  --text-lg:  20px;
  --text-xl:  28px;
  --text-2xl: 40px;
  --text-3xl: 56px;

  /* Espaciado base 8px */
  --space-1: 4px;
  --space-2: 8px;
  --space-3: 12px;
  --space-4: 16px;
  --space-5: 20px;
  --space-6: 24px;
  --space-8: 32px;
  --space-12: 48px;
  --space-16: 64px;

  /* Radios: esquinas contextuales, no uniformes */
  --radius-sm: 6px;      /* chips, badges, micro-elementos */
  --radius-md: 14px;     /* inputs, botones secundarios */
  --radius-lg: 20px;     /* tarjetas, paneles */
  --radius-xl: 28px;     /* contenedores principales, canal principal */

  /* Elevación: sombra corta y definida (POS sobre mesa), no neblina */
  --elev-1: 0 1px 2px rgba(32,27,22,.06), 0 1px 3px rgba(32,27,22,.08);
  --elev-2: 0 4px 12px rgba(32,27,22,.08), 0 2px 4px rgba(32,27,22,.06);
  --elev-3: 0 12px 32px rgba(32,27,22,.12);
  --focus-ring: 0 0 0 3px rgba(232,106,23,.35);

  /* Movimiento */
  --motion-fast: 150ms;
  --motion-base: 220ms;
  --motion-slow: 360ms;
  --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
  --ease-standard: cubic-bezier(0.4, 0, 0.2, 1);

  /* Constantes de layout */
  --container-max: 1280px;
  --gutter: 24px;
  --sidebar-w: 248px;
  --topbar-h: 64px;
}
```

### Reglas de color
- El canvas es **papel cálido** `--bg`, nunca blanco puro. El blanco puro (`--surface`) se reserva para tarjetas y paneles elevados, de modo que lo "blanco" signifique "contenido sobre el que actuar".
- **Un solo naranja de marca** (`--accent`). Se usa como: color del logotipo, botón primario, enlaces activos, indicadores de "Montar/comida caliente", y un foco máximo de una sola pieza por pantalla.
- **El naranja es funcional, no decorativo.** No rellenar fondos de tarjetas con naranja. El naranja aparece como **tinta** (botón, badge, número resaltado) sobre superficies claras.
- Estados de comanda → colores semánticos consistentes:
  - **Montar** (en preparación) → `--accent` (naranja, calor: se está cocinando)
  - **Entrega** → `--warn` / ámbar (en tránsito hacia el cliente)
  - **Cobrar** → `--info` / azul (transacción pendiente) — reservado, no es naranja
  - **Cerrada/Pagada** → `--success` / verde (completo)
  - **Crédito pendiente** → `--danger` / rojo tierra (deuda por cobrar)
- **Contraste garantizado:** texto principal `--fg` sobre `--bg` ≥ 10:1; texto `--muted` sobre `--bg` ≥ 4.5:1; naranja `--accent` sobre blanco ≥ 4.5:1 (usar `--accent-strong` para texto pequeño sobre claro).
- **Nunca** naranja sobre superficie naranja clara para texto; usar `--accent-ghost` sobre `--accent-soft` para el texto de badges naranjas claros. Verificar cada par en hover/focus/active.
- El rojo del logo de Mastercard NO se usa en esta UI; aquí el rojo tierra es semántico de error/crédito.

---

## 4. Tipografía

### Familias
- **`--font-display` · Space Grotesk** (con los acabados geometría numerosa) — **solo** para: números de comanda, precios/importes, contadores KPI, titulares de sección cortos. Da esa firma "operativa-ingenieril" que separa la marca de un menú genérico.
- **`--font-sans` · Inter** — todo el texto del cuerpo, formularios, tablas, navegación. Legible a pantalla de cocina.
- **`--font-mono` · JetBrains Mono** — tasas, horas, timestamps, valores de conversión USD→Bs, IDs. El mono crea la sensación de "sistema de registro".

> **Anti-patrón:** NO usar una serif decorativa, ni una script/manuscrita, ni Fraunces. Es un POS operativo, no un menú gastronómico editorial.

### Jerarquía (base 8, cadencia operativa)
| Rol | Fuente | Tamaño | Peso | Características |
|---|---|---|---|---|
| N.° de comanda (display) | Display | 48px | 600 | tabular, `tabular-nums`, es EL elemento de la vista |
| Titular de sección (vista) | Sans | 22px | 700 | `letter-spacing:-0.01em` |
| Titular de tarjeta/panel | Display | 20px | 600 | para números y títulos cortos |
| Etiqueta eyebrow | Sans | 12px | 700 | MAYÚSCULAS, `letter-spacing:0.08em`, `--muted` |
| Cuerpo | Sans | 15px | 400 | `--fg-2`, `line-height:1.45` |
| Celda de tabla | Sans | 14px | 400 | `--fg-2` |
| Importe USD | Display | 18px | 600 | `tabular-nums` |
| Importe Bs (secundario) | Mono | 13px | 500 | `--muted` bajo el USD |
| Tasa BCV | Mono | 15px | 600 | `--accent-ghost` |
| Estado (badge) | Sans | 12px | 700 | MAYÚSCULAS, `letter-spacing:0.04em` |

### Reglas tipográficas
- **Los números mandan.** N.° de comanda, precios y montos siempre en `--font-display` con `font-variant-numeric: tabular-nums`. Son la única tipografía de "display" permitida a gran tamaño.
- **Dual-currency siempre visible:** el monto USD es el principal (Display, `--fg`); debajo, en línea más pequeña, el equivalente Bs en mono `--muted`. Nunca un monto sin su par.
- **Orfandad prohibida:** ajustar width/line-height antes que reducir fuente; nunca ocultar desbordes.
- Altura de línea: cuerpo 1.45, titulares 1.15, display de números 1.0.
- Numerosos datos → alineación tabular con `text-align:right` para columnas de dinero.

---

## 5. Componentes

### Botones y acciones
- **Primario (único por acción):** fondo `--accent`, texto blanco, `border-radius:14px`, padding `10px 18px`, font Sans 15px/600. Hover → `--accent-strong`. Focus → `--focus-ring`. Active → presión: `transform:scale(.98)`.
- **Secundario:** fondo `--surface` blanco, borde `1.5px solid --border-strong`, texto `--fg`, radius 14px. Hover → borde `--fg-2`, texto `--fg`. Nunca sombrear.
- **Fantasma/texto:** sin fondo ni borde, texto `--accent-ghost`. Hover → texto `--accent-strong` + subrayado opcional. Contraste nunca baja en hover.
- **Acción destructiva (mermar, eliminar):** borde/texto `--danger`, fondo claro. Nunca un bloque rojo sólido salvo confirmación crítica.
- **Chip / badge de estado:** fondo de tintes (`--accent-soft`, `--success-soft`, etc.), texto `--fg` o tinte oscuro de su color, radius 999px, padding `3px 10px`, 12px/700 MAYÚSCULAS.
- **UNA sola acción, UN botón primario.** En una vista (crear comanda) hay una acción principal. Los secundarios son outline/ghost. No duplicar el mismo CTA sólido en el viewport.

### Tarjetas, tablas y paneles
- **Panel/canal:** fondo `--surface` blanco, radius `--radius-lg`/`--radius-xl`, borde `1px --border` fino, `--elev-1`. Es el contenedor de trabajo.
- **Tabla:** separadores horizontales `1px --border`; cabecera sticky `--bg` con eyebrow MAYÚSCULAS `--muted`; filas hover `--surface-sunken` (nunca texto gris en hover). Columna de dinero derecha-alineada, tabular.
- **KPI / tarjeta de métrica:** título eyebrow arriba, número grande Display 28px, variación pequeña con flecha y color semántico. Una KPI destacada (la del día) puede llevar un acento naranja mínimo.
- **Tarjeta de comanda (kanban/cocina):** display N.° grande + cliente + tiempo + lista de productos con badges de tipo de entrega, y notas resaltadas en `--warn-soft` (ej. "sin cebolla"). Borde izquierdo de 3px con el color del estado. Es la unidad más importante de la cocina.

### Formularios
- Input: fondo `--surface` blanco, borde `1.5px --border-strong`, radius `--radius-md`, padding `10px 14px`, texto 15px. Focus → borde `--accent` + `--focus-ring`. 
- Label: Sans 13px/600 `--fg-2` sobre el campo. Ayuda: mono 12px `--muted`.
- Select/multi: mismos tratamientos; chevron propio (no icono nativo visible feo).
- Radio/checkbox: 18–20px, acento `--accent`, focus ring visible.
- Errores: borde `--danger` + texto de ayuda `--danger` (≥4.5:1), no solo color — incluir mensaje.
- **Tipos de entrega por producto** = segment control (radio pill `Comer aquí | Llevar | Delivery`), con estados checks claros.

---

## 6. Layout y sistema de rejilla

- **Estructura app (desktop, pantalla de recepción/cocina):** `--topbar-h` 64px superior + sidebar `--sidebar-w` 248px a la izquierda (navegación de módulos) + canal principal `--container-max`. El contenido se apoya en rejilla de 8px.
- **Sidebar:** logo arriba, línea de módulos (13), activo con fondo `--accent-soft` + borde izquierdo naranja de 3px + texto `--fg`; inactivo texto `--fg-2`; hover `--surface-sunken`. Icono (14px, líneas finas) + label.
- **Topbar:** logo (compacto), fecha del día, **tasa BCV destacada** (mono naranja en un chip), usuario logueado con rol, y el botón de cierre/abertura de jornada (el único control de entorno, en el extremo derecho).
- **Densidad:** operativo → listas/kanban densos pero con aire: filas ~48–56px, tarjetas con padding 20px. En formularios de datos (producto, receta) usar dos/una columnas según ancho, con espaciado 20px.
- **Responsive:** ≥1024 full; 768–1023 sidebar colapsa a iconos o se esconde bajo "menú"; ≤767 el canal se apila, tablas se convierten en tarjetas apiladas, sidebar se vuelve menú completo. **Sin desplazamiento horizontal jamás.**

---

## 7. Patrones de layout por módulo (adaptar del doc de vistas)

Resumen de ritmos por tipo de vista:

| Tipo de vista | Estructura sugerida |
|---|---|
| Dashboard KPI (2.1) | Rejilla 4 KPI → panel de comandas activas (dos columnas) → tasa BCV |
| Lista (3.1, 4.1, 5.1, 6.1, 7.1, 8.1, 9.1, 12.1) | Header (título+eyebrow+acción primaria derecha) → barra filtros/búsqueda → tabla densa → paginación |
| Detalle/editor (3.4, 4.2, 5.2, 7.2, 9.2, 8.2) | Panel principal (form/detalle) + panel lateral de resumen/montos sticky |
| Crear comanda (3.2) | Header de comanda (N.° provisional + cliente) → panel izquierdo catálogo con categorías → panel derecho detalle del pedido (líneas + totales) |
| Kokina/kanban (3.3) | Columnas por estado (horizontal): Montar → Entrega → Cobrar; tarjetas de comanda apiladas |
| Cierre/cuadre (10.2) | Resumen general superior → desglose por método de pago → cuadre caja (esperado vs contado) → confirmar |
| Reportes (11.1) | Selector de período sticky → gráficos (barras/lineas) → tabla productos más vendidos → export |
| Ticket tórtico (3.5) | Ancho 80mm, mono, sin fondo, solo para imprimir (no pantalla de navegación) |

**Regla de composición:** cada pantalla tiene un **foco máximo** — la comanda activa, el número a cuadrar, la acción crítica. Todo lo demás es soporte visualmente más atenuado. Nunca dos focos naranja en la misma pantalla.

---

## 8. Movimiento

El movimiento es **breve, funcional y decisivo** — comunica un cambio de estado, no entretiene.

- **Transiciones de estado (badges, botones, hover):** `150ms` `--ease-standard`. Los colores de estado cambian con fade suave.
- **Aparición/cierre de paneles y modales:** `220ms` `--ease-out`, con ligera transición de altura/opacidad. Un panel nuevo de comanda se desliza/anima.
- **Número/comanda entrante:** animación breve de "entrada" (subir + fade) cuando una comanda nueva llega al kanban — máximo 1, para que cocina lo note sin distraer.
- **Confirmación de cobro/cierre:** micro-feedback `150ms` de escala en el botón + cambio a estado "completado" con palomita.
- **Carga / tabla:** filas con fade-in escalonado corto.
- **Nunca:** rebote elástico, animaciones en bucle permanente, parallax, animar decoración. El movimiento SIEMPRE responde a una acción o evento del sistema.
- **Reduced motion:** respetar `prefers-reduced-motion` → anular todas las animaciones, mantener solo fades instantáneos.

---

## 9. Estado, feedback y accesibilidad

- **Toda acción tiene feedback visible:** botón presionado, guardado confirmado, error explicado. Nada deje al usuario preguntándose si se hizo.
- **Focus:** todo elemento enfocable tiene `:focus-visible` con `--focus-ring`. El borde de foco nunca se quita.
- **Hover que nunca degrada contrast:** cambiar color de fondo/sombra/borde, nunca aclarar el texto.
- **Touch targets:** teclas de acción y elementos interactivos ≥ 40px; en móvil ≥ 44px.
- **3 estados mínimos de comanda** siempre distinguibles por color Y por label/icono (no solo color).
- **Números tabulares** en todas las columnas monetarias y de conteo.
- **Reducir ruido:** máx. un naranja destacado y una acción primaria por vista.

---

## 10. Checklist de calidad (gate antes de entregar)

**P0 — imprescindible**
- [ ] Bloque `:root` de la Sección 3 copiado verbatim; sin hex sueltos fuera de él.
- [ ] Canvas `--bg`, no blanco puro.
- [ ] N.° comanda, precios y montos en Display tabular y con par USD/Bs visible.
- [ ] Una acción primaria por vista; secundarias outline/ghost.
- [ ] Estados de comanda correctos y con pares de color que respetan contraste en hover/focus.
- [ ] Sin desplazamiento horizontal en móvil; tablas → tarjetas en pantallas pequeñas.
- [ ] `:focus-visible` visible en todos los interactivos.
- [ ] Sin emojis funcionales ni degradados decorativos ni serif nostálgica.
- [ ] Sin orfandades ni desbordes de texto; todo contenido cabe en su contenedor.

**P1 — debería cumplirse**
- [ ] Importes Bs en mono, secundarios y legibles (≥4.5:1).
- [ ] Tasa BCV destacada en topbar.
- [ ] Notas de producto (ej. "sin cebolla") resaltadas en `--warn-soft`.
- [ ] Koanban con borde-izquierdo de color de estado.
- [ ] `prefers-reduced-motion` respetado.
- [ ] KPI del día con acento mínimo; resto atenuado.

**P2 — bonus**
- [ ] Sticky headers de tabla.
- [ ] Micro-animación de comanda entrante (máx. una).
- [ ] Modo impresión 80mm coherente para ticket.

---

## 11. Orientación de prompts para agentes (ejemplos)

Frases de dirección que un agente debe interpretar con este sistema:

- *"Haz el panel de cocina: un kanban de tres columnas por estado, tarjetas de comanda con el número grande en Display, cliente y tiempo arriba, y la lista de productos con badge de tipo de entrega y notas en ámbar. Foco máximo en las comandas Montar."*
- *"Diseña la vista Crear comanda con catálogo a la izquierda (categorías y búsqueda) y el detalle del pedido a la derecha, con totales USD arriba y su par en Bs en mono; un solo botón primario: Guardar e imprimir."*
- *"Haz el cuadre de caja: resumen general arriba, desglose por método de pago en tabla tabular, fila esperado-vs-contado con diferencia en verde/rojo, y confirmación de cierre como única acción sólida."*
- *"La tasa BCV va en el topbar como chip mono naranja; es un dato de operación diaria, no de configuración."*
- *"Prefiero una tabla densa y ordenada sobre tarjetas grises con sombra. El dinero va a la derecha, alineado, tabular."*

Usa **nombres de token** (`--accent`, `--warn-soft`, `--font-display`) en cualquier pedido de refinamiento para mantener el contrato.

---

## 12. Notas finales

- Los documentos del proyecto distinguen claramente: **`Vistas_Por_Modulo_OpenDesign.docx`** defina la arquitectura de pantallas (qué hay en cada vista); **este DESIGN.md** define cómo se ven (estilo y comportamiento). Mantener ambos en sincronía.
- El naranja base `#E86A17` es **contrato de marca del usuario** y no se altera; las demás superficies se derivan en OKLCH para mantener la armonía cálida.
- La tipografía de Google Fonts sugerida (Space Grotesk + Inter + JetBrains Mono) es la capa de sustitución; mantener siempre la escala y los pesos definidos aunque se intercambie la familia instalada.
- Este sistema evita deliberadamente la estética "menú de restaurante bonito": prioriza la **operación, la legibilidad a distancia de cocina, y la confianza de un sistema de dinero real**.
