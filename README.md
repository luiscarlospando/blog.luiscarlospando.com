# LuisCarlosPando.com (Blog)

![LuisCarlosPando.com Logo](https://luiscarlospando.com/assets/images/logo.png)

**Mi blog personal - Donde comparto mis pensamientos y experiencias**

[![Sitio Web](https://img.shields.io/badge/🌐_Blog-blog.luiscarlospando.com-blue?style=for-the-badge)](https://blog.luiscarlospando.com/)
[![WordPress](https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)](http://wordpress.org/)
[![DigitalOcean](https://img.shields.io/badge/DigitalOcean-0080FF?style=for-the-badge&logo=digitalocean&logoColor=white)](https://m.do.co/c/03bd95f889e7)

---

## ✨ Acerca del proyecto

Este es el código fuente de mi blog personal. Aquí es donde escribo sobre desarrollo, tecnología, reflexiones, música, videojuegos, anécdotas personales y todo lo que me parece interesante compartir con el mundo.

### 🛠️ Construido con:

- **WordPress** - CMS poderoso y flexible para gestión de contenido
- **DigitalOcean** - Hosting confiable y escalable
- **PHP** - Lenguaje de programación del core
- **MySQL** - Base de datos para almacenar contenido
- **Apache/Nginx** - Servidor web

---

## 🚀 Inicio rápido

### Prerrequisitos

Antes de comenzar, asegúrate de tener instalado:

- **PHP** (versión 7.4 o superior)
- **MySQL** o **MariaDB**
- **Apache** o **Nginx**
- **Composer** (opcional, para dependencias)
- **Git**

### 📦 Instalación

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/luiscarlospando/blog.luiscarlospando.com.git
   cd blog.luiscarlospando.com
   ```

2. **Configura la base de datos**
   - Crea una base de datos MySQL
   - Importa el archivo SQL si está disponible

3. **Configura WordPress**
   ```bash
   cp wp-config-sample.php wp-config.php
   ```
   Edita `wp-config.php` con tus credenciales de base de datos

### 🏃‍♂️ Ejecutar localmente

1. **Inicia tu servidor local**
   ```bash
   # Con XAMPP, WAMP, MAMP o similar
   # O usando el servidor integrado de PHP:
   php -S localhost:8000
   ```

2. **¡Listo!** Abre tu navegador y visita:
   ```
   http://localhost:8000
   ```

   Para acceder al admin: `http://localhost:8000/wp-admin`

---

## 📁 Estructura del proyecto

```
blog.luiscarlospando.com/
├── 📂 wp-content/
│   ├── 📂 themes/          # Temas personalizados
│   ├── 📂 plugins/         # Plugins instalados
│   └── 📂 uploads/         # Archivos multimedia
├── 📂 wp-includes/         # Core de WordPress
├── 📂 wp-admin/            # Panel de administración
├── 📄 wp-config.php        # Configuración principal
├── 📄 index.php            # Archivo principal
└── 📄 .htaccess            # Configuración del servidor
```

---

## 🚀 Deploy

El sitio está desplegado en **DigitalOcean** con deploy manual. El proceso incluye:

### Flujo de trabajo:
1. 📝 Escribo contenido en el panel de WordPress (obligatorio)
2. 🔧 Hago cambios en el código si es necesario (opcional)
3. 💾 Commit y push  Git (opcional)
4. 🌐 El sitio se actualiza en [blog.luiscarlospando.com](https://blog.luiscarlospando.com/)

---

## 🤝 Contribuciones

¿Encontraste un error o tienes una sugerencia? Entonces:

- 🐞 **Reporta bugs** abriendo un [issue](https://github.com/luiscarlospando/blog.luiscarlospando.com/issues)
- 💡 **Propón mejoras** mediante pull requests
- 🔧 **Sugiere plugins** o funcionalidades
- 📧 **Contáctame** directamente a través de mi [sitio web](https://luiscarlospando.com/contacto)

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. El contenido del blog mantiene todos los derechos reservados.

---

**¿Te gusta el proyecto? ¡Dale una ⭐ si te sirve!**
