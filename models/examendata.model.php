<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.


/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerListas()
{
    $sqlstr = "select `solicitud`.`yiul_codigo`,
    `solicitud`.`yiul_plugin`,
    `solicitud`.`yiul_estado`,
    `solicitud`.`yiul_urlhomepage`,
    `solicitud`.`yiul_urlcdn`
FROM `examenw`.`solicitud`";

    $modas = array();
    $modas = obtenerRegistros($sqlstr);
    return $modas;
}

function obtenerDatoPorId($id)
{
  $sqlstr="select `solicitud`.`yiul_codigo`,
  `solicitud`.`yiul_plugin`,
  `solicitud`.`yiul_estado`,
  `solicitud`.`yiul_urlhomepage`,
  `solicitud`.`yiul_urlcdn`
FROM `examenw`.`solicitud` where yiul_codigo=%d";
  $examenw= array();
  $examenw=obtenerUnRegistro(sprintf($sqlstr, $id));
  return $examenw;
}

function obtenerEstados()
{
    return array(
        array("cod"=>"ACT", "dsc"=>"Activo"),
        array("cod"=>"INA", "dsc"=>"Inactivo"),
        array("cod"=>"PLN", "dsc"=>"En Planificación"),
        array("cod"=>"RET", "dsc"=>"Retirado"),
        array("cod"=>"SUS", "dsc"=>"Suspendido"),
        array("cod"=>"DES", "dsc"=>"Descontinuado")
    );
}

function agregarNuevodato($dscplugin, $dscestado, $dschome,$dsccdn) {
    $insSql = "INSERT INTO solicitud(yiul_plugin, yiul_estado, yiul_urlhomepage,yiul_urlcdn)
      values ('%s','%s', '%s','%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $dscplugin,
              $dscestado,
              $dschome,
              $dsccdn

          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificardato($dscplugin, $dscestado, $dschome, $dsccdn,$desccodigo)
{
    $updSQL = "UPDATE solicitud set yiul_plugin='%s', yiul_estado='%s',yiul_urlhomepage='%s',
    yiul_urlcdn='%s' where yiul_codigo=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $dscplugin,
            $dscestado,
            $dschome,
            $dsccdn,
            $desccodigo

        )
    );
}
function eliminardato($desccodigo)
{
    $delSQL = "DELETE FROM solicitud where yiul_codigo=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $desccodigo
        )
    );
}

?>
