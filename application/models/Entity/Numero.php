<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="numero")
 */
class Numero
{
    /**
     * @var     bigint
     * @Id
     * @Column(type="bigint")
     * @GeneratedValue
     */
    protected $id = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $attr = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $tel = null;

    /**
     * @var     \Entity\Etudiant    
     * @ManyToOne(targetEntity="Entity\Etudiant", inversedBy="numeros")
     */
    protected $etudiant = null;


    public function __construct($attr=null, $tel=null, $etudiant=null)
    {
        $this->setAttr($attr);
        $this->setTel($tel);

        $this->setEtudiant($etudiant);
    }
    
    /**
     * @return  bigint
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param   bigint     $id
     * @return  void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
    }
    
    public function getAttr()
    {
        return $this->attr;
    }
    public function setAttr($attr)
    {
        $this->attr = $attr;
    }
    public function getEtudiant()
    {
        return $this->etudiant;
    }
    public function setEtudiant(Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;
    }

}