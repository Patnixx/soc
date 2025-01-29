function previewImage(event) {
    const file = event.target.files[0]; // Get the uploaded file
    const reader = new FileReader(); // Create a new FileReader instance
    const fileNameSpan = document.getElementById('fileName'); // Get the span element that displays the file name
    
    reader.onload = function(e) {
        const imageUrl = e.target.result; // The file content (image URL)
        const imgElement = document.getElementById('profilePicture'); // Get the image element
        imgElement.src = imageUrl; // Update the image source to the uploaded image
    };

    if (file) {
        reader.readAsDataURL(file); // Read the uploaded file as a Data URL
        fileNameSpan.textContent = file.name; // Display the file name
    }
}

window.previewImage = previewImage;