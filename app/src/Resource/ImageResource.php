<?php

namespace App\Resource;

use App\AbstractResource;

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
     * @param object $image
     *
     * @return boolean
     */
    public function update($image)
{
    $this->entityManager->persist($image);
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



}
