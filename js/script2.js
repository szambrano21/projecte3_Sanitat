import { default as jsPDF } from "jsPDF";
// const { default: html2canvas } = require("html2canvas");

// window.html2canvas = html2canvas;
// window.jsPDF = window.jspdf.jsPDF;

$(document).ready(function () {
    $('#print').click(function () {
        // Configuración de la página PDF
        // Configuración de la página PDF
        var pdf = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: 'a4',
            compress: true,
            precision: 0.2,
            putOnlyUsedFonts: true,
            floatPrecision: 16 // aumentar la precisión para mejorar la calidad
        });

        // Configuración de la imagen a capturar con html2canvas
        var options = {
            allowTaint: true,
            useCORS: true,
            scale: 2, // aumentar la escala para mejorar la calidad
            logging: true,
            width: 794, // especificar el ancho de la imagen (210 mm es el ancho de un A4)
            height: 1123 // especificar la altura de la imagen (297 mm es la altura de un A4)
        };


        // Captura la imagen del div a convertir y la convierte en una imagen PNG
        html2canvas($('#print_section')[0], options).then(function (canvas) {
            console.log('La imagen se capturó correctamente.');
            var imgData = canvas.toDataURL('image/png');
            console.log('La imagen tiene contenido: ' + (imgData.length > 100));
            var imgWidth = 297; // especifica el ancho de la imagen en mm (210 mm es el ancho de un A3)
            var pageHeight = 420; // especifica la altura de la página en mm (297 mm es la altura de un A3)
            var imgHeight = canvas.height * imgWidth / canvas.width;
            var heightLeft = imgHeight;
            var position = 0;

            // Agrega la imagen como una página en el documento PDF
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            console.log('La imagen se agregó correctamente al PDF.');
            heightLeft -= pageHeight;

            // Si hay más de una página, agrega páginas adicionales
            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }

            // Guarda el archivo PDF en la computadora del usuario
            pdf.save('prueba_jspdf.pdf');
            console.log('El documento PDF se generó correctamente.');
        });
    });
});
