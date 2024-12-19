<?php
namespace Inmovilla\DTO;

use InvalidArgumentException;

class PropiedadFichaDTO extends AbstractDTO
{
    public const ARRAY_DATA_KEY = 'ficha';

    public ?string $cod_ofer = null;
    public ?int $numfotos = null;
    public ?int $keyacci = null;
    public ?int $fotoletra = null;
    public ?int $numagencia = null;
    public ?int $numsucursal = null;
    public ?int $codaccion = null; // El texto sale en "$acciones":   1 => venta, 6 => Transfer and Rent
    public ?string $acciones = null;
    public ?string $ref = null;
    public ?float $latitud = null;
    public ?float $altitud = null;
    public ?string $tipomensual = null;
    public ?float $precioinmo = null;
    public ?string $nbtipo = null;
    public ?int $keygrupo = null;
    public ?string $ciudad = null;
    public ?string $zona = null;
    public ?string $energialetra = null;
    public ?int $energiarecibido = null;
    public ?string $emisionesletra = null;
    public ?string $nbconservacion = null;
    public ?int $key_loca = null;
    public ?int $key_tipo = null;
    public ?string $nborientacion = null;
    public ?int $banyos = null;
    public ?int $planta = null;
    public ?int $estadoficha = null;
    public ?float $m_uties = null;
    public ?float $m_cons = null;
    public ?float $m_terraza = null;
    public ?int $gastos_com = null;
    public ?int $keyprov = null;
    public ?string $provincia = null;
    public ?string $pais = null;
    public ?string $comunidad = null;
    public ?int $keyagente = null;
    public ?int $antiguedad = null;
    public ?string $altura = null;
    public ?int $electro = null;
    public ?int $cocina_inde = null;
    public ?int $keycalefa = null;
    public ?int $keyagua = null;
    public ?int $keycalle = null;
    public ?int $primera_line = null;
    public ?int $keyori = null;
    public ?int $keycarpin = null;
    public ?int $keycarpinext = null;
    public ?int $keysuelo = null;
    public ?int $keyvista = null;
    public ?string $zonaauxiliar = null;
    public ?int $x_entorno = null;
    public ?string $tgascom = null;
    public ?string $agencia = null;
    public ?string $web = null;
    public ?string $emailagencia = null;
    public ?string $telefono = null;
    public ?string $email = null;
    public ?int $keyfachada = null;
    public ?int $keyelectricidad = null;
    public ?int $urbanizacion = null;
    public ?int $terraza = null;
    public ?int $ascensor = null;
    public ?int $calefaccion = null;
    public ?int $aire_con = null;
    public ?int $video_port = null;
    public ?int $piscina_com = null;
    public ?int $luz = null;
    public ?int $agua = null;
    public ?int $tv = null;
    public ?int $todoext = null;
    public ?int $jardin = null;
    public ?int $adaptadominus = null;
    public ?int $luminoso = null;
    public ?int $vistasdespejadas = null;
    public ?string $cp = null;
    public ?string $fechacreacion = null;
    public ?string $fechaactualizacion = null;
    public ?int $vercalle = null;
    public ?int $srvfotos = null;
    public ?int $soysrv = null;
    public ?int $tipotour = null;
    public ?string $euribor = null;
    public ?string $nbcarpinext = null;
    public ?string $nbsuelo = null;
    public ?string $nbcarpin = null;
    public ?string $nbtodoext = null;
    public ?string $nbvista = null;
    public ?string $nbcalefa = null;
    public ?string $nbagua = null;
    public ?string $nbcocina_inde = null;
    public ?string $nbelectro = null;
    public ?string $nbfachada = null;
    public ?string $nb_periodo_gascom = null;
    public ?string $foto = null;
    public ?int $video = null;
    public ?int $tourvirtual = null;
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
    public ?int $total_hab = null;
    public int $sumaseos;
    public string $repercusion;
    public int $exclu;
    public ?int $parking = null;
    public int $distmar;
    public int $precioalq;
    public int $eninternet;
    public ?int $destacado = null;
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
    public ?int $outlet = null;
    public int $aseos;
    public int $tour_virtual;
    public string $nombreagente;
    public string $apellidosagente;
    public string $emailagente;
    public int $telefono1agente;
    public ?int $telefono2agente = null; // Puede ser null si no está presente
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

    public ?int $buardilla;
    public ?int $sotano;
    public ?int $keytecho; // 3
    public ?int $m_pb; //50;
    public ?int $mtfachada; // 16
    public ?int $m_patio; // 40
    public ?int $sauna; // 1
    public ?int $bar; // 1
    public ?int $lavanderia; // 1

    public ?int $preinstaacc; // 1
    public ?int $depoagua; // 1

    public ?int $gasciudad; // 1
    public ?int $puertasauto; // 1
    public ?int $vivadaptada; // 1
    public ?int $m_sotano; // 145

    public ?int $tipovpo; // 6

    public ?int $ojobuey; // 1
    public ?int $habjuegos; // 1
    //
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