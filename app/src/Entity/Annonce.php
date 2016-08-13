<?php

namespace App\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", uniqueConstraints={@ORM\UniqueConstraint(name="idAnnonce_UNIQUE", columns={"idAnnonce"})}, indexes={@ORM\Index(name="fk_annonce_personne1_idx", columns={"idOwner"})})
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
     * @var integer
     *
     * @ORM\Column(name="surface", type="integer", nullable=true)
     */
    private $surface;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wifi", type="boolean", nullable=true)
     */
    private $wifi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="centralheat", type="boolean", nullable=true)
     */
    private $centralheat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="microwave", type="boolean", nullable=true)
     */
    private $microwave;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fridge", type="boolean", nullable=true)
     */
    private $fridge;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oven", type="boolean", nullable=true)
     */
    private $oven;

    /**
     * @var boolean
     *
     * @ORM\Column(name="beds", type="boolean", nullable=true)
     */
    private $beds;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gaz2ville", type="boolean", nullable=true)
     */
    private $gaz2ville;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terasse", type="boolean", nullable=true)
     */
    private $terasse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="balcon", type="boolean", nullable=true)
     */
    private $balcon;

    /**
     * @var boolean
     *
     * @ORM\Column(name="washingMachine", type="boolean", nullable=true)
     */
    private $washingmachine;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tv", type="boolean", nullable=true)
     */
    private $tv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="closets", type="boolean", nullable=true)
     */
    private $closets;

    /**
     * @var boolean
     *
     * @ORM\Column(name="garden", type="boolean", nullable=true)
     */
    private $garden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="smoking", type="boolean", nullable=true)
     */
    private $smoking;

    /**
     * @var string
     *
     * @ORM\Column(name="animals", type="string", length=45, nullable=true)
     */
    private $animals;

    /**
     * @var boolean
     *
     * @ORM\Column(name="genderPreference", type="boolean", nullable=true)
     */
    private $genderpreference;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cookWares", type="boolean", nullable=true)
     */
    private $cookwares;

    /**
     * @var boolean
     *
     * @ORM\Column(name="airConditioning", type="boolean", nullable=true)
     */
    private $airconditioning;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="idpersonne")
     * })
     */
    private $idowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personne", inversedBy="idannoncefavorits")
     * @ORM\JoinTable(name="favorites",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idAnnonceFavorits", referencedColumnName="idAnnonce")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idPersonneFavorits", referencedColumnName="idpersonne")
     *   }
     * )
     */
    private $idpersonnefavorits;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpersonnefavorits = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set surface
     *
     * @param integer $surface
     *
     * @return Annonce
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return integer
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set wifi
     *
     * @param boolean $wifi
     *
     * @return Annonce
     */
    public function setWifi($wifi)
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * Get wifi
     *
     * @return boolean
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * Set centralheat
     *
     * @param boolean $centralheat
     *
     * @return Annonce
     */
    public function setCentralheat($centralheat)
    {
        $this->centralheat = $centralheat;

        return $this;
    }

    /**
     * Get centralheat
     *
     * @return boolean
     */
    public function getCentralheat()
    {
        return $this->centralheat;
    }

    /**
     * Set microwave
     *
     * @param boolean $microwave
     *
     * @return Annonce
     */
    public function setMicrowave($microwave)
    {
        $this->microwave = $microwave;

        return $this;
    }

    /**
     * Get microwave
     *
     * @return boolean
     */
    public function getMicrowave()
    {
        return $this->microwave;
    }

    /**
     * Set fridge
     *
     * @param boolean $fridge
     *
     * @return Annonce
     */
    public function setFridge($fridge)
    {
        $this->fridge = $fridge;

        return $this;
    }

    /**
     * Get fridge
     *
     * @return boolean
     */
    public function getFridge()
    {
        return $this->fridge;
    }

    /**
     * Set oven
     *
     * @param boolean $oven
     *
     * @return Annonce
     */
    public function setOven($oven)
    {
        $this->oven = $oven;

        return $this;
    }

    /**
     * Get oven
     *
     * @return boolean
     */
    public function getOven()
    {
        return $this->oven;
    }

    /**
     * Set beds
     *
     * @param boolean $beds
     *
     * @return Annonce
     */
    public function setBeds($beds)
    {
        $this->beds = $beds;

        return $this;
    }

    /**
     * Get beds
     *
     * @return boolean
     */
    public function getBeds()
    {
        return $this->beds;
    }

    /**
     * Set gaz2ville
     *
     * @param boolean $gaz2ville
     *
     * @return Annonce
     */
    public function setGaz2ville($gaz2ville)
    {
        $this->gaz2ville = $gaz2ville;

        return $this;
    }

    /**
     * Get gaz2ville
     *
     * @return boolean
     */
    public function getGaz2ville()
    {
        return $this->gaz2ville;
    }

    /**
     * Set terasse
     *
     * @param boolean $terasse
     *
     * @return Annonce
     */
    public function setTerasse($terasse)
    {
        $this->terasse = $terasse;

        return $this;
    }

    /**
     * Get terasse
     *
     * @return boolean
     */
    public function getTerasse()
    {
        return $this->terasse;
    }

    /**
     * Set balcon
     *
     * @param boolean $balcon
     *
     * @return Annonce
     */
    public function setBalcon($balcon)
    {
        $this->balcon = $balcon;

        return $this;
    }

    /**
     * Get balcon
     *
     * @return boolean
     */
    public function getBalcon()
    {
        return $this->balcon;
    }

    /**
     * Set washingmachine
     *
     * @param boolean $washingmachine
     *
     * @return Annonce
     */
    public function setWashingmachine($washingmachine)
    {
        $this->washingmachine = $washingmachine;

        return $this;
    }

    /**
     * Get washingmachine
     *
     * @return boolean
     */
    public function getWashingmachine()
    {
        return $this->washingmachine;
    }

    /**
     * Set tv
     *
     * @param boolean $tv
     *
     * @return Annonce
     */
    public function setTv($tv)
    {
        $this->tv = $tv;

        return $this;
    }

    /**
     * Get tv
     *
     * @return boolean
     */
    public function getTv()
    {
        return $this->tv;
    }

    /**
     * Set closets
     *
     * @param boolean $closets
     *
     * @return Annonce
     */
    public function setClosets($closets)
    {
        $this->closets = $closets;

        return $this;
    }

    /**
     * Get closets
     *
     * @return boolean
     */
    public function getClosets()
    {
        return $this->closets;
    }

    /**
     * Set garden
     *
     * @param boolean $garden
     *
     * @return Annonce
     */
    public function setGarden($garden)
    {
        $this->garden = $garden;

        return $this;
    }

    /**
     * Get garden
     *
     * @return boolean
     */
    public function getGarden()
    {
        return $this->garden;
    }

    /**
     * Set smoking
     *
     * @param boolean $smoking
     *
     * @return Annonce
     */
    public function setSmoking($smoking)
    {
        $this->smoking = $smoking;

        return $this;
    }

    /**
     * Get smoking
     *
     * @return boolean
     */
    public function getSmoking()
    {
        return $this->smoking;
    }

    /**
     * Set animals
     *
     * @param string $animals
     *
     * @return Annonce
     */
    public function setAnimals($animals)
    {
        $this->animals = $animals;

        return $this;
    }

    /**
     * Get animals
     *
     * @return string
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * Set genderpreference
     *
     * @param boolean $genderpreference
     *
     * @return Annonce
     */
    public function setGenderpreference($genderpreference)
    {
        $this->genderpreference = $genderpreference;

        return $this;
    }

    /**
     * Get genderpreference
     *
     * @return boolean
     */
    public function getGenderpreference()
    {
        return $this->genderpreference;
    }

    /**
     * Set cookwares
     *
     * @param boolean $cookwares
     *
     * @return Annonce
     */
    public function setCookwares($cookwares)
    {
        $this->cookwares = $cookwares;

        return $this;
    }

    /**
     * Get cookwares
     *
     * @return boolean
     */
    public function getCookwares()
    {
        return $this->cookwares;
    }

    /**
     * Set airconditioning
     *
     * @param boolean $airconditioning
     *
     * @return Annonce
     */
    public function setAirconditioning($airconditioning)
    {
        $this->airconditioning = $airconditioning;

        return $this;
    }

    /**
     * Get airconditioning
     *
     * @return boolean
     */
    public function getAirconditioning()
    {
        return $this->airconditioning;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Annonce
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set idowner
     *
     * @param \Personne $idowner
     *
     * @return Annonce
     */
    public function setIdowner(\Personne $idowner = null)
    {
        $this->idowner = $idowner;

        return $this;
    }

    /**
     * Get idowner
     *
     * @return \Personne
     */
    public function getIdowner()
    {
        return $this->idowner;
    }

    /**
     * Add idpersonnefavorit
     *
     * @param \Personne $idpersonnefavorit
     *
     * @return Annonce
     */
    public function addIdpersonnefavorit(\Personne $idpersonnefavorit)
    {
        $this->idpersonnefavorits[] = $idpersonnefavorit;

        return $this;
    }

    /**
     * Remove idpersonnefavorit
     *
     * @param \Personne $idpersonnefavorit
     */
    public function removeIdpersonnefavorit(\Personne $idpersonnefavorit)
    {
        $this->idpersonnefavorits->removeElement($idpersonnefavorit);
    }

    /**
     * Get idpersonnefavorits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdpersonnefavorits()
    {
        return $this->idpersonnefavorits;
    }



    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
