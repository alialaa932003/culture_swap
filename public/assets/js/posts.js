let formAdd = document.querySelector(".addPost");

if (formAdd) {
    formAdd.addEventListener("submit", function (e) {
        let title = document.querySelector(".title");
        let content = document.querySelector(".postContent");
        let postImg = document.querySelector(".postImg");
        title.insertAdjacentHTML("afterEnd", `<span class="error">asda</span>`);
        console.log(
            title.value.trim(),
            content.value.trim(),
            postImg.value.trim()
        );
        if (
            !title.value.trim() ||
            !content.value.trim() ||
            !postImg.value.trim()
        ) {
            e.preventDefault();
        }
    });
}
