<?php namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
{
	// set login
	public function index()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required',
				'password' => 'required|min_length[3]'
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if(!$this->validate($rules,$errors)){
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();
				$user = $model->where('email',$this->request->getVar('email'))
							  ->first();
				$this->setUserSession($user);
				return redirect()->to('dashboard');
			}

		}
		return view('login',$data);
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}	
// register before login
	public function register()
	{
		helper(['form']);

		$data = [];

		if($this->request->getMethod() == "post"){
			$rules = [
				'firstname' => 'required',
				'lastname' => 'required',
				'email' => 'required',
				'password' => 'required',
				'password_comfirm' => 'matches[password]'
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
				'firstname' => $this->request->getVar('firstname'),
				'lastname' => $this->request->getVar('lastname'),
				'email' => $this->request->getVar('email'),
				'password' => $this->request->getVar('password'),
				];

				$model->save($newData);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/');
			}

		}

		return view('register',$data);
	}
// update profile
	public function profile()
	{
		helper(['form']);
		$model = new UserModel();
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'firstname' => 'required',
				'lastname' => 'required',
			];

			if($this->request->getPost('password') !=''){
				$rules['password'] = 'required';
				$rules['password_comfirm'] = 'matches[password]';
			}

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				

				$newData = [
				'id' => session()->get('id'),
				'firstname' => $this->request->getVar('firstname'),
				'lastname' => $this->request->getVar('lastname'),
				];

				if($this->request->getPost('password') !=''){
					$newData['password'] = $this->request->getPost('password');
				}

				$model->save($newData);
				$session = session();
				session()->setFlashdata('success','successful update');
				return redirect()->to('/profile');
			}

		}
		$data['user'] = $model->where('id',session()->get('id'))->first();
		return view('profile',$data);
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

}
