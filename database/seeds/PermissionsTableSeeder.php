<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /*-------------------------------------------------------------------------------------------------*/
        //Usuarios
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'users.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 1,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'users.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 1,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'users.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 1,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'users.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 1,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'users.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 1,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Tipos de investigación
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'tipo_de_investigacion.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 2,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'tipo_de_investigacion.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 2,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'tipo_de_investigacion.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 2,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'tipo_de_investigacion.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 2,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'tipo_de_investigacion.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 2,
        ]);

    /*-------------------------------------------------------------------------------------------------*/
        //Subtipos de investigación
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'sub_tipo_de_investigacion.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 3,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'sub_tipo_de_investigacion.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 3,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'sub_tipo_de_investigacion.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 3,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'sub_tipo_de_investigacionn.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 3,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'sub_tipo_de_investigacion.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 3,
        ]);

    /*-------------------------------------------------------------------------------------------------*/
        //Equipo de investigación
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'equipo_de_investigacion.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 4,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'equipo_de_investigacion.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 4,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'equipo_de_investigacion.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 4,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'equipo_de_investigacion.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 4,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'equipo_de_investigacion.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 4,
        ]);

    /*-------------------------------------------------------------------------------------------------*/
        //Proyectos
        Permission::create([
            'name'          => 'Crear Proyectos',
            'slug'          => 'proyectos.create',
            'description'   => 'Crea los Proyectos del sistema',
            'id_tabla' => 5,
        ]);

        Permission::create([
            'name'          => 'Navegar Proyectos',
            'slug'          => 'proyectos.index',
            'description'   => 'Navega todos los Proyectos del sistema',
            'id_tabla' => 5,
        ]);

        Permission::create([
            'name'          => 'Ver detalle Proyectos',
            'slug'          => 'proyectos.show',
            'description'   => 'Ver en detalle cada Proyecto del sistema',
            'id_tabla' => 5,
        ]);
    
        Permission::create([
            'name'          => 'Edicion Proyectos',
            'slug'          => 'proyectos.edit',
            'description'   => 'Edita los datos de un Proyecto sistema',
            'id_tabla' => 5,
        ]);

        Permission::create([
            'name'          => 'Eliminar Proyectos',
            'slug'          => 'proyectos.destroy',
            'description'   => 'Elimina los Proyectos del sistema',
            'id_tabla' => 5,
        ]);

    /*-------------------------------------------------------------------------------------------------*/
        //Planificacion
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'planificacion.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 6,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'planificacion.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 6,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'planificacion.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 6,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'planificacion.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 6,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'planificacion.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 6,
        ]);

    /*-------------------------------------------------------------------------------------------------*/
        //Tarea
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'tarea.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 7,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'tarea.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 7,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'tarea.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 7,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'tarea.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 7,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'tarea.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 7,
        ]);

    /*-------------------------------------------------------------------------------------------------*/
        //Tarea Usuario
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'tarea_usuario.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 8,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'tarea_usuario.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 8,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'tarea_usuario.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 8,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'tarea_usuario.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 8,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'tarea_usuario.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 8,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Hito
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'hito.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 9,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'hito.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 9,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'hito.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 9,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'hito.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 9,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'hito.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 9,
        ]);

    
    /*-------------------------------------------------------------------------------------------------*/
        //Indicadores
        Permission::create([
            'name'          => 'Crear Indicadores',
            'slug'          => 'indicadores.create',
            'description'   => 'Crea los Indicadores del sistema',
            'id_tabla' => 10,
        ]);
    
         Permission::create([
            'name'          => 'Navegar Indicadores',
            'slug'          => 'indicadores.index',
            'description'   => 'Navega todos los Indicadores del sistema',
            'id_tabla' => 10,
        ]);

        Permission::create([
            'name'          => 'Ver detalle Indicadores',
            'slug'          => 'indicadores.show',
            'description'   => 'Ver en detalle cada Indicadores del sistema',
            'id_tabla' => 10,
        ]);
        
        Permission::create([
            'name'          => 'Edicion Indicadores',
            'slug'          => 'indicadores.edit',
            'description'   => 'Edita los datos de un Indicadores del sistema',
            'id_tabla' => 10,
        ]);

        Permission::create([
            'name'          => 'Eliminar Indicadores',
            'slug'          => 'indicadores.destroy',
            'description'   => 'Elimina los Indicadores del sistema',
            'id_tabla' => 10,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Comité de evaluación
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'comite_de_evaluacion.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 11,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'comite_de_evaluacion.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 11,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'comite_de_evaluacion.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 11,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'comite_de_evaluacion.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 11,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'comite_de_evaluacion.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 11,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Comité usuario
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'comite_usuario.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 12,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'comite_usuario.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 12,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'comite_usuario.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 12,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'comite_usuario.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 12,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'comite_usuario.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 12,
        ]);

        
    /*-------------------------------------------------------------------------------------------------*/
        //Solicitudes
        Permission::create([
            'name'          => 'Crear Solicitudes',
            'slug'          => 'solicitudes.create',
            'description'   => 'Crea los Solicitudes del sistema',
            'id_tabla' => 13,
        ]);
    
        Permission::create([
            'name'          => 'Navegar Solicitudes',
            'slug'          => 'solicitudes.index',
            'description'   => 'Navega todos los Solicitudes del sistema',
            'id_tabla' => 13,
        ]);

        Permission::create([
            'name'          => 'Ver detalle Solicitudes',
            'slug'          => 'solicitudes.show',
            'description'   => 'Ver en detalle cada Solicitud del sistema',
            'id_tabla' => 13,
        ]);
        
        Permission::create([
            'name'          => 'Edicion Solicitudes',
            'slug'          => 'solicitudes.edit',
            'description'   => 'Edita los datos de un Solicitudes del sistema',
            'id_tabla' => 13,
        ]);

        Permission::create([
            'name'          => 'Eliminar Solicitudes',
            'slug'          => 'solicitudes.destroy',
            'description'   => 'Elimina los Solicitudes del sistema',
            'id_tabla' => 13,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Estado de solicitud
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'estado_de_solicitud.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 14,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'estado_de_solicitud.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 14,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'estado_de_solicitud.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 14,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'estado_de_solicitud.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 14,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'estado_de_solicitud.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 14,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Evaluación
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'evaluacion.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 15,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'evaluacion.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 15,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'evaluacion.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 15,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'evaluacion.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 15,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'evaluacion.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 15,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Tipo de documento
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'tipo_doc.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 16,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'tipo_doc.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 16,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'tipo_doc.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 16,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'tipo_doc.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 16,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'tipo_doc.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 16,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Documento
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'documento.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 17,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'documento.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 17,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'documento.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 17,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'documento.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 17,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'documento.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 17,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Estado de tarea
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'estado_de_tarea.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 18,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'estado_de_tarea.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 18,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'estado_de_tarea.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 18,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'estado_de_tarea.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 18,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'estado_de_tarea.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 18,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Permiso por proyecto
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'permiso_por_proy.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 19,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'permiso_por_proy.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 19,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'permiso_por_proy.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 19,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'permiso_por_proy.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 19,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'permiso_por_proy.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 19,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Rol por proyecto
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'rol_por_proy.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 20,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'rol_por_proy.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 20,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'rol_por_proy.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 20,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'rol_por_proy.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 20,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'rol_por_proy.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 20,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Rol permiso proyecto
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'rol_permiso_proy.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 21,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'rol_permiso_proy.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 21,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'rol_permiso_proy.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 21,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'rol_permiso_proy.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 21,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'rol_permiso_proy.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 21,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Usuario equipo rol
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'usuario_equipo_rol.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 22,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'usuario_equipo_rol.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 22,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'usuario_equipo_rol.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 22,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'usuario_equipo_rol.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 22,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'usuario_equipo_rol.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 22,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Permiso
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'permission.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 23,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'permission.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 23,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'permission.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 23,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'permission.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 23,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'permission.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 23,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Usuario permiso
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'permission_user.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 24,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'permission_user.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 24,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'permission_user.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 24,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'permission_user.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 24,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'permission_user.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 24,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Roles
        Permission::create([
            'name'          => 'Crear Roles',
            'slug'          => 'roles.create',
            'description'   => 'Crea los Roles del sistema',
            'id_tabla' => 25,
        ]);

        Permission::create([
            'name'          => 'Navegar Roles',
            'slug'          => 'roles.index',
            'description'   => 'Navega todos los Roles del sistema',
            'id_tabla' => 25,
        ]);

        Permission::create([
            'name'          => 'Ver detalle Roles',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada Rol del sistema',
            'id_tabla' => 25,
        ]);

        Permission::create([
            'name'          => 'Edicion Roles',
            'slug'          => 'roles.edit',
            'description'   => 'Edita los datos de un Rol del sistema',
            'id_tabla' => 25,
        ]);

        Permission::create([
            'name'          => 'Eliminar Roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina los roles del sistema',
            'id_tabla' => 25,
        ]);



    /*-------------------------------------------------------------------------------------------------*/
        //Usuario rol
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'role_user.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 26,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'role_user.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 26,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'role_user.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 26,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'role_user.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 26,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'role_user.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 26,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Rol permiso
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'permission_role.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 27,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'permission_role.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 27,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'permission_role.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 27,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'permission_role.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 27,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'permission_role.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 27,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Estado de proyecto
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'estado_de_proy.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 28,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'estado_de_proy.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 28,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'estado_de_proy.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 28,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'estado_de_proy.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 28,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'estado_de_proy.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 28,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Factibilidad
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'factibilidad.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 29,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'factibilidad.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 29,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'factibilidad.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 29,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'factibilidad.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 29,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'factibilidad.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 29,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Componente de gráfica
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'componente_de_grafica.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 30,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'componente_de_grafica.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 30,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'componente_de_grafica.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 30,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'componente_de_grafica.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 30,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'componente_de_grafica.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 30,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Variable
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'variable.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 31,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'variable.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 31,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'variable.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 31,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'variable.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 31,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'variable.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 31,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Valor eje
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'valor_eje.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 32,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'valor_eje.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 32,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'valor_eje.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 32,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'valor_eje.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 32,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'valor_eje.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 32,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Marca
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'marca.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 33,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'marca.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 33,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'marca.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 33,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'marca.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 33,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'marca.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 33,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Tipo de recurso
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'tipo_de_recurso.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 34,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'tipo_de_recurso.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 34,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'tipo_de_recurso.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 34,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'tipo_de_recurso.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 34,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'tipo_de_recurso.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 34,
        ]);
        

    /*-------------------------------------------------------------------------------------------------*/
        //Recursos
        Permission::create([
            'name'          => 'Crear Recursos',
            'slug'          => 'recursos.create',
            'description'   => 'Crea los Recursos del sistema',
            'id_tabla' => 35,
        ]);
    
        Permission::create([
            'name'          => 'Navegar Recursos',
            'slug'          => 'recursos.index',
            'description'   => 'Navega todos los Recursos del sistema',
            'id_tabla' => 35,
        ]);

        Permission::create([
            'name'          => 'Ver detalle Recursos',
            'slug'          => 'recursos.show',
            'description'   => 'Ver en detalle cada Producto del sistema',
            'id_tabla' => 35,
        ]);
        
        Permission::create([
            'name'          => 'Edicion Recursos',
            'slug'          => 'recursos.edit',
            'description'   => 'Edita los datos de un Producto del sistema',
            'id_tabla' => 35,
        ]);

        Permission::create([
            'name'          => 'Eliminar Recursos',
            'slug'          => 'recursos.destroy',
            'description'   => 'Elimina los Recursos del sistema',
            'id_tabla' => 35,
        ]);

        
    /*-------------------------------------------------------------------------------------------------*/
        //Detalle de recurso
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'detalle_de_recurso.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 36,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'detalle_de_recurso.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 36,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'detalle_de_recurso.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 36,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'detalle_de_recurso.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 36,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'detalle_de_recurso.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 36,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Recurso por proyecto
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'recursos_por_proy.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 37,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'recursos_por_proy.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 37,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'recursos_por_proy.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 37,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'recursos_por_proy.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 37,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'recursos_por_proy.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 37,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Alcance
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'alcance.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 38,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'alcance.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 38,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'alcance.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 38,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'alcance.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 38,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'alcance.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 38,
        ]);


    /*-------------------------------------------------------------------------------------------------*/
        //Objetivo
        Permission::create([
            'name'          => 'Crear ',
            'slug'          => 'objetivo.create',
            'description'   => 'Crea un registro',
            'id_tabla' => 39,
        ]);

        Permission::create([
            'name'          => 'Navegar ',
            'slug'          => 'objetivo.index',
            'description'   => 'Navega todos los registros',
            'id_tabla' => 39,
        ]);

        Permission::create([
            'name'          => 'Ver detalle ',
            'slug'          => 'objetivo.show',
            'description'   => 'Ver detalles de un registro',
            'id_tabla' => 39,
        ]);
    
        Permission::create([
            'name'          => 'Editar ',
            'slug'          => 'objetivo.edit',
            'description'   => 'Edita los datos de un registro',
            'id_tabla' => 39,
        ]);

        Permission::create([
            'name'          => 'Eliminar ',
            'slug'          => 'objetivo.destroy',
            'description'   => 'Elimina un registro',
            'id_tabla' => 39,
        ]);

        Permission::create([
            'name'          => 'Mis proyectos',
            'slug'          => 'mis_proyectos',
            'description'   => '',
            'id_tabla' => 40,
        ]);

        Permission::create([
            'name'          => 'Mis solicitudes',
            'slug'          => 'mis_solicitudes',
            'description'   => '',
            'id_tabla' => 40,
        ]);

        Permission::create([
            'name'          => 'Cuenta válidada',
            'slug'          => 'validacion',
            'description'   => '',
            'id_tabla' => 40,
        ]);

        Permission::create([
            'name'          => 'Evaluación final',
            'slug'          => 'evaluacion.final',
            'description'   => '',
            'id_tabla' => 40,
        ]);
         
    }
}
