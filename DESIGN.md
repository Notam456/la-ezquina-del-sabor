---
name: La Esquina del Sabor
description: Sistema punto de venta de comida rápida en Venezuela — operación diaria en USD indexado a la tasa BCV.
colors:
  primary:
    brand-orange: "#e86a17"
    brand-orange-strong: "#c9530a"
    brand-orange-soft: "#fbe3cf"
    brand-orange-ink: "#a8460a"
  neutral:
    warm-paper: "#f5f1ea"
    surface: "#ffffff"
    surface-sunken: "#ece6dc"
    warm-ink: "#201b16"
    warm-ink-2: "#4a423a"
    stone: "#7a7066"
    whisper: "#a89e92"
    border-warm: "#ddd4c7"
    border-strong: "#c9beb0"
  semantic:
    success: "#238141"
    success-soft: "#e2f2e7"
    danger: "#a33a22"
    danger-soft: "#f8e3dc"
    warn: "#c77c08"
    warn-soft: "#fcf0d9"
    info: "#3860be"
    info-soft: "#e7ecf8"
typography:
  display:
    fontFamily: "\"Space Grotesk\", \"Inter\", system-ui, sans-serif"
    fontSize: "34px"
    fontWeight: 600
    lineHeight: 1
    letterSpacing: "-0.02em"
  title:
    fontFamily: "\"Inter\", system-ui, sans-serif"
    fontSize: "24px"
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: "-0.01em"
  body:
    fontFamily: "\"Inter\", system-ui, sans-serif"
    fontSize: "14px"
    fontWeight: 400
    lineHeight: 1.45
  label:
    fontFamily: "\"JetBrains Mono\", ui-monospace, monospace"
    fontSize: "12px"
    fontWeight: 700
    letterSpacing: "0.08em"
  money:
    fontFamily: "\"Space Grotesk\", \"Inter\", system-ui, sans-serif"
    fontSize: "18px"
    fontWeight: 600
  mono:
    fontFamily: "\"JetBrains Mono\", ui-monospace, monospace"
    fontSize: "13px"
    fontWeight: 500
    letterSpacing: "0"
rounded:
  sm: "8px"
  md: "14px"
  lg: "20px"
  pill: "999px"
spacing:
  xs: "4px"
  sm: "8px"
  md: "16px"
  lg: "24px"
  xl: "28px"
components:
  button-primary:
    backgroundColor: "{colors.primary.brand-orange}"
    textColor: "{colors.neutral.surface}"
    typography: "{typography.body}"
    rounded: "{rounded.md}"
    padding: "10px 16px"
  button-primary-hover:
    backgroundColor: "{colors.primary.brand-orange-strong}"
    textColor: "{colors.neutral.surface}"
  button-ghost:
    backgroundColor: "transparent"
    textColor: "{colors.neutral.warm-ink-2}"
    typography: "{typography.body}"
    rounded: "{rounded.md}"
    padding: "10px 16px"
  input-brand:
    backgroundColor: "{colors.neutral.surface}"
    textColor: "{colors.neutral.warm-ink}"
    typography: "{typography.body}"
    rounded: "{rounded.md}"
    padding: "10px 12px"
  panel:
    backgroundColor: "{colors.neutral.surface}"
    rounded: "{rounded.lg}"
    padding: "20px"
  card-kpi:
    backgroundColor: "{colors.neutral.surface}"
    rounded: "{rounded.lg}"
    padding: "20px"
  badge-estado:
    rounded: "{rounded.pill}"
    padding: "5px 11px"
  nav-item-active:
    backgroundColor: "{colors.primary.brand-orange-soft}"
    textColor: "{colors.neutral.warm-ink}"
    rounded: "10px"
    padding: "10px 12px"
  tasa-chip:
    backgroundColor: "{colors.primary.brand-orange-soft}"
    textColor: "{colors.primary.brand-orange-ink}"
    typography: "{typography.mono}"
    rounded: "{rounded.md}"
    padding: "5px 12px"
