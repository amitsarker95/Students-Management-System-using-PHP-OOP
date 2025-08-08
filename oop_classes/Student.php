<?php

class Student{
    private $fileName = "students.json";

    public function getAllStudents(){
        $students = json_decode(file_get_contents($this->fileName),true);
        if(!empty($students)){
            return $students;
        }else{
            return [];
        }
    }

    public function getStudentById($id){
        $students = $this->getAllStudents();
        if (!empty($students)){
            foreach ($students as $student){
                if($student['id'] == $id){
                    return $student;
                }
            }
        }
        return null;
    }


    public function addStudent($student_data){
        $students = $this->getAllStudents();
        $student_data['id'] = uniqid();
        $students[] = $student_data;
        file_put_contents($this->fileName, json_encode($students, JSON_PRETTY_PRINT));
    }

    public function updateStudent($student_data){
        $students = $this->getAllStudents();
        
        foreach($students as &$student){
            if($student['id'] == $student_data['id']){
                $student = array_merge($student, $student_data);
                break;
            }
        }
        file_put_contents($this->fileName, json_encode($students, JSON_PRETTY_PRINT));
    }

    
    public function deleteStudent($id){
        $flag = false;
        $students = $this->getAllStudents();
        foreach($students as $key => $student){
            if($student['id'] == $id){
                unset($students[$key]);
                $flag = true;
                break;
            }
        }
        if($flag){
            file_put_contents($this->fileName, json_encode(array_values($students), JSON_PRETTY_PRINT));
        }
        
    }
}


?>