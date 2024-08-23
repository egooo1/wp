document.addEventListener('DOMContentLoaded', function() {
    var dropdown = document.querySelector('.dropdown button');
    dropdown.onclick = function() {
        var content = this.nextElementSibling;
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            content.style.display = 'block';
        }
    };
});
