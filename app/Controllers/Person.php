<?php 

namespace App\Controllers;

use App\Models\PersonModel;

class Person extends BaseController {
    
    protected $personModel;

    public function __construct()
    {
        $this->personModel = new PersonModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_person') ? $this->request->getVar('page_person') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $person = $this->personModel->search($keyword);
        } else {
            $person = $this->personModel->orderBy('name', 'ASC');
        }
        
        $data = [
            'title'       => 'Person Page',
            'person'      => $person->paginate(10, 'person'),
            'pager'       => $this->personModel->pager,
            'keyword'     => $keyword,
            'currentPage' => $currentPage
        ];

        return view('person/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Person',
            'validation' => \Config\Services::validation()
        ];

        return view('person/create', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'name'      => 'required|is_unique[person.name]',
            'address'   => 'required'
        ])) {
            return redirect()->to('person/create')->withInput();
        }

        $this->personModel->save([
            'name'      => $this->request->getVar('name'),
            'address'   => $this->request->getVar('address'),
        ]);

        session()->setFlashdata('msg', 'Person succesfully added');
        return redirect()->to('/person');
    }

    public function edit($name)
    {
        $data = [
            'title'      => 'Edit Person',
            'validation' => \Config\Services::validation(),
            'person'     => $this->personModel->getPerson($name)
        ];

        if(empty($data['person'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Person '.$name.' Not found');
        }

        return view('person/edit', $data);
    }

    public function update($id)
    {
        $oldPerson = $this->personModel->getPerson(
            $this->request->getVar('oldName')
        );
        if($oldPerson['name'] == $this->request->getVar('name')){
            $name = 'required';
        } else {
            $name = 'required|is_unique[person.name]';
        }

        if(!$this->validate([
            'name'      => $name,
            'address'   => 'required'
        ])) {
            return redirect()->to('person/edit/'.$this->request->getVar('oldName'))->withInput();
        }

        $this->personModel->save([
            'id'        => $id,
            'name'      => $this->request->getVar('name'),
            'address'   => $this->request->getVar('address'),
        ]);

        session()->setFlashdata('msg', 'Person succesfully updated');
        return redirect()->to('/person');
    }


    public function delete($id)
    {
        $this->personModel->delete($id);

        session()->setFlashdata('msg', 'Person succesfully deleted');
        return redirect()->to('/person');
    }
}