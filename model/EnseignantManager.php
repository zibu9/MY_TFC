<?php

    class EnseignantManager extends Connexion
    {

        public function getEnseignant(Enseignant $enseignant)
        {
            $req = $this->bdd->prepare('SELECT * FROM enseignant WHERE id = ?');
            $req->execute(array( $enseignant->id()));

            return $req;
        }

        public function add(Enseignant $enseignant)
        {
            $req = $this->bdd->prepare('INSERT INTO enseignant SET nom = :nom, postnom = :postnom, prenom = :prenom, matricule =:matricule, id_cours =:id_cours, grade =:grade');
            $req->bindValue(':nom', $enseignant->nom());
            $req->bindValue(':postnom', $enseignant->postnom());
            $req->bindValue(':prenom', $enseignant->prenom());
            $req->bindValue(':matricule', $enseignant->matricule());
            $req->bindValue(':id_cours', $enseignant->id_cours());
            $req->bindValue(':grade', $enseignant->grade());           
            $req->execute();
        }

        public function count()
        {
            return $bdd->query('SELECT COUNT(*) FROM enseignant')->fetchColumn();
        }

        public function delete(Enseignant $enseignant)
        {
            $this->bdd->exec('DELETE FROM enseignant WHERE id = '.$enseignant->id());
        }

        public function update(Enseignant $enseignant)
        {
            $req = $this->bdd->prepare('UPDATE enseignant SET nom = :nom, postnom = :postnom, prenom = :prenom, matricule =:matricule, id_cours =:id_cours, grade =:grade  WHERE id = :id');
            $req->bindValue(':nom', $enseignant->nom());
            $req->bindValue(':postnom', $enseignant->postnom());
            $req->bindValue(':prenom', $enseignant->prenom());
            $req->bindValue(':matricule', $enseignant->matricule());
            $req->bindValue(':id_cours', $enseignant->id_cours());
            $req->bindValue(':grade', $enseignant->grade());           
            $req->bindValue(':id', $enseignant->id());
            $req->execute();
        }

        public function existe($info)
        {
            if (is_int($info))
            {
                return (bool) $this->bdd->query('SELECT COUNT(*) FROM enseignant WHERE id = '.$info)->fetchColumn();
            }
            $q = $this->bdd->prepare('SELECT COUNT(*) FROM enseignant WHERE nom = :nom');
            $q->execute(array(':nom' => $info));
            return (bool) $q->fetchColumn();
        }


    }
