fetch('rapdata.json').then(function (response) {
    let popup1 = document.querySelector('.popup-visible-1');
    let btnNom1 = document.querySelector('.nom1');
    btnNom1.addEventListener('click', function () {
        popup1.style.display = 'block';
    });
    let fermer1 = document.querySelector('.fermer1');
    fermer1.addEventListener('click', function () {
        popup1.style.display = 'none';
    });

    
    let popup2 = document.querySelector('.popup-visible-2');
    let btnNom2 = document.querySelector('.nom2');
    btnNom2.addEventListener('click', function () {
        popup2.style.display = 'block';
    });
    let fermer2 = document.querySelector('.fermer2');
    fermer2.addEventListener('click', function () {
        popup2.style.display = 'none';
    });

    
    let popup3 = document.querySelector('.popup-visible-3');
    let btnNom3 = document.querySelector('.nom3');
    btnNom3.addEventListener('click', function () {
        popup3.style.display = 'block';
    });
    let fermer3 = document.querySelector('.fermer3');
    fermer3.addEventListener('click', function () {
        popup3.style.display = 'none';
    });

    
    let popup4 = document.querySelector('.popup-visible-4');
    let btnNom4 = document.querySelector('.nom4');
    btnNom4.addEventListener('click', function () {
        popup4.style.display = 'block';
    });
    let fermer4 = document.querySelector('.fermer4');
    fermer4.addEventListener('click', function () {
        popup4.style.display = 'none';
    });
});