# 🏗️ MODULIA: Soluciones Modulares para una Nueva Forma de Vivir

[![Laravel 11](https://img.shields.io/badge/Framework-Laravel%2011-FF2D20?logo=laravel)](https://laravel.com)
[![PHP 8.2](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php)](https://www.php.net/)
[![PostgreSQL](https://img.shields.io/badge/DB-PostgreSQL-4169E1?logo=postgresql)](https://www.postgresql.org/)
[![Docker](https://img.shields.io/badge/Env-Docker-2496ED?logo=docker)](https://www.docker.com/)

**Modulia** es una plataforma integral de comercio y gestión para construcciones modulares. Este proyecto nace de la necesidad de digitalizar el sector de los contenedores habitacionales, ofreciendo una experiencia de usuario fluida y un panel administrativo robusto.

---

## 📖 Índice

- [🏗️ MODULIA: Soluciones Modulares para una Nueva Forma de Vivir](#️-modulia-soluciones-modulares-para-una-nueva-forma-de-vivir)
    - [📖 Índice](#-índice)
    - [🚀 Sobre el Proyecto](#-sobre-el-proyecto)
    - [💼 Análisis de Negocio (IPE II / EIE)](#-análisis-de-negocio-ipe-ii--eie)
    - [🎨 Diseño de Interfaz (DIW)](#-diseño-de-interfaz-diw)
    - [💻 Desarrollo Técnico](#-desarrollo-técnico)
        - [Backend (DWES)](#backend-dwes)
        - [Frontend (DWEC)](#frontend-dwec)
    - [🐳 Infraestructura y Despliegue (DAW)](#-infraestructura-y-despliegue-daw)
    - [📅 Metodología SCRUM](#-metodología-scrum)
    - [⚙️ Instalación](#️-instalación)
    - [🛠️ Evaluación y Testing](#️-evaluación-y-testing)
    - [👨‍💻 Autores](#-autores)

---

## 🚀 Sobre el Proyecto

Modulia permite la preventa y personalización de módulos (viviendas, oficinas, comercios). La plataforma separa claramente la experiencia del cliente de la gestión interna mediante roles de acceso definidos.

- **Catálogo Dinámico:** Filtrado por categorías.
- **Gestión de Carrito:** Persistencia de datos y validación de stock.
- **Panel Administrativo:** Control total sobre el inventario y estados de pedidos.

---

## 💼 Análisis de Negocio (IPE II / EIE)

Hemos aplicado un enfoque empresarial real mediante:

- **Modelo Canvas:** Definición de propuesta de valor, canales y flujos de ingresos.
- **Sostenibilidad (ODS):** El proyecto se alinea con el **ODS 11 (Ciudades y comunidades sostenibles)**, promoviendo la construcción modular por su menor impacto ambiental y eficiencia energética.
- **Promotores:** Grupo multidisciplinar 7K (Jaume Ibars, Fernando Serer, Ignacio Cantador).

---

## 🎨 Diseño de Interfaz (DIW)

El diseño se centra en el minimalismo y la arquitectura moderna.

- **Prototipado:** Realizado en **Penpot** (Wireframes de alta fidelidad).
- **UI/UX:**
    - Arquitectura de información jerarquizada.
    - Diseño **Mobile First** y totalmente Responsive.
    - Uso de componentes visuales: Spinners de carga, Toasts de notificación y Modales para autenticación.

---

## 💻 Desarrollo Técnico

### Backend (DWES)

Construido con **Laravel 11**, aprovechando las últimas mejoras del framework:

- **Eloquent ORM:** Relaciones complejas entre `Users`, `Containers`, `Categories` y `Orders`.
- **Seguridad:** \* Protección contra ataques CSRF y SQL Injection (vía PDO).
    - Middlewares personalizados (`IsAdmin`) para restringir el acceso al panel.
    - Verificación de email obligatoria para realizar pedidos.
- **Gestión de Archivos:** Sistema de carga de imágenes para el catálogo con validación de tipo y tamaño.

### Frontend (DWEC)

- **Blade Engine:** Plantillas reutilizables y layouts maestros.
- **JavaScript Vanilla:** \* Gestión asíncrona del carrito (Fetch API).
    - Validaciones de formularios en el lado del cliente.
    - Manipulación dinámica del DOM para sliders y galerías de productos.

---

## 🐳 Infraestructura y Despliegue (DAW)

El proyecto está completamente contenerizado, facilitando su escalabilidad y despliegue:

- **Docker Compose:** Orquestación de servicios (App, Web Server, Database).
- **Servidor Web:** Configuración de Apache optimizada.
- **Base de Datos:** PostgreSQL 16 para una gestión de datos relacional robusta.
- **Control de Versiones:** Git con flujo de trabajo basado en ramas por funcionalidad.

---

## 📅 Metodología SCRUM

Organización en **4 Sprints** semanales mediante Jira/Trello:

- **Sprint 1:** Requisitos, Historias de Usuario (HU) y Prototipado.
- **Sprint 2:** Configuración de entorno Docker, Migraciones y Auth.
- **Sprint 3:** Lógica de Carrito, Pedidos y Relaciones Eloquent.
- **Sprint 4:** Panel Admin, Refactorización (KISS) y Memoria Técnica.

---

## ⚙️ Instalación

1.  **Requisitos:** Docker Desktop y Git.
2.  **Clonar y Configurar:**
    ```bash
    git clone [https://github.com/tu-usuario/modulia.git](https://github.com/tu-usuario/modulia.git)
    cd modulia
    cp .env.example .env
    ```
3.  **Lanzar Entorno:**
    ```bash
    docker compose up --build -d
    ```
4.  **Inicializar Laravel:**
    ```bash
    docker compose exec app composer install
    docker compose exec app php artisan key:generate
    docker compose exec app php artisan migrate --seed
    ```
5.  **Acceso:** `http://localhost:8000`

---

## 🛠️ Evaluación y Testing

Se han realizado pruebas de caja negra y blanca:

- Pruebas funcionales de registro y login.
- Simulación de intentos de acceso no autorizado a `/admin`.
- Validación de flujo completo: Selección -> Carrito -> Pedido -> Gestión Admin.

---

## 👨‍💻 Autores

- **Jaume Ibars**
- **Fernando Serer**
- **Ignacio Cantador**

---

© 2026 - IES Abastos - Proyecto Intermodular DAW
