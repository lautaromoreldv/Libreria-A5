<?php

$perfil = false;
$carrito = false;
if(isset($_SESSION["perfil"])){
    $perfil = true;
    $carrito = true;
}

$navbar = [
    "inicio"             => ["nombre" => "Inicio", "visible" => true],
    "tienda"             => ["nombre" => "Tienda", "visible" => true],
    "contacto"           => ["nombre" => "Contacto", "visible" => true],
    "informacion"        => ["nombre" => "Informacion", "visible" => false],
    "iniciar_sesion"     => ["nombre" => "Iniciar Sesión", "visible" => false],
    "registrarse"        => ["nombre" => "Registrarse", "visible" => false],
    "perfil"             => ["nombre" => "Mi Perfil", "visible" => $perfil],
    "editar_perfil"      => ["nombre" => "Editar Perfil", "visible" => false],
    "cambiar_contraseña" => ["nombre" => "Cambiar Contraseña Perfil", "visible" => false],
    "mantenimiento"      => ["nombre" => "Sitio web en matenimiento", "visible" => false],
    "carrito"            => ["nombre" => "Carrito", "visible" => $carrito]
];

$navbar_adm = [
    "dashboard"                   => ["nombre" => "Dashboard", "visible" => true],
    "informacion"                 => ["nombre" => "Información", "visible" => false],
    "productos"                   => ["nombre" => "Productos", "visible" => true],
    "usuarios"                    => ["nombre" => "Usuarios", "visible" => true],
    "crear_producto"              => ["nombre" => "Crear Producto", "visible" => false],
    "editar_producto"             => ["nombre" => "Editar Producto", "visible" => false],
    "confirmar_eliminar_producto" => ["nombre" => "Confirmar Eliminar Producto", "visible" => false],
    "confirmar_eliminar_usuario"  => ["nombre" => "Confirmar Eliminar Usuario", "visible" => false],
    "crear_usuario"               => ["nombre" => "Crear Usuario", "visible" => false],
    "editar_usuario"              => ["nombre" => "Editar Usuario", "visible" => false],
    "cambiar_contraseña"          => ["nombre" => "Cambiar Contraseña", "visible" => false],
    "perfil"                      => ["nombre" => "Mi Perfil", "visible" => true],
    "editar_perfil"               => ["nombre" => "Editar Perfil", "visible" => false],
    "cambiar_contraseña_perfil"   => ["nombre" => "Cambiar Contraseña Perfil", "visible" => false],
    "ver_compras"                 => ["nombre" => "Ver Compras", "visible" => false]
];

$auth = [
    "iniciar_sesion" => ["nombre" => "Iniciar Sesión", "visible" => true],
    "registrarse"    => ["nombre" => "Registrarse", "visible" => true]
];

