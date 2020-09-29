<?php
        class Mangaka{   

    private $db;  
    private $insert;//inscription
    private $connect;//connection
    private $select;//liste Anime 
    private $selectById;//modification de l'Anime     

    public function __construct($db){        
        $this->db = $db; 

        $this->insert = $this->db->prepare("insert into mangaka(nommangaka)
        values (:nommangaka)");   // Étape 2    //inscription

        $this->select = $db->prepare("select m.id, nommangaka from
        mangaka m order by m.id");//liste des genre
        } 

        
        public function insert($nommangaka){ // Étape 3         
        $r = true;        
        $this->insert->execute(array(':nommangaka'=>$nommangaka));        
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