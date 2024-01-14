<?php
   
    class EtudiantManager extends Connexion
    {
        
        public function getEtudiant(Etudiant $etudiant)
        {
            $req = $this->bdd->prepare('SELECT * FROM etudiant WHERE id = ?');
            $req->execute(array( $etudiant->id()));

            return $req;
        }
        public function add(Etudiant $etudiant)
        {
            $req = $this->bdd->prepare('INSERT INTO etudiant SET nom = :nom, postnom = :postnom, prenom = :prenom, matricule =:matricule, date_naissance =:date_naissance, sexe =:sexe, photo =:photo, id_promotion =:promotion');
            $req->bindValue(':nom', $etudiant->nom());
            $req->bindValue(':postnom', $etudiant->postnom());
            $req->bindValue(':prenom', $etudiant->prenom());
            $req->bindValue(':matricule', $etudiant->matricule());
            $req->bindValue(':date_naissance', $etudiant->date_naissance());
            $req->bindValue(':sexe', $etudiant->sexe());           
            $req->bindValue(':photo', $etudiant->photo());
            $req->bindValue(':promotion', $etudiant->promotion());
            $req->execute();
        }

        public function count()
        {
            return $this->bdd->query('SELECT COUNT(*) FROM etudiant')->fetchColumn();
        }

        public function delete(Etudiant $etudiant)
        {
            $this->bdd->exec('DELETE FROM etudiant WHERE id = '.$etudiant->id());
        }

        public function update(Etudiant $etudiant)
        {
            $req = $this->bdd->prepare('UPDATE etudiant SET nom = :nom, postnom = :postnom, prenom = :prenom, matricule =:matricule, date_naissance =:date_naissance, sexe =:sexe, photo =:photo, id_promotion =:promotion WHERE id = :id');
            $req->bindValue(':nom', $etudiant->nom());
            $req->bindValue(':postnom', $etudiant->postnom());
            $req->bindValue(':prenom', $etudiant->prenom());
            $req->bindValue(':matricule', $etudiant->matricule());
            $req->bindValue(':date_naissance', $etudiant->date_naissance());
            $req->bindValue(':sexe', $etudiant->sexe());           
            $req->bindValue(':photo', $etudiant->photo());
            $req->bindValue(':promotion', $etudiant->promotion());
            $req->bindValue(':id', $etudiant->id());
            $req->execute();
        }

        public function existe($info)
        {
            if (is_int($info))
            {
                return (bool) $this->bdd->query('SELECT COUNT(*) FROM etudiant WHERE id = '.$info)->fetchColumn();
            }
            $q = $this->bdd->prepare('SELECT COUNT(*) FROM etudiant WHERE nom = :nom');
            $q->execute(array(':nom' => $info));
            return (bool) $q->fetchColumn();
        }

    }
