<?php
namespace Inmovilla\DTO;

use InvalidArgumentException;

class PropiedadFichaDTO extends AbstractDTO
{
    public const ARRAY_DATA_KEY = 'ficha';

    public ?string $cod_ofer;
    public ?int $numfotos;
    public ?int $keyacci;
    public ?int $fotoletra;
    public ?int $numagencia;
    public ?int $numsucursal;
    public ?int $codaccion;
    public ?string $acciones;
    public ?string $ref;
    public ?float $latitud;
    public ?float $altitud;
    public ?string $tipomensual;
    public ?float $precioinmo;
    public ?string $nbtipo;
    public ?int $keygrupo;
    public ?string $ciudad;
    public ?string $zona;
    public ?string $energialetra;
    public ?int $energiarecibido;
    public ?string $emisionesletra;
    public ?string $nbconservacion;
    public ?int $key_loca;
    public ?int $key_tipo;
    public ?string $nborientacion;
    public ?int $banyos;
    public ?int $planta;
    public ?int $estadoficha;
    public ?float $m_uties;
    public ?float $m_cons;
    public ?float $m_terraza;
    public ?int $gastos_com;
    public ?int $keyprov;
    public ?string $provincia;
    public ?string $pais;
    public ?string $comunidad;
    public ?int $keyagente;
    public ?int $antiguedad;
    public ?string $altura;
    public ?int $electro;
    public ?int $cocina_inde;
    public ?int $keycalefa;
    public ?int $keyagua;
    public ?int $keycalle;
    public ?int $primera_line;
    public ?int $keyori;
    public ?int $keycarpin;
    public ?int $keycarpinext;
    public ?int $keysuelo;
    public ?int $keyvista;
    public ?string $zonaauxiliar;
    public ?int $x_entorno;
    public ?string $tgascom;
    public ?string $agencia;
    public ?string $web;
    public ?string $emailagencia;
    public ?string $telefono;
    public ?string $email;
    public ?int $keyfachada;
    public ?int $keyelectricidad;
    public ?int $urbanizacion;
    public ?int $terraza;
    public ?int $ascensor;
    public ?int $calefaccion;
    public ?int $aire_con;
    public ?int $video_port;
    public ?int $piscina_com;
    public ?int $luz;
    public ?int $agua;
    public ?int $tv;
    public ?int $todoext;
    public ?int $jardin;
    public ?int $adaptadominus;
    public ?int $luminoso;
    public ?int $vistasdespejadas;
    public ?string $cp;
    public ?string $fechacreacion;
    public ?string $fechaactualizacion;
    public ?int $vercalle;
    public ?int $srvfotos;
    public ?int $soysrv;
    public ?int $tipotour;
    public ?string $euribor;
    public ?string $nbcarpinext;
    public ?string $nbsuelo;
    public ?string $nbcarpin;
    public ?string $nbtodoext;
    public ?string $nbvista;
    public ?string $nbcalefa;
    public ?string $nbagua;
    public ?string $nbcocina_inde;
    public ?string $nbelectro;
    public ?string $nbfachada;
    public ?string $nb_periodo_gascom;
    public ?string $foto;
    public ?int $video;
    public ?int $tourvirtual;
    public string $refcertificado;
    public float $emisionesvalor;
    public float $energiavalor;



    public int $nodisponible;
    public float $precioreal;
    public float $preciotraspaso;
    public int $key_zona;
    public int $m_parcela;
    public int $balcon;
    public int $conservacion;
    public int $calefacentral;
    public int $airecentral;
    public int $plaza_gara;
    public int $montacargas;
    public int $muebles;
    public int $piscina_prop;
    public int $habitaciones;
    public int $total_hab;
    public int $sumaseos;
    public string $repercusion;
    public int $exclu;
    public int $parking;
    public int $distmar;
    public int $precioalq;
    public int $eninternet;
    public int $destacado;
    public int $habdobles;
    public int $destestrella;
    public int $opcioncompra;
    public int $interesante;
    public int $mls;
    public int $keypromo;
    public string $fechacambio;
    public string $fechacambisitemap;
    public string $fechaact;
    public string $fecha;
    public int $entidadbancaria;
    public int $vistasalmar;
    public int $grupomls;
    public int $grupoxmls;
    public int $grupomil;
    public int $x_personal;
    public int $mascotas;
    public int $aconsultar;
    public int $outlet;
    public int $aseos;
    public int $tour_virtual;
    public string $nombreagente;
    public string $apellidosagente;
    public string $emailagente;
    public int $telefono1agente;
    public ?int $telefono2agente; // Puede ser null si no está presente
    public string $fotoagente;

    public string $ibi;

    public int $numplanta;

    public int $parabolica;

    public int $linea_tlf;
    public int $solarium;
    public int $arma_empo;

    public int $trastero;
    public int $puerta_blin;
    public int $satelite;
    public int $despensa;
    public int $bombafriocalor;
    public int $esquina;
    public int $techosaltos;
    public int $nplazasparking;

    public int $comunidadincluida;

    public int $x_extrasnaves;

    public int $comedor;

    public int $sincomision;

    public int $alrobo;

    public int $alarmarobo;

    public int $trifasica;

    public int $alarma;

    public int $salida_humos;

    public int $chimenea;
    public int $patio;
    public int $terrazaacris;
    public int $cajafuerte;

    public int $pergola;

    public int $hidromasaje;

    public int $descalcificador;

    public int $garajedoble;

    public int $mirador;

    public int $barbacoa;

    public int $gimnasio;
    public int $riegoauto;





    /** @var string[]  */
    public array $fotos = [];
    /** @var string[]  */
    public array $descripciones = [];
    /** @var string[]  */
    public array $videos = [];

    /** @var string[]  */
    public int $antesydespues;

    /** @var string[]  */
    public array $fotos_etiquetas = [];

    /** @var string[]  */
    public array $campos_personalizados = [];

    /** @var string[]  */
    public array $documentos = [];



    public static function fromArray(array $data): self
    {
        if (!isset($data['ficha'][1])) {
            throw new InvalidArgumentException("Missing key 'ficha' in data array.");
        }

        /** @var self $instance */
        $instance = parent::fromArray($data['ficha'][1] );

        if (isset($instance->cod_ofer)) {
            $instance->assignRelatedKeys($data, $instance->cod_ofer);
        }

        return $instance;
    }

    private function assignRelatedKeys(array $data, string $cod_ofer): void
    {
            $relatedKeys = [
                'fotos',
                'descripciones',
                'videos',
                'antesydespues',
                'fotos_etiquetas',
                'campos_personalizados',
                'documentos',
            ];

            foreach ($relatedKeys as $key) {
            if (isset($data[$key][$cod_ofer])) {
                $this->{$key} = $data[$key][$cod_ofer];
                }
            }
        }
}