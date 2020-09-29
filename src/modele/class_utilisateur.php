<?php
        class Utilisateur{   

    private $db;  
    private $insert;//inscription
    private $connect;//connection
    private $select;//liste utilisateur  
    private $selectById;//modification de l'utilisateur     
    private $update;//modification du nom/prenom 

    public function __construct($db){        
        $this->db = $db; 
        $this->insert = $this->db->prepare("insert into utilisateur(email,mdp,pseudo,nom,prenom,idRole)
        values (:email, :mdp, :pseudo, :nom, :prenom, :role)");   // Étape 2    //inscription
        
        $this->connect = $this->db->prepare("select email, idRole, pseudo, mdp from utilisateur where email=:email"); 

        $this->select = $db->prepare("select u.id, email, pseudo, idRole, nom, prenom, r.libelle as libellerole from
        utilisateur u, role r where u.idRole = r.id order by nom");//liste utilisateur

        $this->selectById = $db->prepare("select id, email, mdp, pseudo, nom, prenom, idRole from utilisateur where
        id=:id");

        } 
        
        public function insert($email, $mdp, $pseudo, $role, $nom, $prenom){ // Étape 3         
        $r = true;        
        $this->insert->execute(array(':email'=>$email, ':mdp'=>$mdp, ':pseudo'=>$pseudo, ':role'=>$role, ':nom'=>$nom,':prenom'=>$prenom));        
        
        if ($this->insert->errorCode()!=0){             
            print_r($this->insert->errorInfo());               
            $r=false;        
            }        
            return $r;    
        }

        public function connect($email){
            $unUtilisateur = $this->connect->execute(array(':email'=>$email));
            if($this->connect->errorCode()!=0){
                print_r($this->connect->errorInfo());
            }
            return $this->connect->fetch();
        }

        public function select(){        
            $this->select->execute();        
            if ($this->select->errorCode()!=0){             
                print_r($this->select->errorInfo());          
            }        
            return $this->select->fetchAll();    
        }

        public function selectById($id){          
            $this->selectById->execute(array(':id'=>$id));        
            if ($this->selectById->errorCode()!=0){             
                print_r($this->selectById->errorInfo());          
            }        
            return $this->selectById->fetch(); 
        }

       
    }
?>