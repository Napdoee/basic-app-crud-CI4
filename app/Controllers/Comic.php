<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        $data['title'] = 'Comic';
        $data['comic'] = $this->comicModel->getComic();

        return view('comic/index', $data);
    }

    //Comic Preview
    public function detail($slug)
    {   
        $data = [
            'title' => 'Detail Comic',
            'comic' => $this->comicModel->getComic($slug)
        ];

        //Condition if comic has empty
        if(empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title comic '.$slug.' Not found');
        }

        return view('comic/detail', $data);
    }

    public function create()
    {
        session();
        $data['title'] = 'Form create comic';
        $data['validation'] = \Config\Services::validation();

        return view('comic/create', $data);
    }

    public function save()
    {

        //Validate return to create
        if(!$this->validate([
            'title'        => 'required|is_unique[comic.title]',
            'author'       => 'required',
            'release_date' => 'required',
            'cover'        => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]'
            ]
        ])) {
            return redirect()->to('/comic/new')->withInput();
        }

        $fileCover = $this->request->getFile('cover');
        if($fileCover->getError() == 4) {
            $fileCoverName = 'default.png';
        } else {
            $fileCoverName = $fileCover->getRandomName();
            $fileCover->move('img', $fileCoverName);
        }


        $slug = url_title($this->request->getVar('title'), '-', true);

        //Save the form into database
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'cover' => $fileCoverName,
            'release_date' => $this->request->getVar('release_date')
        ]);

        session()->setFlashdata('msg_s', 'Comic succesfully added');
        return redirect()->to(base_url('comic'));
    }

    public function delete($id)
    {
        $comic = $this->comicModel->find($id);
        
        if($comic['cover'] != 'default.png') {
            unlink('img/'.$comic['cover']);
        }

        $this->comicModel->delete($id); 

        session()->setFlashdata('msg_e', 'Comic succesfully deleted');
        return redirect()->to(base_url('comic'));
    }

    public function edit($slug)
    {
        $data['title'] = 'Form edit comic';
        $data['validation'] = \Config\Services::validation();
        $data['comic'] = $this->comicModel->getComic($slug);

        //Condition if comic has empty
        if(empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title comic '.$slug.' Not found');
        }

        return view('comic/edit', $data);
    }

    public function update($id)
    {
        $oldComic = $this->comicModel->getComic($this->request->getVar('slug'));
        if($oldComic['title'] == $this->request->getVar('title')){
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[comic.title]';
        }

        //Validate return
        if(!$this->validate([
            'title'        => $rule_title,
            'author'       => 'required',
            'release_date' => 'required',
            'cover'        => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]'
            ]
        ])) {
            return redirect()->to('/comic/edit/'.$this->request->getVar('slug'))->withInput();
        }

        $fileCover = $this->request->getFile('cover');
        
        //Condition if change cover
        if($fileCover->getError() == 4){
            $fileCoverName = $this->request->getVar('coverOld');
        } else {
            $fileCoverName = $fileCover->getRandomName();
            $fileCover->move('img', $fileCoverName);
            
            if($this->request->getVar('coverOld') != 'default.png') {
                unlink('img/'.$this->request->getVar('coverOld'));
            }
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        //Save the form into database
        $this->comicModel->save([
            'id'           => $id,
            'title'        => $this->request->getVar('title'),
            'slug'         => $slug,
            'author'       => $this->request->getVar('author'),
            'cover'        => $fileCoverName,
            'release_date' => $this->request->getVar('release_date')
        ]);

        session()->setFlashdata('msg_s', 'Comic succesfully updated');
        return redirect()->to(base_url('comic'));
    }
}