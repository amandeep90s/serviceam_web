@extends('common.web.layout.base')
@section('styles')
@parent

@stop
@section('content')


<style>
.caption h1 {
    text-align: left;
    color: #313131 !important;
    margin: 10px 0px;
    font-weight: 500;
    font-size: 18px;
    line-height: 1.5;
    letter-spacing: 0;
}
.caption p {
    color: #575962 !important;
    font-size: 14px;
    line-height:25px;
}
.missglow_services {
    padding: 100px 0px;
    /* padding-top: 100px; */
}
.ser_detail {
    padding: 20px;
    background: #fff;
    /* margin-top: -10em; */
   
    margin: 0px auto;
    position: relative;
    /* background: #fff; */
    
    text-align: justify;
}

.ser_detail h2 {
    color: #4CAF50;
    /* background: #ff0; */
    /* width: 80%; */
    /* margin: 0px auto; */
    font-size: 30px;
    text-align: left;
    padding-top: 60px;
}

.ser_detail h3 {
    font-size: 18px;
    color: #4CAF50;
}

.ser_detail p {
    color: #575962 !important;
    font-size: 14px;
}
.ser_cnt {
    float: left;
    /* width: 50%; */
}

.ser_img {
    float: left;
    width: 50%;
}

.ser_detail {
    float: right;
    width: 50%;
    height: 510px;
    overflow-y: scroll;
}



.missglow_services .nopadding {
    padding: 0px;
}


.servide_glow .ser_cnt:nth-child(even) {
    -ms-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}

.servide_glow .ser_cnt:nth-child(even) .ser_img {
    -ms-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}

.servide_glow .ser_cnt:nth-child(even) .ser_detail {
    -ms-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}
