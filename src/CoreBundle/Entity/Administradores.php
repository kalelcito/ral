<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * CoreBundle\Entity\Administradores
 *
 * @ORM\Entity(repositoryClass="CoreBundle\Entity\AdministradoresRepository")
 * @ORM\Table(name="administradores")
 */
class Administradores implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $telefono;

    /**
     * @ORM\Column(name="`password`", type="string", length=300, nullable=true)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $salt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $activo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $verificado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create", field="creado")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update", field="updated_at")
     */
    protected $updated_at;

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Administradores
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
     * @return \CoreBundle\Entity\Administradores
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
     * Set the value of apellidos.
     *
     * @param string $apellidos
     * @return \CoreBundle\Entity\Administradores
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of apellidos.
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of email.
     *
     * @param string $email
     * @return \CoreBundle\Entity\Administradores
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of telefono.
     *
     * @param string $telefono
     * @return \CoreBundle\Entity\Administradores
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of telefono.
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * @return \CoreBundle\Entity\Administradores
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of salt.
     *
     * @param string $salt
     * @return \CoreBundle\Entity\Administradores
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get the value of salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\Administradores
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
     * Set the value of verificado.
     *
     * @param boolean $verificado
     * @return \CoreBundle\Entity\Administradores
     */
    public function setVerificado($verificado)
    {
        $this->verificado = $verificado;

        return $this;
    }

    /**
     * Get the value of verificado.
     *
     * @return boolean
     */
    public function getVerificado()
    {
        return $this->verificado;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $creado
     * @return \CoreBundle\Entity\Administradores
     */
    public function setCreatedAt($creado)
    {
        $this->created_at = $creado;

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
     * @param \DateTime $actualizado
     * @return \CoreBundle\Entity\Administradores
     */
    public function setUpdatedAt($actualizado)
    {
        $this->updated_at = $actualizado;

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

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }
}