---

# Design System: La Esquina del Sabor

## Overview

**Creative North Star: "Cocina operativa premium — más aire, mismo fuego"**

"La Esquina del Sabor" es el panel de mando de una cocina de comida rápida venezolana: tres roles trabajando en paralelo (cocina, recepción, gerencia), muchos pedidos simultáneos, y dinero real en dos monedas. El sistema visual hereda una estética de **cocina bien organizada en hora pico** — cada cosa en su lugar, legible a distancia de un vistazo — y la refina hacia un acabado **más limpio y despejado**: se conserva el calor del naranja de marca y el orden de la cuadrícula, pero se gana aire. Menos ruido, más respiración, la misma precisión de un sistema que cobra en bolívares.

La personalidad es operativa, nunca decorativa: este no es un menú bonito para el cliente final ni un dashboard genérico de SaaS, sino el escritorio de quien cocina y cobra. El dinero manda y se lee como se lee un comprobante: el monto en USD es protagonista tipográfico; su par en Bs le sigue en mono, discreto pero siempre presente. El naranja es herramienta — botón primario, estado "Montar", tasa BCV — no relleno. La profundidad se logra por tonos de superficie cálidos y sombras cortas de POS sobre la mesa, nunca por niebla.

**Key Characteristics:**
- Calor, orden y aire: un naranja funcional, cuadrícula firme y respiración entre módulos.
- El dinero siempre en par USD + Bs, tipografía display tabular para números que mandan.
- Curvas contextuales: 8px micro, 14px inputs y botones, 20px tarjetas, pill para badges.
- Sombras cortas y definidas; la profundidad se lee por tesitura de superficie (sunken vs white).
- Un solo foco naranja por pantalla y una única acción primaria sólida por vista.
- Legible a distancia de cocina, respetuoso de `prefers-reduced-motion`.

## Colors

Paleta cálida y terrosa de una sola marca: un naranja señal como acento funcional sobre superficies de papel cálido y tinta no fría. El sistema completo vive en las variables `:root` de `assets/app.css`; los valores en paréntesis son los canónicos.

### Primary
- **Naranja señal (`#e86a17`)** — el color de marca funcional: botón primario, logo, enlaces activos y estado "Montar". Aparece como *tinta* (botón, badge, número resaltado, borde de foco), juto sobre superficie clara, y cubre como máximo una pieza protagonista por pantalla.
- **Naranja profundo (`#c9530a`)** — hover/press de la acción primaria y texto pequeño sobre fondo naranja.
- **Naranja tenue (`#fbe3cf`)** — superficie de tintes: badges "Montar", filtro activo, item de navegación activo, chip de tasa.
- **Naranja quemado (`#a8460a`)** — texto e iconos sobre fondos naranja tenue (contraste legible sin encender negro).

### Neutral
- **Papel cálido (`#f5f1ea`)** — canvas raíz; nunca blanco puro como fondo de página.
- **Superficie (`#ffffff`)** — solo contenido accionable: tarjetas, paneles, formularios.
- **Superficie hundida (`#ece6dc`)** — zonas pasivas, backgrounds de hover, cavidades.
- **Tinta cálida (`#201b16`)** — texto principal; tinta marrón, no negro frío.
- **Tinta secundaria (`#4a423a`)** — texto secundario y etiquetas.
- **Piedra (`#7a7066`)** — metadatos y auxiliares, siempre ≥4.5:1 sobre papel caliente.
- **Susurro (`#a89e92`)** — datos "whisper" / deshabilitados; nunca para contenido de acción.
- **Borde cálido (`#ddd4c7`) y borde fuerte (`#c9beb0`)** — separadores finos y bordes interactivos respectivamente.

