

### Hello Dolly Plugin
El plugin Hello Dolly muestra aleatoriamente letras de la canción "Hello, Dolly" en la pantalla de administración de WordPress. El código se organiza de la siguiente manera:

- **Plugin Information**:
    - **Name**: Hello Dolly
    - **Version**: 1.7.2
    - **Author**: Matt Mullenweg
    - **Description**: Este plugin simboliza la esperanza y entusiasmo de una generación entera resumida en dos palabras cantadas más famosamente por Louis Armstrong: Hello, Dolly. Al activarse, verás aleatoriamente una letra de <cite>Hello, Dolly</cite> en la esquina superior derecha de tu pantalla de administración en cada página.

- **Function `hello_dolly_get_lyric()`**:
    - Esta función almacena las letras de la canción en una cadena de texto y las divide en líneas.
    - Se elige aleatoriamente una línea de las letras para ser mostrada.

- **Function `hello_dolly()`**:
    - Imprime la línea seleccionada en la pantalla de administración.

- **Function `dolly_css()`**:
    - Define estilos CSS para posicionar la línea en la pantalla de administración.

### Words Plugin
El plugin Words reemplaza palabras específicas en el contenido del sitio web por otras palabras. El código funciona de la siguiente manera:

- **Plugin Information**:
    - **Name**: Words
    - **Version**: 0.0.1
    - **Author**: Marcos Avendaño
    - **Description**: Este es un plugin fantástico que cambiará todas las palabras ofensivas en tu sitio por *****.

- **Function `words_get_lyric()`**:
    - Contiene un conjunto de palabras separadas por comas que se pueden reemplazar.
    - Escoge aleatoriamente una palabra del conjunto.

- **Function `renym_wordpress_typo_fix()`**:
    - Define un conjunto de palabras a reemplazar y sus respectivos reemplazos.
    - Utiliza la función `str_ireplace()` para reemplazar las palabras ofensivas en el contenido del sitio.

- **Hook `add_filter('the_content', 'renym_wordpress_typo_fix')`**:
    - Aplica el filtro `renym_wordpress_typo_fix` al contenido del sitio, reemplazando las palabras ofensivas por sus correspondientes reemplazos.

Ambos plugins modifican la apariencia o el contenido de la pantalla administrativa o del sitio web, cada uno con un enfoque diferente: mostrar letras de una canción aleatoria o reemplazar palabras ofensivas por asteriscos.
