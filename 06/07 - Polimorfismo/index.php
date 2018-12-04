<?php

require('vendor/autoload.php');


// POLIMORFISMO IDEAL
interface EmailInterface{
    public function send();
}

class Swift implements EmailInterface{
    public function send(){
        return "Enviando email com Swift";
    }
}


class Mailer implements EmailInterface{
    public function send(){
        return "Enviando email com Mailer";
    }
}


class SendEmail{
    private $email;

    public function __construct(EmailInterface $email){
        $this->email = $email;
    }

    public function send(){
        return $this->email->send();
    }
}


$email = new SendEmail(new Mailer);
echo $email->send();


// POLIMORFISMO CONCRETO
    /*
    abstract class Banco{
        public function depositar($valor){
            return "Depositando com juros de 0.3 com o valor de {$valor}";
        }
    }


    class Nubank extends Banco {

        private $juros = 0.6;

        public function depositar($valor){
            return "depositando com juros de {$this->juros} e o valor de {$valor}";
        }

    }


    class Original extends Banco {

        private $juros = 1;

        public function depositar($valor){
            return "depositando com juros de {$this->juros} e o valor de {$valor}";
        }

    }

    $bancoTeste = new Original;

    echo $bancoTeste->depositar(100);
    */