window.addEventListener('load', function() {
    const preloader = document.querySelector('.preloader');
    
    setTimeout(function() {
        preloader.classList.add('preloader-deactivate');
    }, 1000); 
});



// pratayang

// document.addEventListener('DOMContentLoaded', function() {
//     const imageInput = document.getElementById('image');
//     const imagePreview = document.getElementById('imagePreview');

//     imageInput.addEventListener('change', function(event) {
//         const file = event.target.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 imagePreview.src = e.target.result;
//                 imagePreview.style.display = 'block';
//             };
//             reader.readAsDataURL(file);
//         } else {
//             imagePreview.style.display = 'none';
//         }
//     });
// });