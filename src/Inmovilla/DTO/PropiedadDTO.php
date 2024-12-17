<?php
namespace Inmovilla\DTO;
/**
 * @method static PropiedadDTO fromArray(array $data)
 */
class PropiedadDTO extends AbstractDTO implements PaginableDTOInterface
{
    public string $cod_ofer;
    public int $keyacci;
    public int $banyos;
    public string $ref;
    public int $nodisponible;
    public float $precioreal;
    public float $preciotraspaso;
    public float $precioinmo;
    public int $key_loca;
    public int $key_zona;
    public int $key_tipo;
    public int $m_parcela;
    public int $balcon;
    public float $m_cons;
    public int $m_uties;
    public int $conservacion;
    public int $calefacentral;
    public int $airecentral;
    public int $plaza_gara;
    public int $terraza;
    public int $ascensor;
    public int $montacargas;
    public int $muebles;
    public int $calefaccion;
    public int $aire_con;
    public int $primera_line;
    public int $piscina_com;
    public int $piscina_prop;
    public int $habitaciones;
    public int $total_hab;
    public int $sumaseos;
    public string $repercusion;
    public int $exclu;
    public int $parking;
    public int $todoext;
    public int $distmar;
    public int $numagencia;
    public int $estadoficha;
    public int $precioalq;
    public int $keycalefa;
    public int $eninternet;
    public string $zonaauxiliar;
    public int $urbanizacion;
    public int $destacado;
    public int $habdobles;
    public int $destestrella;
    public int $opcioncompra;
    public int $m_terraza;
    public int $interesante;
    public float $altitud;
    public float $latitud;
    public int $mls;
    public int $numfotos;
    public int $fotoletra;
    public int $keypromo;
    public string $fechacambio;
    public string $fechacambisitemap;
    public string $fechaact;
    public string $fecha;
    public int $entidadbancaria;
    public int $vistasalmar;
    public int $grupomls;
    public int $numsucursal;
    public int $energiarecibido;
    public int $vistasdespejadas;
    public int $grupoxmls;
    public int $grupomil;
    public int $x_personal;
    public int $mascotas;
    public int $aconsultar;
    public int $outlet;
    public int $aseos;
    public string $tipomensual;
    public int $keyagente;
    public int $tour_virtual;
    public int $srvfotos;
    public int $soysrv;
    public string $agencia;
    public string $ciudad;
    public string $zona;
    public string $nbtipo;
    public string $nbconservacion;
    public int $keyprov;
    public string $nombreagente;
    public string $apellidosagente;
    public string $emailagente;
    public int $telefono1agente;
    public ?int $telefono2agente; // Puede ser null si no está presente
    public string $fotoagente;
    public string $foto;

}