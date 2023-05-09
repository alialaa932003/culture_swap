const swiper = new Swiper(".swiper", {
    // Default parameters
    slidesPerView: 2,
    spaceBetween: 10,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        // when window width is >= 480px
        1080: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        // when window width is >= 640px
    },
});

let nums = document.querySelectorAll(".num");

let section = document.querySelector(".statistics");

let started = false;

window.addEventListener("scroll", function () {
    if (
        window.scrollY >=
        section.offsetTop - window.innerHeight + section.clientHeight
    ) {
        if (!started) {
            nums.forEach((num) => {
                if (num.dataset.stat != 0) {
                    console.log(num);
                    return startCount(num);
                }
            });
        }
        started = true;
    }
});
if (
    window.scrollY >=
    section.offsetTop - window.innerHeight + section.clientHeight
) {
    if (!started) {
        nums.forEach((num) => startCount(num));
    }
    started = true;
}
function startCount(el) {
    let stat = el.dataset.stat;
    let count = setInterval(() => {
        el.textContent++;

        if (el.textContent == stat) {
            clearInterval(count);
        }
    }, 2000 / stat);
}