$errores = [
    "inicio" => [
        "401" => "No contas con permisos para navegar en esta sección."
    ],
    "informacion" => [
        "cantidad_obligatoria" => "Se debe elegir la cantidad del producto.",
        "compra_no_realizada"  => "No se pudo concretar la compra, intente nuevamente.",
        "producto_no_agregado" => "No se pudo agregar el producto al carrito, intente nuevamente."
    ],
    "tienda" => [
        "401"                    => "No contas con permisos para navegar en la sección que buscabas.",
        "producto_no_encontrado" => "El producto que buscas no se encuentra o no existe",
        "compra_realizada"       => "¡Felicidades la compra se realizó con éxito!",
        "inicio_sesion_ok"       => "¡Iniciaste sesión correctamente!",
        "sesion_cerrada"         => "Cerraste sesión con éxito.",
        "registro_ok"            => "¡Felicidades, te registraste e iniciaste sesión con éxito!",
        "sesion_ya_iniciada"     => "Ya hay abierta una sesión.",
        "sin_sesion"             => "No hay ninguna cuenta abierta para cerrar sesión.",
        "producto_agregado"      => "¡Producto agregado al carrito de compras!",
        "carrito_vacio"          => "El carrito se encuentra vacio."
    ],
    "carrito" => [
        "compra_no_realizada" => "No se pudo completar la compra, intente nuevamente.",
        "carrito_borrado"     => "Se borró el carrito de compras.",
        "carrito_no_borrado"  => "No se pudo borrar el carrito, intente nuevamente."
    ],
    "contacto" => [
        "nom_apell_obligatorio"  => "El nombre y apellido son obligatorios",
        "nom_apell_incorrecto"   => "El nombre y apellido son incorrectos y/o tienen caracteres no válidos",
        "email_obligatorio"      => "El email es obligatorio",
        "email_incorrecto"       => "El email es incorrecto y/o tiene caracteres no válidos",
        "comentario_obligatorio" => "El comentario debe ser obligatorio",
        "form_enviado"           => "El formulario de contacto fue enviado"
    ],
    "iniciar_sesion" => [
        "campos_obligatorios"   => "El email y la contraseña son obligatorios.",
        "email_no_encontrado"   => "No se encuentra ese email.",
        "email_incorrecto"      => "El tipo de email es incorrecto.",
        "contraseña_incorrecta" => "Contraseña incorrecta, intente nuevamente.",
        "inicio_sesion_error"   => "No se pudo iniciar sesion, intente nuevamente.",
        "401"                   => "No iniciaste sesión o no contas con permisos para navegar en la sección que buscabas.",
        "requiere_sesion"       => "Se requiere haber iniciado sesión para realizar esta acción.",
        "sin_perfil"            => "No tenes una cuenta o no iniciaste sesión para ver tu perfil.",
        "carrito_sin_user"      => "No tenes una cuenta o no iniciaste sesión para ver tu carrito de compras."
    ],
    "registrarse" => [
        "campos_obligatorios" => "El email y la contraseña son obligatorios.",
        "email_incorrecto"    => "El tipo de email es incorrecto.",
        "registro_error"      => "Ocurrió un error al completar el registro, intente nuevamente."
    ],
    "perfil" => [
        "perfil_editado" => "Se editó el perfil con éxito.",
    ],
    "editar_perfil" => [
        "401"                 => "No contas con permisos para navegar en esta sección.",
        "perfil_no_editado"   => "No se pudo editar el perfil, intente nuevamente.",
        "email_incorrecto"    => "El tipo de email es incorrecto.",
        "nombre_excedido"     => "El nombre puede tener como máximo 45 caracteres.",
        "apellido_excedido"   => "El apellido puede tener como máximo 45 caracteres.",
        "email_excedido"      => "El email puede tener como máximo 45 caracteres.",
        "usuario_excedido"    => "El nombre de usuario puede tener como máximo 45 caracteres.",
        "contraseña_cambiada" => "Se cambió la contraseña del perfil con éxito."
    ],
    "cambiar_contraseña" => [
        "contraseña_vacia"        => "Ningún campo de las contraseñas puede estar vacío.",
        "max_min_contraseña"      => "La nueva contraseña debe tener como mínimo 4 caracteres y como máximo 50 caracteres.",
        "contraseñas_diferentes"  => "Las contraseñas no coinciden.",
        "contraseña_no_cambiada"  => "No se pudo cambiar la contraseña, intente nuevamente."
    ]
];

