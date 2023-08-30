<?php

class sexes
{

    private $id;
    private $libelle;


    public function __construct($id="", $libelle="")
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    public function create(){
        require "db.php";

        $req = $db->prepare("INSERT INTO sexes VALUES(null, ?)");
        $req->execute(array($this->libelle));
    }

    public function retrieve($id){
        require "db.php";

        $req = $db->prepare("SELECT * FROM sexes WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();

        $this->id = $result['id'];
        $this->libelle = $result['libelle'];
    }

    public function update(){
        require "db.php";

        $req = $db->prepare("UPDATE sexes SET libelle = ? WHERE id = ?");
        $req->execute(array($this->libelle, $this->id));
    }

    public function delete($id){
        require "db.php";

        $req = $db->prepare("DELETE FROM sexes WHERE id = ?");
        $req->execute(array($id));
    }

    public function findAll(){
        require "db.php";

        $req = $db->prepare("SELECT * FROM sexes ORDER BY libelle");
        $req->execute(array());

        $mesMdp = array();
        while ($result = $req->fetch()){
            $monMdp = new sexes($result['id'], $result['libelle']);

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
}