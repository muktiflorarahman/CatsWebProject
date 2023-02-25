function main() {
    console.log("upload.js laddas...");

    /* skapar handtag till div:s med id */
    const uploadFile = document.getElementById("fileToUpload");
    const showFile = document.getElementById("file-selected");
    const uploadSubmit = document.getElementById("uploadSubmit");

    if (uploadSubmit) {
        uploadSubmit.disabled = true;
    }

    if (uploadFile) {
        uploadFile.addEventListener("change", function () {
            let fileName = "";
            fileName = this.files[0].name;
            showFile.innerHTML = fileName;
            uploadSubmit.disabled = false;
        })

    }

}






//main anropas
//när 
document.addEventListener("DOMContentLoaded", main);