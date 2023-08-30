<?php

class eleves
{

    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $classe;
    private $dateEntree;
    private $dateSortie;
    private $dateNais;


    public function __construct($id="", $nom="", $prenom="", $sexe="", $classe = "", $dateEntree = "", $dateSortie = "", $dateNais = "")
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->classe = $classe;
        $this->dateEntree = $dateEntree;
        $this->dateSortie = $dateSortie;
        $this->dateNais = $dateNais;
    }

    public function create(){
        require "db.php";

        $req = $db->prepare("INSERT INTO eleves VALUES(null, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($this->nom, $this->prenom, $this->sexe->getId(), $this->classe->getId(), $this->dateEntree, $this->dateSortie, $this->dateNais));
    }

    public function retrieve($id){
        require "db.php";

        $req = $db->prepare("SELECT * FROM eleves WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();

        $this->id = $result['id'];
        $this->nom = $result['nom'];
        $this->prenom = $result['prenom'];
        $this->dateEntree = $result['dateEntree'];
        $this->dateSortie = $result['dateSortie'];
        $this->dateNais = $result['dateNaissance'];

        require_once "sexes.php";
        $leSexe = new sexes();
        $leSexe->retrieve($result['idSexe']);
        $this->sexe = $leSexe;

        require_once "classes.php";
        $laClasse = new classes();
        $laClasse->retrieve($result['idClasse']);
        $this->classe = $laClasse;
    }

    public function update(){
        require "db.php";

        $req = $db->prepare("UPDATE eleves SET nom = ?, prenom = ?, idSexe = ?, idClasse = ?, dateEntree = ?, dateSortie = ?, dateNaissance = ? WHERE id = ?");
        $req->execute(array($this->nom, $this->prenom, $this->sexe->getId(), $this->classe->getId(), $this->dateEntree, $this->dateSortie, $this->dateNais, $this->id));
    }

    public function delete($id){
        require "db.php";

        $req = $db->prepare("DELETE FROM eleves WHERE id = ?");
        $req->execute(array($id));
    }

    public function findAll(){
        require "db.php";

        $req = $db->prepare("SELECT * FROM eleves ORDER BY nom, prenom");
        $req->execute(array());

        require_once "sexes.php";
        require_once "classes.php";

        $mesEleves = array();
        while ($result = $req->fetch()){
            $leSexe = new sexes();
            $leSexe->retrieve($result['idSexe']);

            $laClasse = new classes();
            $laClasse->retrieve($result['idClasse']);

            $monEleve = new eleves($result['id'], $result['nom'], $result['prenom'], $leSexe, $laClasse, $result['dateEntree'], $result['dateSortie'], $result['dateNaissance']);

            array_push($mesEleves, $monEleve);
        }
        return $mesEleves;
    }

    public function findAllByJour($dateJour){
        require "db.php";

        $req = $db->prepare("SELECT * FROM eleves WHERE dateEntree <= :dateJ AND dateSortie >= :dateJ ORDER BY nom, prenom");
        $req->bindParam(':dateJ', $dateJour);
        $req->execute();

        require_once "sexes.php";
        require_once "classes.php";

        $mesEleves = array();
        while ($result = $req->fetch()){
            $leSexe = new sexes();
            $leSexe->retrieve($result['idSexe']);

            $laClasse = new classes();
            $laClasse->retrieve($result['idClasse']);

            $monEleve = new eleves($result['id'], $result['nom'], $result['prenom'], $leSexe, $laClasse, $result['dateEntree'], $result['dateSortie'], $result['dateNaissance']);

            array_push($mesEleves, $monEleve);
        }
        return $mesEleves;
    }

    public function countEleveByClasseAndJour($dateJour){
        require "db.php";

        $req = $db->prepare("SELECT c.libelleCourt, COUNT(*) as 'nb' FROM eleves e, classes c WHERE e.idClasse = c.id AND dateEntree <= :dateJ AND dateSortie >= :dateJ GROUP BY c.libelleCourt ORDER BY ordre;");
        $req->bindParam(':dateJ', $dateJour);
        $req->execute();
        
        $monTableau = array();
        while($result = $req->fetch()){
            $monTableau[$result['libelleCourt']] = $result['nb']; 
        }

        return $monTableau;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setnom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $nom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $nom
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $nom
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return mixed
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * @param mixed $nom
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;
    }

    /**
     * @return mixed
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * @param mixed $nom
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
    }

    /**
     * @return mixed
     */
    public function getDateNais()
    {
        return $this->dateNais;
    }

    /**
     * @param mixed $nom
     */
    public function setDateNais($dateNais)
    {
        $this->dateNais = $dateNais;
    }
}