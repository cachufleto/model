<?php
/**
 * IFOCOP nov 2015 - mai 2016
 * User: Valery LE KHANH VAN
 * Date: 17/02/2016
 * Time: 14:21
 */

/**
 * Class De
 * Un dé servira pour notre jeu
 * @author  Valery
 * @since   1.0
 */

require_once '../src/Service/Db/Db.php';
new Service\Db\Db;

class De
{
    /** @var  int on a pas le droit de la mettre public */
    protected $numeroDeFace = 6;

    /**
     * @return int
     */
    public function getNumeroDeFace()
    {
        return $this->numeroDeFace;
    }

    /**
     * @param int $numeroDeFace
     * @return De
     */
    public function setNumeroDeFace($numeroDeFace)
    {
        $this->numeroDeFace = $numeroDeFace;
        return $this;
    }


}

$de = new De;
//$de->numeroDeFace = 3;
var_dump($de->getNumeroDeFace());
// affiche moi l'attribut de l'objet == ->
var_dump($de);
$de->setNumeroDeFace(3);
// l'action "de base" ne retourne rien
var_dump($de->setNumeroDeFace(3));
$de
    ->setNumeroDeFace(1)
    ->setNumeroDeFace(2)
    ->setNumeroDeFace(3)
;
