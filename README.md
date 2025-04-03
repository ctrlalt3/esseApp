## EsseApp
Especie de red social, donde puedes tanto como seguir usuarios, ver y comentar sus publicaciones y crear publicaciones, además de poder crear conversaciones con diversos usuarios
##
A continuación describe las tablas y sus relaciones utilizadas en la base de datos.

## Tablas Principales y Relaciones

### 1. **Usuarios (`users` Table)**
- Cada usuario tiene:
  - `id`: Identificador único.
  - `name`: Nombre del usuario.
  - `email`: Correo electrónico.
  - `password`: Contraseña encriptada.
- Relaciones:
  - Un usuario puede tener muchos `posts`.
  - Un usuario puede tener muchos `comments` a través de sus posts.
  - Un usuario puede participar en varias `conversations`.
  - Un usuario puede seguir a otros usuarios (`following` relación).

### 2. **Publicaciones (`posts` Table)**
- Cada post pertenece a un usuario (`user_id`).
- Relaciones:
  - Un post puede tener muchos `comments`.

### 3. **Comentarios (`comments` Table)**
- Cada comentario pertenece a un post (`post_id`).
- Relaciones:
  - Un comentario está asociado a un post.

### 4. **Conversaciones (`conversations` Table)**
- Representa chats grupales o entre usuarios.
- Relaciones:
  - Una conversación puede tener múltiples `users`.
  - Una conversación tiene múltiples `messages`.

### 5. **Mensajes (`messages` Table)**
- Cada mensaje pertenece a una `conversation` (`conversation_id`).
- Cada mensaje es enviado por un `user` (`user_id`).

### 6. **Seguidores (`followers` Table - Tabla Pivot)**
- Relación muchos a muchos entre `users`.
- Un usuario puede seguir a otros usuarios y ser seguido por otros.
- Implementado con `following()->attach($user->id);` en el seeder.

## Lógica en el Seeder

1. **Crea el usuario principal** `qwerty`.
2. **Genera entre 2 y 5 posts para `qwerty`**, cada uno con entre 4 y 8 comentarios.
3. **Crea 5 usuarios adicionales** y hace que `qwerty` siga entre 3 y 6 de ellos.
4. **Crea 6 conversaciones** en total:
   - Cada conversación tiene entre 2 y 4 usuarios aleatorios + `qwerty`.
   - Se generan 5 mensajes por conversación, asignados alternadamente entre los participantes.
5. **Cada usuario genera entre 2 y 5 posts con comentarios**.

Este esquema asegura una estructura de datos robusta y relaciones bien definidas en la base de datos.

