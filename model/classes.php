<?php

class classes
{

    private $id;
    private $libelle;
    private $libelleCourt;
    private $ordre;


    public function __construct($id="", $libelle="", $libelleCourt="", $ordre="")
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->libelleCourt = $libelleCourt;
        $this->ordre = $ordre;
    }

    public function create(){
        require "db.php";

        $req = $db->prepare("INSERT INTO classes VALUES(null, ?, ?, ?)");
        $req->execute(array($this->libelle, $this->libelleCourt, $this->ordre));
    }

    public function retrieve($id){
        require "db.php";

        $req = $db->prepare("SELECT * FROM classes WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();

        $this->id = $result['id'];
        $this->libelle = $result['libelle'];
        $this->libelleCourt = $result['libelleCourt'];
        $this->ordre = $result['ordre'];
    }

    public function update(){
        require "db.php";

        $req = $db->prepare("UPDATE classes SET libelle = ?, libelleCourt = ?, ordre = ? WHERE id = ?");
        $req->execute(array($this->libelle, $this->libelleCourt, $this->ordre, $this->id));
    }

    public function delete($id){
        require "db.php";

        $req = $db->prepare("DELETE FROM classes WHERE id = ?");
        $req->execute(array($id));
    }

    public function findAll(){
        require "db.php";

        $req = $db->prepare("SELECT * FROM classes ORDER BY ordre");
        $req->execute(array());

        $mesMdp = array();
        while ($result = $req->fetch()){
            $monMdp = new classes($result['id'], $result['libelle'], $result['libelleCourt'], $result['ordre']);

            array_push($mesMdp, $monMdp);
        }
        return $mesMdp;
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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getLibelleCourt()
    {
        return $this->libelleCourt;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelleCourt($libelleCourt)
    {
        $this->libelleCourt = $libelleCourt;
    }

    /**
     * @return mixed
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * @param mixed $libelle
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }
}