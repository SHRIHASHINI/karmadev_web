document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("qr-form");
    const qrCodeContainer = document.getElementById("qrcode");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        const hospitalName = document.getElementById("hospital_name").value;
        const equipmentType = document.getElementById("equipment_req").value;
        const equipmentQuantity = document.getElementById("quantity").value;
        const purchaseDate = document.getElementById("dob").value;

        const data = JSON.stringify({
            "Hospital Name": hospitalName,
            "Equipment Type": equipmentType,
            "Equipment Quantity": equipmentQuantity,
            "Purchase Date": purchaseDate
        });

        generateQRCode(data);
        downloadButton.style.display = "inline-block";
    });

document.getElementById("downloadBtn").addEventListener("click", function() {
    // Get the QR code image data URI
    var qrCodeDataURL = document.querySelector("#qrcode canvas").toDataURL("image/png");
    
    // Create a temporary anchor element
    var downloadLink = document.createElement("a");
    downloadLink.href = qrCodeDataURL;
    downloadLink.download = "qrcode.png"; // You can change the filename here
    document.body.appendChild(downloadLink);
    
    // Trigger the click event of the anchor element to start the download
    downloadLink.click();
    
    // Clean up: remove the temporary anchor element
    document.body.removeChild(downloadLink);
  });
  
    function generateQRCode(data) {
        qrCodeContainer.innerHTML = ""; // Clear previous QR code
        
        const qr = new QRCode(qrCodeContainer, {
            text: data,
            width: 200,
            height: 200,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }
});
