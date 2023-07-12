document.getElementById('addPicture').addEventListener('click', function() {
    var picturesDiv = document.getElementById('add-picture-article');
    var pictureCount = picturesDiv.childElementCount / 4; // 4 fields per picture

    ['Title', 'URL', 'Size', 'Position'].forEach(function(field) {
        var label = document.createElement('label');
        label.textContent = 'Picture ' + (pictureCount + 1) + ' ' + field + ':';
        picturesDiv.appendChild(label);
        picturesDiv.appendChild(document.createElement('br'));

        var input = document.createElement('input');
        input.type = field === 'Size' || field === 'Position' ? 'number' : 'text';
        input.id = 'mw_picture_' + pictureCount + '_' + field.toLowerCase();
        input.name = 'mw_picture[' + pictureCount + '][' + field.toLowerCase() + ']';
        picturesDiv.appendChild(input);
        picturesDiv.appendChild(document.createElement('br'));
    });
});