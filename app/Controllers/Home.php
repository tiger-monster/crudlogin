<?php namespace App\Controllers;
use App\Models\Usuarios;
use App\Models\Gastos;
class Home extends BaseController
{
	public function index()
	{
		$mensaje = session('mensaje');
		return view('login', ["mensaje" => $mensaje]);
	}

	public function inicio(){
		$Crud = new Gastos();
		$datos = $Crud->listarGastos();
		$mensaje = session('mensaje');
		$data = [
			"datos" => $datos,
			"mensaje" => $mensaje
		];

		return view('inicio', $data);
	}

	public function login(){

		$usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('password');
		$Usuario = new Usuarios();

		$datosUsuario = $Usuario->obtenerUsuario(['usuario' => $usuario]);

		if (count($datosUsuario) > 0 && 
			password_verify($password, $datosUsuario[0]['password'])){

			$data = [
				"nombre" => $datosUsuario[0]['nombre'],
				"apellido_paterno" => $datosUsuario[0]['apellido_paterno'],
				"email" => $datosUsuario[0]['email'],
				"usuario" => $datosUsuario[0]['usuario']
				
			];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('/inicio'))->with('mensaje', '3');

		}else{
			return redirect()->to(base_url('/'))->with('mensaje', '0');
		}


	}

	public function salir(){
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}

	/*public function indexc()
	{
		$Crud = new Gastos();
		$datos = $Crud->listarGastos();

		$mensaje = session('mensaje');

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];

		return view('inicio', $data);
	}*/

	public function crear(){
		$datos = [
					"concepto" => $_POST['concepto'],
					"monto" => $_POST['monto'],
					"fecha" => $_POST['fecha']
				];
		$Crud = new Gastos();
		$respuesta = $Crud->insertar($datos);

		if ($respuesta > 0){
			return redirect()->to(base_url().'/inicio')->with('mensaje','1');
		}else{
			return redirect()->to(base_url().'/inicio')->with('mensaje','0');
		}

	}

	/*public function obtenerGasto($idNombre){
		$data = ["id_nombre" => $idNombre];
		$Crud = new CrudModel();
		$respuesta = $Crud->obtenerGasto($data);

		$datos = ["datos"=>$respuesta];

		return view('actualizar', $datos);
	}*/


	//--------------------------------------------------------------------

}
