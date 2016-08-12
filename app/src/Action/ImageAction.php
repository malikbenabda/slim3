<?php
namespace App\Action;

use App\Entity\Image;
use App\Resource\ImageResource;

/*
 * image Types  :
 * 0  : profile image
 * 1  : annonce cover image
 * 2  : interior images of annonce
 */



final class ImageAction
{
    private $imageResource;

    public function __construct( ImageResource $imageResource)
    {
        $this->imageResource = $imageResource;
    }


    public function fetchAll($request, $response, $args)
    {

        $images = $this->imageResource->get();
        return $response->withJSON($images);

    }


    public function fetchOne($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $idimage = $post["idimage"];

        //$slug = array($key=>$value);
        $image = $this->imageResource->get($idimage);
        if ($image) {
            return $response->withJSON($image);
        }
        return $response->withStatus(404, 'No image found with that slug.');
    }


    public function fetchSelected($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idimage"])){
            $slug += array("idimage" =>$post["idimage"] );
        }

        if ( isset($post["date"])){
            $slug += array("date" =>$post["date"] );
        }

        if ( isset($post["type"])){
            $slug += array("type" =>$post["type"] );
        }

        if ( isset($post["annonceannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
        }




        $images = $this->imageResource->getSelected($slug);
        if ($images) {
            return $response->withJSON($images);
        }
        return $response->withStatus(404, 'No images were found.');

    }

    //insert if id not passed
    public function updateImage($request, $response, $args)
    {
        $post = $request->getParsedBody();

        $tmp= new Image();

        if ( isset($post["idimage"]))           $key=array("idimage" =>$post["idimage"]);

        if ( isset($post["src"]))     {$tmp->setSrc($post["src"]);}
        if ( isset($post["tag"]))     {$tmp->setTag($post["tag"]);}
        if ( isset($post["date"]))     {$tmp->setDate($post["date"]);}
        if ( isset($post["type"]))     {$tmp->setType($post["type"]);}
        if ( isset($post["title"]))     {$tmp->setTitle($post["title"]);}
        if ( isset($post["idannonce"]))     {$tmp->setIdannonce($post["idannonce"]);}

        $rez=  $this->imageResource->update($tmp , $key = null);
        if ( $rez)
        return $response->withJSON(" update image success");

        else return $response->withStatus(405, 'No idannonce was passed.');

    }
}

