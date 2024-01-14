<?php
/*    require_once('controller/Etudiant.php');
    require_once('model/EtudiantManager.php');*/
    require_once 'load.php';
    $id = 3;
    $etudiant = new Etudiant(array('id' => $id, 'nom' => "Musampan", 'postnom' => "Nsungula", 'prenom' => "Junio",'matricule' => "00001665678", 'date_naissance' => "2020-03-31 17:47:27", 'sexe' => "Masculin",'photo' => "asee.jpg", 'promotion' => "G2 informatique"));
    $enseignant = new Enseignant(array('id' => $id, 'nom' => "Kab", 'postnom' => "Nsung", 'prenom' => "Zibu", 'matricule' => "12345022",'id_cours' => 5, 'grade' => "Assistant"));
  /* var_dump($enseignant);die();*/
    $man = new EtudiantManager();
    if ($man->existe($etudiant->nom())) {
            echo"existe deja";   
    }else{
        $man->add($etudiant); 
    }
