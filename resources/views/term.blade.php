<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{

    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 187%;
    padding-top: 125px;
    margin-top: 147px;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
select,input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
#container {width:100%; font-size: 0;}
#left, #middle, #right {display: inline-block; *display: inline; zoom: 1; vertical-align: top; font-size: 12px;}
#left {width: 25%; }
#middle {width: 70%; }
#right {width: 25%;}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
* {
    padding: 0;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

.flex-row {
    display: flex;
}
.wrapper {
    border: 1px solid #4b00ff;
    border-right: 0;
}
canvas#signature-pad {
    background: #fff;
    width: 100%;
    height: 100%;
    cursor: crosshair;
}
button#clear {
    height: 100%;
    background: #4b00ff;
    border: 1px solid transparent;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}
button#clear span {

    display: block;
}
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    @php
    $countries =   App\Models\countries::where('active',1)->get();

  @endphp

    <form method="POST" action="{{ route('clients.client.signature', $id) }}"  onsubmit="return validateForm()" enctype="multipart/form-data"  id="edit_client_form" name="edit_client_form" accept-charset="UTF-8" class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <h3>{{ __('login.Login Here') }}</h3>

        <input type="hidden" name="id" value="{{ $id }}">
        <p>A noter : les textes juridiques ont pu faire l’objet de modifications postérieurement à la publication de cet article [mis à jour le 18 mars 2021]. C’est pourquoi, nous vous conseillons de regarder la date de la publication et de vérifier si les informations qui figurent dans l’article sont toujours d’actualité.

            Les conditions générales d’utilisation (CGU), contrairement aux mentions légales, ne sont pas obligatoires. Toutefois, la majorité des sites internet choisissent d’avoir une page de CGU. En effet, ces mentions s’avèrent très utiles.

            Les conditions générales d’utilisation (CGU) d’un site web ne doivent pas être confondues avec les conditions générales de vente (CGV) :

            Les CGU servent à réglementer l’utilisation d’un service (ici un site internet) ;
            Les CGV servent à encadrer des relations commerciales (e-commerce, prestation de services, etc.)
            Pourquoi utiliser des Conditions générales d’utilisation ?
            Les CGU définissent et encadrent les modalités de l’utilisation de votre site Internet, et déterminent les droits et les obligations respectifs de l’utilisateur et de l’éditeur dans le cadre de son utilisation. Elles permettent :

            d’informer les internautes sur le fonctionnement général du site, les modalités et les règles que les utilisateurs doivent respecter en navigant ou utilisant le site internet,
            de définir la responsabilité de l’éditeur et de l’utilisateur du site ce qui permet à l’éditeur de se dédouaner en cas de comportement litigieux de certains utilisateurs,
            de prévoir des sanctions en cas de non-respect des conditions d’utilisation,
            et de prouver la bonne diligence du site.
            Dans quelle langue les CGU doivent-elles être rédigées ?
            La rédaction des CGU en français s'impose si vos clients sont des consommateurs ou utilisateurs finaux des biens, produits ou services.

            La loi Toubon du 4 août 1994 relative à l’emploi de la langue française prévoit que « dans la désignation, l’offre, la présentation, le mode d’emploi ou d’utilisation, la description de l’étendue et des conditions de garantie d’un bien, d’un produit ou d’un service, l’emploi de la langue française est obligatoire » (art. 2).

            Et l'article L.111-1 du code de la consommation prévoit " qu'avant que le consommateur ne soit lié par un contrat à titre onéreux, le professionnel communique au consommateur, de manière lisible et compréhensible".

            Mais elle n'est pas obligatoire entre professionnels, personnes de droit privé françaises et étrangères.

            La circulaire d’application de cette loi (Circ. 19-3-1996 art. 2.1.1, 1) précise que « les factures et autres documents échangés entre professionnels, personnes de droit privé françaises et étrangères, qui ne sont pas consommateurs ou utilisateurs finaux des biens, produits ou services, ne sont pas visés » par l'obligation d'emploi de la langue française .

            Si vous vendez à l'étranger, la question essentielle est celle du droit applicable à votre service. La solution idéale est de rédiger vos CGU en français et d'insérer une clause dans vos CGU qui prévoit la loi applicable en cas de litige et d'opter pour le droit français pour faciliter la compréhension des engagements que vous prenez. Dans ce cas, il peut être aussi intéressant de  proposer des traductions à titre indicatif dans les autres langues.

            Quelles informations faire figurer dans les CGU ?
            La description des services, de la raison d’être et du fonctionnement du site internet
            Vous devez préciser l’objectif du site et décrire les services que vous proposez. Préférez une description suffisamment large pour ne pas avoir à compléter vos CGU à chaque évolution de votre offre.

            Les droits de l’utilisateur doivent être précisés, par exemple dans le cas de la création d’un espace personnel. Parmi les obligations qui peuvent lui être imposées, on peut citer celle :

            de maintenir le caractère confidentiel de ses identifiants de connexion,
            d’utiliser le site conformément à sa destination,
            de ne pas tenter de nuire au bon fonctionnement du site…
            Ces dispositions des conditions générales d’utilisation permettent d’engager la responsabilité de l'utilisateur en cas de dommage résultant du non-respect desdites obligations.

            Par exemple, si le site se compose d’un espace adhérant, les CGU peuvent indiquer comment se déroule une création de compte, son rôle, les utilisations permises et interdites et son fonctionnement, jusqu’à sa suppression.

            De même, si l’utilisateur a la possibilité de poster des informations sur le site, il peut être intéressant d’indiquer les règles d’utilisation.

            Les dispositions relatives à la propriété intellectuelle
            Il est utile de rappeler que les éléments du site sont protégés par le droit de la propriété intellectuelle (droit d’auteur) et que leur utilisation sans le consentement de l’éditeur est interdite.

            Si vous postez des articles, logos, documents sur votre site internet, il est important de vous réserver, en tant qu’éditeur le droit d’utilisation, d’exploitation et de reproduction de ces éléments et ainsi les protéger contre le plagiat ou une reproduction illégale.

            Vous pouvez par exemple indiquer que :

            toutes les informations disponibles sur le site relèvent de la propriété de l’éditeur et sont protégés par le droit de la propriété intellectuelle et plus particulièrement le droit d’auteur.
            les informations figurant sur le site sont uniquement disponibles à des fins de consultation par les utilisateurs, à défaut d’un accord préalable et exprès.
            toute utilisation totale ou partielle du site ou de son contenu, par quelque procédé que ce soit ou sur quelque support que ce soit, à des fins commerciales ou publicitaires, est interdite et engage la responsabilité de l’utilisateur.
            Il faut toutefois prévoir la possibilité d’utiliser ces informations à des fins personnelles.

            Les règles délimitant la responsabilité de l’éditeur du site
            Il est important d’indiquer que l’éditeur met tout en œuvre pour assurer l’exactitude et la mise à jour des informations fournies sur le site, bien que ces informations peuvent être erronées.

            De plus, il vous faut délimiter votre responsabilité dans le cas où le site est inaccessible pour cause de problèmes techniques ou encore dans le cas où vous pointez depuis votre site, via des liens hypertextes, vers des sources extérieures, dont l’exactitude peut être remise en cause.

            Si vos articles sont ouverts aux commentaires ou si votre site dispose d’un forum, il est utile de vous dédouaner de toute responsabilité du fait des utilisateurs du site, par exemple si ces derniers publient du contenu erroné ou des propos injurieux.

            Droit applicable et juridiction compétente
            En cas de contentieux, une clause relative aux modalités de règlement du litige permet d’imposer une tentative de règlement amiable du litige avant toute saisine judiciaire.

            Où renseigner les CGU ?
            Il a été jugé que la simple présence de CGU sur un site internet ne les rendaient pas opposables aux internautes. Pour qu’elles le soient, il faut s’assurer qu’elles ont été effectivement lues et acceptées.

            La façon d’afficher vos CGU dépend donc du fait que vous voulez les rendre opposables ou non. En tant qu’éditeur, ce choix peut être fait en tenant compte du type d’activité de votre site :

            s’il s’agit d’un site d’information, que l’utilisateur est passif, c’est-à-dire qu’il n’est pas amener à poster des informations, à renseigner des formulaires, les CGU peuvent être présentées comme de simples mentions informatives, car le risque de litige est faible.
            dans le cas contraire, si l’utilisateur est amené à participer activement au site, par exemple via un compte personnel ou dans un forum, il est préférable d’opter pour un système qui permette de s’assurer qu’il a pris connaissance et consent aux CGU.
            Présenter les CGU comme simples mentions informatives
            Vous informez l’internaute sur le fonctionnement du site et les CGU ne leur sont pas opposables. Cela signifie qu’en cas de problème, vous ne pouvez pas vous prévaloir des CGU pour sanctionner les utilisateurs.

            Dans ce cas l’objectif est donc de rendre les CGU visibles afin que l’utilisateur  prenne utilement connaissance des règles qui s’appliquent à sa navigation sur le site.

            Présentez les sur une page web dédiée accessible via un lien placé en haut ou au pied de la page d’accueil du site.

            Donner aux CGU une force contractuelle
        </p>

        <label for="password">{{ __('login.signature') }}</label>

<input type="checkbox" name="c" id="c" required>
            <div class="wrapper left">
                <canvas id="signature-pad"  width="400" height="200"></canvas>
            </div>
            <div class="">
                <a id="clear"><span> Clear </span></button>
            </div>
<input type="hidden" id="canvasimg" name="signature" alt="" required>


<br>

        <button type="submit">{{ __('login.Log In') }}</button>

    </form>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
           var canvas = document.getElementById("signature-pad");

           function resizeCanvas() {
               var ratio = Math.max(window.devicePixelRatio || 1, 1);
               canvas.width = canvas.offsetWidth * ratio;
               canvas.height = canvas.offsetHeight * ratio;
               canvas.getContext("2d").scale(ratio, ratio);


           }
           window.onresize = resizeCanvas;
           resizeCanvas();

           var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(250,250,250)'
           });

           document.getElementById("clear").addEventListener('click', function(){
            signaturePad.clear();

           })

          function validateForm() {
            document.getElementById('canvasimg').value = canvas.toDataURL();
            if(document.getElementById('canvasimg').value == null){
                return false;
            }
            return true;
          }


       </script>
</body>
</html>
