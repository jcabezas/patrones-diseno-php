# Patrones de Diseño en PHP

Este repositorio contiene ejemplos prácticos de los patrones de diseño de software más comunes, implementados en PHP. El objetivo es proporcionar una guía para entender y aplicar estos patrones en proyectos reales.

## ¿Qué son los Patrones de Diseño?

Los patrones de diseño son soluciones típicas a problemas comunes en el diseño de software. No son fragmentos de código que se pueden copiar y pegar, sino conceptos o plantillas que se pueden adaptar para resolver un problema particular en diferentes situaciones.

Los patrones están organizados en tres categorías principales:

### 1\. Patrones Creacionales

Estos patrones se centran en los mecanismos de creación de objetos, tratando de crear objetos de la manera más adecuada para cada situación.

- **Singleton** Asegura que una clase solo tenga una única instancia y proporciona un punto de acceso global a ella.
    
- **Factory Method** Define una interfaz para crear un objeto, pero deja que las subclases decidan qué clase instanciar.
    
- **Abstract Factory** Proporciona una interfaz para crear familias de objetos relacionados o dependientes sin especificar sus clases concretas.

- **Builder:** Separa la construcción de un objeto complejo de su representación, permitiendo que el mismo proceso de construcción cree diferentes representaciones.
    

### 2\. Patrones Estructurales

Estos patrones explican cómo ensamblar objetos y clases en estructuras más grandes, manteniendo la flexibilidad y eficiencia de la estructura.

- **Adapter** Permite que interfaces incompatibles trabajen juntas.
    
- **Decorator:** Permite añadir dinámicamente nuevas funcionalidades a un objeto sin alterar su estructura.

- **Facade:** Proporciona una interfaz unificada y simplificada a un conjunto de interfaces en un subsistema.
    

### 3\. Patrones de Comportamiento

Estos patrones se ocupan de los algoritmos y la asignación de responsabilidades entre objetos.

- **Observer** Define una dependencia de uno a muchos entre objetos, de modo que cuando un objeto cambia de estado, todos sus dependientes son notificados y actualizados automáticamente.
    
- **Strategy** Permite definir una familia de algoritmos, encapsular cada uno de ellos y hacerlos intercambiables.

- **Template Method:** Define el esqueleto de un algoritmo en una operación, delegando algunos pasos a las subclases.



## Cómo Ejecutar los Ejemplos

### Requerimientos

Para poder ejecutar este proyecto, necesitarás tener instalado lo siguiente:

- PHP 8.0+
- Composer

### Instalación

Sigue estos pasos para configurar el proyecto en tu entorno:

**1\. Clona el repositorio:**

```
git clone https://github.com/jcabezas/patrones-diseno-php
```

**2\. Navega al directorio del proyecto:**

```
cd patrones-diseno-php
```

**3\. Instala las dependencias con Composer:**

Este comando creará la carpeta `vendor/` y el autoloader necesario para que la aplicación funcione.

 ```
 composer install
 ```

### Ejecutar Ejemplos

Para ejecutar los ejemplos de código, utiliza el script `run.php` ubicado en la raíz del proyecto. Este script puede ser usado de dos maneras:

**1\. Menú Interactivo**

Si ejecutas el script sin argumentos, se te presentará un menú interactivo en la terminal con todos los ejemplos disponibles. Simplemente escribe el número del ejemplo que deseas ejecutar y presiona Enter.

```bash
php run.php
```

**2\. Ejecución Directa**

También puedes ejecutar un ejemplo específico pasando su ruta (sin la extensión `.php` y relativa a la carpeta `examples/`) como argumentos al script.

Sintaxis:

```
php run.php ruta/del/ejemplo
```

Ejemplos:

```bash
# Para ejecutar examples/Behavioral/Strategy/UseCase01.php
php run.php Behavioral Strategy UseCase01
```
