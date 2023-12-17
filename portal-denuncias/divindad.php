<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/png" href="../assets/bandera.png">


<title>Denuncias del ministerio público</title>
    <!-- Agrega Firebase -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>
<style>
    /* Basic reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Header styles */
    .header {
        background-color: #bf0909; /* Red background */
        color: white;
        display: flex;
        padding: 0.5rem 1rem; /* Padding around the content */
        justify-content: center; /* Centra horizontalmente los elementos secundarios */
        align-items: center; /* Centra verticalmente los elementos secundarios */
        height: 70px; /* Ajusta la altura según tus necesidades */
    }

    /* Logo styles */
    .logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: white;
        margin-right: 20px;
    }

    .logo img {
        width: 50px; /* Logo width, adjust as needed */
        margin-right: 26rem;
    }

    /* Search bar styles */
    .search {
        display: flex;
        align-items: center;
        background-color: white;
        border: none;
        padding: 0.5rem;
        border-radius: 0.25rem;
    }

    .search input {
        border: none;
        padding: 0.5rem;
        margin-right: 0.5rem;
        font-size: 16px;
        color:#dadada;
    }

    .search button {
        background: none;
        border: none;
        cursor: pointer;
    }

    /* Utility class to visually hide elements */
    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }
    /* Estilos para el menú de navegación */
.menu {
    background-color: #333; /* Color de fondo del menú */
    color: #fff; /* Color del texto */
    background-color: #fff;
    text-align: center; /* Centra el contenido del menú */
    padding: 0.6rem 1.2rem;
    width: 100%; /* Asegura que el nav ocupe todo el ancho */
        box-shadow: 0 8px 6px -6px #ebeaea; /* Sombra en la parte inferior del nav */
    
}

.menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex; /* Flexbox para centrar los elementos */
        margin-left: 19%;
    }

.menu li {
    margin-right: 2px; /* Espacio entre elementos del menú */
}

.menu a {
    text-decoration: none; /* Elimina la decoración de enlace */
    color: #0056AC; /* Color del texto del enlace */
    text-decoration: underline;
    font-size: 14px;
}

.menu a:hover {
    text-decoration: underline; /* Subraya el enlace al pasar el mouse sobre él */
}
.menu ul li {
        margin: 0 5px; /* Espacio horizontal entre elementos */
    }
.menu ul li a {
        font-weight: bold; /* Hace la letra más gruesa */
        font-family: sans-serif;
    }
    /* Main content styles */
    .container {
        max-width: 1200px; /* Maximum width of the content */
        margin: 24px auto; /* Center the container with margin */
        padding: 0 15px; /* Padding on either side */
        display: flex;
        justify-content: space-between;
    }

    .left-column {
        width: 55%;
        margin-top: 3%;
    }

    .right-column {
        width: 28%; /* Adjust the width as needed */
        margin-left: 2%; /* Space between columns */
        margin-top: 4%;
        color: #2f2f2f;
        font-family: sans-serif;
        font-size:13px;
    }

    .button {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }

    /* Footer styles */
    .footer {
        text-align: left;
        padding: 10px;
        background-color: #fff;
        margin-top: 20px;
        margin-left: 18%;
        color: #979696;
        font-family: sans-serif;
    }
    .shadowed-line {
    border: none; /* Removes the default border */
    height: 1px; /* Sets the height of the line */
    background-color: #e4e3e3; /* Sets the color of the line */
    margin: 20px 0; /* Adds space above and below the line */
  }
  .styled-section {
    font-family: 'Arial', sans-serif; /* Use your desired font-family */
    background-color: #f0f0f0; /* Light grey background */
    padding: 20px; /* Add some padding around the content */
    max-width: 700px; /* Maximum width of the section */
    margin: auto; /* Center the section */
  }

  .styled-section ul {
    list-style: inside; /* Bullets inside the content area */
    padding-left: 30px; /* Add some padding to the left of list items */
    margin-bottom: 20px; /* Space below the list */
    margin-left: 10%;
  }

  .styled-section li {
    margin-bottom: 10px; /* Space between list items */
  }

  .styled-button {
    background-color: #0056AC; /* Blue background */
    color: white; /* White text */
    border: none; /* No border */
    padding: 20px 20px; /* Padding inside the button */
    text-align: center; /* Center the text inside the button */
    text-decoration: none; /* No underline on the text */
    display: inline-block; /* Allow the button to be sized */
    font-size: 16px; /* Set the font size */
    cursor: pointer; /* Change mouse to pointer when over the button */
    border-radius: 5px; /* Rounded corners */
  }

  .styled-line {
    border: none; /* No border */
    height: 4px; /* Height of the line */
    background-color: #333; /* Dark line color */
    margin-top: 30px; /* Space above the line */
  }
