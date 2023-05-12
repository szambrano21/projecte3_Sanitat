window.html2canvas = html2canvas;
window.jsPDF = window.jspdf.jsPDF;

function makePDF() {
    html2canvas($("#print_section")[0], {
        allowTaint: true,
        useCORS: true,
        scale: 3
    }).then(canvas => {
        var img = canvas.toDataURL("image/png");

        var doc = new jsPDF();
        doc.setFont('Arial');
        doc.getFontSize(11);
        doc.addImage(img, 'PNG', 7, 13, 195, 105);
        doc.save("html_pdf");
    });
}