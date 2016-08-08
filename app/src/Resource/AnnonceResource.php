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
    public function insert($annonce)
    {
        $this->entityManager->persist($annonce);
        $this->entityManager->flush();
        return true;
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
        if ( $post->getTitre()!==null){
            $tmp->setTitre($post->getTitre());
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
