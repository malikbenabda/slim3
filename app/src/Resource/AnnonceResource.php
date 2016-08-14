<?php
namespace App\Resource;

use App\AbstractResource;
use App\Entity\Annonce;

/**
 * Class Resource
 * @package App
 */
class AnnonceResource extends AbstractResource
{
    /**
     * @param string|null $key
     *
     * @return array
     */
    public function get($key = null)
    {
        if ($key === null) {
            $annonces = $this->entityManager->getRepository('App\Entity\Annonce')->findAll();
            $annonces = array_map(
                function ($annonce) {
                    return $annonce->getArrayCopy();
                },
                $annonces
            );

            return $annonces;
        } else {
            $annonce = $this->entityManager->getRepository('App\Entity\Annonce')->findOneBy(
                $key
            );
            if ($annonce) {
                return $annonce->getArrayCopy();
            }
        }

        return false;
    }

    /**
     * @param string|null $key
     *
     * @return array
     */
    public function getSelected($key = null)
    {
        if ( !($key === null)) {
            $annonces = $this->entityManager->getRepository('App\Entity\Annonce')->findBy($key);
            $annonces = array_map(
                function ($annonce) {
                    return $annonce->getArrayCopy();
                },
                $annonces
            );
    return $annonces;
        }
        return false;
    }


    /**
     * @param object $annonce
     *
     * @return boolean
     */
    public function update($post,$key)

    {

        $tmp = new Annonce();

        if ( $key!== null)
        $tmp = $this->entityManager->getRepository('App\Entity\Annonce')->findOneBy($key);


        if ($post->getAnnoncestate()!==null){
            $tmp->setAnnoncestate($post->getAnnoncestate());
        }
        if ( $post->getCoords()!==null){
            $tmp->setCoords($post->getCoords());
        }
        if ( $post->getTitre()!==null){
            $tmp->setTitre($post->getTitre());
        }
        if ( $post->getType()!==null){
            $tmp->setCity($post->getType());
        }
        if ( $post->getCity()!==null){
            $tmp->setTitre($post->getCity());
        }
        if ( $post->getRooms()!==null){
            $tmp->setRooms($post->getRooms());
        }
        if ( $post->getPrixtotal()!==null){
            $tmp->setPrixtotal($post->getPrixtotal());
        }

        //***************************
        if ( $post->getIdowner()!==null){
            $tmp->setIdowner($post->getIdowner());
        }
        if ( $post->getCentralheat()!==null){
            $tmp->setCentralheat($post->getCentralheat());
        }
        if ( $post->getWifi()!==null){
            $tmp->setWifi($post->getWifi());
        }
        if ( $post->getMicrowave()!==null){
            $tmp->setMicrowave($post->getMicrowave());
        }
        if ( $post->getFridge()!==null){
            $tmp->setFridge($post->getFridge());
        }
        if ( $post->getOven()!==null){
            $tmp->setOven($post->getOven());
        }
        if ( $post->getBeds()!==null){
            $tmp->setBeds($post->getBeds());
        }
        if ( $post->getGaz2ville()!==null){
            $tmp->setGaz2ville($post->getGaz2ville());
        }
        if ( $post->getTerasse()!==null){
            $tmp->setTerasse($post->getTerasse());
        }
        if ( $post->getBalcon()!==null){
            $tmp->setBalcon($post->getBalcon());
        }
        if ( $post->getWashingmachine()!==null){
            $tmp->setWashingmachine($post->getWashingmachine());
        }
        if ( $post->getClosets()!==null){
            $tmp->setClosets($post->getClosets());
        }
        if ( $post->getTv()!==null){
            $tmp->setTv($post->getTv());
        }
        if ( $post->getGarden()!==null){
            $tmp->setGarden($post->getGarden());
        }
        if ( $post->getCookwares()!==null){
            $tmp->setCookwares($post->getCookwares());
        }
        if ( $post->getAirconditioning()!==null){
            $tmp->setAirconditioning($post->getAirconditioning());
        }
        if ( $post->getAnimals()!==null){
            $tmp->setAnimals($post->getAnimals());
        }
        if ( $post->getGenderpreference()!==null){
            $tmp->setGenderpreference($post->getGenderpreference());
        }
        if ( $post->getSmoking()!==null){
            $tmp->setSmoking($post->getSmoking());
        }
        $this->entityManager->persist($tmp);
        $this->entityManager->flush();
        return true;
    }






    /**
     * @param String $key
     *
     * @return boolean
     */
    public function delete($key)
    {
        $annonces = $this->entityManager->getRepository('App\Entity\Annonce')->findBy($key);
    if (!($annonces=== null) ){
        foreach ($annonces as $annonce) {
            $this->entityManager->remove($annonce);
        }
        $this->entityManager->flush();
        return true;
    }
        return false;
}


}
