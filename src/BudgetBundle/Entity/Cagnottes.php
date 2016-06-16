<?php

namespace BudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cagnottes
 *
 * @ORM\Table(name="cagnottes")
 * @ORM\Entity(repositoryClass="BudgetBundle\Repository\CagnottesRepository")
 */
class Cagnottes
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
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groups")
    * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
    */
    private $group_id;

    /**
     * @var string
     *
     * @ORM\Column(name="cagnotte_name", type="string", length=255)
     */
    private $cagnotteName;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;


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
     * Set cagnotteName
     *
     * @param string $cagnotteName
     * @return Cagnottes
     */
    public function setCagnotteName($cagnotteName)
    {
        $this->cagnotteName = $cagnotteName;

        return $this;
    }

    /**
     * Get cagnotteName
     *
     * @return string 
     */
    public function getCagnotteName()
    {
        return $this->cagnotteName;
    }

    /**
     * Set value
     *
     * @param float $value
     * @return Cagnottes
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }
}