.servide_glow {
    padding: 60px 0px;
}
/*.ser_detail::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
    border-radius: 10px;
}

.ser_detail::-webkit-scrollbar
{
    width: 10px;
    background-color: #F5F5F5;
}

.ser_detail::-webkit-scrollbar-thumb
{
    background-color: #AAA;
    border-radius: 10px;
    background-image: -webkit-linear-gradient(90deg,
                                              rgba(0, 0, 0, .2) 25%,
                                              transparent 25%,
                                              transparent 50%,
                                              rgba(0, 0, 0, .2) 50%,
                                              rgba(0, 0, 0, .2) 75%,
                                              transparent 75%,
                                              transparent)
}*/
@media only screen and (min-width: 768px) and (max-width: 1023px)
{
    .ser_detail h2
    {
        padding-top: 0px;
        font-size: 22px;
    }
    .ser_detail
    {
            height: 250px;
    }
    .ser_img img {
    height: 250px;
    object-fit: cover;
}
.name
{
    padding: 24px 0px;
}
}
@media only screen and (max-width: 767px)
{
    .ser_detail
    {
        width: 100%;
        height: auto;
    }
    .ser_img {
    float: left;
    width: 100%;
    padding: 0px 20px;
}
.servide_glow .ser_cnt:nth-child(even) {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
.servide_glow .ser_cnt:nth-child(even) .ser_img {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
.servide_glow .ser_cnt:nth-child(even) .ser_detail {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
.ser_detail h2
{
        padding-top: 10px;
            font-size: 21px;
}
.servide_glow {
    padding: 35px 0px;
}
}
</style>

<div class="missglow_services">
    <div class="container">
        <div class="heading dis-column">
                <hr>
                <h1 class="text-center"><span class="txt-green">{{Helper::getSettings()->site->site_title}}</span> Services</h1>
                <!-- <p class="mt-4 col-lg-10 col-md-12 p-0 text-center">
                    A {{Helper::getSettings()->site->site_title}} clone, depending on what service is required by the user, has three options.
                    The workflow of these respective choices are as follows:
                </p> -->
            </div>
    </div>
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 nopadding">
                <div class="servide_glow">
                <div class="ser_cnt" id="ser1">
                    <div class="ser_img"><img src="assets/layout/images/common/electrician.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>MANICURA CLÁSICA</h2>
                        <p>La manicura clásica se realiza con los esmaltes Nail Lacquer de OPI. OPI Nail Lacquer es la marca número uno en el mundo. Un sistema que puede durar hasta 5 días.</p>
                        <ul>
                            <li>
                                <h3>Manicura completa con esmaltado clásico 30 min/19 Euros</h3>
                                <p>Déjate seducir por un tratamiento rápido y completo. 
                                    Después de haber higienizado las manos, se lima las uñas para darles la forma deseada, se limpia las uñas, se aplica el tratamiento de cutículas exfoliantes para retirar el exceso de tejido muerto y se procede a la aplicación de la base, color y del top coat.
                                    Se termina el servicio con un masaje hidratante de las manos y se aplica aceite sobre las cutículas.
                                </p>
                             </li>
                             <li>
                                <h3> Sólo esmaltado clásico 15 min/9 Euros</h3>
                                <p>A veces no tenemos mucho tiempo y queremos lucir unas uñas impecables. Con sólo limar y esmaltar con acabado normal se puede conseguir ese resultado.Se termina el tratamiento con un masaje hidratante de las manos

                                </p>
                             </li>
                             <li>
                                <h3> Esmaltado clásico estilo Francesa  20min/4 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio de Manicura completa o al servicio de Sólo esmaltado clasico.
                                </p>
                             </li>
                             <li>
                                <h3> Remover esmaltado semipermanente en manos 15min/5 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser2">
                    <div class="ser_img"><img src="assets/layout/images/common/carpenter.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>MANICURA SEMIPERMANENTEID </h2>
                        <p>Es una de las técnicas más revolucionarias y novedosas del sector de las uñas, una solución que te permitirá lucir una manicura impecable durante 3 semanas tal como si fuese el primer día que lo has realizado.</p>
<p>El esmaltado permanente es un novedoso sistema de gel que consiste en la aplicación de un esmalte de alto brillo y dureza que al entrar en contacto con una lámpara de LED UV se produce su secado.</p>
<p>Como resultado del servicio, una cliente con las uñas secas y perfectas.</p>
</p>
                        <ul>
                            <li>
                                <h3>Manicura completa con esmaltado semipermanente 45min/29Euros</h3>
                                <p>El servicio incluye la limpieza y exfoliación de las cutículas, ellimado de las uñas con la forma deseada y el esmaltado con acabado semipermanente OPI GelColor.</p>
<p>Se termina con un exquisito masaje hidratante de las manos y se aplica un aceite sobre las cutículas.</p>

                                </p>
                             </li>
                             <li>
                                <h3>Sólo esmaltado semipermanente 20min/18Euros</h3>
                                <p>Se lima las uñas de la forma deseada, y se esmalta con un tono de  OPI GelColor. Se termina el servicio con un masaje hidratante de las manos.

                                </p>
                             </li>
                             <li>
                                <h3>Esmaltado semipermanente en manos estilo Francesa  25min/5 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio de Manicura completa con semipermanente. 
                                </p>
                             </li>
                             <li>
                                <h3>Remover esmaltado semipermanente en manos 15min/5 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser3">
                    <div class="ser_img"><img src="assets/layout/images/common/massage.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>PARA LAS MINIS GLOW (hasta 12 años) </h2>
                        <p>Las niñas también tienen derecho a cuidarse las manos y los pies, así como las mujeres adultas que piensan constantemente en el estado de sus uñas ya que les gusta tenerlas impecables y decoradas.</p>
<p>Cabe destacar que el proceso de cuidado de las manos y pies que se brinda a las niñas es muy similar al que las mujeres adultas reciben, excepto que no se trabaja las cutículas.</p>
<p>Los esmaltes que utilizamos son ……..</p>
<p>El propósito de este cuidado infantil es de crearles un hábito de limpieza y de cuidado, no es únicamente una manicura con propósito de belleza y moda.</p>
<p>Recuerda que ante todo, las niñas tratan de identificarse con su género y compartir actividades junto a su madre, entonces  ¿por qué no reservar un servicio de manicura y pedicura junto a su hija?
</p>
                        <ul>
                            <li>
                                <h3>Mini manicura con esmaltado clásico  25min/10 Euros </h3>
                                <p>El tratamiento empieza con un limado y limpieza de las uñas. Se empuja las cutículas suavemente para poder aplicar un brillo o un esmaltado con acabado normal.</p>
                            <p>Se termina con un masaje de las manos con crema hidratante.</p>
                             </li>
                             <li>
                                <h3> Mini pedicura con esmaltado clásico 25min/12 Euros</h3>
                                <p>El tratamiento empieza con la sumersión de los pies en agua tibia con sales minerales muy relajantes.</p>
<p>Se lima las uñas, se empuja las cutículas y se esmalta con un brillo o esmalte de acabado normal.</p>
<p>Se termina el tratamiento con un masaje de los pies.</p>


                                </p>
                             </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser4">
                    <div class="ser_img"><img src="assets/layout/images/common/cuddling.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>PEDICURA CLÁSICAID </h2>
                       
                        <ul>
                            <li>
                                <h3>Pedicura completa con esmaltado clásico 45min/28 Euros </h3>
                                <p>Se empieza el tratamiento con los pies sumergidos en agua tibia con sales minerales muy relajantes.</p>
<p>Se lima y limpia  las uñas de los pies y se retira las cutículas. Quitamos las durezas de los pies.</p>
<p>Se esmalta las uñas con OPI Nail Lacquer de acabado normal.</p>
<p>Para terminar, un masaje relajante de los pies e hidratación de las cutículas.</p>

                                </p>
                             </li>
                             <li>
                                <h3> Sólo esmaltado clásico en pies 15min/9 Euros</h3>
                                <p>Se lima las uñas de los pies y se esmalta con OPI Nail Lacquer de acabado normal.</p>
                               <p> Se realiza un masaje con crema hidratante.</p>
                             </li>
                             <li>
                                <h3> Esmaltado clásico en pies estilo Francesa  20min/4 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio de Pedicura completa con esmaltado clásico o con el servicio de Sólo esmaltado clásico.
                                </p>
                             </li>
                             <li>
                                <h3>Remover esmaltado semipermanente en pies 15min/5 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser5">
                    <div class="ser_img"><img src="assets/layout/images/common/doctor.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>PEDICURA SEMIPERMANENTE </h2>
                        
                        <ul>
                            <li>
                                <h3>Pedicura completa con esmaltado semipermanente 60min/39Euros</h3>
                                <p>El tratamiento empieza con la sumersión de los pies en agua tibia con sales minerales muy relajantes.</p>
<p>Se lima y limpia las uñas de los pies y se retira las cutículas. Quitamos las durezas de los pies.
Se esmalta las uñas con OPI GelColor.</p>
<p>Para terminar, se realiza un masaje relajante de los pies e hidratación de las cutículas.</p>

                                </p>
                             </li>
                             <li>
                                <h3> Sólo esmaltado semipermanente en pies 20min/18 euros </h3>
                                <p>Se lima las uñas de los pies y se esmalta con OPI GelColor.Se realiza un masaje con crema hidratante.


                                </p>
                             </li>
                             <li>
                                <h3>Esmaltado semipermanente en pies estilo Francesa  20min/5 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio de Pedicura completa con esmaltado semipermanente o al servicio de Sólo esmaltado semipermanente.
                                </p>
                             </li>
                             <li>
                                <h3>Remover esmaltado semipermanente en pies 15min/5 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser6">
                    <div class="ser_img"><img src="assets/layout/images/common/dog-walking.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>MANICURA & PEDICURA CLÁSICA </h2>
                       
                        <ul>
                            <li>
                                <h3>Manicura & Pedicura completa con esmaltado clásico 1h15/42 euros </h3>
                                <p>Se realiza un tratamiento completo de limado y limpieza de las uñas, se exfolia y retira las cutículas tanto de las manos como de los pies.</p>
<p>Se sumerge los pies en agua tibia con sales minerales y se quita las durezas de los pies.</p>
<p>Se termina con un esmaltado OPI Nail Lacquer de acabado normal y con un masaje hidratante.</p>

                                </p>
                             </li>
                             <li>
                                <h3> Sólo esmaltado clásico en manos & pies 30 min/16Euros  </h3>
                                <p>Se lima y esmalta las uñas de las manos y de los pies con OPI Nail Lacquer de su elección.</p>
                             </li>
                             <li>
                                <h3> Esmaltado clásico en manos & pies estilo Francesa  30min/8 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio de Manicura y Pedicura completa con esmaltado clásico o al servicio de Sólo esmaltado clásico en manos & pies.
                                </p>
                             </li>
                             <li>
                                <h3>Remover esmaltado semipermanente en manos &pies 20min/20 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser7">
                    <div class="ser_img"><img src="assets/layout/images/common/flower.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>MANICURA & PEDICURA SEMIPERMANENTE </h2>
                        
                        <ul>
                            <li>
                                <h3>Manicura & Pedicura completa con esmaltado semipermanente  1h30/65Euros </h3>
                                <p>Se realiza un tratamiento completo de limado y limpieza de las uñas, se exfolia y se retira las cutículas tanto de las manos como de los pies.</p>
<p>Se sumerge los pies en agua tibia con sales minerales y se quita las durezas de los pies.</p>
<p>Se termina con un esmaltado OPI Nail Lacquer de acabado normal y con un masaje hidratante.</p>

                                </p>
                             </li>
                             <li>
                                <h3> Sólo esmaltado semipermanente en manos & pies 40min/35Euros</h3>
                                <p>Después de limar, se esmalta las uñas de manos y pies con OPI GelColor de su elección.

                                </p>
                             </li>
                             <li>
                                <h3>Esmaltado semipermanente en manos y pies estilo Francesa  45min/10 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio de Manicura y Pedicura completa con esmaltado semipermanente o al servicio de Sólo esmaltado semipermanente en manos & pies.
                                </p>
                             </li>
                             <li>
                                <h3> Remover esmaltado semipermanente en manos & pies 20min/20 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser8">
                    <div class="ser_img"><img src="assets/layout/images/common/laundry.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>MIX & MATCH MANICURA Y PEDICURA</h2>
                        
                        <ul>
                            <li>
                                <h3>Mix & Match de manicura & pedicura completas con esmaltado clásico y semipermanente 1h15min/55euros Se hace una manicura y una pedicura completa (limado, limpieza, retiro de cutícula, durezas…..) </h3>
                                <p>Se esmalta de la manera que desea. Usted elige entre un esmaltado OPI Nail Lacquer de acabado natural o un esmaltado OPI GelColor, uno para las manos y el otro para los pies.
Se termina el tratamiento con un masaje de las manos y de los pies y se aplica un aceite sobre las cutículas.

                                </p>
                             </li>
                             <li>
                                <h3> Mix & Match de esmaltado clásico y semipermanente en manos y pies 30min/25Euros</h3>
                                <p>Se lima las uñas de las manos y de los pies.</p>
<p>Se esmalta de la manera que desea. Usted elige entre un esmaltado OPI Nail Lacquer de acabado natural o un esmaltado OPI GelColor, uno para las manos y el otro para los pies.</p>
<p>Se termina el tratamiento con un masaje de las manos y de los pies.</p>
                             </li>
                             <li>
                                <h3> Esmaltado clásico y semipermanente estilo Francesa en manos y pies 35min/9 Euros</h3>
                                <p>Servicio valido y compatible en complemento al servicio  Mix & Match de Manicura y Pedicura completa o al servicio Mix & Match de esmaltado clásico y semipermanente en manos & pies.
                                </p>
                             </li>
                             <li>
                                <h3>Remover esmaltado semipermanente en manos o pies 15min/5 Euros</h3>
                                
                             </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser9">
                    <div class="ser_img"><img src="assets/layout/images/common/house-cleaning.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>UÑAS ESCULPIDAS</h2>
                        <p>Bien cuidadas y mantenidas se ven siempre impecables.
Las uñas esculpidas ganan cada vez más terreno entre las mujeres. </p>
<p>Es un sistema de extensión de las uñas realizado de forma artesanal. Se puede hacer con acrílico (para eso se hace una mezcla de dos sustancias, un polvo y un líquido, que por acción del aire se pone sólido). Luego con un molde y un pincel se va colocando sobre la uña. </p>
<p>Se les puede dar forma y el largo que uno quiere.</p>
<p>El esculpido también se puede hacer con gel.</p>
<p>El gel es más reciente y tiene mucho éxito. Ofrece un aspecto muy natural y aporta gran brillo a las uñas.</p>
<p>La diferencia entre los dos dependerá de tus uñas, porque en ambos casos los productos son muy seguros.</p>
<p>Por ejemplo, si tienes el hábito de comerte las uñas, lo mejor es recurrir al acrílico. Si tus uñas están muy debilitadas, lo adecuado es optar por el gel ya que resulta un material más liviano sobre la uña.</p>
<p>La profesional ayudará a elegir una opción o la otra.</p>
                        <ul>
                            <li>
                                <h3>Set de uñas acrílicas o gel 1h30/49Euros </h3>
                                <p>Después de haber limado y limpiado las uñas, y retirado las cutículas, se pone un molde en cada uña para proceder a la aplicación de acrílico o gel.</p>
<p>Se realiza la forma y el largo de las uñas que usted desea.
Se esmalta las uñas con OPI GelColor de su elección.</p>
                             </li>
                             <li>
                                <h3> Set de uñas acrílicas o gel en francesa 1h30/55Euros</h3>
                                <p>Después de haber limado y limpiado las uñas, y retirado las cutículas, se pone un molde en cada uña para proceder a la aplicación de acrílico o gel.</p>
      <p>Se realiza la forma y el largo de las uñas que usted desea. </p>
      <p>Se realiza el efecto francesa trabajando con dos tonos de color, rosa o beige y blanco, tanto en acrílico como en gel o simplemente    esmaltandolas con OPI GelColor.</p>
                             </li>
                             <li>
                                <h3>Mantenimiento o Relleno 1h15 / 39 Euros </h3>
                                <p>Mantenimiento de las uñas para que sigan luciendo un aspecto    impecable. Limpiamos toda la superficie de la uña y volvemos a colocar el acrílico o el gel eligiendo el acabado OPI GelColor que más nos guste.</p>
                             </li>
                             <li>
                                <h3>Mantenimiento o relleno en francesa 1h15/ 45euros </h3>
                                <p>Se trabaja las uñas con el objetivo de rellenar lo crecido y que parezcan tan bonitas como el primer día.</p>
                                <p>Se realiza el efecto francesa trabajando con dos tonos de color, rosa o beige y blanco, tanto en acrílico como en gel o simplemente esmaltandolas con OPI GelColor.</p>
                                
                             </li>
                             <li>
                                <h3>Retirar uñas acrílicas o gel</h3>
                                <p>Con mucho cuidado se trabaja hasta retirar las uñas esculpidas sin estropear las uñas naturales.</p>
                            </li>
                            <li>
                                <h3>Reemplazar 1 uña acrílica o gel</h3>
                                <p>¿Tienes 1 uña rota? Se reemplaza en acrílico o gel.Se esmalta con OPI GelColor.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ser_cnt" id="ser10">
                    <div class="ser_img"><img src="assets/layout/images/common/laundry.jpg" alt="manicura" style="width:100%"></div>
                    <div class="ser_detail">
                        <h2>Decoración sobre uñas ID de la fotografía:498507567  3 euros </h2>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


    @stop

@section('scripts')
@parent
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function openToggle() {
        document.getElementById("toggle-bg").style.width = "100%";
        document.getElementById("sideToggle").style.right = "-10px";
    }

    function closeToggle() {
        document.getElementById("toggle-bg").style.width = "0";
        document.getElementById("sideToggle").style.right = "-640px";
    }


   // jQuery(document).ready(function ($) {
   //    "use strict";

      // $('#rides').owlCarousel({

      //    items: 3,
      //    margin: 10,
      //    nav: true,
      //    autoplay: true,
      //    dots: true,
      //    autoplayTimeout: 5000,
      //    navText: ['<span class="icon ion-ios-arrow-left"></span>', '<span class="icon ion-ios-arrow-right"></span>'],
      //    smartSpeed: 450,
      //    responsive: {
      //       0: {
      //          items: 1
      //       },
      //       768: {
      //          items: 2
      //       },
      //       1170: {
      //          items: 4
      //       }
      //    }
      // });

      // $('#deliveries').owlCarousel({

      //    items: 3,
      //    margin: 10,
      //    nav: true,
      //    autoplay: true,
      //    dots: true,
      //    autoplayTimeout: 5000,
      //    navText: ['<span class="icon ion-ios-arrow-left"></span>', '<span class="icon ion-ios-arrow-right"></span>'],
      //    smartSpeed: 450,
      //    responsive: {
      //       0: {
      //          items: 1
      //       },
      //       375: {
      //          items: 1
      //       },
      //       768: {
      //          items: 2
      //       },
      //       1170: {
      //          items: 4
      //       }
      //    }
      // });

      // $('#other-services').owlCarousel({
      //    items: 3,
      //    margin: 10,
      //    nav: true,
      //    autoplay: true,
      //    dots: true,
      //    autoplayTimeout: 5000,
      //    navText: ['<span class="icon ion-ios-arrow-left"></span>', '<span class="icon ion-ios-arrow-right"></span>'],
      //    smartSpeed: 450,
      //    responsive: {
      //       0: {
      //          items: 1
      //       },
      //       375: {
      //          items: 1
      //       },
      //       768: {
      //          items: 2
      //       },
      //       1170: {
      //          items: 4
      //       }
      //    }
      // });
      
</script>

@stop
