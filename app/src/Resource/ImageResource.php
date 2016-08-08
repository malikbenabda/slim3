<?php
namespace App\Resource;

use App\AbstractResource;
use App\Entity\Image;

/**
 * Class Resource
 * @package App
 */
class ImageResource extends AbstractResource
{
    /**
     * @param string|null $key
     *
     * @return array
     */
    public function get($key = null)
    {
        if ($key === null) {
            $images = $this->entityManager->getRepository('App\Entity\Image')->findAll();

            var_dump($images);
            $images = array_map(
                function ($image) {
                    return $image->getArrayCopy();
                },
                $images
            );

            return $images;
        } else {
            $image = $this->entityManager->getRepository('App\Entity\Image')->findOneBy(
                $key
            );
            if ($image) {
                return $image->getArrayCopy();
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
            $images = $this->entityManager->getRepository('App\Entity\Image')->findBy($key);
            $images = array_map(
                function ($image) {
                    return $image->getArrayCopy();
                },
                $images
            );
            return $images;
        }
        return false;
    }



    /**
     * @param object $image
     *
     * @return boolean
     */
    public function update($post,$key)
{
    $tmp = new Image();
    if ($key!==null){
        $tmp = $this->entityManager->getRepository('App\Entity\Image')->findOneBy($key);
    }
    if ( $post->getSrc()!==null){
        $tmp->setSrc($post->getSrc());
    }
    if ( $post->getTag()!==null){
        $tmp->setTitre($post->getTitre());
    }
    if ( $post->getDate()!==null){
        $tmp->setDate($post->getDate());
    }
    if ( $post->getType()!==null){
        $tmp->setType($post->getType());
    }
    if ( $post->getTitle()!==null){
        $tmp->setTitle($post->getTitle());
    }
    if ( $post->getAnnonceannonce()!==null){
        $tmp->setAnnonceannonce($post->getAnnonceannonce());
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
        $image = $this->entityManager->getRepository('App\Entity\Image')->findOneBy($key);

        $this->entityManager->remove($image);
        $this->entityManager->flush();

        return true;

    }




}
