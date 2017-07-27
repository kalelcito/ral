<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $country = array(
            'AF'=>'Afganistán',
            'AL'=>'Albania',
            'DE'=>'Alemania',
            'AD'=>'Andorra',
            'AO'=>'Angola',
            'AI'=>'Anguila',
            'AQ'=>'Antártica',
            'AG'=>'Antigua y Barbuda',
            'AN'=>'Antillas Holandesas',
            'SA'=>'Arabia Saudá',
            'DZ'=>'Argelia',
            'AR'=>'Argentina',
            'AM'=>'Armenia',
            'AW'=>'Aruba',
            'AU'=>'Australia',
            'AT'=>'Austria',
            'AZ'=>'Azerbaiján',
            'BE'=>'Bélgica',
            'BS'=>'Bahamas',
            'BH'=>'Bahrain',
            'BD'=>'Bangladesh',
            'BB'=>'Barbados',
            'BY'=>'Belarus',
            'BZ'=>'Belice',
            'BJ'=>'Benin',
            'BM'=>'Bermuda',
            'BO'=>'Bolivia',
            'BA'=>'Bosnia-Hercegovina',
            'BW'=>'Botswana',
            'BR'=>'Brasil',
            'BN'=>'Brunei Darussalam',
            'BG'=>'Bulgaria',
            'BF'=>'Burkina Faso',
            'BI'=>'Burundi',
            'BT'=>'Bután',
            'CV'=>'Cabo Verde',
            'KH'=>'Camboya',
            'CM'=>'Camerún',
            'CA'=>'Canadá',
            'TD'=>'Chad',
            'CL'=>'Chile',
            'CN'=>'China',
            'CY'=>'Chipre',
            'VA'=>'Ciudad del Vaticano',
            'CO'=>'Colombia',
            'KM'=>'Comoras',
            'CG'=>'Congo',
            'KP'=>'Corea del Norte',
            'KR'=>'Corea del Sur',
            'CI'=>'Costa de Marfil',
            'CR'=>'Costa Rica',
            'HR'=>'Croacia',
            'CU'=>'Cuba',
            'DK'=>'Dinamarca',
            'DJ'=>'Djibuti',
            'DM'=>'Dominica',
            'EC'=>'Ecuador',
            'EG'=>'Egipto',
            'SV'=>'El Salvador',
            'AE'=>'Emiratos Árabes Unidos',
            'ER'=>'Eritrea',
            'SK'=>'Eslovaquia',
            'SI'=>'Eslovenia',
            'SP'=>'España',
            'EE'=>'Estonia',
            'ET'=>'Etiopía',
            'RU'=>'Federación Rusa',
            'FJ'=>'Fiji',
            'PH'=>'Filipinas',
            'FI'=>'Finlandia',
            'FR'=>'Francia',
            'FX'=>'Francia Metropolitana',
            'GA'=>'Gabón',
            'GM'=>'Gambia',
            'GE'=>'Georgia',
            'GS'=>'Georgia del Sur e Islas Sandwich del Sur',
            'GH'=>'Ghana',
            'GI'=>'Gibraltar',
            'GR'=>'Grecia',
            'GL'=>'Groenlandia',
            'GP'=>'Guadalupe',
            'GU'=>'Guam',
            'GT'=>'Guatemala',
            'GF'=>'Guayana Francesa',
            'GN'=>'Guinea',
            'GQ'=>'Guinea Ecuatorial',
            'GW'=>'Guinea-Bissau',
            'GY'=>'Guyana',
            'HT'=>'Haití',
            'HN'=>'Honduras',
            'HK'=>'Hong Kong',
            'HU'=>'Hungría',
            'IN'=>'India',
            'ID'=>'Indonesia',
            'IR'=>'Irán',
            'IQ'=>'Irak',
            'IE'=>'Irlanda',
            'BV'=>'Isla Bouvet',
            'CX'=>'Isla Christmas',
            'NF'=>'Isla Norfolk',
            'IS'=>'Islandia',
            'KY'=>'Islas Caimanes',
            'CC'=>'Islas Cocos (Keeling)',
            'CK'=>'Islas Cook',
            'FO'=>'Islas Faroe',
            'HM'=>'Islas Heard y Mc Donald',
            'FK'=>'Islas Malvinas',
            'MP'=>'Islas Marianas Septentrionales',
            'MH'=>'Islas Marshall',
            'SB'=>'Islas Salomón',
            'SJ'=>'Islas Svalbard y Jan Mayen',
            'TC'=>'Islas Turks y Caicos',
            'VG'=>'Islas Vírgenes (Británicas)',
            'VI'=>'Islas Vírgenes (EEUU)',
            'WF'=>'Islas Wallis y Futuna',
            'IL'=>'Israel',
            'IT'=>'Italia',
            'JM'=>'Jamaica',
            'JP'=>'Japón',
            'JO'=>'Jordania',
            'QA'=>'Katar',
            'KZ'=>'Kazajistán',
            'KE'=>'Kenia',
            'KG'=>'Kirguizistán',
            'KI'=>'Kiribati',
            'KW'=>'Kuwait',
            'LB'=>'Líbano',
            'LA'=>'Laos, República Popular',
            'LS'=>'Lesoto',
            'LV'=>'Letonia',
            'LR'=>'Liberia',
            'LY'=>'Libia',
            'LI'=>'Liechtenstein',
            'LT'=>'Lituania',
            'LU'=>'Luxemburgo',
            'MX'=>'México',
            'MC'=>'Mónaco',
            'MO'=>'Macao',
            'MK'=>'Macedonia',
            'MG'=>'Madagascar',
            'MY'=>'Malasia',
            'MW'=>'Malaui',
            'MV'=>'Maldivas',
            'ML'=>'Mali',
            'MT'=>'Malta',
            'MA'=>'Marruecos',
            'MQ'=>'Martinica',
            'MU'=>'Mauricio',
            'MR'=>'Mauritania',
            'YT'=>'Mayotte',
            'FM'=>'Micronesia',
            'MD'=>'Moldova',
            'MN'=>'Mongolia',
            'MS'=>'Montserrat',
            'MZ'=>'Mozambique',
            'MM'=>'Myanmar',
            'NE'=>'Níger',
            'NA'=>'Namibia',
            'NR'=>'Nauru',
            'NP'=>'Nepal',
            'NI'=>'Nicaragua',
            'NG'=>'Nigeria',
            'NU'=>'Niue',
            'NO'=>'Noruega',
            'NC'=>'Nueva Caledonia',
            'NZ'=>'Nueva Zelanda',
            'OM'=>'Omán',
            'NL'=>'Países Bajos',
            'PK'=>'Pakistán',
            'PW'=>'Palau',
            'PA'=>'Panamá',
            'PG'=>'Papua Nueva Guinea',
            'PY'=>'Paraguay',
            'PE'=>'Perú',
            'PN'=>'Pitcairn',
            'PF'=>'Polinesia Francesa',
            'PL'=>'Polonia',
            'PT'=>'Portugal',
            'PR'=>'Puerto Rico',
            'GB'=>'Reino Unido',
            'SY'=>'República Árabe de Siria',
            'CF'=>'República Centroafricana',
            'CZ'=>'República Checa',
            'DO'=>'República Dominicana',
            'RE'=>'Reunión',
            'RW'=>'Ruanda',
            'RO'=>'Rumanía',
            'EH'=>'Sahara Occidental',
            'WS'=>'Samoa',
            'AS'=>'Samoa Americana',
            'KN'=>'San Cristóbal y Nevis',
            'SM'=>'San Marino',
            'VC'=>'San Vicente y las Granadinas',
            'SH'=>'Santa Elena',
            'LC'=>'Santa Lucía',
            'ST'=>'Santo Tomé y Príncipe',
            'SN'=>'Senegal',
            'YU'=>'Serbia y Montenegro',
            'SC'=>'Seychelles',
            'SL'=>'Sierra Leona',
            'SG'=>'Singapur',
            'SO'=>'Somalía',
            'LK'=>'Sri Lanka',
            'PM'=>'St Pierre y Miquelon',
            'SZ'=>'Suazilandia',
            'ZA'=>'Sudáfrica',
            'SD'=>'Sudán',
            'SE'=>'Suecia',
            'CH'=>'Suiza',
            'SR'=>'Surinam',
            'TN'=>'Túnez',
            'TH'=>'Tailandia',
            'TW'=>'Taiwan',
            'TZ'=>'Tanzanía',
            'TJ'=>'Tayiquistán',
            'TF'=>'Territorios australes y antárticos franceses',
            'IO'=>'Territorios Británicos del Océano Índico',
            'TP'=>'Timor Oriental',
            'TG'=>'Togo',
            'TK'=>'Tokelau',
            'TO'=>'Tonga',
            'TT'=>'Trinidad y Tobago',
            'TM'=>'Turkmenistán',
            'TR'=>'Turquía',
            'TV'=>'Tuvalu',
            'UA'=>'Ucrania',
            'UG'=>'Uganda',
            'UY'=>'Uruguay',
            'US'=>'USA',
            'UZ'=>'Uzbekistán',
            'VU'=>'Vanuatu',
            'VE'=>'Venezuela',
            'VN'=>'Vietnam',
            'YE'=>'Yemen',
            'ZR'=>'Zaire',
            'ZM'=>'Zambia',
            'ZW'=>'Zimbabue',
        );
        $countries = array_flip($country);
        $temas = array(
          'Compra de Lubricantes Automotrices'=>'Compra de Lubricantes Automotrices',
          'Compra de Lubricantes Industriales'=>'Compra de Lubricantes Industriales',
          'Información Técnica'=>'Pregunta Técnica',
          'Ubicación de Distribuidores'=>'Ubicación de Distribuidores',
          'Distribuciones Disponibles'=>'Distribuciones Disponibles',
          'Servicios de Lubricación'=>'Servicios de Lubricación',
          'Depto. Recursos Humanos'=>'Recursos Humanos',
          'Otros Temas'=>'Otros Temas'
        );
        $builder->add('pais',ChoiceType::class, array(
            'label' => 'Selecciona un País',
            'choices' => array('Selecciona un País'=>$countries),
            'expanded' => false,
            'multiple' => false,
            'required' => true,
            'placeholder' => false,
            'data'=>'MX'
            ))
            ->add('tema',ChoiceType::class,array(
                'label'=>'Selecciona un Tema',
                'choices'=>array('Selecciona un Tema'=>$temas),
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'placeholder' => false
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Correo Electrónico',
                'required'=>true,
                'constraints' => array(
                    new Email(array(
                        'message' => 'El correo electrónico \'{{ value }}\' no es válido',
                    )),
                    new NotBlank(array(
                        'message' => 'Ingresa un correo electrónico',
                    )),
                    new Length(array('min' => 3,
                        'minMessage' => 'El correo electrónico debe ser mayor a {{ limit }} dígitos',)),
                ),
                'attr' => array('placeholder' => 'Correo Electrónico','autocomplete'=>'off'),
                'trim' => true
            ))
            ->add('cliente',ChoiceType::class,array(
                'label'=>'Cliente Actual',
                'choices'=>array('Cliente Actual'=>array('Si'=>1,'No'=>0)),
                'expanded' => true,
                'multiple' => false,
                'required' => true
            ))
            ->add('descripcion', TextareaType::class,array(
                'label' => 'Descripción, pregunta o requerimiento',
                'required'=>true,
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa una descripción, pregunta o requerimiento',
                    )),
                ),
                'attr' => array('placeholder' => 'Descripción, pregunta o requerimiento','rows'=>'5','autocomplete'=>'off')
            ))
            ->add('nombre', TextType::class,array(
                'label' => 'Nombre',
                'required'=>true,
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa un nombre',
                    )),
                    new Length(array('min' => 3,
                        'minMessage' => 'El nombre debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Nombre(s)','autocomplete'=>'off')
            ))
            ->add('apellidos', TextType::class,array(
                'label' => 'Apellidos',
                'required'=>true,
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa un apellido',
                    )),
                    new Length(array('min' => 3,
                        'minMessage' => 'El apellido debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Apellido(s)','autocomplete'=>'off')
            ))
            ->add('empresa', TextType::class,array(
                'label' => 'Empresa o Negocio',
                'required'=>false,
                'constraints' => array(
                    new Length(array('min' => 3,
                        'minMessage' => 'La empresa debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Empresa','autocomplete'=>'off')
            ))
            ->add('giro', TextType::class,array(
                'label' => 'Giro',
                'required'=>false,
                'constraints' => array(
                    new Length(array('min' => 3,
                        'minMessage' => 'El giro debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Giro','autocomplete'=>'off')
            ))
            ->add('ciudad', TextType::class,array(
                'label' => 'Ciudad',
                'required'=>false,
                'constraints' => array(
                    new Length(array('min' => 3,
                        'minMessage' => 'La ciudad debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Ciudad','autocomplete'=>'off')
            ))
            ->add('estado', TextType::class,array(
                'label' => 'Provincia/Estado',
                'required'=>false,
                'constraints' => array(
                    new Length(array('min' => 3,
                        'minMessage' => 'La Provincia/Estado debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Provincia/Estado','autocomplete'=>'off')
            ))
            ->add('cp', TextType::class,array(
                'label' => 'Código Postal',
                'required'=>false,
                'constraints' => array(
                    new Length(array('min' => 5,
                        'minMessage' => 'El Código Postal debe ser mayor a {{ limit }} números',
                    )),
                ),
                'attr' => array('placeholder' => 'Código Postal','autocomplete'=>'off')
            ))
            ->add('telefono', TextType::class,array(
                'label' => 'Teléfono (con lada)',
                'required'=>true,
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa un Teléfono',
                    )),
                    new Length(array('min' => 7,
                        'minMessage' => 'El teléfono debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Teléfono (con lada)','autocomplete'=>'off')
            ))
            ->add('enviar', SubmitType::class,  array(
                    'label' => 'Enviar')
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'contact';
    }
}
