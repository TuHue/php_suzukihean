let tagText = document.querySelectorAll(".tag--text");
let detail3ContentItem = document.querySelectorAll(".detail-3__content--item");


for (let i = 0; i < tagText.length; i++) {
    tagText[i].addEventListener("click", function() {
        for (let i = 0; i < tagText.length; i++) {
            tagText[i].classList.remove("tag--text--active")
        };
        this.classList.add("tag--text--active");
        for (let i = 0; i < detail3ContentItem.length; i++) {
            detail3ContentItem[i].style.display = "none";
        }
        document.querySelector("#" + tagText[i].dataset.value).style.display = "block";
    });
}