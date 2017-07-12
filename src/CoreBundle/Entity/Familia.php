<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 3.0.3 (doctrine2-annotation) on 2017-07-10 11:37:38.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Familia
 *
 * @ORM\Entity()
 * @ORM\Table(name="familia", indexes={@ORM\Index(name="fk_familia_categoria_idx", columns={"id_categoria"})})
 */
class Familia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $id_categoria;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    protected $orden;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $activo;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @Gedmo\Timestampable(on="update", field="actualizado")
     *
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="Productos", mappedBy="familia")
     * @ORM\JoinColumn(name="id", referencedColumnName="id_familia", nullable=false)
     */
    protected $productos;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="familias")
     * @ORM\JoinColumn(name="id_categoria", referencedColumnName="id", nullable=false)
     */
    protected $categoria;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    public function __toString() {
        return $this->nombre;
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Familia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id_categoria.
     *
     * @param integer $id_categoria
     * @return \CoreBundle\Entity\Familia
     */
    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }

    /**
     * Get the value of id_categoria.
     *
     * @return integer
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\Familia
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of orden.
     *
     * @param integer $orden
     * @return \CoreBundle\Entity\Familia
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get the value of orden.
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\Familia
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of activo.
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Familia
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of created_at.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of updated_at.
     *
     * @param \DateTime $updated_at
     * @return \CoreBundle\Entity\Familia
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of updated_at.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add Productos entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Productos $productos
     * @return \CoreBundle\Entity\Familia
     */
    public function addProductos(Productos $productos)
    {
        $this->productos[] = $productos;

        return $this;
    }

    /**
     * Remove Productos entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Productos $productos
     * @return \CoreBundle\Entity\Familia
     */
    public function removeProductos(Productos $productos)
    {
        $this->productos->removeElement($productos);

        return $this;
    }

    /**
     * Get Productos entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set Categoria entity (many to one).
     *
     * @param \CoreBundle\Entity\Categoria $categoria
     * @return \CoreBundle\Entity\Familia
     */
    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get Categoria entity (many to one).
     *
     * @return \CoreBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function __sleep()
    {
        return array('id', 'id_categoria', 'nombre', 'orden', 'activo', 'created_at', 'updated_at');
    }
}