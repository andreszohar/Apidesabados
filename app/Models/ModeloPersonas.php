<?php namespace App\Models;

use CodeIgniter\Model;

class ModeloPersonas extends Model
{
    
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $allowedFields =  array('nombre','edad','cedula','poblacion','descripcion','foto');
    
}

