<style>

    /* .tabla_paciente {
        display: inline-block;
        width: 100%;
        background-color: #124559;
        border: 2px solid black;
        justify-items: center;
        grid-gap: 20px;
        padding: 40px;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    } */

    #tabla_paciente {
        border-radius: 20px;
    }

    .btn {
        display: inline-block;
        text-align: center;
        flex: 100%;
        width: calc(100% - 20px);
        padding: 20px;
        border: none;
        margin: 20px;
        border-radius: 25px;
        cursor: pointer;
    }

    #dades {
        background: #2C59CD;
    }

    #constants {
        background: #38CD2C;
    }

    #respiratori {
        background: #9A30CC;
    }

    #menjars {
        background: #C12222;
    }

    .btn i {
        font-size: 100px;
        color: #ffffff;
    }

    h2 {
        color: white;
        padding: 10px 0 0 0;
        font-size: 20px;
        text-transform: uppercase;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("scripts.php") ?>
    <title>Tabla Paciente</title>
</head>

<body>
    <?php include_once("header.php") ?>
    <div class="container_general"><br><br>
        <div class="container_paciente" id="tabla_paciente">
            <button class="btn" id="dades">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>dades</h2>
                </span>
            </button>
            <button class="btn" id="constants">
                <span>
                    <i class="fa-solid fa-heart-pulse"></i>
                    <h2>Constants</h2>
                </span>
            </button>
            <button class="btn" id="respiratori">
                <span>
                    <i class="fa-solid fa-lungs"></i>
                    <h2>Respiratòries</h2>
                </span>
            </button>
            <button class="btn" id="menjars">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Menjars</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Eliminació</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Moure</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>prototipo</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>prototipo</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Prototipo</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Prototipo</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Prototipo</h2>
                </span>
            </button>
            <button class="btn" id="prototipo">
                <span>
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Prototipo</h2>
                </span>
            </button>
        </div>
        <div class="espacio_arriba"></div>
    </div>
</body>

</html>