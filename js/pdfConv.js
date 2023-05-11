document.addEventListener("DOMContentLoaded", () => {
    const $print_btn = document.querySelector("#print");
    $print_btn.addEventListener("click", () => {
        const $printable_element = document.body;
        html2pdf()
        .set({
            margin: 1,
            filename: 'historia.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3,
                letterRendering: true,
            },
            jsPDF: {
                unit: "in",
                format: "a3",
                orientation: 'portrait'
            }
        })
        .from($printable_element)
        .save()
        .catch(err => console.log(err));
    });
});
