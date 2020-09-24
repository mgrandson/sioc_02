

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


#Procesos Esenciales.

1.	Cuando registre un usuario si este es tipo proveedor el sistema le enviará automáticamente un correo
	electronico con una contraseña temporal para que pueda ingresar por primera vez y luego lo reenvía
	a una página para cambiar la contraseña.

