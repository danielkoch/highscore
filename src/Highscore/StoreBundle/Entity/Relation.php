<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 14:17
 */

namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="relation")
     */
    class Relation extends NamedEntity
    {
    }
}