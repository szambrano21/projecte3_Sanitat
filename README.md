# projecte3_Sanitat
Projecte 3 Sanitat


# CFGS DAW perfil Bioinformàtica
## Família d’Informàtica i Comunicacions

## Ingrés Clínic al Servei d'Infermeria
## Mòdul 14. Projecte 3 
### Projecte Interdepartamental


Aquest projecte serà creat i desenvolupat per alumnes de 2n de DAW per a l'ús i la pràctica dels alumnes del cicle de CAI (Cures Auxiliar d'Infermeria) de la família de Sanitat.
Consisteix en una simulació d'una aplicació web que permeti ingressos i seguiment de pacients a un hospital.
Serà el tercer projecte del mòdul 14 i serà realitzat per un total de 5 alumnes.




### DEFINICIÓ DEL PROJECTE

Es tracta de crear una aplicació que gestioni l'ingrés i el seguiment de pacients en un centre hospitalari pel servei d'infermeria.
A l'ingrés, per nom i/o DNI, es busca el seu nHC (nombre d'Història Clínica), i, en cas de no constar-hi, es dóna d'alta una fitxa del pacient (veure més avall Fitxa del pacient).
En cas de ja constar, cal poder consultar ingressos anteriors.
Un cop fet l'ingrés i després de recollir les dades inicials pròpies de l'ingrés, caldrà prendre diàriament, 3 cops al dia, mesuraments de les constants bàsiques del pacient.
De l'ingrés, les constants s'han de veure per dies, per torns (matí, tarda i nit) i representat en una gràfica, i es pot veure l'evolució des del dia de l'ingrés.
Durant l'ingrés o després de cada mesurament de constants, el personal d'infermeria podrà indicar-ne un diagnòstic/problema i/o un tractament/intervenció. Molts ja estaran establerts, però el sistema ha de poder admetre altres no predefinits.
El sistema serà utilitzat pel personal d'infermeria i s'hi registrarà cada vegada que s'hi accedeixi, de manera que es registrarà quines accions ha realitzat cada sanitari/ària (ingrés, mesurament, diagnòstic o intervenció).
Per descomptat, com que és un hospital, s'ha de poder passar d'un pacient a un altre carregant les dades actuals de cadascú.

*La vostra tasca consisteix a crear un sistema en què es gestioni:*

* CRUD personal sanitari/usuaris administradors
* CRUD diagnòstics
* CRUD Tractaments
* CRUD Llits
* Alta Pacient al sistema
* Ingrés pacient:
* Dades inicials ingrés
* Captació de constants
* Alta del pacient (surt de l'hospital)


### REQUISITS DE PROJECTE

Grup de 5 alumnes
Un dels alumnes ha de prendre el paper de cap de projecte i un altre interlocutor amb professors/es dels cicles de Sanitat que ens guiaran en el procés.
El vostre grup escull la tecnologia a utilitzar al projecte.


### DADES A RECOLLIR

### Fitxa del pacient

DNI
Número d'historial clínic (nHC)
Nom complet
Data de naixement
Sexe
Telèfon
Mail
Direcció
Persona de contacte
Tf persona de contacte
Relació persona de contacte

### Ingrés del pacient

A cada nou ingrés, s'haurà d'emplenar:

### Dades generals
Data/hora ingrés
Assignació llit
Procedència:
Motiu de l'ingrés/diagnòstic
Tractament domiciliari
Al·lèrgies:
Hàbits tòxics:
Tabac
Alcohol
Drogues
Història toxicològica
Alertes/antecedents patològics
Entorn familiar:

### Necessitats respiratòries
Resp/min
Tos
Espectoració
Oxigenoteràpia
Coloració a la pell
Observacions

### Necessitats de menjar i beguda
Pes/talla/dieta habitual
Aliments no grats
Intolerància a:
Pròtesi dental
Necessitats d'ajuda
Inapetència i/o anorèxia
Observacions
etc…

### Presa de constants

A més, s'hauran de prendre constants (matí/vespre/nit) diàriament mentre segueixi ingressat.

### Constants generals:
Temperatura
Pressió arterial
Pols
Glucèmia
Saturació O2

De control del dolor
EVN (0-10)
Reavaluació del dolor

### Altres Controls:
Hemoglobina
Disfàgia a líquids
Disfàgia a sòlids