### Semantic
- **Verde operativo (`#238141`)** — cobrado, cerrado, entregado (fondo tintado `#e2f2e7`).
- **Rojo tierra (`#a33a22`)** — error, stock crítico, crédito pendiente (fondo tintado `#f8e3dc`).
- **Ámbar (`#c77c08`)** — atención, "Entrega", stock bajo (fondo tintado `#fcf0d9`).
- **Azul (`#3860be`)** — enlaces y callouts informativos, estado "Cobrar" (fondo tintado `#e7ecf8`).

### Named Rules
**The Calor Pointer Rule.** El naranja de marca es funcional, no decorativo: aparece como tinta o borde sobre superficie clara, señala una sola cosa por pantalla (la acción primaria, la comanda "Montar", la tasa BCV) y cubre ≤10% del viewport. Nunca se pinta una tarjeta entera de naranja.
**The Estado Pair Rule.** Los estados de comanda se distinguen por color Y por palabra: Montar = naranja, Entrega = ámbar, Cobrar = azul, Pagada = verde, Crédito = rojo tierra. Un badge claro usa su tono tenue de fondo con tinta oscura del mismo color (nunca el color pleno sobre su tenue).

## Typography

**Display Font:** Space Grotesk (fallback Inter, system-ui) — solo para números y titulares cortos.
**Body Font:** Inter (fallback system-ui) — todo el texto operativo.
**Label/Mono Font:** JetBrains Mono (fallback ui-monospace, Menlo) — tasas, horas, IDs y montos Bs.

**Character:** La pareja Space Grotesk + Inter + JetBrains Mono da la firma "operativo-ingenieril": números con geometría robusta, cuerpo neutro y legible a distancia de cocina, y mono que suena a sistema de registro. La escala es base 8 con cadencia operativa, sin serif nostálgica.

### Hierarchy
- **Display** (Space Grotesk 600, 34px, line-height 1): números de comanda, KPIs, importes USD grandes. `letter-spacing: -0.02em`, siempre tabular.
- **Title** (Inter 700, 24px, line-height 1.2): titulares de vista (`letter-spacing: -0.01em`) con eyebrow arriba.
- **Body** (Inter 400, 14px, line-height 1.45): cuerpo, celdas y descripciones (15px en algunos formularios); tope ~65ch en párrafos largos.
- **Label** (JetBrains Mono 700, 12px, `letter-spacing: 0.08em`, MAYÚSCULAS): eyebrows de página y etiquetas de sección, en `stone`.
- **Money** (Space Grotesk 600, 18px, tabular): importes USD protagonistas; el par Bs debajo en `mono` 13px `stone`.
- **Mono meta** (JetBrains Mono 500, 11–13.5px): horas, IDs, valores de conversión, tasas, contadores de tablas.

### Named Rules
**The Money Pair Rule.** Todo monto se presenta en par: el valor USD en Display tabular sobre `warm-ink`, y debajo, en línea menor y mono `stone`, su equivalente en Bs. Ningún número de dinero aparece como texto común, y ningún monto queda sin su par.
**The Numbers Lead Rule.** N.° de comanda, precios y contadores son los únicos elementos display a gran tamaño; columnas monetarias siempre alineadas a la derecha y `font-variant-numeric: tabular-nums`.

## Layout

Estructura de aplicación (escritorio de recepción/cocina): sidebar fijo de 248px a la izquierda, topbar de 54px arriba y canal principal. El contenido se apoya en una rejilla base de 8px y respira con aire: padding de tarjetas 20px, canal de contenido 28px, separación entre secciones 24px.

