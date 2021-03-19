<style>
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i');
html,body{
  margin:0;
  width: 100%;
  height:100%;
  font-family: 'Josefin Sans', sans-serif;

}
a{
  text-decoration:none
}
.header{
  position:relative;
  overflow:hidden;
  display:flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  align-content: flex-start;
  height:50vw;
  color:#eee;
}
.header:after{
  content:"";
  width:100%;
  height:100%;
  position:absolute;
  bottom:0;
  left:0;
  z-index:-1;
 background: linear-gradient(to bottom, rgba(0,0,0,0.12) 40%,rgba(27,32,48,1) 100%);
}
.header:before{
  content:"";
  width:100%;
  height:120%;
  position:absolute;
  top:0;
  left:0;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0); backface-visibility: hidden;
  scale(1.0, 1.0);
    transform: translateZ(0);
  background:#1B2030 url("logos/fondo1.jpg") 50% 0 no-repeat;
  background-size:100%;
  background-attachment:fixed;
  animation: grow 360s  linear 10ms infinite;
  transition:all 4s ease-in-out;
  z-index:-2
}
.header a{
  color:#eee;
}
.logo1{
  border:2px solid white;
  border-radius:3px;
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  align-content:center;
  margin:10px;
  padding:10px 10px;
  font-weight:900;
  font-size:1.1em;
  line-height:1;
  box-sizing:border-box;
  height:auto;
  margin-top: 30px;
}
.logo2{
  border:2px solid black;
  border-radius:3px;
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  align-content:center;
  margin:10px;
  padding:10px 10px;
  font-weight:900;
  font-size:1.1em;
  line-height:1;
  box-sizing:border-box;
  height:auto;
}
.bot1, .info{
  flex: 0 0 auto;
  width:50%;
}
.info{
  width:100%;
  padding:20% 0 0 0%;
  text-align:center;
  text-shadow:0 2px 3px rgba(0,0,0,0.2)
}
.author{
  display:inline-block;
  width:50px;
  height:50px;
  border-radius:50%;
  background:url("logos/logocen.png") center no-repeat;
  background-size:cover;
  box-shadow:0 2px 3px rgba(0,0,0,0.3);
  margin-bottom:3px
}
.interfaznva{
  display:inline-block;
  width:100px;
  height:100px;
  border-radius:50%;
  background:url("logos/logoinv.png") center no-repeat;
  background-size:cover;
  box-shadow:0 2px 3px rgba(0,0,0,0.3);
  margin-bottom:3px;
  margin-left: 0%;
}
.meta{
  font-size:0.7em
}
.meta{
  font-style:italic;
}
@keyframes grow{
  0% { transform: scale(1) translateY(0px)}
  50% { transform: scale(1.2) translateY(-400px)}
}
.content{  
  padding:10% 10%;
  text-align:justify
}
.btn{
  color:#333;
  border:2px solid;
  border-radius:3px;
  text-decoration:none;
  display:inline-block;
  padding:5px 10px;
  font-weight:600
}
.logofb{
    width: 15%;
    height: auto;
    position: absolute;
    left: 10%;
    padding-bottom: 5%;
}
.logowa{
    width: 15%;
    height: auto;
    position: absolute;
    left: 75%;
    padding-bottom: 5%;
}
.logoig{

    width: 15%;
    height: auto;
    position: absolute;
    left: 42.5%;
     padding-bottom: 5%;
}
.banco{
    width: 80%;
    height: auto;
    left: 20%;
    padding-bottom: 5%;
}
</style>
<body>
<div class="header">
    <div>
    <a href="loginc.php" class="logo1">ENTRENA AHORA</a>
    </div>
    <div> <a href="http://interfaznva.com" target="_b" class="interfaznva"> </a></div>
        <div class="info">
            <h4><a href="#category">#ENTRENAENCASA</a></h4>
            <h1>Entrenamiento desde tu casa</h1>
        <div class="meta">
            <a  href="logina.php" target="_b" class="author"></a><br> By <a href="logina.php" target="_b">PUNTO ZENTRAL</a>
        </div>
    </div>
</div>
<section class="content">
    <p>1.- Registrate o Inicia sesión.</p>
    <p>2.- Paga por transferencia a la cuenta bancaria de la siguiente imagen.</p>
    <p>3.- Envianos un mensaje con comprobante de transferencia a las siguientes redes para confirmar tu paquete.</p>
    <p>4.- ¡Disfruta las mejores clases en el lugar que tu quieras!.</p>
    <br>
    <br>
    <p>Para informes y ayuda da clic en:</p>

    <a href="https://www.facebook.com/puntozentral" target="_blank"><img src="logos/fb.png" border="0" height=100 class="logofb"></a>
    <a href="https://www.instagram.com/puntozentral" target="_blank"><img src="logos/ig.png" border="0" height=100 class="logoig"></a>
        <a href="https://api.whatsapp.com/send?phone=5218443432655&text=Necesito Ayuda.&source=&data=" target="_blank">
    <img src="logos/wa.png" border="0" height=100 class="logowa">
    </a>
</section>
<br>
</body>
</html>