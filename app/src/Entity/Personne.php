<?php
namespace App\Entity;




use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table(name="personne", uniqueConstraints={@ORM\UniqueConstraint(name="idpersonne_UNIQUE", columns={"idpersonne"})})
 * @ORM\Entity
 */
class Personne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpersonne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=45, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="string", length=45, nullable=true)
     */
    private $occupation;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_state", type="string", length=45, nullable=true)
     */
    private $maritalState;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="Age", type="string", length=45, nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=45, nullable=true)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMessaging", type="integer", nullable=true)
     */
    private $idmessaging;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="profileImage", type="string", length=245, nullable=true)
     */
    private $profileimage;

    /**
     * @var integer
     *
     * @ORM\Column(name="alcoholT", type="integer", nullable=true)
     */
    private $alcoholt = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="smokingT", type="integer", nullable=true)
     */
    private $smokingt = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="noiseT", type="integer", nullable=true)
     */
    private $noiset = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="SleepLightness", type="integer", nullable=true)
     */
    private $sleeplightness = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="cleaness", type="integer", nullable=true)
     */
    private $cleaness = '5';

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="string", length=245, nullable=true)
     */
    private $skills;

    /**
     * @var integer
     *
     * @ORM\Column(name="drinks", type="integer", nullable=true)
     */
    private $drinks = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="smokes", type="integer", nullable=true)
     */
    private $smokes = '5';

    /**
     * @var integer
     *
     * @ORM\Column(name="noisy", type="integer", nullable=true)
     */
    private $noisy = '5';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Annonce", mappedBy="idpersonnefavorits")
     */
    private $idannoncefavorits;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Collocation", inversedBy="idpersonne")
     * @ORM\JoinTable(name="personne_has_collocation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idpersonne", referencedColumnName="idpersonne")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idcollocation", referencedColumnName="idcollocation")
     *   }
     * )
     */
    private $idcollocation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idannoncefavorits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idcollocation = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idpersonne
     *
     * @return integer
     */
    public function getIdpersonne()
    {
        return $this->idpersonne;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Personne
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set occupation
     *
     * @param string $occupation
     *
     * @return Personne
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set maritalState
     *
     * @param string $maritalState
     *
     * @return Personne
     */
    public function setMaritalState($maritalState)
    {
        $this->maritalState = $maritalState;

        return $this;
    }

    /**
     * Get maritalState
     *
     * @return string
     */
    public function getMaritalState()
    {
        return $this->maritalState;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Personne
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
     * Set age
     *
     * @param string $age
     *
     * @return Personne
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Personne
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set idmessaging
     *
     * @param integer $idmessaging
     *
     * @return Personne
     */
    public function setIdmessaging($idmessaging)
    {
        $this->idmessaging = $idmessaging;

        return $this;
    }

    /**
     * Get idmessaging
     *
     * @return integer
     */
    public function getIdmessaging()
    {
        return $this->idmessaging;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Personne
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
     * Set profileimage
     *
     * @param string $profileimage
     *
     * @return Personne
     */
    public function setProfileimage($profileimage)
    {
        $this->profileimage = $profileimage;

        return $this;
    }

    /**
     * Get profileimage
     *
     * @return string
     */
    public function getProfileimage()
    {
        return $this->profileimage;
    }

    /**
     * Set alcoholt
     *
     * @param integer $alcoholt
     *
     * @return Personne
     */
    public function setAlcoholt($alcoholt)
    {
        $this->alcoholt = $alcoholt;

        return $this;
    }

    /**
     * Get alcoholt
     *
     * @return integer
     */
    public function getAlcoholt()
    {
        return $this->alcoholt;
    }

    /**
     * Set smokingt
     *
     * @param integer $smokingt
     *
     * @return Personne
     */
    public function setSmokingt($smokingt)
    {
        $this->smokingt = $smokingt;

        return $this;
    }

    /**
     * Get smokingt
     *
     * @return integer
     */
    public function getSmokingt()
    {
        return $this->smokingt;
    }

    /**
     * Set noiset
     *
     * @param integer $noiset
     *
     * @return Personne
     */
    public function setNoiset($noiset)
    {
        $this->noiset = $noiset;

        return $this;
    }

    /**
     * Get noiset
     *
     * @return integer
     */
    public function getNoiset()
    {
        return $this->noiset;
    }

    /**
     * Set sleeplightness
     *
     * @param integer $sleeplightness
     *
     * @return Personne
     */
    public function setSleeplightness($sleeplightness)
    {
        $this->sleeplightness = $sleeplightness;

        return $this;
    }

    /**
     * Get sleeplightness
     *
     * @return integer
     */
    public function getSleeplightness()
    {
        return $this->sleeplightness;
    }

    /**
     * Set cleaness
     *
     * @param integer $cleaness
     *
     * @return Personne
     */
    public function setCleaness($cleaness)
    {
        $this->cleaness = $cleaness;

        return $this;
    }

    /**
     * Get cleaness
     *
     * @return integer
     */
    public function getCleaness()
    {
        return $this->cleaness;
    }

    /**
     * Set skills
     *
     * @param string $skills
     *
     * @return Personne
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set drinks
     *
     * @param integer $drinks
     *
     * @return Personne
     */
    public function setDrinks($drinks)
    {
        $this->drinks = $drinks;

        return $this;
    }

    /**
     * Get drinks
     *
     * @return integer
     */
    public function getDrinks()
    {
        return $this->drinks;
    }

    /**
     * Set smokes
     *
     * @param integer $smokes
     *
     * @return Personne
     */
    public function setSmokes($smokes)
    {
        $this->smokes = $smokes;

        return $this;
    }

    /**
     * Get smokes
     *
     * @return integer
     */
    public function getSmokes()
    {
        return $this->smokes;
    }

    /**
     * Set noisy
     *
     * @param integer $noisy
     *
     * @return Personne
     */
    public function setNoisy($noisy)
    {
        $this->noisy = $noisy;

        return $this;
    }

    /**
     * Get noisy
     *
     * @return integer
     */
    public function getNoisy()
    {
        return $this->noisy;
    }

    /**
     * Add idannoncefavorit
     *
     * @param \Annonce $idannoncefavorit
     *
     * @return Personne
     */
    public function addIdannoncefavorit(\Annonce $idannoncefavorit)
    {
        $this->idannoncefavorits[] = $idannoncefavorit;

        return $this;
    }

    /**
     * Remove idannoncefavorit
     *
     * @param \Annonce $idannoncefavorit
     */
    public function removeIdannoncefavorit(\Annonce $idannoncefavorit)
    {
        $this->idannoncefavorits->removeElement($idannoncefavorit);
    }

    /**
     * Get idannoncefavorits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdannoncefavorits()
    {
        return $this->idannoncefavorits;
    }

    /**
     * Add idcollocation
     *
     * @param \Collocation $idcollocation
     *
     * @return Personne
     */
    public function addIdcollocation(\Collocation $idcollocation)
    {
        $this->idcollocation[] = $idcollocation;

        return $this;
    }

    /**
     * Remove idcollocation
     *
     * @param \Collocation $idcollocation
     */
    public function removeIdcollocation(\Collocation $idcollocation)
    {
        $this->idcollocation->removeElement($idcollocation);
    }

    /**
     * Get idcollocation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdcollocation()
    {
        return $this->idcollocation;
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
