<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="admin")
 */
class Admin
{
    /**
     * @var     int
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $email = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $mdp = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $nom = null;


    public function __construct($email=null, $pass=null, $nom=null)
    {
        $this->setEmail($email);
        $this->setMdp(md5($pass));
        $this->setNom($nom);
    }
    
    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param   int     $id
     * @return  void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param   string  $email
     * @return  void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @return  string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param   string  $mdp
     * @return  void
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return  string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param   string  $nom
     * @return  void
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}