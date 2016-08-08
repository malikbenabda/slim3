<?php
namespace App\Action;

use App\Resource\ImageResource;

final class ImageAction
{
    private $imageResource;

    public function __construct(ImageResource $resource)
    {
        $this->imageResource = $resource;
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
            $slug += array("annonceannonce" =>$post["annonceannonce"] );
        }




        $images = $this->imageResource->getSelected($slug);
        if ($images) {
            return $response->withJSON($images);
        }
        return $response->withStatus(404, 'No images were found.');

    }






}
