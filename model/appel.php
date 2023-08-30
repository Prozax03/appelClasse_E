<?php

class appel
{

    private $dateAppel;
    private $periode;
    private $eleve;
    private $estPresent;
    private $commentaire;


    public function __construct($dateAppel="", $periode="", $eleve = "", $estPresent="", $commentaire="")
    {
        $this->dateAppel = $dateAppel;
        $this->periode = $periode;
        $this->eleve = $eleve;
        $this->estPresent = $estPresent;
        $this->commentaire = $commentaire;
    }

    public function create(){
        require "db.php";

        $req = $db->prepare("INSERT INTO appel VALUES(?, ?, ?, ?, ?)");
        $req->execute(array($this->dateAppel, $this->periode->getId(), $this->eleve->getId(), $this->estPresent, $this->commentaire));
    }

    public function creationListe($dateAppel, $eleve){
        require "db.php";

        $idEleve = $eleve->getId();
        $req = $db->prepare("INSERT INTO appel VALUES(:dateAppel, 1, :eleve, 2, ''), (:dateAppel, 2, :eleve, 2, '')");
        $req->bindParam(':dateAppel', $dateAppel);
        $req->bindParam(':eleve', $idEleve);
        $req->execute();
    }

    public function retrieve($dateAppel, $periode, $eleve){
        require "db.php";

        $req = $db->prepare("SELECT * FROM appel WHERE dateAppel = ? AND idPeriode = ? AND idEleve = ?");
        $req->execute(array($dateAppel, $periode->getId(), $eleve->getId()));
        $result = $req->fetch();

        $this->dateAppel = $result['dateAppel'];
        $this->estPresent = $result['estPresent'];
        $this->commentairie = $result['commentaire'];

        $this->periode = $periode;
        $this->eleves = $eleve;
    }

    public function update(){
        require "db.php";

        $req = $db->prepare("UPDATE appel SET estPresent = ?, commentaire = ? WHERE dateAppel = ? AND idPeriode = ? AND idEleve = ?");
        $req->execute(array($this->estPresent, $this->commentaire, $this->dateAppel, $this->periode->getId(), $this->eleve->getId()));
    }

    public function delete($dateAppel, $periode, $eleve){
        require "db.php";

        $req = $db->prepare("DELETE FROM appel WHERE dateAppel = ? AND idPeriode = ? AND idEleve = ?");
        $req->execute(array($dateAppel, $periode->getId(), $eleve->getId()));
    }

    public function findAll(){
        require "db.php";

        $req = $db->prepare("SELECT * FROM appel ORDER BY dateAppel");
        $req->execute(array());

        require_once "periode.php";
        require_once "eleves.php";

        $mesAppel = array();
        while ($result = $req->fetch()){
            $periode = new periode();
            $periode->retrieve($result['idPeriode']);

            $eleve = new eleves();
            $eleve->retrieve($result['idEleve']);

            $monAppel = new appel($result['dateAppel'], $periode, $eleve, $result['estPresent'], $result['commentaire']);

            array_push($mesAppel, $monAppel);
        }
        return $mesAppel;
    }

    public function getAppelJourAM($date){
        require "db.php";

        $req = $db->prepare("SELECT * FROM appel a, eleves e, periode p, classes c WHERE a.idEleve = e.id AND a.idPeriode = p.id AND e.idClasse = c.id AND dateAppel = :dateJ AND e.dateEntree <= :dateJ AND e.dateSortie >= :dateJ AND p.id = 1 ORDER BY c.ordre, e.nom, e.prenom");
        $req->bindParam(':dateJ', $date);
        $req->execute();

        require_once "periode.php";
        require_once "eleves.php";

        $mesAppels = array();
        while ($result = $req->fetch()){
            $periode = new periode();
            $periode->retrieve($result['idPeriode']);

            $eleve = new eleves();
            $eleve->retrieve($result['idEleve']);

            $monAppel = new appel($result['dateAppel'], $periode, $eleve, $result['estPresent'], $result['commentaire']);

            array_push($mesAppels, $monAppel);
        }
        return $mesAppels;
    }

    public function getAppelJourPM($date){
        require "db.php";

        $req = $db->prepare("SELECT * FROM appel a, eleves e, periode p WHERE a.idEleve = e.id AND a.idPeriode = p.id AND dateAppel = :dateJ AND e.dateEntree <= :dateJ AND e.dateSortie >= :dateJ AND p.id = 2 ORDER BY e.idClasse, e.nom, e.prenom");
        $req->bindParam(':dateJ', $date);
        $req->execute();

        require_once "periode.php";
        require_once "eleves.php";

        $mesAppels = array();
        while ($result = $req->fetch()){
            $periode = new periode();
            $periode->retrieve($result['idPeriode']);

            $eleve = new eleves();
            $eleve->retrieve($result['idEleve']);

            $monAppel = new appel($result['dateAppel'], $periode, $eleve, $result['estPresent'], $result['commentaire']);

            array_push($mesAppels, $monAppel);
        }
        return $mesAppels;
    }

    public function appelFait($date){
        require "db.php";

        $req = $db->prepare("SELECT COUNT(*) as nb FROM appel WHERE dateAppel = ?");
        $req->execute(array($date));
        $result = $req->fetch();

        if ($result['nb'] > 0){
            return true;
        } else {
            return false;
        }
    }

    public function countEleveByClasseAndJourPresent($dateJour, $periode){
        require "db.php";

        $req = $db->prepare("SELECT c.libelleCourt, COUNT(*) as 'nb' FROM appel a, eleves e, classes c WHERE a.idEleve = e.id AND e.idClasse = c.id AND a.dateAppel = :dateJ AND a.estPresent = 1 AND a.idPeriode = :periode GROUP BY c.libelleCourt ORDER BY ordre;");
        $req->bindParam(':dateJ', $dateJour);
        $req->bindParam(':periode', $periode);
        $req->execute();
        
        $monTableau = array();
        while($result = $req->fetch()){
            $monTableau[$result['libelleCourt']] = $result['nb']; 
        }

        return $monTableau;
    }

    public function getIsVacances($date){
        require "db.php";

        $req = $db->prepare("SELECT COUNT(*) as nb FROM vacances WHERE ? BETWEEN dateDebut and dateFin");
        $req->execute(array($date));
        $result = $req->fetch();

        if ($result['nb'] > 0){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getDateAppel()
    {
        return $this->dateAppel;
    }

    /**
     * @param mixed $dateAppel
     */
    public function setdateAppel($dateAppel)
    {
        $this->dateAppel = $dateAppel;
    }

    /**
     * @return mixed
     */
    public function getestPresent()
    {
        return $this->estPresent;
    }

    /**
     * @param mixed $estPresent
     */
    public function setestPresent($estPresent)
    {
        $this->estPresent = $estPresent;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $estPresent
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
    /**
     * @return mixed
     */
    public function getperiode()
    {
        return $this->periode;
    }

    /**
     * @param mixed $estPresent
     */
    public function setperiode($periode)
    {
        $this->periode = $periode;
    }
    /**
     * @return mixed
     */
    public function geteleve()
    {
        return $this->eleve;
    }

    /**
     * @param mixed $estPresent
     */
    public function seteleve($eleve)
    {
        $this->eleve = $eleve;
    }
}