$errores_adm = [
    "dashboard" => [
        "inicio_sesion_ok"       => "¡Iniciaste sesión como Administrador!",
        "401_usuario_admin"      => "Los usuarios Administradores sólo pueden manejar el CRUD."
    ],
    "productos" => [
        "producto_creado"        => "Se creó un nuevo producto con éxito.",
        "producto_editado"       => "Se editó un producto con éxito.",
        "producto_borrado"       => "Se eliminó un producto correctamente.",
        "producto_no_borrado"    => "No se pudo eliminar el producto, intente nuevamente.",
        "producto_no_encontrado" => "El producto que buscas no se encuentra o no existe.",
    ],
    "crear_producto" => [
        "campos_obligatorios"   => "Todos los campos son obligatorios menos la descripción y la imagen.",
        "img_peso_maximo"       => "El peso máximo de la imagen es de 2Mb.",
        "img_invalida"          => "La imagen sólo puede ser JPG/JPEG.",
        "producto_no_creado"    => "El producto no pudo ser creado. Intente más tarde."
    ],
    "editar_producto" => [
        "campos_obligatorios"   => "Todos los campos son obligatorios menos la descripción y la imagen.",
        "img_peso_maximo"       => "El peso máximo de la imagen es de 2Mb.",
        "img_invalida"          => "La imagen sólo puede ser JPG/JPEG.",
        "producto_editado"      => "Se editó con éxito el producto.",
        "producto_no_editado"   => "El producto no pudo ser editado. Intente más tarde.",
    ],
    "usuarios" => [
        "usuario_creado"        => "Se creó a un usuario con éxito.",
        "usuario_borrado"       => "Se eliminó un usuario correctamente.",
        "usuario_no_encontrado" => "El usuario no existe o no pudo ser encontrado.",
        "usuario_no_borrado"    => "No se pudo eliminar el usuario, intente nuevamente.",
        "admin_no_borrado"      => "No se puede borrar a un usuario Administrador.",
        "admin_no_editado"      => "Sólo se puede editar a un Admin desde su propio perfil",
        "usuario_editado"       => "Se editó con  éxito al usuario.",
        "admin_sin_carrito"     => "El Administrador no tiene un carrito de compras."
    ],
    "crear_usuario" => [
        "campos_obligatorios" => "El email y la contraseña son obligatorios.",
        "usuario_no_creado"   => "El usuario no pudo ser creado. Intente más tarde.",
        "email_incorrecto"    => "El tipo de email es incorrecto.",
        "email_existente"     => "El email ya está en uso, probá con uno diferente.",
        "nombre_excedido"     => "El nombre puede tener como máximo 45 caracteres.",
        "apellido_excedido"   => "El apellido puede tener como máximo 45 caracteres.",
        "email_excedido"      => "El email puede tener como máximo 45 caracteres.",
        "usuario_excedido"    => "El nombre de usuario puede tener como máximo 45 caracteres.",
        "max_min_contraseña"  => "La contraseña debe tener como mínimo 4 caracteres y como máximo 50 caracteres."
    ],
    "editar_usuario" => [
        "usuario_no_editado"  => "No se pudo editar al usuario, intente nuevamente.",
        "email_incorrecto"    => "El tipo de email es incorrecto.",
        "email_existente"     => "El email ya está en uso, probá con uno diferente.",
        "nombre_excedido"     => "El nombre puede tener como máximo 45 caracteres.",
        "apellido_excedido"   => "El apellido puede tener como máximo 45 caracteres.",
        "email_excedido"      => "El email puede tener como máximo 45 caracteres.",
        "usuario_excedido"    => "El nombre de usuario puede tener como máximo 45 caracteres.",
        "contraseña_cambiada" => "Se cambió la contraseña con éxito."
    ],
    "editar_perfil" => [
        "401"                 => "No contas con permisos para navegar en esta sección.",
        "perfil_no_editado"   => "No se pudo editar el perfil, intente nuevamente.",
        "email_incorrecto"    => "El tipo de email es incorrecto.",
        "nombre_excedido"     => "El nombre puede tener como máximo 45 caracteres.",
        "apellido_excedido"   => "El apellido puede tener como máximo 45 caracteres.",
        "email_excedido"      => "El email puede tener como máximo 45 caracteres.",
        "usuario_excedido"    => "El nombre de usuario puede tener como máximo 45 caracteres.",
        "contraseña_cambiada" => "Se cambió la contraseña del perfil con éxito."
    ],
    "perfil" => [
        "perfil_editado" => "Se editó el perfil con éxito.",
    ],
    "cambiar_contraseña" => [
        "contraseña_vacia"       => "Ningún campo de las contraseñas puede estar vacío.",
        "max_min_contraseña"     => "La nueva contraseña debe tener como mínimo 4 caracteres y como máximo 50 caracteres.",
        "contraseñas_diferentes" => "Las contraseñas no coinciden.",
        "contraseña_no_cambiada" => "No se pudo cambiar la contraseña, intente nuevamente."
    ],
    "cambiar_contraseña_perfil" => [
        "contraseña_vacia"       => "Ningún campo de las contraseñas puede estar vacío.",
        "contraseña_vacia"       => "Ningún campo de las contraseñas puede estar vacío.",
        "max_min_contraseña"     => "La nueva contraseña debe tener como mínimo 4 caracteres y como máximo 50 caracteres.",
        "contraseñas_diferentes" => "Las contraseñas no coinciden.",
        "contraseña_no_cambiada" => "No se pudo cambiar la contraseña, intente nuevamente."
    ]
];

$icons = [
    ["Envío gratis a CABA y GBA", "envio.png"],
    ["Descuentos hasta 50% OFF", "descuento.png"],
    ["Diferentes medios de pago", "pagos.png"]
];

$cards = [
    "Artículos escolares" => [
        "categoria"   => "Escolar",
        "descripcion" => "Productos para el colegio y la escuela, cuadernos, lápices, cartulinas y más.",
        "imagen"      => "escolar.png"
    ],
    "Artículos artistícos" => [
        "categoria"   => "Artística",
        "descripcion" => "Productos para todo tipo de arte, pinceles, acrílicos, paletas y más.",
        "imagen"      => "artistico.png"
    ],
    "Artículos comerciales" => [
        "categoria"   => "Comercial",
        "descripcion" => "Productos para todo tipo, abrochadoras, cintas, artículos de escritorio y más.",
        "imagen"      => "comercial.png"
    ]
];