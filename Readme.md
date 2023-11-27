# Plugin Words

## Descripción
El plugin Words proporciona una funcionalidad para reemplazar palabras malsonantes en un sitio web de WordPress por una versión censurada.

## Instalación
1. Descarga el archivo zip del plugin o clona el repositorio.
2. Sube el archivo zip o la carpeta del plugin a la carpeta `wp-content/plugins/` de tu instalación de WordPress.
3. Activa el plugin desde el panel de administración de WordPress en la sección "Plugins".

## Funcionamiento
Una vez activado, el plugin crea una tabla en la base de datos de WordPress para almacenar las palabras malsonantes y sus reemplazos. Inicialmente, se insertan algunas palabras y sus versiones censuradas en esta tabla.

Las palabras y sus reemplazos se aplicarán a todo el contenido del sitio web, reemplazando las palabras malsonantes por la versión censurada definida en la tabla.

## Configuración Adicional
Puedes personalizar las palabras malsonantes y sus reemplazos editando el código del plugin en el archivo principal del plugin (`words.php`). Busca la función `insert_bad_words` para agregar, modificar o eliminar palabras y sus reemplazos según sea necesario.

## Autor
- **Marcos Avendaño**
- **Sitio web:** [Asociación Lexicorrección Anónima](http://asociacion.LexicorrecionAnonima.com)
