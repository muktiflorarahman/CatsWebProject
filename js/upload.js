function main() {
    console.log("upload.js laddas...");

    /* skapar handtag till div:s med id */
    const uploadFile = document.getElementById("fileToUpload");
    const showFile = document.getElementById("file-selected");

    uploadFile.addEventListener("change", function () {
        let fileName = "";
        fileName = this.files[0].name;
        showFile.innerHTML = fileName;
    })
}







document.addEventListener("DOMContentLoaded", main);