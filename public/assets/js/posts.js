let formAdd = document.querySelector(".addPost");

if (formAdd) {
    formAdd.addEventListener("submit", function (e) {
        let title = document.querySelector(".title");
        let error = document.querySelector(".error");
        let content = document.querySelector(".postContent");
        let postImg = document.querySelector(".postImg");
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
            error.innerHTML = "please enter all data";
        }
    });
}
