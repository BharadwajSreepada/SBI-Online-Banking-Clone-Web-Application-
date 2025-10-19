/*document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".login").forEach(button => {
        button.addEventListener("click", function () {
            alert("Login functionality is not implemented yet.");
        });
    });
    const marquee = document.querySelector("marquee");
    marquee.addEventListener("mouseover", function () {
        marquee.stop();
    });
    marquee.addEventListener("mouseout", function () {
        marquee.start();
    });

    document.querySelectorAll(".items-list li").forEach(item => {
        item.addEventListener("mouseover", function () {
            item.style.backgroundColor = "#00509e";
        });
        item.addEventListener("mouseout", function () {
            item.style.backgroundColor = "";
        });
    });

    const sliderImages = [
        "images/1.jpg",
        "images/2.jpg",
        "images/3.jpg",
        "images/4.jpg",
        "images/5.jpg",
        "images/6.jpg"
    ];
    let currentImageIndex = 0;
    const slider = document.querySelector(".slider");

    function changeSliderImage() {
        slider.style.backgroundImage = `url(${sliderImages[currentImageIndex]})`;
        currentImageIndex = (currentImageIndex + 1) % sliderImages.length;
    }

    setInterval(changeSliderImage, 3000);
});
*/
document.addEventListener("DOMContentLoaded", function () {
    const marquee = document.querySelector("marquee");
    marquee.addEventListener("mouseover", function () {
        marquee.stop();
    });
    marquee.addEventListener("mouseout", function () {
        marquee.start();
    });

    document.querySelectorAll(".items-list li").forEach(item => {
        item.addEventListener("mouseover", function () {
            item.style.backgroundColor = "#00509e";
        });
        item.addEventListener("mouseout", function () {
            item.style.backgroundColor = "";
        });
    });

    const sliderImages = [
        "images/1.jpg",
        "images/2.jpg",
        "images/3.jpg",
        "images/4.jpg",
        "images/5.jpg",
        "images/6.jpg"
    ];
    let currentImageIndex = 0;
    const slider = document.querySelector(".slider");

    function changeSliderImage() {
        slider.style.backgroundImage = `url(${sliderImages[currentImageIndex]})`;
        currentImageIndex = (currentImageIndex + 1) % sliderImages.length;
    }

    setInterval(changeSliderImage, 3000);
});