# Actividad 8, CRUD de superHeroes

App web diseñada para registrar, ver, editar y borrar lista e superherores

## Stack:

| Tool | Version |
|------|---------|
| PHP | 8.2.12 |
| Composer | 2.9.5 |
| Laravel | 12.54.1 |
| MySQL | 8.0 |

> **NOTA: ** todos los proyectos han sido realizados en LARAVEL 12 ya que LARAVEL 7 es incompatible con mi version de PHP.

## COMANDOS USADOS DE ARTISAN

```bash
# crear modelos + migraciones
php artisan make:model Superhero -m

# Crear controlador (pre-generalos metodos CRUD)
php artisan make:controller SuperHeroController --resource

# vistas de blade
New-Item resources\views\superheroes\index.blade.php  
New-Item resources\views\superheroes\create.blade.php 
New-Item resources\views\superheroes\show.blade.php   
New-Item resources\views\superheroes\edit.blade.php   
New-Item resources\views\layouts\app.blade.php

# migraciones
php artisan migrate