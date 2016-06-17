<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appartenir
 *
 * @ORM\Table(name="appartenir")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AppartenirRepository")
 */
class Appartenir
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * 
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user_id;
 
    /**
    * 
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groups")
    * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
    */
    private $group_id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserID()
    {
        return $this->user_id;
    }

    /**
     * Set user_id
     *
     * @param string $user_id
     * @return Appartenir
     */
    public function setUserID($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupID()
    {
        return $this->group_id;
    }

    /**
     * Set group_id
     *
     * @param string $group_id
     * @return Appartenir
     */
    public function setGroupID($group_id)
    {
        $this->group_id = $group_id;

        return $this;
    }


}
