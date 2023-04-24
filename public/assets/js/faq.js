const acc = document.querySelectorAll(".accordion");

for(var i = 0; i < acc.length; i++){
  acc[i].addEventListener('click', function () {
    this.classList.toggle('activee');
    this.parentElement.classList.toggle('activee');
    this.childNodes[1].classList.toggle('rotate');
    var pannel = this.nextElementSibling;

    if (pannel.style.display === 'block') {
      pannel.style.display = 'none';
    } else {
      pannel.style.display = 'block';
    }

  });
}

