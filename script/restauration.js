document.addEventListener("DOMContentLoaded", function () {

    function updateBorderRadius() {
        var maDiv = document.querySelector('.choix');
        var computedStyle = window.getComputedStyle(maDiv);
        var widthValue = computedStyle.getPropertyValue('width');
  
        if (widthValue === '100.0%') {
          maDiv.style.borderRadius = '20px 20px 20px';
        }
      }

    updateBorderRadius();

});