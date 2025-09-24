<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soporte Tecnico</title>

</head>

<?php


require "../php/Model/ModeloMoneda.php";
$moneda = new ModeloMoneda;
// $moneda ->VerDolarModelo();}

require '../php/Model/ModeloNotif.php';
$notificacion = new NotifiModelo();

require "TopBar.php";
date_default_timezone_set('America/Caracas');

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h3 class="card-title">Soporte Tecnico</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-inicio-tab" data-toggle="pill"
                href="#custom-tabs-four-inicio" role="tab" aria-controls="custom-tabs-four-inicio"
                aria-selected="true">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-proceso-tab" data-toggle="pill" href="#custom-tabs-four-proceso"
                role="tab" aria-controls="custom-tabs-four-proceso" aria-selected="false">Procesos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-consultas-tab" data-toggle="pill"
                href="#custom-tabs-four-consultas" role="tab" aria-controls="custom-tabs-four-consultas"
                aria-selected="false">Consultas</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">

            <div class="tab-pane fade show active" id="custom-tabs-four-inicio" role="tabpanel"
              aria-labelledby="custom-tabs-four-inicio-tab">

              <h4 class="">Incio de Sesion</h4>
              <hr>
              <div class="row">

                <div class="col">
                  <h5 class="">Campos Obligatorios (*)</h5>

                  Los campos marcados con (*) son <strong>claves</strong> para el registro de tu inmueble ó otro
                  proceso. Por favor, dedica tiempo a
                  completarlos con información <strong>precisa y veraz</strong>. Recuerda que estos datos son
                  fundamentales para que el
                  proceso sea exitoso y para que podamos brindarte el mejor servicio. <br>
                  <strong>¡Tu colaboración es muy importante!</strong>
                </div>
                <div class="col">
                  <video class="rounded mt-4" autoplay loop muted width="100%">
                    <source src="../public/video/CampoObligatorio.mp4" type="video/mp4">
                  </video>
                </div>

              </div>

              <hr>
              <div class="row">
                <div class="col">
                  <h5 class="">Documentos Adjuntos</h5>
                  En esta sección tu colaboración es esencial, encontrarás campos que te pedirá adjuntar documentos
                  marcados como obligatorios. Es indispensable que completes todos estos campos con información veraz y
                  precisa. Recuerda que la exactitud de los datos es fundamental para un proceso exitoso.
                  Además, esto se le pedira para que respalden la información proporcionada. Es importante que cada
                  documento adjunto no exceda 1MB de peso. Asegúrate de que los documentos sean legibles y estén en
                  formatos compatibles (PDF). <br>
                  <strong>Documentos adjuntos comunes:</strong>
                  <ul>

                    <li>Copia de la cédula de identidad del propietario.</li>
                    <li>Documento de propiedad del inmueble.</li>
                    <li>Constancia Catastral</li>
                    <li>Titulo Supletorio</li>
                    <li>Cualquier otro documento que se solicite específicamente en el formulario.</li>

                  </ul>
                </div>
                <div class="col">
                  <img src="../public/images/CamposDocumentos.jpg" class="rounded mt-5" alt="">
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col">
                  <img src="../public/images/Calendario.jpeg" class="rounded" alt="" height="350">
                </div>
                <div class="col">
                  <h5 class="">Calendario de Citas Aprobadas</h5>
                  En esta sección, podrás visualizar las citas que han sido aprobadas para la atención de tu trámite.
                  Las citas se muestran organizadas por día, facilitando la planificación de tu visita. <br><br>
                  <ul>
                    <li>
                      <strong>Organización por día</strong>: Las citas se agrupan por fecha, mostrando claramente los
                      días con citas
                      disponibles.
                    </li>
                    <li>
                      <strong>Múltiples citas por día</strong>: Si tienes más de una cita programada para el mismo día,
                      se mostrarán
                      todas
                      debajo de la fecha correspondiente.
                    </li>
                    <li>
                      <strong>Lista de Citas Aprobadas</strong>: En la parte inferior de la sección del calendario,
                      encontrarás una
                      lista
                      completa de todas tus citas aprobadas. Desde esta lista, podrás acceder a la opción de imprimir el
                      certificado de cada cita.
                    </li>
                  </ul>

                </div>

              </div>

              <hr>
              <div class="row">

                <div class="col-8">
                  <h5 class="">Buscador en el Menú Lateral</h5>
                  Para facilitar tu navegación y acceso a las funciones de la plataforma, hemos incluido un menú lateral
                  con un buscador integrado.

                  Buscador: Utiliza el buscador ingresando palabras clave relacionadas con la acción que deseas
                  realizar. Por ejemplo, si deseas consultar tus citas, puedes escribir "citas" y el buscador te
                  mostrará opciones como "Calendario de Citas Aprobadas" o "Lista de Citas Aprobadas".
                  <ul>
                    <li>
                      <strong>Organización por día</strong>: Las citas se agrupan por fecha, mostrando claramente los
                      días con citas
                      disponibles.
                    </li>
                    <li>
                      <strong>Múltiples citas por día</strong>: Si tienes más de una cita programada para el mismo día,
                      se mostrarán
                      todas
                      debajo de la fecha correspondiente.
                    </li>
                    <li>
                      <strong>Lista de Citas Aprobadas</strong>: En la parte inferior de la sección del calendario,
                      encontrarás una
                      lista
                      completa de todas tus citas aprobadas. Desde esta lista, podrás acceder a la opción de imprimir el
                      certificado de cada cita.
                    </li>
                  </ul>

                </div>
                <div class="col">
                  <video class="rounded" autoplay loop muted height="100%">
                    <source src="../public/video/Menu.mp4" type="video/mp4">
                  </video>
                </div>

              </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-proceso" role="tabpanel"
              aria-labelledby="custom-tabs-four-proceso-tab">

              <h4>Guia Sobre los Procesos</h4>
              <hr>
              <div class="row">
                <div class="col-5 col-sm-3">
                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link active" id="vert-tabs-quees-tab" data-toggle="pill" href="#vert-tabs-quees"
                      role="tab" aria-controls="vert-tabs-quees" aria-selected="true">Que es un Proceso Catastral?</a>
                    <a class="nav-link" id="vert-tabs-ats-tab" data-toggle="pill" href="#vert-tabs-ats" role="tab"
                      aria-controls="vert-tabs-ats" aria-selected="false">Autorización de Titulo Supletorio</a>
                    <a class="nav-link" id="vert-tabs-avaluo-tab" data-toggle="pill" href="#vert-tabs-avaluo" role="tab"
                      aria-controls="vert-tabs-avaluo" aria-selected="false">Avaluo</a>
                    <a class="nav-link" id="vert-tabs-cep-tab" data-toggle="pill" href="#vert-tabs-cep" role="tab"
                      aria-controls="vert-tabs-cep" aria-selected="false">Cambio de Estructura Parcelaria</a>
                    <a class="nav-link" id="vert-tabs-cita-tab" data-toggle="pill" href="#vert-tabs-cita" role="tab"
                      aria-controls="vert-tabs-cita" aria-selected="false">Cita</a>
                    <a class="nav-link" id="vert-tabs-contrato-tab" data-toggle="pill" href="#vert-tabs-contrato"
                      role="tab" aria-controls="vert-tabs-contrato" aria-selected="false">Contrato</a>
                    <a class="nav-link" id="vert-tabs-empadronamiento-tab" data-toggle="pill"
                      href="#vert-tabs-empadronamiento" role="tab" aria-controls="vert-tabs-empadronamiento"
                      aria-selected="false">Empadronamiento</a>
                    <a class="nav-link" id="vert-tabs-inscripcion-tab" data-toggle="pill" href="#vert-tabs-inscripcion"
                      role="tab" aria-controls="vert-tabs-inscripcion" aria-selected="false">Inscripcion Catastral</a>
                    <a class="nav-link" id="vert-tabs-inspeccion-tab" data-toggle="pill" href="#vert-tabs-inspeccion"
                      role="tab" aria-controls="vert-tabs-inspeccion" aria-selected="false">Inspeccion</a>
                    <a class="nav-link" id="vert-tabs-rtt-tab" data-toggle="pill" href="#vert-tabs-rtt" role="tab"
                      aria-controls="vert-tabs-rtt" aria-selected="false">Restructuración de la Tenencia de Tierra</a>
                  </div>
                </div>
                <div class="col-7 col-sm-9">
                  <div class="tab-content" id="vert-tabs-tabContent">
                    <div class="tab-pane text-left fade show active" id="vert-tabs-quees" role="tabpanel"
                      aria-labelledby="vert-tabs-quees-tab">
                      <div class="row">
                       
                        <div class="col">
                          Un proceso catastral es un conjunto de actividades técnicas y administrativas que tienen como
                          objetivo crear, mantener y actualizar el catastro de un territorio. El catastro es un
                          inventario
                          público y sistemático de los bienes inmuebles, que incluye información sobre sus
                          características
                          físicas (ubicación, tamaño, límites), jurídicas (titularidad, gravámenes) y económicas (valor
                          catastral).
                        </div>
                        <div class="col">
                          <img src="../public/images/actividades.webp" class="rounded" alt="" width="390">
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-empadronamiento" role="tabpanel"
                      aria-labelledby="vert-tabs-empadronamiento-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Empadronamiento</strong>?</h5>
                          Es un proceso mediante el cual un representante legal de su <strong>entidad comercial</strong>
                          ó
                          <strong>persona jurídica</strong> deberá realizar una solicitud para registrar su
                          establecimiento o
                          actividad económica. Este registro permitirá contar con información precisa y detallada sobre
                          su
                          negocio, lo cual es esencial para diversos fines, como el cumplimiento de normativas, la
                          participación
                          en programas y beneficios, la obtención de licencias y permisos, y la actualización de datos
                          en
                          el
                          catastro comercial.
                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Empadronamiento</strong>".
                              En el cual rellenara el formulario de esta solicitud en el cual pedira información
                              requerida,
                              como los datos de tu propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple
                              con
                              los requisitos y si es necesario realizar el empadronamiento. Es suficiente la información
                              proporcionada en la solicitud para resolver la situación.

                            </li>
                            <li>

                              <strong>3. El Empadronamiento</strong>
                              <br>
                              Se realizará la aprobación a su solicitud y se verificarán las medidas y linderos
                              existentes, se
                              tomarán las medidas necesarias, se le creara su cedula catastral y un
                              informe técnico detallado.

                              <ul>

                                <strong>En caso de que el empadronamiento revele cambios, errores o discrepancias en los
                                  datos</strong>, se procederá a realizar la rectificaciones correspondientes. Este
                                proceso
                                puede implicar la elaboración de una inspección, nuevos planos y documentos que reflejen
                                los
                                datos reales de su propiedad.

                              </ul>

                            </li>

                          </ul>

                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-avaluo" role="tabpanel"
                      aria-labelledby="vert-tabs-avaluo-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Avaluo</strong> ó <strong>Avaluación Economica</strong>?</h5>
                          Es un proceso mediante el cual un <strong>tasador</strong> o <strong>perito
                            especializado</strong>
                          evalua
                          diferentes aspectos, como las características físicas, la ubicación, el estado de
                          conservación,
                          los
                          acabados, las dimensiones, la antigüedad, el valor de mercado de propiedades similares en la
                          zona,
                          entre otros factores relevantes, lo cual es esencial para determinar su valor justo.
                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Avaluación Economica</strong>".
                              En el cual rellenara el formulario de esta solicitud en el cual pedira información
                              requerida,
                              como los datos de tu propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo de técnicos la evaluará para determinar si
                              cumple
                              con los requisitos y si es necesario realizar un avaluo.

                            </li>
                            <li>

                              <strong>3. El Avaluo o Avaluación Economica</strong>
                              <br>
                              Se Avaluoara su propiedad por un técnico especializado. Durante el avaluo se
                              evalua diferentes aspectos y entre otros factores relevantes, se tomarán las medidas
                              necesarias y
                              se elaborará un informe técnico detallado.

                              <ul>

                                <strong>En caso de que el avaluo revele errores o discrepancias</strong>, se procederá a
                                realizar la rectificaciones correspondientes. Este proceso puede implicar la elaboración
                                de una
                                Inspeccion.

                              </ul>

                            </li>

                          </ul>
                          <i class="text-warning bi bi-exclamation-triangle-fill"></i>
                          <strong>Generación Automática de Solicitudes
                            en Otros Procesos Catastrales</strong>
                          <i class="text-warning bi bi-exclamation-triangle-fill"></i>
                          <br>
                          <ul>
                            Es importante destacar que, en algunos casos, otros procesos catastrales pueden requerir un
                            avaluo como parte de sus trámites. En estos casos, se generará automáticamente la solicitud
                            de
                            avaluo correspondiente, sin necesidad de que el usuario realice una solicitud adicional.
                          </ul>

                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-inspeccion" role="tabpanel"
                      aria-labelledby="vert-tabs-inspeccion-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Inspección</strong> ó <strong>Rectificación de
                              Medidas y Linderos</strong>?</h5>
                          Es un proceso mediante el cual un <strong>técnico especializado</strong> visitará su
                          inmueble para evaluar diferentes aspectos, como el estado de las
                          instalaciones, el cumplimiento de normativas y la seguridad. Esta visita nos permite obtener
                          información precisa y detallada sobre su propiedad, lo cual es esencial.
                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Rectificación de Medidas y Linderos</strong>".
                              En el cual rellenara el formulario de esta solicitud en el cual pedira información
                              requerida,
                              como los datos de tu propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple
                              con
                              los requisitos y si es necesario realizar una inspección en campo. En algunos casos,
                              podría
                              ser
                              suficiente la información proporcionada en la solicitud para resolver la situación.

                            </li>
                            <li>

                              <strong>3. La Inspección o Rectificación de Medidas y Linderos</strong>
                              <br>
                              Se programará una visita a su propiedad con un técnico especializado. Durante la
                              inspección,
                              se
                              verificarán las medidas y linderos existentes, se tomarán las medidas necesarias y se
                              elaborará un
                              informe técnico detallado.

                              <ul>

                                <strong>En caso de que la inspección revele errores o discrepancias en las medidas y
                                  linderos</strong>, se procederá a realizar la rectificaciones correspondientes. Este
                                proceso
                                puede implicar la elaboración de nuevos planos y documentos que reflejen los datos
                                reales
                                de su
                                propiedad.

                              </ul>

                            </li>

                          </ul>
                          <i class="text-warning bi bi-exclamation-triangle-fill"></i>
                          <strong>Generación Automática de Solicitudes
                            en Otros Procesos Catastrales</strong>
                          <i class="text-warning bi bi-exclamation-triangle-fill"></i>
                          <br>
                          <ul>
                            Es importante destacar que, en algunos casos, otros procesos catastrales pueden requerir una
                            inspección como parte de sus trámites. En estos casos, se generará automáticamente la
                            solicitud de
                            inspección correspondiente, sin necesidad de que el usuario realice una solicitud adicional.
                          </ul>

                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-inscripcion" role="tabpanel"
                      aria-labelledby="vert-tabs-inscripcion-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Inscripción Catastral</strong> ó <strong>Ficha Catastral</strong>?</h5>
                          Es un proceso mediante el cual el <strong>propietario del inmueble</strong> o su
                          <strong>representante legal</strong> debe realizar un registro de la propiedad.
                          Esta inscripción permite obtener una identificación única para el inmueble, lo cual es
                          esencial para diversos fines, como la actualización de datos, la participación en trámites y
                          procesos relacionados con la propiedad, la obtención de documentos y certificados catastrales,
                          y la seguridad jurídica del inmueble.
                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Registro</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>Procesos</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Inscripcion Catastral</strong>".
                              En el cual rellenara el formulario de la inscripcion en el cual pedira información
                              requerida, como los datos de la propiedad, documentos que acrediten la titularidad, entre
                              otros.

                            </li>
                            <li>

                              <strong>2. La Inscripción Catastral o Ficha Catastral</strong>
                              <br>
                              Se programará una inspección con un técnico especializado y un avaluacion con un perito
                              especializado, donde verificarán los datos del inmueble, se tomarán las medidas necesarias
                              y se elaborará un informe técnico detallado.

                              <ul>

                                <strong>En caso de que la inspección revele errores o discrepancias en el
                                  proceso</strong>, se procederá a realizar la rectificaciones correspondientes. Este
                                puede implicar la elaboración de una inspección, un avaluo, nuevos planos y documentos
                                que reflejen los datos reales de la propiedad.

                              </ul>

                            </li>

                          </ul>
                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-ats" role="tabpanel" aria-labelledby="vert-tabs-ats-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Evacuación de Titulo Supletorio</strong>?</h5>

                          Es un proceso legal mediante el cual se busca obtener un <strong>título de propiedad</strong>
                          formal para un
                          inmueble que carece de documentación completa o adecuada. Este proceso se inicia ante un
                          tribunal y requiere la presentación de pruebas que demuestren la posesión pacífica y continua
                          del inmueble durante un período de tiempo establecido por la ley, así como la realización de
                          una inspección técnica por parte de un ingeniero o arquitecto. Esta inspección permitirá
                          obtener información precisa y detallada sobre las características del inmueble, como sus
                          dimensiones, linderos, construcciones existentes y estado general, lo cual es esencial para la
                          elaboración del título supletorio.
                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>Solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Evacuar Titulo Supletorio</strong>".
                              En el cual rellenara el formulario de la solicitud en el cual pedira información
                              requerida, como los datos de la propiedad, tipo de documentos(Notariado o Registrado),
                              entre
                              otros.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple con los requisitos y si es necesario realizar una inspección en campo. En algunos
                              casos, podría ser suficiente la información proporcionada en la solicitud para resolver la
                              situación.

                            </li>
                            <li>

                              <strong>2. La Evacuación de Titulo Supletorio</strong>
                              <br>
                              Se generará un documento que tendra que ser retirado en la dirección de catastro, con el
                              cual le
                              permitira la realización de otros procesos catastrales.
                              <ul>

                                <strong>En caso de que la evacuación de titulo supletorio revele errores o discrepancias
                                  en el proceso</strong>, se procederá a realizar la rectificaciones correspondientes.
                                Este
                                puede implicar la elaboración de documentos que reflejen los datos reales de la
                                propiedad.

                              </ul>

                            </li>

                          </ul>
                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-rtt" role="tabpanel" aria-labelledby="vert-tabs-rtt-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Regulación de la Tenencia de Tierra</strong> ó <strong>R.T.T</strong> ?
                          </h5>

                          Es un proceso mediante el cual un equipo técnico y legal especializado analizará la situación
                          de su propiedad para determinar si cumple con los requisitos establecidos por la ley para la
                          regularización de la tenencia de la tierra. Este análisis puede implicar la revisión de
                          documentos, la realización de estudios técnicos y la verificación de la ocupación del
                          inmueble. El objetivo principal es brindarle seguridad jurídica sobre su propiedad,
                          permitiéndole obtener el título de propiedad correspondiente y ejercer plenamente sus derechos
                          sobre la misma.

                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>Solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Regulación de la Tenencia de Tierra</strong>".
                              En el cual rellenara el formulario de la solicitud en el cual pedira información
                              requerida, como los datos de la propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple con los requisitos y si es necesario realizar una inspección en campo. En algunos
                              casos, podría ser suficiente la información proporcionada en la solicitud para resolver la
                              situación.

                            </li>
                            <li>

                              <strong>3. La Regulación de la Tenencia de Tierra</strong>
                              <br>
                              Se generará un documento que tendra que ser retirado en la dirección de catastro, con el
                              cual le permitira la realización de otros procesos catastrales.
                              <ul>

                                <strong>En caso de que la evacuación de titulo supletorio revele errores o discrepancias
                                  en el proceso</strong>, se procederá a realizar la rectificaciones correspondientes.
                                Este puede implicar la elaboración de documentos que reflejen los datos reales de la
                                propiedad.

                              </ul>

                            </li>

                          </ul>
                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-cep" role="tabpanel" aria-labelledby="vert-tabs-cep-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Cambio de Estructura Parcelaria</strong> ó <strong>C.E.P</strong> ?
                          </h5>

                          Es un proceso mediante el cual un técnico especializado visitará su inmueble para evaluar
                          diferentes aspectos relacionados con la configuración actual de las parcelas, como sus
                          límites, dimensiones, formas y posibles superposiciones. Esta visita permitirá obtener
                          información precisa y detallada sobre la situación registral y física de su propiedad, lo cual
                          es esencial para llevar a cabo cualquier modificación en la estructura parcelaria, ya sea una
                          división ó unificación que requiera la actualización de los planos y documentos catastrales.

                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>Solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Cambio de Estructura Parcelaria</strong>".
                              En el cual rellenara el formulario de la solicitud en el cual pedira información
                              requerida, como los datos de la propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple con los requisitos y si es necesario realizar una inspección en campo. En algunos
                              casos, podría ser suficiente la información proporcionada en la solicitud para resolver la
                              situación.

                            </li>
                            <li>

                              <strong>3. El Cambio de Estructura Parcelaria</strong>
                              <br>
                              Se generará un documento que tendra que ser retirado en la dirección de catastro, con el
                              cual le permitira la realización de otros procesos catastrales.
                              <ul>

                                <strong>En caso de que el cambio de estructura parcelaria revele errores o discrepancias
                                  en el proceso</strong>, se procederá a realizar la rectificaciones correspondientes.
                                Este puede implicar la elaboración de nuevos planos mensura, avaluos, documentos que
                                reflejen los datos reales de la estructura de la tierra.

                              </ul>

                            </li>

                          </ul>
                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-cita" role="tabpanel" aria-labelledby="vert-tabs-cita-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Cita</strong> ?
                          </h5>

                          Es un proceso mediante el cual un ciudadano o representante legal de una entidad puede
                          solicitar una cita previa para ser atendido por un técnico especializado en las oficinas de
                          Catastro. Durante la cita, se podrán realizar consultas, trámites o solicitudes relacionadas
                          con la información catastral de un inmueble, como la actualización de datos, la obtención de
                          certificados, la revisión de avalúos, entre otros. La cita permite a los usuarios recibir
                          atención personalizada y resolver sus inquietudes de manera eficiente.

                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>Solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Cita</strong>".
                              En el cual rellenara el formulario de la solicitud en el cual pedira información
                              requerida, como los datos de la propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple con los requisitos y si es necesario realizar una inspección en campo. En algunos
                              casos, podría ser suficiente la información proporcionada en la solicitud para resolver la
                              situación.

                            </li>
                            <li>

                              <strong>3. La Cita</strong>
                              <br>
                              Se generará un documento que se imprimira antes de la fecha otorgada en la aprobación, con
                              el cual le permitira la realización de otros procesos catastrales.

                            </li>

                          </ul>
                        </div>

                      </div>
                      <hr>
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-contrato" role="tabpanel"
                      aria-labelledby="vert-tabs-contrato-tab">
                      <div class="row">

                        <div class="col">
                          <h5 class=""><strong>Contrato</strong> ?
                          </h5>

                          Es un proceso legal mediante el cual se formaliza un acuerdo entre dos partes, el vendedor y
                          el comprador en el caso de la venta de un inmueble, o el arrendador y el arrendatario en el
                          caso del arrendamiento. Este acuerdo establece los términos y condiciones de la transacción,
                          incluyendo el precio de venta o la renta, las obligaciones de cada parte, las garantías, las
                          formas de pago, la duración del contrato, entre otros aspectos relevantes. La firma del
                          contrato implica la aceptación de las condiciones por ambas partes y da lugar a derechos y
                          obligaciones legales que deben ser cumplidas.

                          <br>
                          <br>
                          <h5 class="">¿Como se realiza?</h5>
                          <ul>
                            <li>
                              <strong>1. Realizar Solicitud</strong>
                              <br>
                              Se iniciara el proceso acercandose al apartado de <strong>Solicitudes</strong> en la
                              opción
                              "<strong> <i class="far fa-circle"></i> Contrato</strong>".
                              En el cual rellenara el formulario de la solicitud en el cual pedira información
                              requerida, como los datos de la propiedad, documentos que acrediten la titularidad, y
                              la descripción detallada de la razon de solicitud que requiere.

                            </li>
                            <li>

                              <strong>2. Evaluación de la Solicitud</strong>
                              <br>
                              Una vez recibida tu solicitud, nuestro equipo técnico la evaluará para determinar si
                              cumple con los requisitos y si es necesario realizar una inspección en campo. En algunos
                              casos, podría ser suficiente la información proporcionada en la solicitud para resolver la
                              situación.

                            </li>
                            <li>

                              <strong>3. El Contrato</strong>
                              <br>
                              Se generará un documento que se imprimira antes de la fecha otorgada en la aprobación, con
                              el cual le permitira la realización de otros procesos catastrales.

                            </li>

                          </ul>
                        </div>

                      </div>
                      <hr>
                    </div>

                  </div>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-consultas" role="tabpanel"
              aria-labelledby="custom-tabs-four-consultas-tab">

              <div class="row">

                <div class="col-4">
                  Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue
                  id
                  mi
                  placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique
                  nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum,
                  mattis
                  urna
                  a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non
                  luctus
                  efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia,
                  ex
                  vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur
                  eget
                  sem eu risus tincidunt eleifend ac ornare magna.
                </div>

                <div class="col">
                  <video src="../public/video/test.mp4" autoplay loop width="100%">
                  </video>
                </div>

              </div>

            </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  </div>
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 -
      <?= date("Y"); ?> <a class="text-primary">Catastro Mario Briceño Iragorry</a>.
    </strong>
  </footer>

</body>

</html>