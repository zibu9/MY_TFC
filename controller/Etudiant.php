<?php

    class Etudiant
    {
        protected $Id;
        protected $Matricule;
        protected $Nom;
        protected $Postnom;
        protected $Prenom;
        protected $Date_naissance;
        protected $Sexe;
        protected $Photo;
        protected $Promotion;

        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            { 
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }

        public function id()
        {
            return $this->Id;
        }
        public function nom()
        {
            return $this->Nom;
        }

        public function postnom()
        {
            return $this->Postnom;
        }

        public function prenom()
        {
            return $this->Prenom;
        }

        public function date_naissance()
        {
            return $this->Date_naissance;
        }


        public function sexe()
        {
            return $this->Sexe;
        }

        public function photo()
        {
            return $this->Photo;
        }

        public function promotion()
        {
            return $this->Promotion;
        }

        public function matricule()
        {
            return $this->Matricule;
        }

        public function setId($id)
        {
            $id = (int) $id;
            if ($id > 0)
            {
                $this->Id = $id;
            }
        }
        public function setNom($nom)
        {
            if (is_string($nom))
            {
                $this->Nom = $nom;
            }
        }        

        public function setPostnom($Postnom)
        {
            if (is_string($Postnom))
            {
                $this->Postnom = $Postnom;
            }
        }

        public function setPrenom($Prenom)
        {
            if (is_string($Prenom))
            {
                $this->Prenom = $Prenom;
            }
        }
        public function setDate_naissance($Date_naissance)
        {
            if (is_string($Date_naissance))
            {
                $this->Date_naissance = $Date_naissance;
            }
        }

        public function setMatricule($Matricule)
        {
            if (is_string($Matricule))
            {
                $this->Matricule = $Matricule;
            }
        }
        
        public function setSexe($Sexe)
        {
            if (is_string($Sexe))
            {
                $this->Sexe = $Sexe;
            }
        }
        
        public function setPhoto($Photo)
        {
            if (is_string($Photo))
            {
                $this->Photo = $Photo;
            }
        }
        
        public function setPromotion($Promotion)
        {
            if (is_string($Promotion))
            {
                $this->Promotion = $Promotion;
            }
        }
    }
