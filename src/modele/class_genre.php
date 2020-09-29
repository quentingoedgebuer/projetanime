<?php
        class Genre{   

    private $db;  
    private $insert;//inscription
    private $connect;//connection
    private $select;//liste Anime 
    private $selectById;//modification de l'Anime     

    public function __construct($db){        
        $this->db = $db; 

        $this->insert = $this->db->prepare("insert into genre(libelle)
        values (:libelle)");   // Étape 2    //inscription

        $this->select = $db->prepare("select g.id, libelle from
        genre g order by g.id");//liste des genre
        } 

        
        public function insert($libelle){ // Étape 3         
        $r = true;        
        $this->insert->execute(array(':libelle'=>$libelle));        
        
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

    }
?>