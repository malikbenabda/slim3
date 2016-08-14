<?php
namespace App\Action;

use App\Entity\Annonce;
use App\Resource\AnnonceResource;
use Doctrine\ORM\EntityManager;

final class AnnonceAction
{
    private $annonceResource;

    public function __construct(AnnonceResource $annonceResource)
    {
        $this->annonceResource = $annonceResource;
    }

    public function fetch($request, $response, $args)
    {

        $annonces = $this->annonceResource->get();
        return $response->withJSON($annonces);

    }
    //to get all annonces with that match the criterias
    public function fetchSelected($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
        }

        if ( isset($post["annoncestate"])){
            $slug += array("annoncestate" =>$post["annoncestate"] );
        }

        if ( isset($post["coords"])){
            $slug += array("coords" =>$post["coords"] );
        }

        if ( isset($post["titre"])){
            $slug += array("titre" =>$post["titre"] );
        }
        if ( isset($post["type"])){
            $slug += array("type" =>$post["type"] );
        }
        if ( isset($post["city"])){
            $slug += array("city" =>$post["city"] );
        }
        if ( isset($post["rooms"])){
            $slug += array("rooms" =>$post["rooms"] );
        }
        if ( isset($post["prixtotal"])){
            $slug += array("prixtotal" =>$post["prixtotal"] );
        }



        if ( isset($post["idowner"])){
            $slug += array("idowner" =>$post["idowner"] );
        }
        if ( isset($post["centralheat"])){
            $slug += array("centralheat" =>$post["centralheat"] );
        }
        if ( isset($post["wifi"])){
            $slug += array("wifi" =>$post["wifi"] );
        }
        if ( isset($post["microwave"])){
            $slug += array("microwave" =>$post["microwave"] );
        }
        if ( isset($post["fridge"])){
            $slug += array("fridge" =>$post["fridge"] );
        }
        if ( isset($post["oven"])){
            $slug += array("oven" =>$post["oven"] );
        }
        if ( isset($post["beds"])){
            $slug += array("beds" =>$post["beds"] );
        }
        if ( isset($post["gaz2ville"])){
            $slug += array("gaz2ville" =>$post["gaz2ville"] );
        }
        if ( isset($post["terasse"])){
            $slug += array("terasse" =>$post["terasse"] );
        }
        if ( isset($post["balcon"])){
            $slug += array("balcon" =>$post["balcon"] );
        }
        if ( isset($post["washingmachine"])){
            $slug += array("washingmachine" =>$post["washingmachine"] );
        }
        if ( isset($post["closets"])){
            $slug += array("closets" =>$post["closets"] );
        }
        if ( isset($post["tv"])){
            $slug += array("tv" =>$post["tv"] );
        }
        if ( isset($post["garden"])){
            $slug += array("garden" =>$post["garden"] );
        }
        if ( isset($post["cookwares"])){
            $slug += array("cookwares" =>$post["cookwares"] );
        }

        if ( isset($post["animals"])){
            $slug += array("animals" =>$post["animals"] );
        }

        if ( isset($post["genderpreference"])){
            $slug += array("genderpreference" =>$post["genderpreference"] );
        }
        if ( isset($post["smoking"])){
            $slug += array("smoking" =>$post["smoking"] );
        }
        if ( isset($post["rating"])){
            $slug += array("rating" =>$post["rating"] );
        }

        $annonces = $this->annonceResource->getSelected($slug);
        if ($annonces) {
            return $response->withJSON($annonces);
        }
        return $response->withStatus(404, 'No annonces with that criteria was found.');

    }

    public function fetchOne($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
        }

        if ( isset($post["coords"])){
            $slug += array("coords" =>$post["coords"] );
        }

        if ( isset($post["titre"])){
            $slug += array("titre" =>$post["titre"] );
        }


        if ( isset($post["idowner"])){
            $slug += array("idowner" =>$post["idowner"] );
        }




        $annonce = $this->annonceResource->get($slug);
        if ($annonce) {
            return $response->withJSON($annonce);
        }
        return $response->withStatus(404, 'No annonces found.');
    }

    public function update($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $tmp= new Annonce();

            if ( isset($post["idannonce"])){
                $tmp->setIdannonce($post["idannonce"]);$key=array("idannonce" =>$post["idannonce"]);}


            if ( isset($post["annoncestate"])){
                $tmp->setAnnoncestate($post["annoncestate"]);
            }
            if ( isset($post["coords"])){
                $tmp->setCoords($post["coords"]);
            }
            if ( isset($post["titre"])){
                $tmp->setTitre($post["titre"]);
            }
            if ( isset($post["type"])){
                $tmp->setType($post["type"]);
            }
            if ( isset($post["city"])){
                $tmp->setCity($post["city"]);
            }
            if ( isset($post["rooms"])){
                $tmp->setRooms($post["rooms"]);
            }
            if ( isset($post["prixtotal"])){
                $tmp->setPrixtotal($post["prixtotal"]);
            }
//*****************************************************

        if ( isset($post["idowner"])){
            $tmp->setIdowner($post["idowner"]);
        }
        if ( isset($post["centralheat"])){
            $tmp->setCentralheat($post["centralheat"]);
        }
        if ( isset($post["wifi"])){
            $tmp->setWifi($post["wifi"]);
        }
        if ( isset($post["microwave"])){
            $tmp->setMicrowave($post["microwave"]);
        }
        if ( isset($post["fridge"])){
            $tmp->setFridge($post["fridge"]);
        }
        if ( isset($post["oven"])){
            $tmp->setOven($post["oven"]);
        }
        if ( isset($post["beds"])){
            $tmp->setBeds($post["beds"]);
        }
        if ( isset($post["gaz2ville"])){
            $tmp->setGaz2ville($post["gaz2ville"]);
        }
        if ( isset($post["terasse"])){
            $tmp->setTerasse($post["terasse"]);
        }
        if ( isset($post["balcon"])){
            $tmp->setBalcon($post["balcon"]);
        }
        if ( isset($post["washingmachine"])){
            $tmp->setWashingmachine($post["washingmachine"]);
        }
        if ( isset($post["closets"])){
            $tmp->setClosets($post["closets"]);
        }

        if ( isset($post["tv"])){
            $tmp->setTv($post["tv"]);
        }
        if ( isset($post["garden"])){
            $tmp->setGarden($post["garden"]);
        }

        if ( isset($post["cookwares"])){
            $tmp->setCookwares($post["cookwares"]);
        }
        if ( isset($post["airconditioning"])){
            $tmp->setAirconditioning($post["airconditioning"]);
        }

        if ( isset($post["animals"])){
            $tmp->setAnimals($post["animals"]);
        }
        if ( isset($post["genderpreference"])){
            $tmp->setGenderpreference($post["genderpreference"]);
        }

        if ( isset($post["smoking"])){
            $tmp->setSmoking($post["smoking"]);
        }
        if ( isset($post["rating"])){
            $tmp->setRating($post["rating"]);
        }


        $this->annonceResource->update($tmp , $key= null);
            return $response->withJSON(" update #"+post["idannonce"]+" success");

      return $response->withStatus(405, 'No idannonce was passed.');



    }

    public function remove($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idannonce"])){
            $slug = array("idannonce" =>$post["idannonce"] );
        } else  return $response->withStatus(405, 'No idannonce was passed.');



        $rep = $this->annonceResource->delete($slug);
        if ($rep) {
            return $response->withJSON("deleted with success");
        }else
        return $response->withStatus(404, 'No annonce like that found.');
    }
}