- **Sidebar:** logo arriba, navegación de módulos, usuario al pie. Ítem activo con `brand-orange-soft` + carril izquierdo naranja de 3px + tinta cálida; inactivo tinta secundaria; hover `surface-sunken`.
- **Topbar:** fecha del día a la izquierda; a la derecha, el **chip de tasa BCV** (mono naranja sobre tenue), el estado de jornada (pill verde/azul), el usuario con rol y el botón de apertura/cierre de jornada.
- **Page head:** eyebrow en mono → título de vista → subtítulo; la acción primaria en el extremo derecho.
- **Densidad operativa con aire:** listados y kanban densos pero con respiro — filas 48–56px, tarjetas padding 20px. Cuando un listado se aprieta, se convierte en tarjetas apiladas en lugar de colapsar el espaciado.
- **Responsive:** ≥1024 full; 768–1023 el sidebar se oculta bajo menú móvil; ≤767 contenido apilado, tablas → tarjetas. Nunca desplazamiento horizontal.

**The Aire Rule.** El aire es parte del sistema, no espacio muerto: se respeta el ritmo 8/16/24/28 ante cualquier interrogación de densidad. Cuando falta espacio, se reorganiza (apilar, recortar) antes de reducir padding o fuente.

## Elevation & Depth

El sistema es **plano por tesitura**, no sombreado: la profundidad se lee por alternancia de superficies cálidas (`warm-paper` → `surface` blancas → `surface-sunken` pasivas) y por sombras cortas y definidas de "POS sobre la mesa", nunca por niebla difusa ni láminas flotantes. En reposo, cada panel lleva una elevación mínima; solo la KPI acentuada del día y los toasts se levantan del canvas.

### Shadow Vocabulary
- **Resting card** (`0 1px 2px rgba(32,27,22,.06), 0 1px 3px rgba(32,27,22,.08)`): paneles, tarjetas KPI, tablas — el nivel por defecto.
- **Raised** (`0 4px 12px rgba(32,27,22,.08), 0 2px 4px rgba(32,27,22,.06)`): la KPI destacada (borde naranja tenue) y toasts.

**The Tabletop Rule.** Las sombras son cortas y su startup es la tinta cálida (no negro puro); el cambio de elevación responde a estado (destacar, notificar), nunca es decorativo. La "cavidad" (sunken) se usa para el plano de reposo y el hover de patada, sin sombra.

## Shapes

Forma por **curvas contextuales** sobre superficies lienzo: radios no uniformes, cada uno con su trabajo.

- **8px** (`--radius-sm`): micro-elementos — botones de icono, paginación, avatar logo.
- **14px** (`--radius-md`): interactivos — inputs, selects, botones, chip de tasa.
- **20px** (`--radius-lg`): contenedores — paneles, tarjetas KPI y de comanda.
- **Pill** (999px): badges de estado, chip de jornada, track de switch.
- Carril de estado: las tarjetas de comanda llevan borde izquierdo de 3px tintado del color del estado.
- Sin degradados, sin glassmorphism, sin clipping decorativo; los iconos son de línea fina (Bootstrap Icons en el prototipo).

**The Rail Rule.** El carril izquierdo de 3px del color del estado es la señal estructural de una comanda; no se sustituye por color de relleno ni se borra al apilar.

## Components

### Buttons
- **Shape:** radio 14px, bordes de 1.5px en variantes outline.
- **Primary:** fondo `brand-orange`, texto blanco, padding `10px 16px`, Inter 14.5px/600. Hover → `brand-orange-strong`; active → presión `scale(.985)`; focus → anillo `0 0 0 3px rgba(232,106,23,.35)`.
- **Hover / Focus:** transición 150ms `ease-out`; el foco visible nunca se retira.
- **Ghost / Secondary:** fondo blanco (o transparente), borde `1.5px border-strong`, texto tinta secundaria, sin sombra. Hover → borde tinta secundaria y texto `warm-ink`. **Una sola acción primaria sólida por vista**; el resto es ghost/outline/texto.

### Chips / Badges
- **Estado (badge-estado):** pill (999px), 11px Inter/700 MAYÚSCULAS `letter-spacing .04em`, dot de 6px, fondo tenue del estado + tinta oscura del mismo color (ej. `brand-orange-soft` + `brand-orange-ink` para "Montar").
- **Chip de tasa:** mono — label mini `stone` + número `brand-orange-ink` sobre `brand-orange-soft`, radio 14px, borde `color-mix` del naranja al 30%.
- **Chip de jornada:** pill con dot (verde "En servicio" / azul "Cerrado").

