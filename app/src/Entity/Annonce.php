<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", uniqueConstraints={@ORM\UniqueConstraint(name="idAnnonce_UNIQUE", columns={"idAnnonce"})})
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAnnonce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idannonce;

    /**
     * @var string
     *
     * @ORM\Column(name="AnnonceState", type="string", length=45, nullable=true)
     */
    private $annoncestate;

    /**
     * @var string
     *
     * @ORM\Column(name="coords", type="string", length=45, nullable=true)
     */
    private $coords;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=45, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="rooms", type="integer", nullable=true)
     */
    private $rooms = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="prixTotal", type="integer", nullable=true)
     */
    private $prixtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="extra", type="string", length=245, nullable=true)
     */
    private $extra;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shortCollocation", type="boolean", nullable=true)
     */
    private $shortcollocation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personne", inversedBy="idannonce")
     * @ORM\JoinTable(name="annonce_has_colocs",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idAnnonce", referencedColumnName="idAnnonce")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idOwner", referencedColumnName="idpersonne")
     *   }
     * )
     */
    private $idowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personne", mappedBy="idannoncef")
     */
    private $idpersonnef;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idowner = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idpersonnef = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idannonce
     *
     * @return integer
     */
    public function getIdannonce()
    {
        return $this->idannonce;
    }

    /**
     * Set annoncestate
     *
     * @param string $annoncestate
     *
     * @return Annonce
     */
    public function setAnnoncestate($annoncestate)
    {
        $this->annoncestate = $annoncestate;

        return $this;
    }

    /**
     * Get annoncestate
     *
     * @return string
     */
    public function getAnnoncestate()
    {
        return $this->annoncestate;
    }

    /**
     * Set coords
     *
     * @param string $coords
     *
     * @return Annonce
     */
    public function setCoords($coords)
    {
        $this->coords = $coords;

        return $this;
    }

    /**
     * Get coords
     *
     * @return string
     */
    public function getCoords()
    {
        return $this->coords;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Annonce
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Annonce
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set rooms
     *
     * @param integer $rooms
     *
     * @return Annonce
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms
     *
     * @return integer
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set prixtotal
     *
     * @param integer $prixtotal
     *
     * @return Annonce
     */
    public function setPrixtotal($prixtotal)
    {
        $this->prixtotal = $prixtotal;

        return $this;
    }

    /**
     * Get prixtotal
     *
     * @return integer
     */
    public function getPrixtotal()
    {
        return $this->prixtotal;
    }

    /**
     * Set extra
     *
     * @param string $extra
     *
     * @return Annonce
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set shortcollocation
     *
     * @param boolean $shortcollocation
     *
     * @return Annonce
     */
    public function setShortcollocation($shortcollocation)
    {
        $this->shortcollocation = $shortcollocation;

        return $this;
    }

    /**
     * Get shortcollocation
     *
     * @return boolean
     */
    public function getShortcollocation()
    {
        return $this->shortcollocation;
    }

    /**
     * Add idowner
     *
     * @param \Personne $idowner
     *
     * @return Annonce
     */
    public function addIdowner(\Personne $idowner)
    {
        $this->idowner[] = $idowner;

        return $this;
    }

    /**
     * Remove idowner
     *
     * @param \Personne $idowner
     */
    public function removeIdowner(\Personne $idowner)
    {
        $this->idowner->removeElement($idowner);
    }

    /**
     * Get idowner
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdowner()
    {
        return $this->idowner;
    }

    /**
     * Add idpersonnef
     *
     * @param \Personne $idpersonnef
     *
     * @return Annonce
     */
    public function addIdpersonnef(\Personne $idpersonnef)
    {
        $this->idpersonnef[] = $idpersonnef;

        return $this;
    }

    /**
     * Remove idpersonnef
     *
     * @param \Personne $idpersonnef
     */
    public function removeIdpersonnef(\Personne $idpersonnef)
    {
        $this->idpersonnef->removeElement($idpersonnef);
    }

    /**
     * Get idpersonnef
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdpersonnef()
    {
        return $this->idpersonnef;
    }
}