</style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">
            <img class="logo" src="../assets/LOGO2.png" alt="Logo" style="width: 100%;">
        </a>
        <div class="search">
            <input type="text" placeholder="Buscar en gob.pe">
            <button type="submit">
                <span class="visually-hidden">Buscar</span>
                <img src="../assets/search.png" alt="Search">
            </button>
        </div>
    </header>
    <nav class="menu">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><img src="../assets/rigth.png" alt=""></li>
            <li><a href="#">El estado</a></li>
            <li><img src="../assets/rigth.png" alt=""></li>
            <li><a href="#">MPFN</a></li>
            <li><img src="../assets/rigth.png" alt=""></li>
            <li><a href="#">Denuncias y quejas</a></li>
            <li><img src="../assets/rigth.png" alt=""></li>
            <li><a href="#" style="color: #26292E;">Consultar estado de denuncias en el Ministerio Público</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- Content goes here -->
        <div class="left-column">
            <h1 style="color: #26292E;font-family: sans-serif;font-size: 36px;">Consultar estado de denuncias en el Ministerio Público</h1>
            <img src="assets/tramite.png" style="margin-top:5%;" alt="">
            <p style="color:#333; font-family: sans-serif;margin-top: 5%;">Si presentaste una denuncia ante el Ministerio Público, puedes consultar en qué estado se encuentra a través del servicio Seguimiento de denuncias.</p>
            <p style="color:#333; font-family: sans-serif;margin-top: 5%;">A través de esta plataforma también podrás imprimir los resultados o enviarlos a un correo electrónico.</p>
            <hr class="shadowed-line">
            <h2 style="color: #26292E;font-family: sans-serif;font-size: 30px;">Requisitos</h2>
            <ul>
                <li style="color:#333; font-family: sans-serif;margin-top: 4%;">Contar con tu número de DNI.</li>
                <li style="color:#333; font-family: sans-serif;margin-top: 1.5%;">Si tu denuncia fue realizada antes del 8 de agosto de 2015, deberás contar con el código de la misma.</li>
              </ul>
              <button class="styled-button" style="margin-top: 7%;">Consulta el estado de tu denuncia</button>
              <hr class="shadowed-line">
            <!-- ... More content ... -->
        </div>
        <div class="right-column">
            <h2 style="margin-bottom: 4%;">Enlaces relacionados</h2>
            <a href="" style="color: #0056AC;margin-bottom: 4%;font-size: 16px;">Consultar si una persona ha sido detenida</a>
            <br>
            <br>
            <a href="" style="color: #0056AC;font-size: 16px;">Presentar denuncia ante el Ministerio Público</a>
            <br>
            <br>
            <br>
            <br>
            <img src="../assets/oli.png" alt="">
            <!-- ... More content ... -->
        </div>
    </div>

    <footer class="footer">
        <p>Último cambio 16 enero 2022</p>
    </footer> 
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>
    <script src="script.js"></script> <!-- Tu archivo JavaScript debe ir después de los scripts de Firebase -->
    
</body>
<script src="script.js"></script>

</html>
