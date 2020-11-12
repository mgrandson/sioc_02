

#Tabla Usuarios.

La tabla de **usuarios** tendra los siguientes campos principales:

- **Nombre**. Primer nombre legal del usuario.
- **Apellido**. Primer apellido legal del usuario.
- **Correo Electronico**. Correo electronico proporcionado por la empresa.
- **Cargo Empleado**. Se establecera un cargo para identificar la funcion del usuario del sistema.
- **Tipo de Usuario**. Se seleccionara un tipo de usuario Empleado y Proveedor.
- **Nivel de Acceso**. El nivel de acceso a los diferentes módulos del sistema: alpha, beta, gamma, delta.

#Tabla Mensaje.

- **Emisor**.
- **Receptor**.
- **Asunto**.
- **Mensaje**.
- **Adjunto**.
- **Firma**.

#Tabla Oferta

- **Genero**
- **Estilo**
- **Talla**
- **Cantidad**
- **Descripcion**
- **Imagenes**

#Procesos Esenciales.

1.	Cuando registre un usuario si este es tipo proveedor el sistema le enviará automáticamente un correo
	electronico con una contraseña temporal para que pueda ingresar por primera vez y luego lo reenvía
	a una página para cambiar la contraseña.
	
2.	Si el proveedor realiza un Oferta, esta puede integrar tantos Items como sean necesarios, los Item pueden
	considerarse como Productos nuevos.
	
3.	El usuario realiza un Pedido.


# Modulos a Desarrollar.

- Gestion de Usuarios.
	- Roles de Usuario.
	- Niveles de acceso.
	- Bitacoras de acceso.
	
- Gestion Oferta.
	-Proveedor-Tienda y viceversa.
	
- Gestionar Pedidos.
	-Proveedor-Tienda y viceversa.
	
- Gestionar Producto-Inventario.

_Emergentes:_

- Gestion de Comunicacion Tienda-Proveedor
- Gestion de Seguridad.

*Milton:*

- Gestionar Pedidos.
	-Proveedor-Tienda y viceversa.

	
*Alex:*

- Gestionar Producto-Inventario.


*Misael:*

- Gestion de Usuarios.
	- Roles de Usuario.
	- Niveles de acceso.
	- Bitacoras de acceso.
	
- Gestion Oferta.
	-Proveedor-Tienda y viceversa.

