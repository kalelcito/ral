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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CoreBundle\Entity\Categoria
 *
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\searchRepository")
 * @ORM\Table(name="categoria")
 */
class Categoria
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     * @Assert\File(mimeTypes={ "image/jpg" , "image/jpeg" , "image/gif" , "image/png"}, mimeTypesMessage="Tipo de Archivo no válido. Permitidos: {{ types }}")
     */
    protected $imagen;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $color;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $orden;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $activo;

    /**
     * @Gedmo\Slug(separator="-", updatable=true, fields={"nombre"})
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $metakeys;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $metadesc;

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
     * @ORM\OneToMany(targetEntity="Familia", mappedBy="categoria")
     * @ORM\JoinColumn(name="id", referencedColumnName="id_categoria", nullable=false)
     */
    protected $familias;

    public function __construct()
    {
        $this->familias = new ArrayCollection();
    }

    public function __toString() {
        return $this->nombre;
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Categoria
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
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\Categoria
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
     * Set the value of descripcion.
     *
     * @param string $descripcion
     * @return \CoreBundle\Entity\Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of imagen.
     *
     * @param string $imagen
     * @return \CoreBundle\Entity\Categoria
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of imagen.
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of color.
     *
     * @param string $color
     * @return \CoreBundle\Entity\Categoria
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of orden.
     *
     * @param integer $orden
     * @return \CoreBundle\Entity\Categoria
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
     * @return \CoreBundle\Entity\Categoria
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
     * Set the value of slug.
     *
     * @param string $slug
     * @return \CoreBundle\Entity\Categoria
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of metakeys.
     *
     * @param string $metakeys
     * @return \CoreBundle\Entity\Categoria
     */
    public function setMetakeys($metakeys)
    {
        $this->metakeys = $metakeys;

        return $this;
    }

    /**
     * Get the value of metakeys.
     *
     * @return string
     */
    public function getMetakeys()
    {
        return $this->metakeys;
    }

    /**
     * Set the value of metadesc.
     *
     * @param string $metadesc
     * @return \CoreBundle\Entity\Categoria
     */
    public function setMetadesc($metadesc)
    {
        $this->metadesc = $metadesc;

        return $this;
    }

    /**
     * Get the value of metadesc.
     *
     * @return string
     */
    public function getMetadesc()
    {
        return $this->metadesc;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Categoria
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
     * @return \CoreBundle\Entity\Categoria
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
     * Add Familia entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Familia $familia
     * @return \CoreBundle\Entity\Categoria
     */
    public function addFamilia(Familia $familia)
    {
        $this->familias[] = $familia;

        return $this;
    }

    /**
     * Remove Familia entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Familia $familia
     * @return \CoreBundle\Entity\Categoria
     */
    public function removeFamilia(Familia $familia)
    {
        $this->familias->removeElement($familia);

        return $this;
    }

    /**
     * Get Familia entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFamilias()
    {
        return $this->familias;
    }

    public function __sleep()
    {
        return array('id', 'nombre', 'descripcion', 'imagen', 'color', 'orden', 'activo', 'slug', 'metakeys', 'metadesc', 'created_at', 'updated_at');
    }
}