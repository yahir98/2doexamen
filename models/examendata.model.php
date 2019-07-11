<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.
FROM `examen`.`juguetes`;
*/
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

function agregarNuevodato($dscjuguete, $prcjuguete, $estjuguete) {
    $insSql = "INSERT INTO juguetes(nomjuguete, preciojuguete, estadojuguete)
      values ('%s', %f, '%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $dscjuguete,
              $prcjuguete,
              $estjuguetes
          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificarJuguete($dscjuguete, $prcjuguete, $estjuguete, $idjuguete)
{
    $updSQL = "UPDATE juguetes set nomjuguete='%s', preciojuguete=%f,
    estadojuguete='%s' where idjuguetes=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $dscjuguete,
            $prcjuguete,
            $estjuguete,
            $idjuguete
        )
    );
}
function eliminarJuguete($idjuguete)
{
    $delSQL = "DELETE FROM juguetes where idjuguetes=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $idjuguete
        )
    );
}

?>
