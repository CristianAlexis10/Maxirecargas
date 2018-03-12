var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.two',
 triggerHook: 0.7,
 reverse : true,
 // offset : 10,
})
.setClassToggle('.section--one','zoomIn')
.addIndicators()
.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.section--two',
 triggerHook: 0.7,
 reverse : true,
 // duration: 300
})
.setClassToggle('.two--text','slideInLeft')
.addIndicators()
.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.section--two',
 triggerHook: 0.7,
 reverse : true,
 offset : 300
})
.setClassToggle('.two--text2','slideInLeft')
.addIndicators()
.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.three',
 triggerHook: 0.7,
 reverse : true,
 offset : 100
})
.setClassToggle('.imgAnimation','rotateInDownLeft')
.addIndicators()
.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene5 =  new ScrollMagic.Scene({
 triggerElement: '.three',
 triggerHook: 0.7,
 reverse : true,
 offset : 200
})
.setClassToggle('#services-servicio','jackInTheBox')
.addIndicators()
.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene6 =  new ScrollMagic.Scene({
 triggerElement: '.mediafour',
 triggerHook: 0.7,
 reverse : true,
 offset : 50
})
.setClassToggle('.title','slideInLeft')
.addIndicators()
.addTo(controller);
var controller =  new ScrollMagic.Controller();
var ourScene7 =  new ScrollMagic.Scene({
 triggerElement: '.mediafour',
 triggerHook: 0.7,
 reverse : true,
 offset : 100
})
.setClassToggle('.img--ambiente','hambiente')
.addIndicators()
.addTo(controller);
