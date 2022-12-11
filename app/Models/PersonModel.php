<?php 

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model 
{
    protected $table         = 'person';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];

    public function search($keyword) 
    {
        return  $this->like('name', $keyword);
    }

    public function getPerson($name)
    {
        return $this->where(['name' => $name])->first();
    }
}