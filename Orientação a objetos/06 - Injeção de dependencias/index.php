<?php

require('vendor/autoload.php');



// EXEMPLO UPLOAD
    interface UploadInterface{
        public function uploadFile();
    }


    class Upload{

        private $upload;

        public function __contruct(UploadInterface $upload){
            $this->upload = $upload;
        }

        public function doUpload(){
            return $this->upload->uploadFile(); 
        }
    }


    class UploadPdf implements UploadInterface{

        public function uploadFile(){
            return "Upload de PDF";
        }
    }


    class UploadFoto implements UploadInterface{

        public function uploadFile(){
            return "Upload de Foto";
        }
    }


    $upload = new Upload(new UploadPdf);



// EXEMPLO CABEÇA
/*
    interface HeadInterface{
        public function create();
    }


    class Head implements HeadInterface {
        public function create(){
            return "Criando a cabeça";
        }
    }


    class HeadLoiro implements HeadInterface {
        public function create(){
            return "Criando a cabeça loira";
        }
    }


    class Person {

        private $head;

        public function __construct(HeadInterface $head){
            $this->head = $head;
            //$this->head = new Head;
        }

        public function create(){
            return $this->head->create();
        }

    }

    $person = new Person(new HeadLoiro);

    echo $person->create();
*/