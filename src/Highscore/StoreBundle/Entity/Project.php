<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blorenz
 * Date: 15.07.12
 * Time: 13:03
 * To change this template use File | Settings | File Templates.
 */

namespace Highscore\StoreBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="project")
     */
    class Project extends NamedEntity
    {

    }
}