<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;



class UsersImport implements ToModel ,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

   
    protected $class_id;
    protected $section_id;
    protected $school_id;

    public function __construct($class_id, $section_id, $school_id) 
    {
        $this->class_id = $class_id;
        $this->section_id = $section_id;
        $this->school_id = $school_id;
    }

    public function model(array $row)
    {
        
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'], 
            'phone'    => $row['phone'], 
            'roll_number'    => $row['roll_number'], 
            'dob'    => $row['dob'], 
            'gender'    => $row['gender'], 
            'blood_group'    => $row['blood_group'], 
            'father_name'    => $row['father_name'], 
            'mother_name'    => $row['mother_name'], 
            'shift'    => $row['shift'], 
            'address'    => $row['address'], 
            'class_id'    => $this->class_id, 
            'section_id'    => $this->section_id, 
            'school_id'    => $this->school_id, 
            'password' => Hash::make($row['password']),
         ]);

    }


    public function rules(): array
    {
        return [
            'name' =>'required',
             '*.name' => 'required',
            'email' =>'required|email|unique:users',
             '*.email' => 'required|email|unique:users',
            'phone' =>'required|unique:users',
             '*.phone' => 'required|unique:users',
            'roll_number' =>'required|unique:users',
             '*.roll_number' => 'required|unique:users',
            'shift' =>'required',
             '*.shift' => 'required',
            'dob' =>'required',
             '*.dob' => 'required',
            'gender' =>'required',
             '*.gender' => 'required',
            'address' =>'required',
             '*.address' => 'required',
            'blood_group' =>'required',
             '*.blood_group' => 'required',
            'address' =>'required',
             '*.address' => 'required',
            'father_name' =>'required',
             '*.father_name' => 'required',
            'mother_name' =>'required',
             '*.mother_name' => 'required',            
        ];
    }
}