### Cards / Containers
- **Corner Style:** 20px.
- **Background:** `surface` blanco; el canvas nunca es blanco.
- **Shadow Strategy:** resting card (ver Elevation) — siempre una; sin pilas de láminas.
- **Border:** 1px `border-warm`.
- **Internal Padding:** 20px (tarjetas KPI y paneles).
- KPI: eyebrow uppercase `stone` (12px) → número Display 34px/600 tabular → meta con par Bs mono. Una sola KPI del día puede llevar acento naranja mínimo (borde tenue + elevación raised).

### Inputs / Fields
- **Style:** fondo blanco, borde `1.5px border-strong`, radio 14px, padding `10px 12px`, Inter 14px.
- **Label:** 13px/600 tinta secundaria, sobre el campo; ayuda en mono 11.5px `stone` y error con texto (no solo color).
- **Focus:** borde `brand-orange` + anillo de foco naranja translúcido.
- **Switch (.slider):** track pill 46×26 `border-strong`, thumb blanco 20px, checked → `brand-orange`, thumb corre 20px.

### Navigation
- **Sidebar:** item con icono 16px (líneas finas) + label 14px/500. Activo = `brand-orange-soft` + carril izquierdo 3px naranja + padding `10px 12px`; hover `surface-sunken`; foco con anillo. Etiquetas de sección en mono 11px MAYÚSCULAS `stone`. Con `focus-visible` en todo.
- **Topbar (de entorno, no navegación):** fecha, tasa BCV (chip, ver Chips), jornada (pill), usuario. Mobile: sidebar se oculta y abre offcanvas.

### Signature: Tarjeta de comanda (kanban / cocina)
La unidad más importante de la cocina: número grande Display (N.° de comanda), cliente y tiempo arriba, lista de productos con badge de tipo de entrega, notas resaltadas en `warn-soft` (ej. "sin cebolla") y el carril izquierdo de 3px del color del estado. Foco máximo en la columna "Montar".

## Do's and Don'ts

### Do:
- **Do** usar Display tabular (Space Grotesk 600) para N.° de comanda, precios y KPIs — nunca texto común para dinero.
- **Do** mostrar el par USD (Display `warm-ink`) + Bs (mono `stone`) en todo importe.
- **Do** respetar los radios contextuales: 8px micro, 14px inputs/botones, 20px tarjetas, pill badges.
- **Do** dejar respirar: tarjetas 20px, canal 28px, ritmo de sección 24px, filas 48–56px.
- **Do** mantener una sola acción primaria sólida y un solo foco naranja por vista.
- **Do** pintar el carril izquierdo de 3px con el color del estado en cada tarjeta de comanda.
- **Do** incluir `:focus-visible` (anillo naranja 3px translúcido) en todo interactivo y respetar `prefers-reduced-motion`.
- **Do** usar estados por color Y por palabra (Montar/Entrega/Cobrar/Pagada/Crédito).

### Don't:
- **Don't** usar blanco puro como canvas raíz: el fondo de página es siempre `warm-paper`.
- **Don't** pintar tarjetas de naranja, ni usar degradados, glassmorphism, emojis como iconos o serif de menú nostálgico.
- **Don't** mostrar un monto sin su par en Bs, ni alineado fuera de columna tabular derecha.
- **Don't** generar desplazamiento horizontal; bajo 767px las tablas se convierten en tarjetas apiladas.
- **Don't** quitar el carril de estado ni fundir el estado solo en color de relleno.
- **Don't** degradar contraste en hover: cambiar fondo/borde/sombra, nunca aclarar el texto.
- **Don't** duplicar el CTA sólido en el viewport ni añadir un segundo foco naranja.