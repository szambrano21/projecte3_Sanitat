<style>
    #print_section {
        background-color: white;
        padding: 20px;
    }

    .rows-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        flex-direction: row;
    }

    #left-row,
    #right-row {
        width: calc(50% - 40px);
        min-width: 720px;
        margin: 0 0 0 3px;
    }

    .line_section {
        margin-right: 15px;
    }

    label {
        font-size: 13px;
    }

    #print_section .section_container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    #print_section .subsection {
        display: inline;
    }

    .box_container,
    .checkbox_text_container {
        /* margin: 50px 0px; */
        padding: 10px 0px;
    }

    #print_section label {
        font-weight: bold;
        margin-right: 10px;
    }

    #print_section input[type="text"],
    #print_section input[type="number"],
    #print_section textarea {
        border: none;
        border-bottom: 1px solid black;
        padding: 5px;
        margin-left: 5px;
        flex: 1;
    }

    #print_section input[type="checkbox"] {
        margin-right: 5px;
    }

    #print_section input[type="submit"] {
        margin-top: 10px;
    }

    textarea {
        width: 100%;
        height: auto;
        resize: none;
    }

    .title-3 {
        margin-top: 30px;
        border-bottom: 2px solid black;
    }

    .short_ip {
        width: 80px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="./js/pdf_conversor/node_modules/html2canvas/dist/html2canvas.min.js"></script>
    <script src="js/pdf_conversor/pdfConversor.js"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Informació pacient</title>
</head>

<body>

    <div id="print_section">
        <h1>Valoració a l'ingrés</h1>
        <div class="rows-container">
            <div id="left-row">
                <div class="section">
                    <h3 class="title-3">Dades generals</h3>
                    <div class="box_container">
                        <div class="section_container">
                            <label>Procedencia:</label>
                            <label><input type="checkbox" name="procedencia" value="traslado"> Traslado</label>
                            <label><input type="checkbox" name="procedencia" value="urgencias"> Urgencias</label>
                            <label><input type="checkbox" name="procedencia" value="programado"> Programado</label>
                            <label><input type="checkbox" name="procedencia" value="otro"> Otro</label>
                            <label for="text_procedencia">
                                <input type="text" name="text_procedencia" id="text_procedencia">
                            </label>
                        </div>
                        <div class="section_container">
                            <label>Motivo de ingreso:</label>
                            <textarea name="motivo_ingreso"></textarea>
                        </div>
                        <div class="section_container">
                            <label>Tratamiento domiciliario:</label>
                            <textarea name="tratamiento_domiciliario"></textarea>
                        </div>
                    </div>

                    <div class="section_container">
                        <label>Alergias:</label>
                        <div>
                            <label><input type="checkbox" name="alergias" value="si"> Sí</label>
                            <label><input type="checkbox" name="alergias" value="no"> No</label>
                        </div>
                    </div>

                    <div class="checkbox_text_container">
                        <label>Hábitos tóxicos:</label>
                        <div>
                            <label for="tabaco">Tabaco:</label>
                            <label><input type="checkbox" name="tabaco" value="si"> Si</label>
                            <label><input type="checkbox" name="tabaco" value="no"> No</label>
                            <label for="text_tabaco"> Num. cig./dia:
                                <input type="text" name="text_tabaco" id="text_tabaco">
                            </label>
                        </div>
                        <div>
                            <label for="alcohol">Alcohol:</label>
                            <label><input type="checkbox" name="alcohol" value="si"> Si</label>
                            <label><input type="checkbox" name="alcohol" value="no"> No</label>
                            <label for="text_alcohol"> Cantidad:
                                <input type="text" name="text_alcohol" id="text_alcohol">
                            </label>
                        </div>
                        <div>
                            <label for="drogas">Drogas:</label>
                            <label><input type="checkbox" name="drogas" value="si"> Si</label>
                            <label><input type="checkbox" name="drogas" value="no"> No</label>
                            <label for="text_drogas"> Tipos:
                                <input type="text" name="text_drogas" id="text_drogas">
                            </label>
                        </div>
                        <div>
                            <label for="historia_tox">historia toxicologica:</label>
                            <label><input type="checkbox" name="historia_toxicologica" value="si"> Si</label>
                            <label><input type="checkbox" name="historia_toxicologica" value="no"> No</label>
                        </div>
                        <div>
                            <label>Antecedentes patológicos:</label>
                            <textarea name="antecedentes_patologicos"></textarea>
                        </div>
                    </div>

                    <div class="section_container">
                        <label for="entorno_familiar">Entorno familiar:</label>
                        <div>
                            <label><input type="checkbox" name="entorno_familiar" value="vive_solo"> Vive solo</label>
                            <label><input type="checkbox" name="entorno_familiar" value="en_familia"> En familia</label>
                            <label><input type="checkbox" name="entorno_familiar" value="residencia"> Residencia</label>
                            <label><input type="checkbox" name="entorno_familiar" value="otros"> Otros</label>
                        </div>
                    </div>
                    <div class="section_container">
                        <div>
                            <label for="persona_contacto">Persona de contacto:</label>
                            <input type="text" name="persona_contacto">
                            <label for="tel">Teléfono:</label>
                            <input type="number" name="tel">
                        </div>
                    </div>
                </div>
                <div class="section" id="respirar">
                    <h3 class="title-3">Necessitat de respirar</h3>
                    <div class="box_container">
                        <div class="section_container">
                            <label for="resp_min">Resp/min: <input type="text" class="short_ip" name="resp_min" id="resp_min"></label>
                            <label for="fc">FC: <input type="text" class="short_ip" name="fc" id="fc"></label>
                            <label for="ta">TA: <input type="text" class="short_ip" name="ta" id="ta"></label>
                            <label><input type="checkbox" name="procedencia" value="eupnea"> Eupnea</label>
                            <label><input type="checkbox" name="procedencia" value="disnea"> Disnea</label>
                            <label><input type="checkbox" name="procedencia" value="ortopnea"> Ortopnea</label>
                            <label><input type="checkbox" name="procedencia" value="taquipnea"> Taquipnea</label>
                        </div>
                        <div class="section_container">
                            <div class="line_section">
                                <label>Tos:</label>
                                <label><input type="checkbox" name="tos" value="si"> Si</label>
                                <label><input type="checkbox" name="tos" value="no"> No</label>
                            </div>
                            <div class="line_section">
                                <label>Especloració:</label>
                                <label><input type="checkbox" name="especloracio" value="si"> Si</label>
                                <label><input type="checkbox" name="especloracio" value="no"> No</label>
                            </div>
                            <div class="line_section">
                                <label>Aspecte:</label>
                                <input type="text" name="aspecte" id="aspecte">
                            </div>
                        </div>
                        <div class="section_container">
                            <label>Motivo de ingreso:</label>
                            <textarea name="motivo_ingreso"></textarea>
                        </div>
                        <div class="section_container">
                            <label>Tratamiento domiciliario:</label>
                            <textarea name="tratamiento_domiciliario"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="left-row">
                <div class="section">
                    <h3 class="title-3">Dades generals</h3>
                    <div class="box_container">
                        <div class="section_container">
                            <label>Procedencia:</label>
                            <label><input type="checkbox" name="procedencia" value="traslado"> Traslado</label>
                            <label><input type="checkbox" name="procedencia" value="urgencias"> Urgencias</label>
                            <label><input type="checkbox" name="procedencia" value="programado"> Programado</label>
                            <label><input type="checkbox" name="procedencia" value="otro"> Otro</label>
                            <label for="text_procedencia">
                                <input type="text" name="text_procedencia" id="text_procedencia">
                            </label>
                        </div>
                        <div class="section_container">
                            <label>Motivo de ingreso:</label>
                            <textarea name="motivo_ingreso"></textarea>
                        </div>
                        <div class="section_container">
                            <label>Tratamiento domiciliario:</label>
                            <textarea name="tratamiento_domiciliario"></textarea>
                        </div>
                    </div>

                    <div class="section_container">
                        <label>Alergias:</label>
                        <div>
                            <label><input type="checkbox" name="alergias" value="si"> Sí</label>
                            <label><input type="checkbox" name="alergias" value="no"> No</label>
                        </div>
                    </div>

                    <div class="checkbox_text_container">
                        <label>Hábitos tóxicos:</label>
                        <div>
                            <label for="tabaco">Tabaco:</label>
                            <label><input type="checkbox" name="tabaco" value="si"> Si</label>
                            <label><input type="checkbox" name="tabaco" value="no"> No</label>
                            <label for="text_tabaco"> Num. cig./dia:
                                <input type="text" name="text_tabaco" id="text_tabaco">
                            </label>
                        </div>
                        <div>
                            <label for="alcohol">Alcohol:</label>
                            <label><input type="checkbox" name="alcohol" value="si"> Si</label>
                            <label><input type="checkbox" name="alcohol" value="no"> No</label>
                            <label for="text_alcohol"> Cantidad:
                                <input type="text" name="text_alcohol" id="text_alcohol">
                            </label>
                        </div>
                        <div>
                            <label for="drogas">Drogas:</label>
                            <label><input type="checkbox" name="drogas" value="si"> Si</label>
                            <label><input type="checkbox" name="drogas" value="no"> No</label>
                            <label for="text_drogas"> Tipos:
                                <input type="text" name="text_drogas" id="text_drogas">
                            </label>
                        </div>
                        <div>
                            <label for="historia_tox">historia toxicologica:</label>
                            <label><input type="checkbox" name="historia_toxicologica" value="si"> Si</label>
                            <label><input type="checkbox" name="historia_toxicologica" value="no"> No</label>
                        </div>
                        <div>
                            <label>Antecedentes patológicos:</label>
                            <textarea name="antecedentes_patologicos"></textarea>
                        </div>
                    </div>

                    <div class="section_container">
                        <label for="entorno_familiar">Entorno familiar:</label>
                        <div>
                            <label><input type="checkbox" name="entorno_familiar" value="vive_solo"> Vive solo</label>
                            <label><input type="checkbox" name="entorno_familiar" value="en_familia"> En familia</label>
                            <label><input type="checkbox" name="entorno_familiar" value="residencia"> Residencia</label>
                            <label><input type="checkbox" name="entorno_familiar" value="otros"> Otros</label>
                        </div>
                    </div>
                    <div class="section_container">
                        <div>
                            <label for="persona_contacto">Persona de contacto:</label>
                            <input type="text" name="persona_contacto">
                            <label for="tel">Teléfono:</label>
                            <input type="number" name="tel">
                        </div>
                    </div>
                </div>
                <div class="section" id="respirar">
                    <h3 class="title-3">Necessitat de respirar</h3>
                    <div class="box_container">
                        <div class="section_container">
                            <label for="resp_min">Resp/min: <input type="text" class="short_ip" name="resp_min" id="resp_min"></label>
                            <label for="fc">FC: <input type="text" class="short_ip" name="fc" id="fc"></label>
                            <label for="ta">TA: <input type="text" class="short_ip" name="ta" id="ta"></label>
                            <label><input type="checkbox" name="procedencia" value="eupnea"> Eupnea</label>
                            <label><input type="checkbox" name="procedencia" value="disnea"> Disnea</label>
                            <label><input type="checkbox" name="procedencia" value="ortopnea"> Ortopnea</label>
                            <label><input type="checkbox" name="procedencia" value="taquipnea"> Taquipnea</label>
                        </div>
                        <div class="section_container">
                            <div class="line_section">
                                <label>Tos:</label>
                                <label><input type="checkbox" name="tos" value="si"> Si</label>
                                <label><input type="checkbox" name="tos" value="no"> No</label>
                            </div>
                            <div class="line_section">
                                <label>Especloració:</label>
                                <label><input type="checkbox" name="especloracio" value="si"> Si</label>
                                <label><input type="checkbox" name="especloracio" value="no"> No</label>
                            </div>
                            <div class="line_section">
                                <label>Aspecte:</label>
                                <input type="text" name="aspecte" id="aspecte">
                            </div>
                        </div>
                        <div class="section_container">
                            <label>Motivo de ingreso:</label>
                            <textarea name="motivo_ingreso"></textarea>
                        </div>
                        <div class="section_container">
                            <label>Tratamiento domiciliario:</label>
                            <textarea name="tratamiento_domiciliario"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>
        <button id="print" onclick="makePDF()">Imprime</button>
    </div>
</body>

</html>