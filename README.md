
# Backend API en Laravel - XYZ Commerce


## 📋 Descripción

API para gestión de órdenes de compra que permite:

- Verificar disponibilidad de productos para clientes
- Validar stock antes de crear órdenes
- Registrar órdenes y actualizar inventario


## 🚀 Instalación

1. Clonar el repositorio

```bash
  git clone https://github.com/Mastick2607/XYZ_Commerce_back.git
  cd XYZ_Commerce_back
  code . //para abrir el proyecto
```

2. Instalar composer sino se tiene

- Visita https://getcomposer.org/download/
- Descarga el archivo 'Composer-Setup.exe'
- Sigue las instrucciones del asistente de instalación
- Asegúrate de que la opción "Add to PATH" esté marcada para poder usar composer desde cualquier directorio
- Abre una nueva ventana de CMD o PowerShell y ejecuta:

```bash
 composer --version
```
3. Editar el archivo .env con las credenciales:


```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xyz_commerce
DB_USERNAME=root
DB_PASSWORD=
```
4. Crear la base de datos:
- Crear la base de datos en PhpMyAdmin con el nombre xyz_commerce

5. Activar servicios del paquete de servidor local:

- Dar "Start" al boton de Mysql
- Dar "Start" al boton de Apache

6. En caso de que apache tenga inconvientes, escribe este comando en consola para que funcionen las peticiones:

```bash
 php artisan serve
```
7. Migrar las tablas
```bash
 php artisan migrate
```
El API estará disponible en: http://localhost:8000

# 📊 Estructura de Base de Datos
Las migraciones crearán las siguientes tablas:
- *clients* - Información de clientes
- *products* - Catálogo de productos
- *client_product* - Relación muchos a muchos (productos disponibles por cliente)
- *orders* - Registro de órdenes
- *order_details* - Detalles de productos en cada orden


# 🔌 Endpoints Principales

## Clientes
*GET*  http://localhost:8000/api/client 

## Productos
*GET*  http://localhost:8000/api/product 

## Ordenes
*PosT*  http://localhost:8000/api/order

```bash
{
    "client_id": 1,
    "products": [
        {
            "product_id": 1,
            "quantity": 2
        }
       
    ]
}
```
# Registro de la tabla "Clients"

  ```bash
       DB::table('clients')->insert([
            [
                'name' => 'pepe perez',
                'email' => 'pepe@gmail.com',
            ],
            [
                'name' => 'maria rodriguez',
                'email' => 'maria@gmail.com',
            ],
            [
                'name' => 'juan cortes',
                'email' => 'juan@gmail.com',
            ]

        ]);
```          

# Registro de la tabla "products"

  ```bash
      DB::table('products')->insert([
            [
                'name' => 'tv',
                'quantity' => 10,
            ],
            [
                'name' => 'licuadora',
                'quantity' => 10,
            ],
            [
                'name' => 'portatil',
                'quantity' => 100,
            ]

        ]);
```  


# Registro de la tabla "client_products"

  ```bash
     DB::table('client_products')->insert([
            ['client_id' => 1, 'product_id' => 2],
            ['client_id' => 2, 'product_id' => 1],
            ['client_id' => 3, 'product_id' => 3],
            ['client_id' => 1, 'product_id' => 1],
        ]);
```  

# Disponibilidad de productos para clientes

- *pepe perez* solo puede acceder a los productos *TV* y *licuadora*
- *maria rodriguez* solo puede acceder a los productos *TV* 
- *juan cortes* solo puede acceder a los productos *portatil*