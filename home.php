<?php

	session_start();
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	
?>

<html>

<head>

<title>home</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

.slideshowContainer 
{
  position: relative;
  overflow:hidden;
  width: 100%;
  height:100%;
}

.imageSlides 
{
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  min-width: 100%;
  min-height: 100%;
  opacity: 0;
  transition: opacity 1s ease-in-out;
  z-index: -1;
}

.visible 
{
  opacity: 1;
}

.slideshowArrow 
{
  font-size: 7em;
  color: rgba(255, 255, 255, 0.5);
  cursor: pointer;
  transition: opacity 0.2s ease-in-out;
}

.slideshowArrow:hover 
{
  opacity: 0.75;
}

#leftArrow 
{
  position: absolute;
  left: 4%;
  top: 50%;
  transform: translate(-50%, -50%);
}

#rightArrow 
{
  position: absolute;
  right: 4%;
  top: 50%;
  transform: translate(50%, -50%);
}

.slideshowCircles 
{
  position: absolute;
  bottom: 2%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.circle 
{
  display: inline-block;
  margin-left: 3px;
  margin-right: 3px;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  border: solid 2px rgba(255, 255, 255, 0.5);
  transition: 1s ease-in-out;
}

.dot 
{
  background-color: rgba(255, 255, 255, 0.7);
  border: solid 2px rgba(255, 255, 255, 0.5);
}

</style>
</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div class="slideshowContainer">

  <img class="imageSlides" src="images/ca.jpg">
  <img class="imageSlides" src="images/food.jpg">
  <img class="imageSlides" src="images/f1.jpg">
  <img class="imageSlides" src="images/cafe.jpg">
  
  <span id ="leftArrow" class="slideshowArrow">&#8249;</span>
  <span id ="rightArrow" class="slideshowArrow">&#8250;</span>
  
  <div class="slideshowCircles">
    <span class="circle dot"></span>
    <span class="circle"></span>
    <span class="circle"></span>
	<span class="circle"></span>
  </div>
  
</div>

<?php
include('footer.php');
?>

<script>

var imageSlides = document.getElementsByClassName('imageSlides');
var circles = document.getElementsByClassName('circle');
var leftArrow = document.getElementById('leftArrow');
var rightArrow = document.getElementById('rightArrow');
var counter = 0;

function hideImages() 
{
  for (var i = 0; i < imageSlides.length; i++) 
  {
    imageSlides[i].classList.remove('visible');
  }
}

function removeDots() 
{
  for (var i = 0; i < imageSlides.length; i++) 
  {
    circles[i].classList.remove('dot');
  }
}

function imageLoop() 
{
  var currentImage = imageSlides[counter];
  var currentDot = circles[counter];
  currentImage.classList.add('visible');
  removeDots();
  currentDot.classList.add('dot');
  counter++;
}

function arrowClick(e) 
{
  var target = e.target;
  if (target == leftArrow) 
  {
    clearInterval(imageSlideshowInterval);
    hideImages();
    removeDots();
    if (counter == 1) 
	{
      counter = (imageSlides.length - 1);
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    } 
	else 
	{
      counter--;
      counter--;
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    }
  } 
  else if (target == rightArrow) 
  {
    clearInterval(imageSlideshowInterval);
    hideImages();
    removeDots();
    if (counter == imageSlides.length) 
	{
      counter = 0;
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    }
	else 
	{
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    }
  }
}

leftArrow.addEventListener('click', arrowClick);
rightArrow.addEventListener('click', arrowClick);

function slideshow() 
{
  if (counter < imageSlides.length) 
  {
    imageLoop();
  } 
  else 
  {
    counter = 0;
    hideImages();
    imageLoop();
  }
}

setTimeout(slideshow, 1000);
var imageSlideshowInterval = setInterval(slideshow, 10000);

</script>

</body>

</html>
