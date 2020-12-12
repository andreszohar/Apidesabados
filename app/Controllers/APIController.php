<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    protected $modelName = 'App\Models\ModeloPersonas';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function insertar(){

        	//1)recibir datos desde el cliente
		$nombre=$this->request->getPost("nombre");
		$edad=$this->request->getPost("edad");
		$cedula=$this->request->getPost("cedula");
		$poblacion=$this->request->getPost("poblacion");
		$descripcion =$this->request->getPost("descripcion");
        $foto =$this->request->getPost("foto");
        
        //2)organizar datos que llegan de las vistas
		//en un arreglo asociativo
		//(las claves deben ser iguales a los campos o atributos de la tabla de la BD)

		$datosEnvio=array(

			"nombre"=>$nombre,
			"edad"=>$edad,
			"cedula"=>$cedula,
			"poblacion"=>$poblacion,
			"descripcion"=>$descripcion,
			"foto"=>$foto

        );
        
        //3. Utilizar el atributo this->validate del controlador para validar datos
        if($this->validate('usuarioPOST')){

            $id=$this->model->insert($datosEnvio);
            return $this->respond($this->model->find($id));


        }
        else{

            $validation= \Config\services::validation();

            return $this->respond($validation->getErrors());


            //COMENTARIO


        }



    }

    public function eliminar($id){

        $consulta=$this->model->where('id',$id)->delete();
        $filasAfectadas=$consulta->connID->affected_rows; 
        if($filasAfectadas==1){ $mensaje=array("mensaje"=>"Registro eliminado"); 
            return $this->respond(json_encode($mensaje));
         }else{ $mensaje=array("mensaje"=>"Revisar el id a eliminar"); 
            return $this->respond(json_encode($mensaje)); }

    }


    public function editar($id){

        $datosAEditar=$this->request->getRawInput();

        //".depurar arreglo

        $nombre=$datosAEditar["nombre"];
        $edad=$datosAEditar["edad"];
        
        //3. organizar datos

        $datosEnvio=array(
			"nombre"=>$nombre,
            "edad"=>$edad
            );


        //4ejecutar consulta si datos validados correctamente

        if($this->validate('usuarioPUT')){


            $this->model->update($id,$datosEnvio);
            return $this->respond($this->model->find($id));


        }
        else{

            $validation= \Config\services::validation();

            return $this->respond($validation->getErrors());




        }



    }



}