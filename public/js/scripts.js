/* global google */
/* global _ */
/**
 * scripts.js
 *
 * Computer Science 50
 * Project
 *
 * Global JavaScript.
 */


// execute when the DOM is fully loaded
$(function() {

// Used by the media link partial for the modal popup
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var images = document.getElementsByClassName('popup');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
    
var i;
for (i = 0; i < images.length; i++) {
    images[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.alt;
        }
    }

    images.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.alt;
        }


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}   




});


