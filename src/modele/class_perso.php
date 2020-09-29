<?php
        class Perso{   

    private $db;  
    private $insert;//inscription
    private $connect;//connection
    private $select;//liste Anime 
    private $selectById;//modification de l'Anime 
    private $perso;    

    public function __construct($db){        
        $this->db = $db; 

        $this->insert = $this->db->prepare("insert into personnage(nomperso, idanime)
        values (:nomperso, :idanime)");   // Étape 2    //inscription

        $this->select = $db->prepare("select p.id, nomperso, a.nomanime as nomanime
         from personnage p, anime a 
         where p.idanime = a.id
         order by p.id");

         $this->perso = $db->prepare("select a.id, nomanime from
         anime a ");
        } 

        
        public function insert($nomperso, $idanime){ // Étape 3         
        $r = true;        
        $this->insert->execute(array(':nomperso'=>$nomperso, ':idanime'=>$idanime));        
        
        if ($this->insert->errorCode()!=0){             
            print_r($this->insert->errorInfo());               
            $r=false;        
            }        
            return $r;    
        }

        public function select(){        
            $this->select->execute();        
            if ($this->select->errorCode()!=0){             
                print_r($this->select->errorInfo());          
            }        
            return $this->select->fetchAll();    
        }

        public function perso(){        
            $this->perso->execute();        
            if ($this->perso->errorCode()!=0){             
                print_r($this->perso->errorInfo());          
            }        
            return $this->perso->fetchAll();    
        }

    }
?>