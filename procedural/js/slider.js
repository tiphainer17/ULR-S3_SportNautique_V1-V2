this.slides = document.querySelectorAll(".slide");

this.currentSlide = 0;

 this.flecheDroite = document.getElementById('fleche_droite');
    this.flecheDroite.onclick = this.nextSlide.bind(this);

this.flecheGauche = document.getElementById('fleche_gauche');
    this.flecheGauche.onclick = this.previewSlide.bind(this);

function nextSlide() {
    this.slides[this.currentSlide].className = 'slide';
    this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    this.slides[this.currentSlide].className = 'slide showing';
    
    
}

function previewSlide() {
    this.slides[this.currentSlide].className = 'slide';
    
    if(this.currentSlide == 0){
        this.currentSlide = this.slides.length;
    }
    
    this.currentSlide = (this.currentSlide - 1) % this.slides.length;
    this.slides[this.currentSlide].className = 'slide showing';
}


