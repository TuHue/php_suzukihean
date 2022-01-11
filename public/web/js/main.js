let tagText = document.querySelectorAll(".tag--text");

for (let i = 0; i < tagText.length; i++) {
    tagText[i].addEventListener("click", function() {
        for (let i = 0; i < tagText.length; i++) {
            tagText[i].classList.remove("tag--text--active")
        };
        this.classList.add("tag--text--active")
    });
}