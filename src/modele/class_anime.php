<?php
        class Anime{   

    private $db;  
    private $insert;//inscription dans la table 'anime'
    private $select;//lister les animé
    private $selectById;//modification de l'Anime     
    private $genreselect;
    private $mangaka;

    public function __construct($db){        
        $this->db = $db; 
        $this->insert = $this->db->prepare("insert into anime(nomanime, idmangaka, genre)
        values (:nomanime, :idmangaka, :genre)");   // Étape 2    //inscription

        $this->select = $db->prepare("select a.id, nomanime, idmangaka, g.libelle as genrelibelle, m.nommangaka as mangaka from
        anime a, genre g ,mangaka m where a.genre = g.id and a.idmangaka = m.id order by nomanime");//liste les animé

        $this->genreselect = $db->prepare("select g.id ,libelle from
        genre g");

        $this->mangaka = $db->prepare("select m.id, nommangaka from
        mangaka m");

        } 

        
        
        public function insert($nomanime, $genre, $idmangaka){ // Étape 3         
            $r = true;        
            $this->insert->execute(array(':nomanime'=>$nomanime, ':genre'=>$genre, ':idmangaka'=>$idmangaka,));        
        
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

        public function genreselect(){             
            $this->genreselect->execute();        
        if ($this->genreselect->errorCode()!=0){             
            print_r($this->genreselect->errorInfo());                       
            }        
            return $this->genreselect->fetchAll();
        }

        public function mangaka(){             
            $this->mangaka->execute();        
        if ($this->mangaka->errorCode()!=0){             
            print_r($this->mangaka->errorInfo());                       
            }        
            return $this->mangaka->fetchAll();
        }

      
    }
?>