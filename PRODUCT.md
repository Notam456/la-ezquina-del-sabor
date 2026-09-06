# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Primary user is twofold, confirmed by the owner:

- **Restaurant owners / buyers** evaluating the system during a sales demo of the prototype.
- **Staff** (cashier, kitchen, management) who must find the interface usable if adopted: comandas, kitchen display, sales and payment handling in Bs/USD, daily the close.

The prototype must therefore read as a convincing product to a buyer and as a usable working surface to the people who would operate it daily.

## Product Purpose

"La Esquina del Sabor" is a navigable HTML prototype of a point-of-sale system for a small Venezuelan eatery. It exists to demonstrate the complete operational loop — taking comandas, serving them in the kitchen, charging in bolívares and USD, closing the day's cash, and managing inventory, recipes, purchases, waste, credits, and customers — and to serve as the visual/UI reference that the real system will be built from.

Success means the maquette reads as coherent, complete, and polished enough to stand as the design reference for implementation, not just a loose collection of screens.

## Positioning

A full-journey model of a small Latin American eatery POS: a single static prototype covering the entire operating day, from opening the cash register and taking a comanda down to closing the drawer and registering client credits, priced and payable in dual currency (Bs via BCV rate, USD). A neighboring sales pitch could not truthfully copy the completeness of the operational loop while staying a no-backend, click-to-open prototype.

## Operating Context

- Navigated in a browser directly from the filesystem (no server, no backend).
- Used in Spanish, in a Venezuelan context, with prices expressed in USD and converted to bolívares at the BCV exchange rate (tasa 42,50).
- Demos happen against an internal "jornada" (service day) of mock data.
- Verified on Windows; assets and views are static HTML styled with Bootstrap 5.3 plus a custom token system in `assets/app.css`.

## Capabilities and Constraints

- **Modules:** dashboard, comandas, kitchen display, sales and payment (cash / USD), per-order detail, ticket printing mockup, cash register open/close, inventory with recipes, purchases, waste (mermas), products, credits ledger, customers.
- **Constraints:** static HTML prototype with no backend; Spanish-only UI; dual-currency display fixed at tasa BCV 42,50; Bootstrap 5.3 + custom CSS tokens; the canonical catalog (Hamburguesa Esquina $5,50 · Perro caliente $3,00 · Arepa dominó $2,50 · Jugo natural $1,50 · Papas fritas extra $3,50 · Refresco 500 ml $1,00) and the corrected jornada data (6 comandas, total $111,25 / Bs 4.728,13) are authoritative and must not be re-derived.
- The current initiative is a **design-polish pass**: style and markup take priority; data coherence is secondary.

## Brand Commitments

- Product name "La Esquina del Sabor" and its Spanish-language voice are binding.
- The incumbent visual identity (created by the existing views and the token system in `assets/app.css`) is binding for the polish work; it is documented separately in DESIGN.md, not invented here.

## Evidence on Hand

- `Vistas-del-sistema/` — the 24 working HTML views of the prototype.
- `Vistas-del-sistema/assets/app.css` — the custom token system used across views.
- `Web-Prototype.zip` — backup of the original 24 views.
- Corrected canonical data (jornada, tasa, catalog, credits) embedded in the views; no external data source exists.
- Absence: there is no real backend, API, database, or production data, and none should be fabricated.

## Product Principles

1. **Design reference first:** the prototype's job is to be a coherent, polished UI reference, so visual quality takes precedence over data fidelity.
2. **Keep it unbreakable:** every view must keep opening and running as a static page; no build step or run dependency is acceptable.
3. **Respect the incumbent system:** preserve the existing token system and the confirmed data (catalog, tasa, jornada, credits) while polishing.
4. **Spanish, Venezuelan reality:** all copy in Spanish, dual-currency accounting at the BCV rate, small-eatery scale.
5. **Simplicity over invention:** don't add modules or workflows the user did not ask for to a maquette meant as a reference.