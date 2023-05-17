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
    <link rel="stylesheet" href="css/pdf.css">
    <title>Informació pacient</title>
</head>

<body>

    <div id="print_section">
        <h1>Valoració a l'ingrés</h1>
        <div class="rows-container">
            <div id="left-row">
                <div class="section">
                    <h3 class="title-3">Dades personals</h3>
                    <div class="box_container">
                        <div class="section_container">
                            <label for="nom"> NHC:
                                <input type="text" name="nhc" id="nhc">
                            </label>
                            <label for="nom"> Nom:
                                <input type="text" name="nom" id="nom">
                            </label>
                            <label for="cognoms"> Cognoms:
                                <input type="text" name="cognoms" id="nom">
                            </label>
                        </div>
                        <div class="section_container">
                            <label for="dni"> DNI:
                                <input type="text" name="dni" id="dni">
                            </label>
                            <label for="sexe"> Sexe:
                                <input type="text" name="sexe" id="sexe">
                            </label>
                            <label for="telefon"> Telefon:
                                <input type="text" name="telefon" id="telefon">
                            </label>
                        </div>
                        <div class="section_container">
                            <label>Direcció:</label>
                            <textarea name="direccio"></textarea>
                        </div>
                        <div class="section_container">
                            <label>Correo:</label>
                            <textarea name="mail"></textarea>
                        </div>
                    </div>
                    <h3 class="title-3">Dades generals</h3>
                    <div class="box_container">
                        <div class="section_container">
                            <label>Procedencia:</label>
                            <label><input type="checkbox" name="procedencia" value="traslado"> Trasllat</label>
                            <label><input type="checkbox" name="procedencia" value="urgencias"> Urgències</label>
                            <label><input type="checkbox" name="procedencia" value="programado"> Programat</label>
                            <label><input type="checkbox" name="procedencia" value="otro"> Otro</label>
                            <label for="text_procedencia">
                                <input type="text" name="text_procedencia" id="text_procedencia">
                            </label>
                        </div>
                        <div class="section_container">
                            <label>Motiu d'ingrés:</label>
                            <textarea name="motivo_ingreso"></textarea>
                        </div>
                        <div class="section_container">
                            <label>Tractament domiciliari:</label>
                            <textarea name="tratamiento_domiciliario"></textarea>
                        </div>
                    </div>

                    <div class="section_container">
                        <label>Alergies:</label>
                        <div>
                            <label><input type="checkbox" name="alergias" value="si"> Sí</label>
                            <label><input type="checkbox" name="alergias" value="no"> No</label>
                        </div>
                    </div>

                    <div class="checkbox_text_container">
                        <label>Hàbitos tòxics:</label>
                        <div>
                            <label for="tabaco">Tabac:</label>
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
                            <label for="text_alcohol"> Quantitat:
                                <input type="text" name="text_alcohol" id="text_alcohol">
                            </label>
                        </div>
                        <div>
                            <label for="drogas">Drogues:</label>
                            <label><input type="checkbox" name="drogas" value="si"> Si</label>
                            <label><input type="checkbox" name="drogas" value="no"> No</label>
                            <label for="text_drogas"> Tipus:
                                <input type="text" name="text_drogas" id="text_drogas">
                            </label>
                        </div>
                        <div>
                            <label for="historia_tox">Història toxicològica:</label>
                            <label><input type="checkbox" name="historia_toxicologica" value="si"> Si</label>
                            <label><input type="checkbox" name="historia_toxicologica" value="no"> No</label>
                        </div>
                        <div class="section_container">
                            <label>Antecedents patològics:</label>
                            <textarea name="antecedentes_patologicos"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="left-row">
                <div class="section">
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
                    <div class="section" id="respirar">
                        <h3 class="title-3">Necessitat de mejar i beure</h3>
                        <div class="box_container">
                            <div class="section_container">
                                <label for="pes"> Pes:
                                    <input type="text" name="pes" id="pes">
                                </label>
                                <label for="sexe"> Mida:
                                    <input type="text" name="mida" id="mida">
                                </label>
                                <label for="dietaHabitual"> Dieta habitual:
                                    <input type="text" name="dietaHabitual" id="dietaHabitual">
                                </label>
                            </div>
                            <div class="section_container">
                                <label for="alimentsNoGrassos">Aliments no grassos:</label>
                                <textarea name="alimentsNoGrassos"></textarea>
                            </div>
                            <div class="section_container">
                                <label for="intolerancia">Intolerància a:</label>
                                <textarea name="intolerancia"></textarea>
                            </div>
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
                                    <label for="protesisDental">Protesis dental:</label>
                                    <label><input type="checkbox" name="protesisDental" value="si"> Si</label>
                                    <label><input type="checkbox" name="protesisDental" value="no"> No</label>
                                </div>
                                <div class="line_section">
                                    <label for="protesisDental">Inapetencia o anorexia  :</label>
                                    <label><input type="checkbox" name="protesisDental" value="si"> Si</label>
                                    <label><input type="checkbox" name="protesisDental" value="no"> No</label>
                                </div>
                            </div>
                            <div class="section_container">
                                <div class="line_section">
                                    <label for="necessitatsAjudes">Necessitat d'ajut:</label>
                                    <label><input type="checkbox" name="necessitatsAjudes" value="si"> Si</label>
                                    <label><input type="checkbox" name="necessitatsAjudes" value="no"> No</label>
                                </div>
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